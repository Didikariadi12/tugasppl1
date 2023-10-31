<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class LoginController extends Controller
{
    //
    public function login()
    {
        
        if (Auth::check()) {
            return redirect('akar');
        }else{
            return view('auth.login');
        }
        
    }

    public function loginUser (Request $request)
    {
        $data = [
            'nim' => $request->input('nim'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('/akar');
        }else{
            Session::flash('error', 'Nim atau Password Salah');
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
