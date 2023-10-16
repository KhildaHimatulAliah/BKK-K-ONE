<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Exports\DataPegawaiExport;
use Maatwebsite\Excel\Facades\Excel;

class ManajemenPegawaiController extends Controller
{
    public function pegawai(Request $request){
        if($request->has('search')){
            $pegawai = User::where('role_id', 2)
                            ->where('name', 'LIKE', '%' . $request->search . '%')
                            ->latest()
                            ->get();
        } else {
            $pegawai = User::where('role_id', 2)->latest()->get();
        }
    
        return view('superadmin.manajemenuser.pegawai', compact('pegawai'));
    }
    
    public function resetpassword(Request $request ,$id){
        $pegawai = User::find($id);
        return view('superadmin.manajemenuser.passwordpegawai', compact('pegawai'));
        }
    public function passwordpegawai(Request $request ,$id){
        $pegawai = User::find($id);
        $pegawai->update([
            'password' => bcrypt($request->password)
        ]); 
        return redirect ('akunpegawai');
        }
    public function DeletePegawai($id){
        $pegawai = User::find($id);
        $pegawai->delete();
        return redirect('akunpegawai')->with('berhasil', 'Berhasil di Hapus!');
    }

    public function tambahpegawai(){
        return view('superadmin.manajemenuser.tambahpegawai');
    }

    public function insertpegawai(Request $request){
        // validasi
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
            'password' => 'required|min:8'
        ]);
        $pegawai = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'password' => bcrypt($request->password),
            'role_id' => 2
        ]);
        return redirect('akunpegawai');
    }

        // eksport excel
        public function exportexcel(){
            return Excel::download(new DataPegawaiExport, 'datapegawai.xlsx');
        }

}
