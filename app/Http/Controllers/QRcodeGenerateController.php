<?php

namespace App\Http\Controllers;

use Exception;
use Barryvdh\DomPDF\Facade\Pdf;
use Maatwebsite\Excel\Facades\Excel;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Imports\KeluargaPenerimaManfaatImport;

class QRcodeGenerateController extends Controller
{
    public function generateDoc()
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $importedData =  Excel::toCollection(new KeluargaPenerimaManfaatImport, 'file.xlsx')->first();



        $section = $phpWord->addSection();



        $description = "Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod

tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,

quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo

consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse

cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non

proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";



        // $section->addImage("favicon.ico");

        $section->addText($importedData);



        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

        try {

            $objWriter->save(storage_path('helloWorld.docx'));
        } catch (Exception $e) {
        }



        return response()->download(storage_path('helloWorld.docx'));
    }


    public function import()
    {
        try {
            $importedData =  Excel::toCollection(new KeluargaPenerimaManfaatImport, 'file.xlsx')->first();
            if ($importedData->first()->first() != null) {

                $processedData = $importedData->map(function ($row) {
                    $qrCodeData = QrCode::size(160)->generate($row[1]);
                    $qrCode = base64_encode($qrCodeData);

                    return  [$row[0], $qrCode, $row[2], 'selokarto', 'pecalungan'];
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
