<?php

namespace App\Exports;

use App\Models\Jurusan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class JurusanExport implements FromView
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Jurusan::all();
    // }

    public function view(): View{
        return view('superadmin.jurusan.excel', [
            'jurusan' => Jurusan::all()
        ]);
    }
}
