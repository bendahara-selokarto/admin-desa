<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\Vendor;
use Illuminate\Support\Facades\Route;

Route::get('/', [Vendor::class, 'index']);
