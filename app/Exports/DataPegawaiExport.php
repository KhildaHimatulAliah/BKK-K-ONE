<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DataPegawaiExport implements FromView
{
    // /**
    // * @return \Illuminate\Support\Collection
    // */
    // public function collection()
    // {
    //     return User::all();
    // }

    public function view() : View{
        return view('superadmin.manajemenuser.excelpegawai', [
            'pegawai'=> User::where('role_id', 2)->get()
        ]);
    }
}
