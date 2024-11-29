<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientInfoController;
use App\Http\Controllers\clients\clienttables;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('clients', ClientInfoController::class);

// Auth::routes();

Route::get('/newclients', [clienttables::class, 'index'])->name('newclients.index');
Route::get('/newclients/data', [clienttables::class, 'getClients'])->name('newclients.get');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
