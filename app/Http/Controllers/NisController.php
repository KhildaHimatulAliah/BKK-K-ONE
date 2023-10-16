<?php

namespace App\Http\Controllers;

use Excel;
use App\Models\Nis;
use App\Exports\NisExport;
use App\Imports\NisImport;
use Illuminate\Http\Request;

class NisController extends Controller
{
    public function index(Request $request){
        $search = $request->input('search');
        $nis = Nis::where('nama', 'LIKE', '%' . $request->search . '%')->latest()->paginate(10);
    
        return view('superadmin.nis.index', compact('nis'));
    }

    //tambah nis baru
    public function tambahNis(){
        $nis = Nis::all();
        return view('superadmin.nis.tambahNis');
    }
    public function newNis(Request $request){
        $nis = Nis::where('nis', $request->nis)->count();
        // dd($request->all());
        if ($nis > 0) {
           return redirect('/nis')->with('error', 'NIS yang anda tambahkan sudah terdaftar!');
        }
        if ($request->has('nama') && $request->has('nis')) {
            $nis = Nis::create([
                'nama' => $request->nama,
                'nis' => $request->nis
            ]);
            // Ketika sukses
         return redirect('/nis')->with('success', 'NIS berhasil ditambahkan!');
        }
         
    }

    public function editnis($id) {
        $nis = Nis::find($id);
        return view('superadmin.nis.editnis', compact('nis'));
    }

    public function updatenis(Request $request, $id) {
        // dd($request->all());
        $nis = Nis::find($id);
        $nis->update([
            'nama' => $request->nama,
            'nis' => $request->nis
        ]);
        return redirect('nis');
    }

    //import nis excel
    public function importnis(Request $request){
        // dd($request->all());
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('DataExcel', $namafile);

        Excel::import(new NisImport, \public_path('/DataExcel/'. $namafile));
        return redirect('nis')->with('success' , 'Data Berhasil ditambahkan');
    }

    //download file template excel
    public function templateexcel($filename){
        $filePath = public_path('exceltemplate/'. $filename);
        return response()->download($filePath);
    }
    
    public function exportexcel(){
        return Excel::download(new NisExport, 'dataNIS.xlsx');
    }
    
}
