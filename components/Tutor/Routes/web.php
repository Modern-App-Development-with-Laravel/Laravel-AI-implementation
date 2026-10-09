<?php

use Illuminate\Support\Facades\Route;

Route::get('/tutor', function () {
    return view('tutor::page');
});