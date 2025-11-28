<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;

class KontakController extends Controller
{
public function index()
{
    return view('pages.kontak');
}


    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email',
            'pesan' => 'required|string'
        ]);

        Kontak::create($request->all());

        return redirect()->back()->with('success', 'Pesan berhasil dikirim!');
    }
}
