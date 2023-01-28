<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/insert', [App\Http\Controllers\HomeController::class, 'insert'])->name('insert');
Route::get('/daftar', [App\Http\Controllers\HomeController::class, 'daftar'])->name('daftar');
Route::get('/detail/{id}', [App\Http\Controllers\HomeController::class, 'detail'])->name('detail');
Route::get('/hapus/{id}', [App\Http\Controllers\HomeController::class, 'hapus'])->name('hapus');
Route::get('/edit/{id}', [App\Http\Controllers\HomeController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [App\Http\Controllers\HomeController::class, 'update'])->name('update');