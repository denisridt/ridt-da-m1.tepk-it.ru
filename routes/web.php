<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MaterialController;

Route::get('/', function () {
    return view('welcome');})->name('home');
Route::resource('materials', MaterialController::class)->names('materials');
Route::get('/materials/{id}/products', [MaterialController::class, 'show'])->name('materials.show');
