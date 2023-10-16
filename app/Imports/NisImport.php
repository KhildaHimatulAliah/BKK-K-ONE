<?php

namespace App\Imports;

use App\Models\Nis;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NisImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows){
        foreach ($rows as $row) {
            $nis = Nis::create([
                'nama' => $row['nama'],
                'nis' => $row['nis']
            ]);        
        }
    }
}
