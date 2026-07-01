<?php

namespace App\Http\Controllers;

use App\Models\RentalRoom;
use App\Models\RoomRating;
use App\Models\TenantContract;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{

    public function index()
    {
        $rooms = \App\Models\RentalRoom::all();

        return view('kamar.kamar', compact('rooms'));
    }



    public function store(Request $request)
    {

        $request->validate([

            'room_code' => 'required|unique:rental_rooms',

            'type' => 'required',

            'monthly_price' => 'required',

            'status' => 'required',

            'photo' => 'nullable|image|max:2048'

        ]);



        $photo = null;



        if ($request->hasFile('photo')) {

            $photo = $request->file('photo')
                ->store('rooms', 'public');
        }



        RentalRoom::create([


            'room_code' => $request->room_code,


            'type' => $request->type,


            'floor' => 1,


            'monthly_price' => $request->monthly_price,


            'facilities' => 'Kamar fasilitas standar',


            'max_occupants' => 1,


            'area_m2' => null,


            'photo' => $photo,


            'status' => $request->status


        ]);



        return redirect('/kamar')
            ->with('success', 'Kamar berhasil ditambahkan');
    }




    public function show($id)
    {
        $room = RentalRoom::findOrFail($id);

        return view('kamar.show', compact('room'));
    }




    public function edit($id)
    {

        $room = RentalRoom::findOrFail($id);

        return view('kamar.edit', compact('room'));
    }




    public function update(Request $request, $id)
    {
        $room = RentalRoom::findOrFail($id);

        $data = $request->validate([
            'room_code' => 'required|unique:rental_rooms,room_code,' . $room->id,
            'type' => 'required',
            'monthly_price' => 'required|numeric',
            'status' => 'required',
            'floor' => 'nullable|integer',
            'facilities' => 'nullable|string',
            'max_occupants' => 'nullable|integer',
            'area_m2' => 'nullable|numeric',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            if ($room->photo) {
                Storage::disk('public')->delete($room->photo);
            }
            $data['photo'] = $request->file('photo')->store('rooms', 'public');
        }

        $room->update($data);

        return redirect()->route('kamar.index')->with('success', 'Kamar berhasil diperbarui.');
    }




    public function destroy($id)
    {

        $room = RentalRoom::findOrFail($id);


        $room->delete();


        return back()
            ->with('success', 'Kamar berhasil dihapus');
    }

    public function rate(Request $request, $id)
    {
        $room = RentalRoom::findOrFail($id);

        if ($request->user()->role !== 'user') {
            abort(403);
        }

        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:1000',
        ]);

        $contract = TenantContract::where('room_id', $room->id)
            ->whereDate('contract_start', '<=', now())
            ->whereDate('contract_end', '>=', now())
            ->latest('contract_end')
            ->first();

        RoomRating::create([
            'room_id' => $room->id,
            'contract_id' => $contract?->id,
            'rating' => $validated['rating'],
            'comment' => $validated['comment'] ?? null,
        ]);

        return back()->with('success', 'Terima kasih, rating telah dikirim.');
    }
}
