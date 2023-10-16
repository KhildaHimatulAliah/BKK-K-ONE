<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Lowongan;
use App\Models\PageAlur;
use App\Models\PageArtikel;
use Illuminate\Support\Str;
use App\Models\PageLowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    //landingpage
    public function landingpage()
    {
        $page_homes = DB::table('page_homes')->find(1);
        $alur = PageAlur::all();
        $artikel = PageArtikel::orderBy('created_at', 'desc')->take(3)->get();
        $pagelowongan = PageLowongan:: all();
        $footer = DB::table('page_footers')->get();
        $lowongan = Lowongan::with('perusahaan')->limit(6)->get();
        return view('landingpage.landingpage',['page_homes' => $page_homes, 'alur' => $alur, 'artikel' => $artikel, 'lowongans' => $lowongan,'pagelowongan'=> $pagelowongan, 'page_footers'=>$footer]);
    }
    public function semuaArtikel() {
        $artikel = PageArtikel::orderBy('created_at', 'desc')->paginate(4);
        $footer = DB::table('page_footers')->get();
 // Misalkan Anda ingin menampilkan 8 artikel per halaman dengan pagination
        return view('landingpage.semuaartikel', ['artikel'=>$artikel,'page_footers'=>$footer]);
        
    }
    public function artikelselengkapnya($id) // Tambahkan parameter $id
    {
        // Mengambil artikel berdasarkan id dari database
        $article = PageArtikel::find($id); 
        
    
        // Jika artikel tidak ditemukan, redirect ke halaman lain atau tampilkan error
        if (!$article) {
            return redirect()->route('namarouteanda'); // Gantilah 'namarouteanda' dengan nama route Anda atau tampilkan error.
        }
        $footer = DB::table('page_footers')->get();
    
        // Mengirim data artikel ke tampilan "artikelselengkapnya.blade.php"
        return view('landingpage.artikelselengkapnya', ['article' => $article,'page_footers'=>$footer]);
    }
    
    public function detailjob($id) {
        $lowongan = Lowongan::find($id);  // Asumsi Anda memiliki model dengan nama `Lowongan`
        if(!$lowongan) {
            // Jika lowongan dengan ID tersebut tidak ditemukan, redirect atau tampilkan pesan error.
            return redirect()->back()->with('error', 'Lowongan tidak ditemukan');
        }
        return view('landingpage.detail', ['lowongan' => $lowongan]);
    }
    
    public function additionalJobs(Request $request)
    {
        if($request->has('search')){
            $lowongan = Lowongan::with('perusahaan')
                        ->whereHas('perusahaan', function ($query) use ($request) {
                            $query->where('nama', 'LIKE', '%' . $request->search . '%');
                        })->paginate(10);  // Gantikan get() dengan paginate(10)
        } else {
            $lowongan = Lowongan::with('perusahaan')->paginate(2);
              // Gantikan getlandi() dengan paginate(10)
        }

        $footer = DB::table('page_footers')->get();
    
        return view('landingpage.morejobs', ['lowongans' => $lowongan,'page_footers'=>$footer]);
    }

    //login
    public function login() {
        return view('auth.login');
    }

    public function dologin(Request $request) {
        // validasi
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
    
        if (auth()->attempt($credentials)) {
    
            // buat ulang session login
            $request->session()->regenerate();
    
            if (auth()->user()->role_id === 1) {
                // jika user superadmin
                return redirect()->intended('/superadmin');
            } else if(auth()->user()->role_id === 2){
                // jika user pegawai
                return redirect()->intended('/pegawai');
            } else {
                // jika user 
                if (!auth()->user()->kandidat || !auth()->user()->kandidat->foto) {
                    // Pengguna tidak memiliki foto profil, gunakan foto default
                    $user = User::find(auth()->user()->id);
                    $user->foto = 'foto/default2.jpg';
                    $user->save();
                }
                return redirect()->intended('/kandidat');
            }
        }
    
        // jika email atau password salah
        // kirimkan session error
        return back()->with('error', 'email atau password salah');
    }
    

    public function logout(Request $request) {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}