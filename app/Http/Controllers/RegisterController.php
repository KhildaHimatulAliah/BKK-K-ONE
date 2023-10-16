<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nis;
use App\Models\Kandidat;
use Illuminate\Http\Request;
use App\Mail\RegisterBerhasil;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function showRegistrationForm(){
        return view('auth.register');
    }
    public function register(Request $request)
    {   
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'jenis_kelamin' => ['required', 'in:Laki-laki,Perempuan'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
        ]);

        if(!Nis::where("nis", $request->username)->first()){
            return redirect('/register')->with('error', 'Registration is not successful!');
        };
    
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenis_kelamin' => $request->jenis_kelamin,
            'role_id' => 3
        ]);
        $validate['user_id'] = $user->id;
        $data = array_merge($request->all(), $validate);
        Kandidat::create($data);
        Mail::to($request->email)->send(new RegisterBerhasil());
    
        return redirect('/')->with('success', 'Registration successful. Please login.');
    }
    
}


