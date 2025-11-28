<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
    {
        // Ambil berita terbaru sebagai berita utama
        $berita_utama = Berita::orderBy('created_at', 'desc')->first();

        // Ambil berita lainnya, kecuali berita utama
        $berita_lainnya = Berita::orderBy('created_at', 'desc')
            ->skip(1)
            ->take(6)
            ->get();

        return view('pages.berita', compact('berita_utama', 'berita_lainnya'));
    }

    public function detail($slug)
    {
        $berita = Berita::where('slug', $slug)->firstOrFail();
        return view('pages.berita_detail', compact('berita'));
    }
}
