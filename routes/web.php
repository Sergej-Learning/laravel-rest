<?php

use App\Http\Controllers\LabelController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('songs', SongController::class);
Route::resource('labes', LabelController::class);