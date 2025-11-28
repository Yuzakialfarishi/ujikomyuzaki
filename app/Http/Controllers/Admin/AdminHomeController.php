<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Kontak;

class AdminHomeController extends Controller
{
    public function index()
    {
        $totalBerita = Berita::count();
        $totalGaleri = Galeri::count();
        $totalKontak = Kontak::count();

        $recentBerita = Berita::orderBy('created_at', 'desc')->take(5)->get();
        $recentKontak = Kontak::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.home', compact(
            'totalBerita', 'totalGaleri', 'totalKontak',
            'recentBerita', 'recentKontak'
        ));
       
    }
}
