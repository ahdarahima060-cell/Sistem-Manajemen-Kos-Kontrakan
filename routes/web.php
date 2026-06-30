<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\SewaController;


Route::view('/', 'welcome')->name('home');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Request $request) {

    $data = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
    ]);

    User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
        'role' => 'user',
    ]);

    return redirect()->route('login')
        ->with('success', 'Registrasi berhasil');

})->name('register.store');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {

    $data = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (Auth::attempt($data)) {

        $request->session()->regenerate();

        if (Auth::user()->role == 'admin') {
            return redirect()->route('dashboard.admin');
        }

        return redirect()->route('dashboard.user');
    }

    return back()->withErrors([
        'email' => 'Email atau password salah'
    ]);

})->name('login.attempt');

Route::get('/logout', function (Request $request) {

    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');

})->name('logout');

Route::get('/dashboard-admin', [DashboardController::class, 'index'])
    ->name('dashboard.admin');

Route::get('/profil-admin', function () {
    return view('profile.admin');
})->name('profil.admin');

// CRUD Kamar
Route::post('/kamar', [RoomController::class, 'store'])->name('kamar.store');
Route::get('/kamar/{id}/edit', [RoomController::class, 'edit'])->name('kamar.edit');
Route::patch('/kamar/{id}', [RoomController::class, 'update'])->name('kamar.update');
Route::delete('/kamar/{id}', [RoomController::class, 'destroy'])->name('kamar.destroy');

Route::get('/dashboard-user', function () {
    return view('dashboard.penyewa');
})->name('dashboard.user');

// Data Kamar
Route::get('/kamar', [RoomController::class, 'index'])->name('kamar.index');
Route::get('/kamar/{id}', [RoomController::class, 'show'])->name('kamar.show');
Route::post('/kamar/{id}/rating', [RoomController::class, 'rate'])->name('kamar.rate');

// Pembayaran
Route::get('/pembayaran', function () {
    $pembayaran = null;
    return view('user.pembayaran', compact('pembayaran'));
})->name('pembayaran');

// Kontrak
Route::get('/kontrak', [SewaController::class, 'index'])->name('kontrak');

Route::get('/penyewa', function () {
    return redirect()->route('kontrak');
})->name('penyewa');

// Notifikasi
Route::get('/notifikasi', [NotificationController::class, 'index'])->name('notifikasi');

Route::get('/cek-reminder', [ReminderController::class, 'check']);


Route::middleware('auth')->group(function () {

    Route::get('/profil', function () {
        return view('profile.index');
    })->name('profil');

    Route::get('/profil/edit', function () {
        return view('profile.edit');
    })->name('profil.edit');

    Route::patch('/profil', function (Request $request) {

        $user = Auth::user();

        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->name = $data['name'];
        $user->email = $data['email'];

        if (!empty($data['password'])) {
            $user->password = bcrypt($data['password']);
        }

        $user->save();

        return redirect()->route('profil')
            ->with('success', 'Profil berhasil diperbarui');

    })->name('profil.update');

});