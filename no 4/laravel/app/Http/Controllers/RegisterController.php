<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        $settings = Setting::first();
        view()->share('settings', $settings);
        return view('register.register');
    }
    public function register(Request $request)
    {
        $validasi = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'no_hp' => 'max_digits:15numeric',
            'password' => 'required|confirmed|min:5',
        ]);
        $validasi['password'] = bcrypt($validasi['password']);
        $validasi['is_admin'] = false;
        User::create($validasi);
        return redirect('/login')->with('berhasil', 'Silahkan Login!!');
    }
}
