<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JalurSepedaController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/jalur-sepeda', [JalurSepedaController::class, 'index']);
