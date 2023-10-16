<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use App\Exports\DataKandidatExport;
use Maatwebsite\Excel\Facades\Excel;

class KandidatController extends Controller
{
    public function kandidat(Request $request){
        if($request->has('search')){
            $kandidat = User::where('role_id', 3)
                            ->where('name', 'LIKE', '%' . $request->search . '%')
                            ->latest()
                            ->get();
        } else {
            $kandidat = User::where('role_id', 3)->latest()->get();
        }
    
        return view('superadmin.manajemenuser.kandidat', compact('kandidat'));
    }

    public function DeleteKandidat($id){
        $kandidat = User::find($id);
        $kandidat->delete();
        return redirect('akunkandidat');
    }
    public function manajemenkandidat(){
        $lowongan = Lowongan::all();
        return view('superadmin.manajemenkandidat.index', ['lowongan'=>$lowongan]);
    }
    public function detailkandidat(){
        return view('superadmin.manajemenkandidat.detailkandidat');
    }
    public function resetpassword(Request $request ,$id){
        $kandidat = User::find($id);
        return view('superadmin.manajemenuser.passwordkandidat', compact('kandidat'));
        }
    public function passwordkandidat(Request $request ,$id){
        $kandidat = User::find($id);
        $kandidat->update([
            'password' => bcrypt($request->password)
        ]); 
        return redirect ('akunkandidat');
        }

       // eksport excel
       public function exportexcel(){
        return Excel::download(new DataKandidatExport, 'datakandidat.xlsx');
    }
    }
