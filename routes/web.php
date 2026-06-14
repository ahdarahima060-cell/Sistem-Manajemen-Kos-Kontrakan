<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');
Route::view('/login', 'login');
Route::view('/register', 'register');
Route::view('/admin/login', 'admin.login');
Route::view('/admin/register', 'admin.register');
