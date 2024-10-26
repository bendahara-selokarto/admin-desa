<?php

namespace App\Http\Controllers;

use App\Imports\BNBAImport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRcodeGenerateController extends Controller
{
    public function import()
    {
        $resoult =  Excel::toCollection(new BNBAImport, 'file.xlsx')->first();
        if ($resoult->first()->first() != null) {

            $hasil = $resoult->mapSpread(function ($q, $r, $s) {
                $obj = [$q, base64_encode(QrCode::size(100)->generate($r)), $s];
                return $obj;
            });

            $pdf = Pdf::loadView('qrcode', ['data' =>  $hasil]);
            return $pdf->stream();
        }
        return redirect('/')->with('status', 'Profile updated!');
    }
};
