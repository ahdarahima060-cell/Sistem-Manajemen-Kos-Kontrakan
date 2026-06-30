<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TenantContract;
use App\Models\Reminder;

class SewaController extends Controller
{
    public function index()
    {
        $sewa = TenantContract::all();

        return view('user.kontrak', compact('sewa'));
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

        Reminder::create([
            'contract_id'   => $contract->id,
            'reminder_date' => now(),
            'message'       => 'Pembayaran sewa Anda akan segera jatuh tempo.',
            'status'        => 'pending',
        ]);

        return back()->with(
            'success',
            'Notifikasi berhasil dikirim.'
        );
    }
}