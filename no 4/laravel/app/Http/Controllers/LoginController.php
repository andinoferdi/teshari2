<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.login');
    }

    public function login(Request $request)
    {
        $authentication = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if (auth()->attempt($authentication)) {
            $request->session()->regenerate();
            if (auth()->user()->is_admin == true) {
                return redirect('/dashboard');
            }
            return redirect('/');
        }


        return back()->withErrors([
            'email' => 'Email atau Password salah'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
