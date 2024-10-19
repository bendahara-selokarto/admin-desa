<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRcodeGenerateController extends Controller
{
    public function qrcode()
    {


        $qrCodes = [];
        $arry = ["48110371646", "48110371648", "48110371652", "48110371655", "48110371662", "48110371666", "48110371667", "48110371678", "48110371680", "48110371682", "48110371684", "48110371696", "48110371699", "48110371700", "48110371710", "48110371718", "48110371720", "48110371722", "48110371724", "48110371726", "48110371733", "48110371735", "48110371736", "48110371737", "48110371741", "48110371743", "48110371746", "48110371750", "48110371753", "48110371762", "48110371767", "48110371785", "48110371787", "48110371788", "48110371789", "48110371793", "48110371796", "48110371809", "48110371812", "48110371819", "48110371820", "48110371836", "48110371838", "48110371841", "48110371844", "48110371670", "48110371221", "48110371858", "48110371864", "48110371865", "48110371870", "48110371879", "48110371442", "48110371883", "48110371316", "48110371241", "48110371285", "48110371888", "48110371729", "48110371624", "48110371816"];
        foreach ($arry as $value) {
            array_push($qrCodes, QrCode::size(100)->generate($value));
        }



        // return view('qrcode', ['simple'  => $qrCodes]);

        $pdf = Pdf::loadView('qrcode', ['simple' => $qrCodes]);
        return $pdf->stream();
    }
}
