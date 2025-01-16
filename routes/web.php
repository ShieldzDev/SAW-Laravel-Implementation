<?php

use App\Http\Controllers\KaryawanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/karyawans', [KaryawanController::class, 'index'])->name('karyawans.index');
Route::get('/karyawans/create', [KaryawanController::class, 'create'])->name('karyawans.create');
Route::post('/karyawans', [KaryawanController::class, 'store'])->name('karyawans.store');
Route::delete('/karyawans/{id}', [KaryawanController::class, 'destroy'])->name('karyawans.destroy');
