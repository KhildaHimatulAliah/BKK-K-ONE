<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kandidat;
use App\Models\Lowongan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Exports\KandidatExport;
use App\Models\TahapanPengajuan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ManajemenkandidatController extends Controller
{
    // DASHBOARD ADMIN
    public function manajemenkandidat(Request $request){
        $search = $request->input('search');
        $lowongan = Lowongan::latest();
        if ($search) {
            $lowongan->where('name', 'LIKE', '%' . $search . '%');
        }
        $lowongan = $lowongan->paginate(10);
    
        return view('superadmin.manajemenkandidat.index', compact('lowongan'));
    }
   
    public function detailkandidat(Request $request){
        $detail = Pengajuan::where('id_lowongan', $request->id)->get();
        return view('superadmin.manajemenkandidat.detailkandidat', compact('detail'));
    }

    public function KandidatDelete($id){
        $detail = Pengajuan::find($id);
        $detail->delete();
        return redirect('detailkandidat'.$id_lowongan)->with('berhasil', 'Berhasil di Hapus!');
    }

    public function updatestatus(Request $request){
        $status = Pengajuan::find($request->id);
        $status->status = $request->status;
        $status->save();
        if ($request->status != "Menunggu") {
            TahapanPengajuan::where('id_pengajuan', $status->id)->update([
                "status" => 1
            ]);
        }

        $id_lowongan = $status->id_lowongan;

        return redirect('detailkandidat/'.$id_lowongan);
    }

    // EXCEL
    public function exportexcel(Request $request){
        return Excel::download(new KandidatExport($request->id), 'Kandidat.xlsx');
    }


    // DASHBOARD PEGAWAI
    public function manajemenkandidatPeg(Request $request) {
        $search = $request->input('search');
        $lowongan = Lowongan::latest();
        if ($search) {
            $lowongan->where('name', 'LIKE', '%' . $search . '%');
        }
        $lowongan = $lowongan->paginate(10);
    
        return view('pegawai.manajemenkandidat.manajkandidat', compact('lowongan'));
    }
    
    public function detailkandidatpeg(Request $request){
        $detail = Pengajuan::where('id_lowongan', $request->id)->get();
        return view('pegawai.manajemenkandidat.detailkandidat', compact('detail'));
    }

   
    
}
