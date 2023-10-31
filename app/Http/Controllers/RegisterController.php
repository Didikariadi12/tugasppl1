<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;

class RegisterController extends Controller
{
    //
    public function register()
    {
        return view('auth.register');
    }
    
    public function registerUser(Request $request)
    {
 
        $nim = $request->input('nim');
        $password = $request->input('password');

        // Memeriksa apakah NIM sudah digunakan
        $existingUser = User::where('nim', $nim)->first();
        if ($existingUser) {
            // NIM sudah digunakan, beri tanggapan atau tindakan sesuai kebutuhan
            return redirect()->back()->with('message', 'NIM sudah digunakan.');
        }

        // NIM belum digunakan, simpan data
        $user = new User();
        $user->nim = $nim;
        $user->password = Hash::make($password);
        $user->save();

        // Session::flash('message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('/')->with('message', 'Register Berhasil.');
    }
}
