<?php

use App\Models\Penyedia;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\homeController;
use Intervention\Image\Laravel\Facades\Image;
use App\Http\Controllers\QRcodeGenerateController;

Route::get('/', [homeController::class, 'index']);
Route::get('/ppn', [homeController::class, 'ppn']);
Route::get('/pph21', [homeController::class, 'pph21']);
Route::get('/pph22', [homeController::class, 'pph22']);
Route::get('/pph23', [homeController::class, 'pph23']);
Route::get('/pdfStream', [homeController::class, 'pdfStream']);
Route::get('/code', [QRcodeGenerateController::class, 'qrcode']);
Route::get('/import', [QRcodeGenerateController::class, 'import']);
Route::get('/img', function (Request $request) {

    // dd($image);
    if ($request->hasfile('images')) {
        foreach ($request->file('images') as $key => $file) {
            $path = $file->store('public/images');
            $name = $file->getClientOriginalName();
            $image = Image::read('example.jpg');
            $image->scale(width: 500);
            $image->toPng()->save('foo.png');
        }
    }
});
