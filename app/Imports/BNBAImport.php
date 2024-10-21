<?php

namespace App\Imports;

use App\Models\Snap;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Collection;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Maatwebsite\Excel\Concerns\ToCollection;

class BNBAImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        $data = [];

        foreach ($collection as $row) {

            $d = [];
            $d['id'] = $row[0];
            $d['kode'] = QrCode::size(100)->generate($row[1]);
            $d['nama'] = $row[2];

            array_push($data, $d);


            // Snap::create([
            //     'id' => $row[0],
            //     'kode' => $row[1],
            //     'nama' => $row[2]
            // ]);


        }
        return Pdf::loadView('qrcode', ['data' => $data])->stream();
    }
}
