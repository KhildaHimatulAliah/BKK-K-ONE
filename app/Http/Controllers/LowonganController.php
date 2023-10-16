<?php

namespace App\Http\Controllers;

use App\Models\Tahapan;
use App\Models\Lowongan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;

class LowonganController extends Controller
{
   //DASHBOARD ADMIN
   public function datalowongan(Request $request)
{
    $status = $request->query('status');
    $today = now();

    if ($status == 'aktif') {
        $lowongan = Lowongan::whereDate('tanggal_dimulai', '<=', $today)
            ->whereDate('tanggal_berakhir', '>=', $today)
            ->get();
    } elseif ($status == 'kadaluwarsa') {
        $lowongan = Lowongan::whereDate('tanggal_berakhir', '<', $today)->get();
    } else {
        $lowongan = Lowongan::latest()->get();
    }

    return view('superadmin.lowongan.index', compact('lowongan'));
}

   
   //tambah lowongan
    public function tambahlowongan(){
      $perusahaan = Perusahaan::all();
      return view('superadmin.lowongan.tambahlowongan', compact('perusahaan'));
    }

     
   public function insertlowongan(Request $request){
    //   dd($request->all());
      $perusahaan = Lowongan::create([
         'name' => $request->name,
         'deskripsi' => $request->deskripsi,
         'keahlian' => $request->keahlian,
         'kualifikasi' => $request->kualifikasi,
         'tanggal_berakhir' => $request->tanggal_berakhir,
         'tanggal_dimulai' => $request->tanggal_dimulai,
         'informasi_lainnya' => $request->informasi_lainnya,
         'id_perusahaan' => $request->perusahaan,
         'batas_pelamar' => $request->batas_pelamar,
         'kategori_jurusan' => json_encode($request->kategori_jurusan)
      ]);
      // if ($request->hasFile('foto')) {
      //     $request->file('foto')->move('storage/foto', $request->file('foto')->getClientOriginalName());
      // }
      return redirect('datalowongan')->with('succes', 'Berhasil menambahkan lowongan! Silahkan tambahkan tahapan');
   }

   //   detail tahapan
   public function detailtahapan($id_lowongan){
    $tahapan = Tahapan::where("id_lowongan", $id_lowongan)->get();
    return view ('superadmin.lowongan.detailtahapan', compact('tahapan'));
   }

   //   tahapan
   public function tahap(Request $request){
      $tahapan = Tahapan::all();
      return view('superadmin.lowongan.tahap', compact('tahapan'));
   }

    //    tambah tahapan
   public function tambahTahapan(Request $request, $id_lowongan){
      $request->validate([
          'name.*' => 'required|string',
      ]);
  
      $tahapan = $request->input('name');
  
      foreach ($tahapan as $tahap) {
          Tahapan::create([
              'name' => $tahap,
              'id_lowongan' => $id_lowongan,
          ]);
      }
  
      return redirect()->route('detailtahapan', ["id_lowongan" => $id_lowongan])->with('success', 'Tahapan berhasil ditambahkan.');
    }

    //  deletetahapan
    public function deletetahapan($id){
     $tahapan = Tahapan::find($id);
     $tahapan->delete();
     return redirect('detailtahapan/'.$id);
    }

  //edit
   public function editlowongan($id){
    $lowongan = Lowongan::find($id);
    return view('superadmin.lowongan.editlowongan', compact('lowongan'));
   }

   public function updatelowongan(Request $request, $id){
    $lowongan = Lowongan::find($id);
    $lowongan->kategori_jurusan = explode(',', $lowongan->kategori_jurusan);
    
    $data = $request->only([
        'name', 
        'deskripsi', 
        'keahlian', 
        'kualifikasi', 
        'kategori_jurusan', 
        'batas_pelamar', 
        'tanggal_berakhir', 
        'informasi_lainnya'
    ]);
    $data = array_filter($data, function($value) {
        return !is_null($value);
    });

    $lowongan->update($data);

    return redirect('datalowongan')->with('success', 'Data berhasil di Update');
}


   //delete
   public function deletelowonganAdmin($id){
    $lowongan = Lowongan::find($id);
    $lowongan->delete();
    return redirect('datalowongan');
   }


   
   //DASHBOARD PEGAWAI

   public function datalowonganpeg(Request $request){
    $status = $request->query('status');
    $today = now();

    if ($status == 'aktif') {
        $lowongan = Lowongan::whereDate('tanggal_dimulai', '<=', $today)
            ->whereDate('tanggal_berakhir', '>=', $today)
            ->get();
    } elseif ($status == 'kadaluwarsa') {
        $lowongan = Lowongan::whereDate('tanggal_berakhir', '<', $today)->get();
    } else {
        $lowongan = Lowongan::latest()->get();
    }

    return view('pegawai.datalowongan.lowongan', compact('lowongan'));
}

    //detail tahapan
    public function detailtahapanPeg($id_lowongan){
        $tahapan = Tahapan::all();
        return view('pegawai.datalowongan.tahapandetail', compact('tahapan'));
    }
    // public function detailtahapanPeg($id_lowongan){
    //     $tahapan = Tahapan::all();
    //     return view('pegawai.datalowogan.tahapandetail', compact('tahapan'));
    //    }
    //tahapan
    public function tahapanPeg(){
        $tahapan = Tahapan::all();
        return view('pegawai.datalowongan.tahap', compact('tahapan'));
    }

    //tambah tahapan
    public function tambahTahapanPeg(Request $request, $id_lowongan){
        $request->validate([
            'name.*' => 'required|string',
        ]);
    
        $tahapan = $request->input('name');
    
        foreach ($tahapan as $tahap) {
            Tahapan::create([
                'name' => $tahap,
                'id_lowongan' => $id_lowongan,
            ]);
        }
        return redirect()->route('tahapan-pegawai')->with('success', 'Tahapan berhasil ditambahkan.');
    }

    // hapus lowongan
    public function deletelowonganpeg($id){
        $lowongan = Lowongan::find($id);
        $lowongan->delete();
        return redirect('datalowonganpekerjaan');
    }

    // edit lowongan
    public function editlowonganpeg($id){
    $lowongan = Lowongan::find($id);
    return view('pegawai.datalowongan.editlowongan', compact('lowongan'));
    }

    public function updatelowonganpeg(Request $request, $id){
    $lowongan = Lowongan::find($id);
    $lowongan->kategori_jurusan = explode(',', $lowongan->kategori_jurusan);
    
    $data = $request->only([
        'name', 
        'deskripsi', 
        'keahlian', 
        'kualifikasi', 
        'kategori_jurusan', 
        'batas_pelamar', 
        'tanggal_berakhir', 
        'informasi_lainnya'
    ]);
    $data = array_filter($data, function($value) {
        return !is_null($value);
    });

    $lowongan->update($data);

    return redirect('datalowonganpekerjaan')->with('success', 'Data berhasil di Update');
    }

     //tambah lowongan
     public function tambahlowonganpeg(){
        $perusahaan = Perusahaan::all();
        return view('pegawai.datalowongan.tambahlowongan', compact('perusahaan'));
      }
  
       
     public function insertlowonganpeg(Request $request){
        // dd($request);
        $perusahaan = Lowongan::create([
           'name' => $request->name,
           'deskripsi' => $request->deskripsi,
           'keahlian' => $request->keahlian,
           'kualifikasi' => $request->kualifikasi,
           'tanggal_berakhir' => $request->tanggal_berakhir,
           'informasi_lainnya' => $request->informasi_lainnya,
           // 'foto' => $request->file('foto')->getClientOriginalName(),
           'id_perusahaan' => $request->perusahaan,
           'batas_pelamar' => $request->batas_pelamar,
           'kategori_jurusan' => json_encode($request->kategori_jurusan)
        ]);
        // if ($request->hasFile('foto')) {
        //     $request->file('foto')->move('storage/foto', $request->file('foto')->getClientOriginalName());
        // }
        return redirect('datalowonganpekerjaan')->with('succes', 'Berhasil menambahkan lowongan! Silahkan tambahkan tahapan');
     }

}