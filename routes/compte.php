<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {

    return view('compte/index');
})->middleware(['auth'])->name('compte.index');