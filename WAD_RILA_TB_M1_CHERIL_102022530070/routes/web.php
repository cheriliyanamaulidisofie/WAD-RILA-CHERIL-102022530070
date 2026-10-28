<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenyalurController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('penyalurs', PenyalurController::class);