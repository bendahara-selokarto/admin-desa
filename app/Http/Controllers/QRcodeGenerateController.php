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
        $hasil = $resoult->mapSpread(function ($q, $r, $s) {
            $obj = [$q, base64_encode(QrCode::size(100)->generate($r)), $s];

            return $obj;
        });



        $pdf = Pdf::loadView('qrcode', ['data' =>  $hasil]);
        return $pdf->stream();
    }


    public function qrcode()
    {


        $qrCodes = [];

        $arry = [
            ['21', '48110371222', 'ALIYAH'],
            ['22', '48110371223', 'AMAD BAROZI'],
            ['25', '48110371225', 'AMRULLOH'],
            ['29', '48110371229', 'ARI SUDARSONO'],
            ['33', '48110371596', 'Awaliyah'],
            ['36', '48110371237', 'BARONO'],
            ['37', '48110371239', 'BEJO'],
            ['40', '48110371243', 'BONAIM'],
            ['49', '48110371253', 'BO`ARTIYAH'],
            ['50', '48110371254', 'BUANG'],
            ['51', '48110371255', 'BUANG'],
            ['55', '48110371258', 'BUDIONO'],
            ['59', '48110371262', 'BUKHORI'],
            ['64', '48110371413', 'BUTIAH'],
            ['74', '48110371274', 'CASURI'],
            ['82', '48110371282', 'DANURI'],
            ['85', '48110371287', 'DARNO'],
            ['88', '48110371290', 'DARSONO'],
            ['94', '48110371296', 'DARWIANTO'],
            ['95', '48110371297', 'DARYANTO'],
            ['96', '48110371298', 'DARYONAH'],
            ['104', '48110371306', 'DASMIAH'],
            ['105', '48110371307', 'DASMUI'],
            ['111', '48110371312', 'DATRIYAH'],
            ['113', '48110371314', 'DAUSRI'],
            ['114', '48110371315', 'DAUSRI'],
            ['116', '48110371318', 'DIMAS EKO SAPUTRO'],
            ['118', '48110371320', 'DJARYOKO'],
            ['119', '48110371322', 'DULKAMID'],
            ['123', '48110371325', 'EKO NOVI YUSUF'],
            ['124', '48110371326', 'EKO PURWANTO'],
            ['126', '48110371328', 'EKO ROMANDON'],
            ['130', '48110371709', 'Eka Dwiyanti'],
            ['132', '48110371332', 'FAJARI'],
            ['133', '48110371334', 'FATANAH'],
            ['141', '48110371344', 'HADI SUNANTO'],
            ['142', '48110371345', 'HAFIDHIN'],
            ['151', '48110371356', 'ISMAIL'],
            ['152', '48110371613', 'ISTIANAH'],
            ['153', '48110371357', 'ISTINAH'],
            ['155', '48110371359', 'IZATUL LAILI'],
            ['157', '48110371360', 'JAARI'],
            ['158', '48110371361', 'JAMAL'],
            ['166', '48110371369', 'JIYAH'],
            ['170', '48110371373', 'JUMINAH'],
            ['195', '48110371398', 'KHOIRUL ANAM'],
            ['200', '48110371403', 'KOCIT NURODIN'],
            ['202', '48110371405', 'KOREP'],
            ['203', '48110371406', 'KOSYIM'],
            ['205', '48110371408', 'KRISYONO'],
            ['207', '48110371411', 'KUSNANTO'],
            ['209', '48110371414', 'KUWAT'],
            ['216', '48110371421', 'LILIK ARNISAH']
        ];
        foreach ($arry as $value) {
            $qrCode = [];
            $qrCode[] = $value[0];
            $qrCode[] = base64_encode(QrCode::size(100)->generate($value[1]));
            $qrCode[] = $value[2];
            $qrCodes[] = $qrCode;
        }
        dd($qrCodes);
        $pdf = Pdf::loadView('qrcode', ['data' => $qrCodes]);
        return $pdf->stream();
    }
}
