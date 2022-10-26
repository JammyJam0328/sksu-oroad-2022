<?php

Route::prefix('requester')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'requester',
])->group(function () {
    Route::get('/home', function () {
        return view('requester.home');
    })->name('requester.home');
    
    Route::get('/request/create', function () {
        return view('requester.request.index');
    })->name('requester.request-index');

    Route::get('/request/create', function () {
        if (! auth()->user()->information) {
            return redirect()->route('requester.information');
        }

        return view('requester.request.create');
    })->name('requester.request-create');

    Route::get('/manage/information', function () {
        return view('requester.information');
    })->name('requester.information');

    Route::get('/requests/view/{id}', function ($id) {
        return view('requester.view-request',[
            'request_id' => $id
        ]);
    })->name('requester.view-request');
});
