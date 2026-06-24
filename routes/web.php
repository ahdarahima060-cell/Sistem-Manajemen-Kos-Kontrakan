<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
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

Route::get('/profil', function () {

    return view('profile.index');

})->name('profil');

Route::get('/profil-admin', function () {

    return view('profile.admin');

})->name('profil.admin');