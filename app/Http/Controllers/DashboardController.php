<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Invoice;
use App\Models\Payment;
use App\Models\Reminder;
use App\Models\RentalRoom;
use App\Models\TenantContract;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRooms = RentalRoom::count();
        $availableRooms = RentalRoom::where('status', 'available')->count();
        $occupiedRooms = RentalRoom::where('status', 'occupied')->count();
        $maintenanceRooms = RentalRoom::where('status', 'maintenance')->count();

        $activeContracts = TenantContract::whereDate('contract_start', '<=', now())
            ->whereDate('contract_end', '>=', now())
            ->count();

        $expiredContracts = TenantContract::whereDate('contract_end', '<', now())
            ->count();

        $totalContracts = TenantContract::count();

        $pendingReminders = Reminder::where('status', 'pending')->count();

        $totalPaidPayments = Payment::where('status', 'paid')->sum('amount');
        $totalUnpaidPayments = Payment::where('status', 'unpaid')->sum('amount');

        $totalInvoices = Invoice::count();
        $paidInvoices = Invoice::where('status', 'paid')->count();
        $unpaidInvoices = Invoice::whereIn('status', ['pending', 'overdue'])->count();

        $currentMonthExpenses = Expense::whereMonth('expense_date', now()->month)
            ->whereYear('expense_date', now()->year)
            ->sum('amount');

        $recentContracts = TenantContract::with('room')
            ->latest()
            ->limit(5)
            ->get();

        $recentPayments = Payment::with('contract')
            ->latest()
            ->limit(5)
            ->get();

        return view('dashboard.index', compact(
            'totalRooms',
            'availableRooms',
            'occupiedRooms',
            'maintenanceRooms',
            'activeContracts',
            'expiredContracts',
            'pendingReminders',
            'totalPaidPayments',
            'totalUnpaidPayments',
            'currentMonthExpenses',
            'totalInvoices',
            'paidInvoices',
            'unpaidInvoices',
            'totalContracts',
            'recentContracts',
            'recentPayments'
        ));
    }

    public function user()
    {
        $user = Auth::user();

        $contract = TenantContract::with('room')
            ->where('user_id', $user->id)
            ->latest()
            ->first();

        $room = $contract?->room;

        $isActive = false;
        $contractStart = null;
        $contractEnd = null;
        if ($contract) {
            $contractStart = $contract->contract_start;
            $contractEnd = $contract->contract_end;
            $isActive = strtotime($contractStart) <= time() && strtotime($contractEnd) >= time();
        }

        $latestPayment = null;
        $dueAmount = 0;
        $dueDate = null;
        if ($contract) {
            $latestPayment = Payment::where('contract_id', $contract->id)->latest()->first();
            $dueAmount = $latestPayment?->amount ?? $contract->monthly_rent;
            $dueDate = $latestPayment?->payment_date ?? null;
        }

        return view('dashboard.penyewa', [
            'contract' => $contract,
            'room' => $room,
            'isActive' => $isActive,
            'contractStart' => $contractStart,
            'contractEnd' => $contractEnd,
            'dueAmount' => $dueAmount,
            'dueDate' => $dueDate,
        ]);
    }
}