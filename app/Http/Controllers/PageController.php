<?php

namespace App\Http\Controllers;
use App\Models\PageAlur;
use App\Models\PageHome;
use App\Models\PageFooter;
use App\Models\PageArtikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Models\PageLowongan;

class PageController extends Controller
{
    // page home
    public function home(){
        $home = DB::table('page_homes')->get();
        return view('superadmin.pageuser.home',['page_homes'=>$home]);
    }
    public function edithome($id){
        $home = PageHome::find($id);
        return view('superadmin.pageuser.edithome', compact('home'));
    }
    public function updatehome(Request $request, $id){
        $validate = [];
        $home = PageHome::find($id);
    
        // Hapus gambar lama jika ada gambar baru yang diunggah
        if ($request->hasFile('gambar')) 
        {
            if (File::exists(public_path('storage/page/'.$home->gambar))) {
                File::delete(public_path('storage/page/'.$home->gambar));
            }
    
            $request->file('gambar')->move('storage/page/', $request->file('gambar')->getClientOriginalName());
            $validate['gambar'] = $request->file('gambar')->getClientOriginalName();
        }
    
        $home->update(array_merge($request->all(), $validate));
        return redirect('home')->with('berhasil', 'Berhasil di Edit!');
    }

  // page alur
  public function alur (){
   $page_alur = PageAlur::all();
   return view('superadmin.pageuser.alur', compact('page_alur'));
}
public function editalur($id){
    $alur = PageAlur::find($id);
    return view('superadmin.pageuser.editalur', compact('alur'));
}
public function updatealur(Request $request, $id){
    $validate = [];
    $alur = PageAlur::find($id);
    if ($request->hasFile('gambar')) 
    {
        if (File::exists(public_path('storage/page/'.$alur->gambar))) {
            File::delete(public_path('storage/page/'.$alur->gambar));
        }

        $request->file('gambar')->move('storage/page/', $request->file('gambar')->getClientOriginalName());
        $validate['gambar'] = $request->file('gambar')->getClientOriginalName();
    }

    $alur->update(array_merge($request->all(), $validate));
    return redirect('alur')->with('berhasil', 'Berhasil di Edit!');
}

// page artikel
public function artikel(Request $request){
    if($request->has('search')){
        $artikel = PageArtikel::where('judul', 'LIKE', '%' . $request->search . '%')->paginate(4);
    } else {
        $artikel = PageArtikel::latest()->paginate(10);
    }

    return view('superadmin.pageuser.artikel', compact('artikel'));
}


public function editartikel($id){
    $artikel = PageArtikel::find($id);
    return view('superadmin.pageuser.editartikel', compact('artikel'));
}
public function updateartikel(Request $request, $id){
    $validate = [];
    $artikel = PageArtikel::find($id);
    if ($request->hasFile('foto')) 
    {
        if (File::exists(public_path('storage/foto/'.$artikel->foto))) {
            File::delete(public_path('storage/foto/'.$artikel->foto));
        }

        $request->file('foto')->move('storage/foto/', $request->file('foto')->getClientOriginalName());
        $validate['foto'] = $request->file('foto')->getClientOriginalName();
    }

    $artikel->update(array_merge($request->all(), $validate));
    return redirect('pageartikel')->with('berhasil', 'Berhasil di Edit!');
}
public function ArtikelDelete($id){
    $artikel = PageArtikel::find($id);
    $artikel->delete();
    return redirect('pageartikel')->with('berhasil', 'Berhasil di Hapus!');
}
// tambahartikel
public function tambahartikel(){
    return view('superadmin.pageuser.tambahartikel');
}
public function insertdata(Request $request){
    // dd($request->all());
    if ($request->hasFile('foto')) {
        $request->file('foto')->move('storage/page/artikel', $request->file('foto')->getClientOriginalName());
        $validate['foto'] = $request->file('foto')->getClientOriginalName();
    }
    $artikel = PageArtikel::create([
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
        'foto' => $validate['foto']
    ]);
    return redirect('pageartikel')->with('berhasil', 'berhasil di edit');
}

// lowongan
public function lowongan (){
    return view('superadmin.pageuser.lowongan');
}
public function editlowongan($id){
    $lowongan = PageLowongan::find($id);
    return view('superadmin.pageuser.editlowongan', compact('lowongan'));
}
public function updatelowongan(Request $request, $id){
    $validate = [];
    $lowongan = PageLowongan::find($id);
    if ($request->hasFile('gambar')) 
    {
        $request->file('gambar')->move('storage/page/', $request->file('gambar')->getClientOriginalName());
        $validate['gambar'] = $request->file('gambar')->getClientOriginalName();
    }
    $lowongan->update(array_merge($request->all(), $validate));
    return redirect('lowongan')->with('berhasil', 'Berhasil di Edit!');
}

// footer
public function footer (){
    $footer = DB::table('page_footers')->get();
    return view('superadmin.pageuser.footer',['page_footers'=>$footer]);
}
public function editfooter($id){
    $footer = PageFooter::find($id);
    return view('superadmin.pageuser.editfooter', compact('footer'));
}
public function updatefooter(Request $request, $id){
    $validate = [];
    $footer = PageFooter::find($id);
    if ($request->hasFile('gambar_1')) 
    {
        $request->file('gambar_1')->move('storage/page/', $request->file('gambar_1')->getClientOriginalName());
        $validate['gambar_1'] = $request->file('gambar_1')->getClientOriginalName();
    }
    if ($request->hasFile('gambar_2')) 
    {
        $request->file('gambar_2')->move('storage/page/', $request->file('gambar_2')->getClientOriginalName());
        $validate['gambar_2'] = $request->file('gambar_2')->getClientOriginalName();
    }
    $footer->update(array_merge($request->all(), $validate));
    return redirect('footer')->with('berhasil', 'Berhasil di Edit!');
}

}
