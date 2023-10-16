<?php

namespace App\Imports;

use App\Models\Jurusan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JurusanImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows){
        foreach ($rows as $row) {
            $jurusan = Jurusan::create([
                'name' => $row['nama'],
                'code' => $row['code']
            ]);
            
        }
    }
}

