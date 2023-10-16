<?php

namespace App\Exports;

use App\Models\Pengajuan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class KandidatExport implements FromView
{
    public function __construct(int $id_lowongan)
    {
        $this->id_lowongan = $id_lowongan;
    }

    
    public function view() : View{
        return view('superadmin.manajemenkandidat.excel', [
            'detail'=> Pengajuan::where('id_lowongan', $this->id_lowongan)->get()
        ]);
    }
}

    