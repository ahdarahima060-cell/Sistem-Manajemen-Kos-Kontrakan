<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\TenantContract;
use App\Models\Reminder;
use App\Models\RentalRoom;
use App\Models\User;

class SewaController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $sewa = TenantContract::all();
        } else {
            $sewa = TenantContract::where('user_id', Auth::id())->get();
        }

        return view('user.kontrak', compact('sewa'));
    }

    public function create()
    {
        $users = User::where('role', 'user')->get();
        $rooms = RentalRoom::all();

        return view('user.kontrak-create', compact('users', 'rooms'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rental_rooms,id',
            'tenant_name' => 'required|string|max:100',
            'id_number' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'emergency_contact' => 'nullable|string|max:20',
            'contract_start' => 'required|date',
            'contract_end' => 'required|date|after_or_equal:contract_start',
            'monthly_rent' => 'required|numeric',
            'deposit_paid' => 'required|numeric',
            'payment_status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        TenantContract::create($data);

        return redirect()->route('kontrak')->with('success', 'Kontrak berhasil dibuat.');
    }

    public function edit($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $contract = TenantContract::findOrFail($id);
        $users = User::where('role', 'user')->get();
        $rooms = RentalRoom::all();

        return view('user.kontrak-edit', compact('contract', 'users', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $contract = TenantContract::findOrFail($id);

        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rental_rooms,id',
            'tenant_name' => 'required|string|max:100',
            'id_number' => 'required|string|max:20',
            'phone' => 'required|string|max:20',
            'emergency_contact' => 'nullable|string|max:20',
            'contract_start' => 'required|date',
            'contract_end' => 'required|date|after_or_equal:contract_start',
            'monthly_rent' => 'required|numeric',
            'deposit_paid' => 'required|numeric',
            'payment_status' => 'required|string',
            'notes' => 'nullable|string',
        ]);

        $contract->update($data);

        return redirect()->route('kontrak')->with('success', 'Kontrak berhasil diperbarui.');
    }

    public function detail($id)
    {
        $data = [
            'nama' => 'Ahda',
            'kamar' => 'Thursina 1',
            'mulai' => '01-01-2026',
            'jatuh_tempo' => '01-07-2026',
            'status' => 'Aktif'
        ];

        return view('user.detail-sewa', compact('data'));
    }

    public function kirimNotif($id)
    {
        $contract = TenantContract::findOrFail($id);

        // hanya admin atau pemilik kontrak yang bisa mengirim notifikasi
        if (Auth::user()->role !== 'admin' && Auth::id() !== $contract->user_id) {
            abort(403);
        }

        Reminder::create([
            'contract_id'   => $contract->id,
            'reminder_date' => now(),
            'message'       => 'Pembayaran sewa Anda akan segera jatuh tempo.',
            'status'        => 'pending',
        ]);

        return back()->with('success', 'Notifikasi berhasil dikirim.');
    }

    public function destroy($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $contract = TenantContract::findOrFail($id);
        $contract->delete();

        return redirect()->route('kontrak')->with('success', 'Data sewa berhasil dihapus.');
    }
}