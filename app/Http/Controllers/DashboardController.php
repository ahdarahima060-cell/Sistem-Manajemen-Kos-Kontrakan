<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'totalRooms' => 0,
            'availableRooms' => 0,
            'occupiedRooms' => 0,
            'maintenanceRooms' => 0,

            'activeContracts' => 0,
            'expiredContracts' => 0,
            'pendingReminders' => 0,

            'totalPaidPayments' => 0,
            'totalUnpaidPayments' => 0,
            'currentMonthExpenses' => 0,

            'totalInvoices' => 0,
            'paidInvoices' => 0,
            'unpaidInvoices' => 0,

            'totalContracts' => 0,

            'recentContracts' => collect(),
            'recentPayments' => collect(),
        ]);
    }
}