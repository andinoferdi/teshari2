<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\buku;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $buku = buku::where('nama_kategori', 'LIKE', '%' . $keyword . '%')->Paginate(3);
        $buku->withpath('/dashboard/buku');
        $buku->appends($request->all());
        return view('dashboard.buku.index', compact(
            'buku',
            'keyword',
            'setting'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tambah = buku::all();
        return view('dashboard.buku.create', compact(
            'tambah',
            'setting'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string',
        ]);
        buku::create($validatedData);


        return redirect('dashboard/buku')->with('successcreate', 'Create Successfull!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function show(buku $buku)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $buku = buku::find($id);
        return view('dashboard.buku.edit', compact(
            'buku',
            'setting'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tambah = buku::find($id);
        $validatedData = $request->validate([
            'nama_kategori' => 'required|string',
        ]);
        $tambah->update($validatedData);


        return redirect('dashboard/buku')->with('successupdate', 'Update Successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\buku  $buku
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tambah = buku::find($id);
        $barang = Barang::where('kategori_id', $id)->get();
        if (!$barang->isEmpty()) {
            Barang::where('kategori_id', $id)->delete();
        }

        $pembelajaran = Pembelajaran::where('kategori_id', $id)->get();
        if (!$pembelajaran->isEmpty()) {
            Pembelajaran::where('kategori_id', $id)->delete();
        }
        $tambah->delete();
        return redirect('dashboard/buku')->with('successdelete', 'Delete Successfull!');
    }
}
