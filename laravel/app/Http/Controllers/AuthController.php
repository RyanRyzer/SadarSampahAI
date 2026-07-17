<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();

            return redirect('/dashboard');
        }

        return back()->withErrors([
            'email'=>'Email atau password salah.'
        ]);
    }

    public function processRegister(Request $request)
    {
        $data=$request->validate([
            'name'=>'required|max:100',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|confirmed'
        ]);

        User::create($data);

        return redirect('/login')->with(
            'success',
            'Registrasi berhasil.'
        );
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}