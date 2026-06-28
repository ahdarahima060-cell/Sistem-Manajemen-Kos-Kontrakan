<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function index()
    {

        $reminders = Reminder::whereHas('contract', function($q){

            $q->where(
                'tenant_name',
                Auth::user()->name
            );

        })
        ->where('status','pending')
        ->orderBy('created_at','desc')
        ->get();


        return view(
            'user.notifikasi',
            compact('reminders')
        );

    }

}