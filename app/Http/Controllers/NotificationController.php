<?php

namespace App\Http\Controllers;

use App\Models\Reminder;
use App\Models\RentalRoom;
use App\Models\TenantContract;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function index()
    {
        $notifications = collect();

        if (Auth::user()->role === 'admin') {
            $reminders = Reminder::where('status', 'pending')
                ->orderBy('created_at', 'desc')
                ->get();

            foreach ($reminders as $reminder) {
                $contract = $reminder->contract;
                $tenantName = $contract?->tenant_name ?? 'Penghuni';
                $notifications->push([
                    'title' => 'Pengingat Pembayaran',
                    'message' => "{$tenantName}: {$reminder->message}",
                    'date' => $reminder->reminder_date,
                    'type' => 'payment',
                ]);
            }

            $rooms = RentalRoom::orderBy('room_code')->get();
            foreach ($rooms as $room) {
                if ($room->status === 'available') {
                    $notifications->push([
                        'title' => 'Kamar Kosong',
                        'message' => "Kamar {$room->room_code} sedang kosong.",
                        'date' => $room->updated_at,
                        'type' => 'room_available',
                    ]);
                } elseif ($room->status === 'occupied') {
                    $notifications->push([
                        'title' => 'Kamar Terisi',
                        'message' => "Kamar {$room->room_code} sudah terisi.",
                        'date' => $room->updated_at,
                        'type' => 'room_occupied',
                    ]);
                }
            }
        } else {
            $reminders = Reminder::where('status', 'pending')
                ->whereHas('contract', function ($q) {
                    $q->where(function ($query) {
                        $query->where('user_id', Auth::id());
                        $query->orWhere(function ($subQuery) {
                            $subQuery->whereNull('user_id')
                                ->where('tenant_name', Auth::user()->name);
                        });
                    });
                })
                ->orderBy('created_at', 'desc')
                ->get();

            foreach ($reminders as $reminder) {
                $notifications->push([
                    'title' => 'Pengingat Pembayaran',
                    'message' => $reminder->message,
                    'date' => $reminder->reminder_date,
                    'type' => 'payment',
                ]);
            }

            $contract = TenantContract::where('user_id', Auth::id())
                ->where('contract_start', '<=', now())
                ->where('contract_end', '>=', now())
                ->with('room')
                ->first();

            if ($contract?->room) {
                $room = $contract->room;
                $notifications->push([
                    'title' => 'Status Kamar Anda',
                    'message' => "Kamar {$room->room_code} Anda saat ini {$room->status}.",
                    'date' => $room->updated_at,
                    'type' => $room->status === 'available' ? 'room_available' : 'room_occupied',
                ]);
            }
        }

        return view('user.notifikasi', compact('notifications'));
    }

}