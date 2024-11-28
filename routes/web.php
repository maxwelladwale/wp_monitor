<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientInfoController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('clients', ClientInfoController::class);

//Route::get('/clients', [ClientInfoController::class, 'index']);
//Route::get('/clients/create', [ClientInfoController::class, 'create']);
//Route::post('/clients', [ClientInfoController::class, 'store']);
//Route::get('/clients/{client}', [ClientInfoController::class, 'show']);
//Route::get('/clients/{client}/edit', [ClientInfoController::class, 'edit']);
//Route::patch('/clients/{client}', [ClientInfoController::class, 'update']);
//Route::delete('/clients/{client}', [ClientInfoController::class, 'destroy']);
