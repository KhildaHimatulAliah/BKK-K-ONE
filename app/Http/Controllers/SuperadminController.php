<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kandidat;
use App\Models\Lowongan;
use App\Models\Pengajuan;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SuperadminController extends Controller
{
    public function index() {
        //menjumlahkan perusahaan
        $lowongan = Lowongan::latest()->paginate(4);
        $count_perusahaan = Perusahaan::all()->count();
        $count_kandidat = Kandidat::all()->count();
        $count_lowongan = Lowongan::all()->count();
        $kandidat_diterima = Pengajuan::where('status', 'Done')->count();

        //menampilkan chart berdasarkan jenis kelamin
        $chart_jk = DB::table('kandidats AS a')
        ->selectRaw("DISTINCT(a.jenis_kelamin) , (SELECT COUNT(id) FROM kandidats AS b WHERE b.jenis_kelamin = a.jenis_kelamin) AS chart_jk")
        ->groupBy('a.jenis_kelamin')->get();
        $label_jk = $chart_jk->pluck('jenis_kelamin');
        $jml_jk = $chart_jk->pluck('chart_jk');

        //chart jurusan 
        $chart_jur = DB::table('jurusans AS a')
        ->selectRaw("DISTINCT(a.code), (SELECT COUNT(id) FROM jurusans AS b WHERE b.code = a.code) AS chart_jur")
        ->groupBy('a.code')
        ->get();
        $label_jur = $chart_jur->pluck('code');
        $jml_jur = $chart_jur->pluck('chart_jur');

        //chart lowongan per perusahaan
        $chart_low = DB::table('lowongans AS a')
        ->join('perusahaans AS p', 'a.id_perusahaan', '=', 'p.id')
        ->selectRaw("p.nama AS label_low, COUNT(a.id) AS chart_low")
        ->groupBy('p.nama') // Sesuaikan ini dengan nama kolom pada tabel perusahaans
        ->get();
    
        $label_low = $chart_low->pluck('label_low');
        $jml_low = $chart_low->pluck('chart_low');
    
        return view('superadmin.dashmin', ['count_perusahaan' => $count_perusahaan, 'label_jk' => $label_jk, 'jml_jk' => $jml_jk, 'count_kandidat' => $count_kandidat, 'count_lowongan'=> $count_lowongan, 'lowongan'=> $lowongan, 'kandidat_diterima'=>$kandidat_diterima, 'label_jur'=>$label_jur, 'jml_jur'=>$jml_jur, 'label_low'=>$label_low, 'jml_low'=>$jml_low]);
    }

    //profile
    public function profilesaya(){
        return view('superadmin.profilesaya');
    }
    public function simpanGambar(Request $request)
    {
        $validate = [];
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('foto')) 
        {
            $request->file('foto')->move('storage/foto', $request->file('foto')->getClientOriginalName());
            $validate['foto'] = $request->file('foto')->getClientOriginalName();
        }
        $user->update($validate);
        return redirect('profilesaya')->with('berhasil', 'Berhasil di Edit!');
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
    
        return redirect('profilesaya')->with('berhasil', 'Berhasil di Edit!');
    }
    
}

    
