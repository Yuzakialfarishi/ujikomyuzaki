<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kontak;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AdminKontakController extends Controller
{
    /**
     * Tampilkan semua pesan kontak + filter
     */
    public function index(Request $request)
    {
        $query = Kontak::query()->latest();

        // FILTER berdasarkan nama atau email
        if ($request->filled('search')) {
            $query->where(function($q) use ($request) {
                $q->where('nama', 'like', '%'.$request->search.'%')
                  ->orWhere('email', 'like', '%'.$request->search.'%');
            });
        }

        $kontak = $query->get();

        // view HARUS bernama indexkontak.blade.php
        return view('admin.kontak.indexkontak', compact('kontak'));
    }

    /**
     * Form tambah pesan kontak
     */
    public function create()
    {
        return view('admin.kontak.create');
    }

    /**
     * Simpan pesan kontak baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'  => 'required|string|max:255',
            'email' => 'required|email',
            'pesan' => 'required|string'
        ]);

        Kontak::create($request->all());

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Pesan kontak berhasil ditambahkan.');
    }

    /**
     * Export semua kontak ke CSV
     */
    public function export()
    {
        $filename = "kontak_export_" . date('Ymd_His') . ".csv";

        $kontaks = Kontak::latest()->get();

        $callback = function() use ($kontaks) {
            $file = fopen('php://output', 'w');

            // Header CSV
            fputcsv($file, ['ID', 'Nama', 'Email', 'Pesan', 'Tanggal']);

            // Data CSV
            foreach ($kontaks as $k) {
                fputcsv($file, [
                    $k->id,
                    $k->nama,
                    $k->email,
                    $k->pesan,
                    $k->created_at
                ]);
            }

            fclose($file);
        };

        return new StreamedResponse($callback, 200, [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$filename"
        ]);
    }

    /**
     * Hapus pesan kontak
     */
    public function destroy(Kontak $kontak)
    {
        $kontak->delete();

        return redirect()
            ->route('admin.kontak.index')
            ->with('success', 'Pesan berhasil dihapus');
    }
}
