<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TenantContract; // Model Utama Kontrak
use App\Models\RentalRoom;    // Model Kamar
use Illuminate\Routing\Controller;

class SewaController extends Controller
{
    /**
     * 1. TAMPILKAN DAFTAR KONTRAK SEWA (INDEX)
     */
    public function index()
    {
        // Mengambil semua data kontrak sewa beserta data kamar terkait (eager loading 'rentalRoom')
        $data_sewa = TenantContract::with('rentalRoom')->latest()->get();

        return view('sewa.index', compact('data_sewa'));
    }

    /**
     * 2. TAMPILKAN FORM SEWA KAMAR BARU (CREATE)
     */
    public function create()
    {
        // Hanya mengambil kamar yang statusnya 'available' (siap disewa)
        $kamar = RentalRoom::where('status', 'available')->orderBy('room_code')->get();

        return view('sewa.create', compact('kamar'));
    }

    /**
     * 3. SIMPAN DATA KONTRAK BARU (STORE)
     */
    public function store(Request $request)
    {
        // Validasi input form sesuai kolom migration kamu
        $request->validate([
            'room_id'           => 'required|exists:rental_rooms,id',
            'tenant_name'       => 'required|string|max:100',
            'id_number'         => 'required|string|max:20',
            'phone'             => 'required|string|max:20',
            'emergency_contact' => 'nullable|string|max:20',
            'contract_start'    => 'required|date',
            'contract_end'      => 'required|date|after:contract_start',
            'deposit_paid'      => 'nullable|numeric|min:0',
            'notes'             => 'nullable|string',
        ]);

        // Ambil harga bulanan asli dari kamar yang dipilih
        $kamar = RentalRoom::findOrFail($request->room_id);

        // Simpan data kontrak penyewa
        TenantContract::create([
            'room_id'           => $request->room_id,
            'tenant_name'       => $request->tenant_name,
            'id_number'         => $request->id_number,
            'phone'             => $request->phone,
            'emergency_contact' => $request->emergency_contact,
            'contract_start'    => $request->contract_start,
            'contract_end'      => $request->contract_end,
            'monthly_rent'      => $kamar->monthly_price, // Otomatis mengikuti harga kamar
            'deposit_paid'      => $request->deposit_paid ?? 0,
            'payment_status'    => 'current', // Status default saat awal kontrak
            'notes'             => $request->notes,
        ]);

        // Ubah status kamar tersebut menjadi 'occupied' (terisi)
        $kamar->update(['status' => 'occupied']);

        return redirect()
            ->route('sewa.index')
            ->with('success', 'Kontrak sewa untuk ' . $request->tenant_name . ' berhasil dibuat!');
    }

    /**
     * 4. TAMPILKAN FORM EDIT DATA KONTRAK (EDIT)
     */
    public function edit($id)
    {
        $sewa = TenantContract::findOrFail($id);
        
        // Menampilkan semua kamar untuk pilihan jikalau penyewa ingin pindah kamar saat edit
        $kamar = RentalRoom::orderBy('room_code')->get();

        return view('sewa.edit', compact('sewa', 'kamar'));
    }

    /**
     * 5. UPDATE DATA KONTRAK (UPDATE)
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'room_id'           => 'required|exists:rental_rooms,id',
            'tenant_name'       => 'required|string|max:100',
            'id_number'         => 'required|string|max:20',
            'phone'             => 'required|string|max:20',
            'emergency_contact' => 'nullable|string|max:20',
            'contract_start'    => 'required|date',
            'contract_end'      => 'required|date|after:contract_start',
            'deposit_paid'      => 'required|numeric|min:0',
            'payment_status'    => 'required|in:current,overdue,paid_ahead',
            'notes'             => 'nullable|string',
        ]);

        $sewa = TenantContract::findOrFail($id);
        
        // Cek apakah ada perpindahan kamar sewaktu di-edit
        if ($sewa->room_id != $request->room_id) {
            // Kamar lama dikosongkan kembali (available)
            RentalRoom::where('id', $sewa->room_id)->update(['status' => 'available']);
            
            // Kamar baru diubah menjadi terisi (occupied)
            RentalRoom::where('id', $request->room_id)->update(['status' => 'occupied']);
        }

        // Ambil info harga bulanan kamar saat ini
        $kamarBaru = RentalRoom::findOrFail($request->room_id);

        $sewa->update([
            'room_id'           => $request->room_id,
            'tenant_name'       => $request->tenant_name,
            'id_number'         => $request->id_number,
            'phone'             => $request->phone,
            'emergency_contact' => $request->emergency_contact,
            'contract_start'    => $request->contract_start,
            'contract_end'      => $request->contract_end,
            'monthly_rent'      => $kamarBaru->monthly_price,
            'deposit_paid'      => $request->deposit_paid,
            'payment_status'    => $request->payment_status,
            'notes'             => $request->notes,
        ]);

        return redirect()
            ->route('sewa.index')
            ->with('success', 'Data kontrak sewa berhasil diperbarui!');
    }

    /**
     * 6. HAPUS KONTRAK SEWA (DESTROY)
     */
    public function destroy($id)
    {
        $sewa = TenantContract::findOrFail($id);

        // Sebelum data kontrak dihapus, kembalikan status kamarnya menjadi 'available' (kosong)
        RentalRoom::where('id', $sewa->room_id)->update(['status' => 'available']);

        $sewa->delete();

        return redirect()
            ->route('sewa.index')
            ->with('success', 'Kontrak sewa berhasil dihapus dan status kamar dikembalikan menjadi kosong.');
    }
}