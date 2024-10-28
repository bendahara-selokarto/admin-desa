<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Imports\KeluargaPenerimaManfaatImport;

class QRcodeGenerateController extends Controller
{
    public function import()
    {
        try {
            $importedData =  Excel::toCollection(new KeluargaPenerimaManfaatImport, 'file.xlsx')->first();
            if ($importedData->first()->first() != null) {

                $processedData = $importedData->map(function ($row) {
                    $qrCodeData = QrCode::size(160)->generate($row[1]);
                    $qrCode = base64_encode($qrCodeData);

                    return  [$row[0], $qrCode, $row[2], 'pretek', 'pecalungan'];
                });

                $pdf = Pdf::loadView('qrcode', ['data' =>   $processedData]);
                return $pdf->stream();
            }
            return redirect('/')->with('error', 'No data found in the imported file.');
        } catch (\Throwable $e) {
            return redirect('/')->with('error', 'An error occurred: ' . $e->getMessage());
        }
    }
};
