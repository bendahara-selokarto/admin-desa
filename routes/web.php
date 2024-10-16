<?php

use App\Models\Penyedia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;

Route::get('/', [homeController::class, 'index']);
