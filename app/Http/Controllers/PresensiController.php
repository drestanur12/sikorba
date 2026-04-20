<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Presensi;

class PresensiController extends Controller
{
    // Halaman Scan
    public function scan()
    {
        return view('presensi.scan');
    }

    // Simpan ke database (AJAX)
    public function store(Request $request)
    {
        $fotoPath = null;

        // Upload foto jika ada
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto', 'public');
        }

        Presensi::create([
            'nama' => $request->nama,
            'lokasi_jaga' => $request->lokasi_jaga,
            'gps' => $request->gps,
            'waktu' => now(),
            'foto' => $fotoPath
        ]);

        return response()->json([
            'message' => 'Presensi berhasil disimpan!'
        ]);
    }
    // Tampilkan data presensi
    public function index()
    {
        $data = Presensi::orderBy('waktu', 'desc')->get();
        return view('presensi.index', compact('data'));
    }
}