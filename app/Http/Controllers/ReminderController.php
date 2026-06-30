<?php

namespace App\Http\Controllers;


use App\Models\TenantContract;
use App\Models\Reminder;
use Carbon\Carbon;


class ReminderController extends Controller
{


    public function check()
    {


        $contracts = TenantContract::all();



        foreach ($contracts as $contract) {



            if (Carbon::now()->greaterThanOrEqualTo($contract->contract_end)) {

                Reminder::firstOrCreate([
                    'contract_id' => $contract->id,
                    'reminder_date' => now(),
                    'message' => 'Pembayaran sewa Anda sudah jatuh tempo.',
                    'status' => 'pending'
                ]);
            }
        }



        return "Reminder berhasil dicek";
    }
}
