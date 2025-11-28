<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

class GaleriController extends Controller
{
    /**
     * Menampilkan halaman galeri frontend.
     */
    public function index()
    {
        // Ambil semua data galeri
        $galeri = Galeri::latest()->get();

        return view('pages.galeri', compact('galeri'));
    }

    /**
     * Menampilkan detail galeri.
     */
    public function detail($id)
    {
        // Cari galeri berdasarkan ID
        $item = Galeri::findOrFail($id);

        return view('pages.galeri-detail', compact('item'));
    }
}
