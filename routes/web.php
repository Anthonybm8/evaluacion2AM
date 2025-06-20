<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CircuitoController;


Route::get('/', function () {
    return view('welcome');
    
});
Route::resource('circuitos', CircuitoController::class);