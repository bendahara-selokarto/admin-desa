<?php

namespace App\Imports;

use App\Models\Snap;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class BNBAImport implements ToCollection
{
    /**
     * @param Collection $collection
     */
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {

            Snap::create([
                'id' => $row[0],
                'kode' => $row[1],
                'nama' => $row[2]
            ]);
        }
    }
}
