<?php

namespace App\Exports;

use App\Models\Perusahaan;
use illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PerusahaanExport implements FromView
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Perusahaan::all();
    // }
    public function view(): View{
        return view('superadmin.perusahaan.excel', [
            'perusahaan' => Perusahaan::all()
        ]);
    }
}
