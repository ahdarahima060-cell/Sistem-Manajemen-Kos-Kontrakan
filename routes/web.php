<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

Route::view('/', 'welcome')->name('home');

Route::get('/register', function () {
    return view('auth.register');
});

// Login routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials, $request->boolean('remember'))) {
        $request->session()->regenerate();
        return redirect()->intended('/dashboard');
    }

    return back()->withErrors(['email' => 'Email atau password tidak cocok.']);
})->name('login.attempt');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/profil', function () { return view('profil.index'); })->name('profil');