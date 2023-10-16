<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tahapan;
use App\Models\Kandidat;
use App\Models\Lowongan;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use App\Models\TahapanPengajuan;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

class UserController extends Controller
{
    public function index(){
        $lowongan = Lowongan::latest()->whereJsonContains("kategori_jurusan", Auth::user()->kandidat->jurusan)->get();
        return view('kandidat.dashboarduser', compact('lowongan'));
    }
   
    // datalamaran
    public function datalamaran(){
        $user = Auth::user();
        $pengajuan = Pengajuan::with(['lowongan.perusahaan'])->where('id_user', $user->id)->orderBy('updated_at', 'desc')->get();
        return view('kandidat.datalamaran.datalamaran', ['pengajuan' => $pengajuan]);
    }
   

    // tahapseleksi
    public function tahapseleksi(){
        $user = Auth::user();
        $pengajuan = Pengajuan::with(['lowongan.perusahaan'])->where('id_user', $user->id)->orderBy('updated_at', 'desc')->get();
        return view('kandidat.tahapseleksi.index', compact('pengajuan'));
    }

    public function tahapan(Request $request){
        $pengajuan = Pengajuan::where("id_lowongan", $request->id_lowongan)->where("id_user", Auth::user()->id)->first();
        $tahapan_pengajuan = $pengajuan->tahapan_pengajuan;
        return view('kandidat.tahapseleksi.tahapseleksi', compact("tahapan_pengajuan"));
    }
    
    // lowongankerja
    public function lowongankerja(Request $request){
        if($request->has('search')){
            $lowongan = Lowongan::where('name', 'LIKE', '%' . $request->search . '%')
                ->whereDate('tanggal_berakhir', '>=', now()) 
                ->get();
        } else {
            $lowongan = Lowongan::latest()
                ->whereJsonContains("kategori_jurusan", Auth::user()->kandidat->jurusan)
                ->whereDate('tanggal_berakhir', '>=', now()) 
                ->get();
        }  
        return view('kandidat.lowongan.lowongankerja' , compact('lowongan'));
    }
    

    public function detail(Request $request){
        $cek_pengajuan = Pengajuan::where('id_user', Auth::user()->id)->where('id_lowongan', $request->id)->count();
        $lowongan = Lowongan::where('id', $request->id)->first();
        return view('kandidat.lowongan.detail', compact('lowongan', 'cek_pengajuan'));
    }
   
    public function addPengajuan(Request $request) {
        // dd($request->all());
        $lowongan = Pengajuan::where("id_lowongan", $request->id_lowongan)->count();
        $maximum = Lowongan::where("id", $request->id_lowongan)->first()->batas_pelamar;
    
        if ($lowongan >= $maximum) {
            return redirect('detaillowongan/' . $request->id_lowongan)->with('error', 'Lowongan sudah penuh!');
        }
        $pengajuan = Pengajuan::create([
            'status' => "Menunggu",
            'id_user' => $request->id_user,
            'id_lowongan' => $request->id_lowongan,
        ]);
    
        $tahapan = Tahapan::where('id_lowongan', $request->id_lowongan)->first();
    
        if ($tahapan) {
            $tahapanPengajuan = TahapanPengajuan::create([
                'status' => ($pengajuan->status == "Menunggu") ? 0 : 1,
                'id_tahapan' => $tahapan->id,
                'id_pengajuan' => $pengajuan->id,
            ]);
        }
    
        return redirect('detaillowongan/'.$request->id_lowongan)->with('success', 'Anda telah mendaftar di perusahaan ini! Tunggu informasi Selanjutnya ya!');
    }



    //reset password
    public function repass(Request $request){
        $request->validate([
            'password' => 'required|min:8'
        ]);
    
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->update([
            'password' => bcrypt($request->password)
        ]);
    
        return redirect('profileuser')->with('berhasil', 'Berhasil di Edit!');
    }

    // Profile User
    public function profile(){
        $profile = Kandidat::where('user_id', auth()->id())->first();
        return view('kandidat.profile.profile', compact('profile'));
    }
    //edit profile
    public function editprofile($id){
        $profile = Kandidat::find($id);
        return view('kandidat.profile.editprofile', compact('profile'));
    }
    //update profile
    public function updateprofile(Request $request, $id)
    {
   
    $validateKandidat=[
        'nik' => $request->nik,
        'name' => $request->name,
        'tempat_lahir' => $request->tempat_lahir,
        'tanggal_lahir' => $request->tanggal_lahir,
        'jurusan' => $request->jurusan,
        'no_wa' => $request->no_wa,
        'tinggi_badan'=>$request->tinggi_badan,
        'berat_badan'=> $request->berat_badan,
        'asal_sekolah'=>$request->asal_sekolah,
       
    
    ];
    $validateuser=[
        'name' => $request->name,
    ];
    if ($request->hasFile('foto')) 
        {
            $request->file('foto')->move('storage/foto', $request->file('foto')->getClientOriginalName());
            $validateKandidat['foto'] = $request->file('foto')->getClientOriginalName();
            $validateuser['foto'] = $request->file('foto')->getClientOriginalName();
        }
     if ($request->hasFile('sks')) 
        {
            $request->file('sks')->move('storage/foto', $request->file('sks')->getClientOriginalName());
            $validateKandidat['sks'] = $request->file('sks')->getClientOriginalName();
        }
     if ($request->hasFile('dosis_vaksin')) 
        {
            $request->file('dosis_vaksin')->move('storage/foto', $request->file('dosis_vaksin')->getClientOriginalName());
            $validateKandidat['dosis_vaksin'] = $request->file('dosis_vaksin')->getClientOriginalName();
        }
     if ($request->hasFile('ijazah')) 
        {
            $request->file('ijazah')->move('storage/foto', $request->file('ijazah')->getClientOriginalName());
            $validateKandidat['ijazah'] = $request->file('ijazah')->getClientOriginalName();
        }
     if ($request->hasFile('ktp')) 
        {
            $request->file('ktp')->move('storage/foto', $request->file('ktp')->getClientOriginalName());
            $validateKandidat['ktp'] = $request->file('ktp')->getClientOriginalName();
        }
     if ($request->hasFile('kk')) 
        {
            $request->file('kk')->move('storage/foto', $request->file('kk')->getClientOriginalName());
            $validateKandidat['kk'] = $request->file('kk')->getClientOriginalName();
        }
     if ($request->hasFile('skck')) 
        {
            $request->file('skck')->move('storage/foto', $request->file('skck')->getClientOriginalName());
            $validateKandidat['skck'] = $request->file('skck')->getClientOriginalName();
        }
     if ($request->hasFile('akta_kelahiran')) 
        {
            $request->file('akta_kelahiran')->move('storage/foto', $request->file('akta_kelahiran')->getClientOriginalName());
            $validateKandidat['akta_kelahiran'] = $request->file('akta_kelahiran')->getClientOriginalName();
        }
     if ($request->hasFile('cv')) 
        {
            $request->file('cv')->move('storage/foto', $request->file('cv')->getClientOriginalName());
            $validateKandidat['cv'] = $request->file('cv')->getClientOriginalName();
        }
     if ($request->hasFile('ak_1')) 
        {
            $request->file('ak_1')->move('storage/foto', $request->file('ak_1')->getClientOriginalName());
            $validateKandidat['ak_1'] = $request->file('ak_1')->getClientOriginalName();
        }
    $user = Kandidat::find($id);
    $user->update($validateKandidat);
    
    return redirect('profileuser');

    }

    public function simpanGambarkandidat(Request $request)
    {
        $validate = [];
        $user = user::find(Auth::user()->id);
        if ($request->hasFile('foto')) 
        {
            $request->file('foto')->move('storage/foto', $request->file('foto')->getClientOriginalName());
            $validate['foto'] = $request->file('foto')->getClientOriginalName();
        }
        $user->update($validate);
        return redirect('profilesaya')->with('berhasil', 'Berhasil di Edit!');
    }

    public function exportPdf() {
        $profile = Kandidat::where('user_id', auth()->id())->first();

        $pdf = FacadePdf::loadView('kandidat.profile.cetakprofile', compact('profile'));
    
        return $pdf->download('profile.pdf'); 
    }

    
}

