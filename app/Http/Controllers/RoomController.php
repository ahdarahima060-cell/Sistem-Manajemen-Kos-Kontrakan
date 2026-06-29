<?php

namespace App\Http\Controllers;

use App\Models\RentalRoom;
use Illuminate\Http\Request;

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


        return view('edit-kamar', compact('room'));
    }




    public function update(Request $request, $id)
    {

        $room = RentalRoom::findOrFail($id);


        $room->update($request->all());


        return redirect('/kamar');
    }




    public function destroy($id)
    {

        $room = RentalRoom::findOrFail($id);


        $room->delete();


        return back()
            ->with('success', 'Kamar berhasil dihapus');
    }
}
