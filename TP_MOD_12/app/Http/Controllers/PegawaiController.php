<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::all();
        return view('pegawai/index', compact('pegawais'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'posisi' => 'required|string|max:255',
            'gaji' => 'required|integer',
        ]);

        $pegawai = Pegawai::create([
            'name' => $request->name,
            'posisi' => $request->posisi,
            'gaji' => $request->gaji,
        ]);

        return redirect()->route('pegawais.index')->with('success', 'Pegawai berhasil ditambahkan!'); 
    }
}
