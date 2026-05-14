<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::all();
        return view('admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('admin.kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
        ]);

        Kategori::create($request->all());
        return redirect('/admin/kategori')->with('success', 'Kategori berhasil ditambah!');
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->update($request->all());
        return redirect('/admin/kategori')->with('success', 'Kategori berhasil diupdate!');
    }

    public function destroy($id)
    {
        Kategori::destroy($id);
        return redirect('/admin/kategori')->with('success', 'Kategori berhasil dihapus!');
    }
}