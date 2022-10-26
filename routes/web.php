<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $user_role = auth()->user()->roles->first()->id;
        switch ($user_role) {
            case 1:
                return redirect()->route('admin.home');
                break;
            case 2:
                return redirect()->route('registrar.dashboard');
                break;
            case 3:
                return redirect()->route('requester.home');
                break;
            default:
                return redirect()->route('login');
                break;
        }
    })->name('dashboard');
});
