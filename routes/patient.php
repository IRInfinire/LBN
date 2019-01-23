<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('patient')->user();

    //dd($users);

    return redirect('/patient');
})->name('home');

