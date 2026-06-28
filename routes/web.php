<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::view('/', 'welcome')->name('home');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', function (Request $request) {

    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);

    User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => $validated['password'],
        'role' => 'user', // default user
    ]);

    return redirect()
        ->route('login')
        ->with('success', 'Pendaftaran berhasil. Silakan login.');
})->name('register.store');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/login-sewa', function () {
    return view('auth.login_sewa');
})->name('login.sewa');

Route::post('/login', function (Request $request) {

    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, $request->boolean('remember'))) {

        $request->session()->regenerate();

        if (Auth::user()->role === 'admin') {
            return redirect()->route('dashboard.admin');
        }

        return redirect()->route('dashboard.user');
    }

    return back()->withErrors([
        'email' => 'Email atau password tidak cocok.',
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

Route::get('/dashboard-user', function () {
    return view('dashboard.penyewa');
})->name('dashboard.user');

Route::middleware('auth')->group(function () {
    Route::get('/kamar', [RoomController::class, 'index'])->name('kamar');
    Route::get('/kamar/{id}', [RoomController::class, 'show'])->name('kamar.show');
    Route::post('/kamar/{id}/rating', [RoomController::class, 'rate'])->name('kamar.rate');

    Route::middleware('can:manage-kamar')->group(function () {
        Route::post('/kamar', [RoomController::class, 'store'])->name('kamar.store');
        Route::get('/kamar/{id}/edit', [RoomController::class, 'edit'])->name('kamar.edit');
        Route::patch('/kamar/{id}', [RoomController::class, 'update'])->name('kamar.update');
        Route::delete('/kamar/{id}', [RoomController::class, 'destroy'])->name('kamar.destroy');
    });
});

Route::get('/pembayaran', function () {
    $pembayaran = null;
    return view('user.pembayaran', compact('pembayaran'));
})->name('pembayaran');

Route::view('/kontrak', 'user.kontrak')->name('kontrak');

Route::get('/profil', function () {
    return view('profile.index');
})->name('profil');

Route::get('/profil/edit', function () {
    return view('profile.edit');
})->name('profil.edit');

Route::patch('/profil', function (Request $request) {
    $user = Auth::user();

    $validated = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
        'password' => ['nullable', 'string', 'min:8', 'confirmed'],
    ]);

    $user->name = $validated['name'];
    $user->email = $validated['email'];

    if (!empty($validated['password'])) {
        $user->password = $validated['password'];
    }


    return redirect()->route('profil')
        ->with('success', 'Profil berhasil diperbarui.');
})->name('profil.update');

Route::get('/profil-admin', function () {
    return view('profile.admin');
})->name('profil.admin');

Route::get('/notifikasi',
[NotificationController::class,'index'])
->name('notifikasi');

Route::get(
'/cek-reminder',
[ReminderController::class,'check']
);