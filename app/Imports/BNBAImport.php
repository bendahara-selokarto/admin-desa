<?php

namespace App\Imports;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Collection;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Maatwebsite\Excel\Concerns\ToCollection;

class BNBAImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection) {}
}
