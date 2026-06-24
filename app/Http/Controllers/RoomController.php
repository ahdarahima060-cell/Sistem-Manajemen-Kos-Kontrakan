<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RentalRoom;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = RentalRoom::orderBy('id')->get();
        return view('kamar.kamar', compact('rooms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'monthly_price' => 'required|numeric',
            'status' => 'required|string',
            'photo' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'max_occupants' => 'nullable|integer|min:1',
            'floor' => 'nullable|integer|min:1',
            'area_m2' => 'nullable|numeric|min:0',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('rooms', 'public');
        }

        $room = RentalRoom::create([
            'room_code' => $validated['name'] ?? 'R' . time(),
            'type' => $validated['type'],
            'monthly_price' => $validated['monthly_price'],
            'facilities' => $validated['description'] ?? null,
            'photo' => $photoPath,
            'status' => $validated['status'],
            'area_m2' => $validated['area_m2'] ?? null,
            'max_occupants' => $validated['max_occupants'] ?? 1,
            'floor' => $validated['floor'] ?? 1,
        ]);

        return redirect()->route('kamar')->with('success', 'Kamar berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $room = RentalRoom::findOrFail($id);
        return view('kamar.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $room = RentalRoom::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:100',
            'monthly_price' => 'required|numeric',
            'status' => 'required|string',
            'photo' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
            'max_occupants' => 'nullable|integer|min:1',
            'floor' => 'nullable|integer|min:1',
            'area_m2' => 'nullable|numeric|min:0',
        ]);

        if ($request->hasFile('photo')) {
            // delete old
            if ($room->photo) {
                Storage::disk('public')->delete($room->photo);
            }
            $room->photo = $request->file('photo')->store('rooms', 'public');
        }

        $room->room_code = $validated['name'] ?? $room->room_code;
        $room->type = $validated['type'];
        $room->monthly_price = $validated['monthly_price'];
        $room->facilities = $validated['description'] ?? null;
        $room->status = $validated['status'];
        $room->area_m2 = $validated['area_m2'] ?? $room->area_m2;
        $room->max_occupants = $validated['max_occupants'] ?? $room->max_occupants;
        $room->floor = $validated['floor'] ?? $room->floor;
        $room->save();

        return redirect()->route('kamar')->with('success', 'Kamar berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $room = RentalRoom::findOrFail($id);
        if ($room->photo) {
            Storage::disk('public')->delete($room->photo);
        }
        $room->delete();
        return redirect()->route('kamar')->with('success', 'Kamar berhasil dihapus.');
    }
}
