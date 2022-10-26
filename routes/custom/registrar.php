<?php

Route::prefix('registrar')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'registrar',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('registrar.dashboard');
    })->name('registrar.dashboard');

    Route::get('/requests', function () {
        return view('registrar.requests');
    })->name('registrar.requests');

    Route::get('/requests/view/{id}', function ($id) {
        return view('registrar.view-request',[
            'request_application_id'=>$id
        ]);
    })->name('registrar.view-request');

    Route::get('/reports', function () {
        return view('registrar.reports');
    })->name('registrar.reports');
});
