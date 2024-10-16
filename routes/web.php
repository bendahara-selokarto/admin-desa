<?php

use App\Models\Penyedia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;

Route::get('/', [homeController::class, 'index']);
Route::get('/ppn', [homeController::class, 'ppn']);
Route::get('/pph21', [homeController::class, 'pph21']);
Route::get('/pph22', [homeController::class, 'pph22']);
Route::get('/pph23', [homeController::class, 'pph23']);
Route::get('/pdfStream', [homeController::class, 'pdfStream']);
