<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function showForm()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20',
        ]);

        session([
            'nama' => $request->nama,
            'nim' => $request->nim,
        ]);

        return redirect()->route('tampil');
    }

    public function showData()
    {
        $nama = session('nama');
        $nim = session('nim');

        return view('tampil', compact('nama', 'nim'));
    }
}
