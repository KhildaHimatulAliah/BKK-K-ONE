<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Exports\PerusahaanExport;
use Maatwebsite\Excel\Facades\Excel;

class PerusahaanController extends Controller
{
    public function dataperusahaan(Request $request){
        if($request->has('search')){
            $perusahaan = Perusahaan::where('nama', 'LIKE', '%' . $request->search . '%')->get();
        } else {
            $perusahaan = Perusahaan::all();
        }
    
        return view('superadmin.perusahaan.dataperusahaan', ['perusahaans' => $perusahaan]);
    }
    // tambah perusahaan
    public function tambahperusahaan(){
        return view('superadmin.perusahaan.tambahperusahaan');
    }
    public function tambahdata(Request $request){
        if ($request->hasFile('logo')) {
            $request->file('logo')->move('storage/logoperusahaan', $request->file('logo')->getClientOriginalName());
            $validate['logo'] = $request->file('logo')->getClientOriginalName();
        }
        $perusahaan = Perusahaan::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'detail' => $request->detail,
            'logo' => $validate['logo']
        ]);
        return redirect('perusahaan')->with('berhasil', 'berhasil di edit');
    }

    public function detailperusahaan(){
        return view('superadmin.perusahaan.detailperusahaan');
    }
    public function editperusahaan($id){
        $perusahaan = Perusahaan::find($id);
        return view('superadmin.perusahaan.editperusahaan', compact('perusahaan'));
    }
    public function updateperusahaan(Request $request, $id){
        $validate = [];
        $perusahaan = Perusahaan::find($id);
        if ($request->hasFile('logo')) 
        {
            $request->file('logo')->move('storage/logoperusahaan/', $request->file('logo')->getClientOriginalName());
            $validate['logo'] = $request->file('logo')->getClientOriginalName();
        }
        $perusahaan->update(array_merge($request->all(), $validate));
        return redirect('perusahaan')->with('berhasil', 'Berhasil di Edit!');
    }
    public function getperusahaan(Request $request){
        return Perusahaan::find($request->id);
    }

    //export excel
    public function exportexcel(){
        return Excel::download(new PerusahaanExport, 'dataperusahaan.xlsx');
    }
    
}
