<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $setting = Setting::first();
        $users = User::where('is_admin', '0')->get();
        return view('dashboard.setting.index', compact(
            'setting',
            'users'

        ));
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function perusahaan(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'nullable',
            'no_whatsapp' => 'nullable',

        ]);
        $tambah = Setting::first();
        if (isset($tambah)) {
            $tambah->update($validatedData);
        } else {
            Setting::create($validatedData);
        }
        return redirect('dashboard/setting')->with('successcreate', 'Create Successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function sosial_media(Request $request)
    {
        $validatedData = $request->validate([
            'facebook' => 'nullable',
            'instagram' => 'nullable',
            'youtube' => 'nullable',
            'twitter' => 'nullable',

        ]);
        $tambah = Setting::first();
        if (isset($tambah)) {
            $tambah->update($validatedData);
        } else {
            Setting::create($validatedData);
        }
        return redirect('dashboard/setting')->with('successcreate', 'Create Successfull!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */

    public function background(Request $request)
    {
        $validatedData = $request->validate([
            'logo_utama' => 'nullable|image',
            'logo_navbar' => 'nullable|image',
            'banner_utama' => 'nullable|image',
            'logo_footer' => 'nullable|image',
            'logo_login' => 'nullable|image',
            'logo_register' => 'nullable|image',
        ]);
        $tambah = Setting::first();

        $setting = $request->all();
        if (isset($request->logo_utama)) {
            $file = $request->file('logo_utama');
            $setting['logo_utama'] = $file->store('logo_utama', 'public');;
        }

        if (isset($request->logo_navbar)) {
            $file = $request->file('logo_navbar');
            $setting['logo_navbar'] = $file->store('logo_navbar', 'public');;
        }

        if (isset($request->banner_utama)) {
            $file = $request->file('banner_utama');
            $setting['banner_utama'] = $file->store('banner_utama', 'public');;
        }

        if (isset($request->logo_footer)) {
            $file = $request->file('logo_footer');
            $setting['logo_footer'] = $file->store('logo_footer', 'public');;
        }

        if (isset($request->logo_register)) {
            $file = $request->file('logo_register');
            $setting['logo_register'] = $file->store('logo_register', 'public');;
        }

        if (isset($tambah)) {
            $tambah->update($setting);
        } else {
            Setting::create($setting);
        }

        return redirect('dashboard/setting')->with('successcreate', 'Create Successfull!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
