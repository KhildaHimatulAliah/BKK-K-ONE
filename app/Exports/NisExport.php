<?php

namespace App\Exports;

use App\Models\Nis;
use illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NisExport implements FromView
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return Nis::all();
    // }

    public function view(): View{
        return view('superadmin.nis.excel', [
            'nis' => Nis::all()
        ]);
    }
}
