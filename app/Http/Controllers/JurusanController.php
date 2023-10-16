<?php

namespace App\Http\Controllers;

use Excel;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Exports\JurusanExport;
use App\Imports\JurusanImport;

class JurusanController extends Controller
{
    public function index(){
        $jurusan = Jurusan::all();
        return view('superadmin.jurusan.index', compact('jurusan'));
    }

    public function tambahjurusan(){
        return view('superadmin.jurusan.tambahjurusan');
    }
    public function insertjurusan(Request $request) {
        $jurusan = Jurusan::create([
            'name' => $request->name,
            'code' => $request->code
         ]);
         return redirect('datajurusan');
    }

    //edit jurusan
    public function editjurusan($id){
        $jurusan = Jurusan::find($id);
        return view('superadmin.jurusan.editjurusan', compact('jurusan'));
    }
    public function updatejurusan(Request $request, $id){
        $jurusan = Jurusan::find($id);
        $jurusan->update([
            'name' => $request->name,
            'code' => $request->code
        ]);

        return redirect('datajurusan')->with('success', 'Data Berhasil di Update');
    }

    //hapus jurusan
    public function deletejurusan($id){
        $jurusan = Jurusan::find($id);
        $jurusan->delete();
        return redirect('datajurusan')->with('success', 'Data berhasil dihapus');
       }

    //import data jurusan excel
    public function importjurusan(Request $request){
        // dd($request->all());
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('DataExcel', $namafile);

        Excel::import(new JurusanImport, \public_path('/DataExcel/'. $namafile));
        return redirect('datajurusan')->with('success' , 'Data Berhasil ditambahkan');
    }

    //download template excel
     public function templateexcel($filename){
        $filePath = public_path('exceltemplate/'. $filename);
        return response()->download($filePath);
    }

    public function exportexcel(){
        return Excel::download(new JurusanExport, 'datajurusan.xlsx');
    }
}
