@extends('admin.layout')

@section('title', 'Admin Home')

@section('content')

<h1>Selamat Datang di Halaman Admin</h1>

<div style="display: flex; gap: 20px; flex-wrap: wrap; margin-bottom:20px;">

    <div class="card" style="flex: 1; min-width: 250px; padding:16px;">
        <h3>Berita</h3>
        <p style="font-size:24px; margin:8px 0">{{ $totalBerita ?? 0 }}</p>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-primary">Kelola Berita</a>
    </div>

    <div class="card" style="flex: 1; min-width: 250px; padding:16px;">
        <h3>Galeri</h3>
        <p style="font-size:24px; margin:8px 0">{{ $totalGaleri ?? 0 }}</p>
        <a href="{{ route('admin.galeri.index') }}" class="btn btn-primary">Kelola Galeri</a>
    </div>

    <div class="card" style="flex: 1; min-width: 250px; padding:16px;">
        <h3>Kontak</h3>
        <p style="font-size:24px; margin:8px 0">{{ $totalKontak ?? 0 }}</p>
        <a href="{{ route('admin.kontak.index') }}" class="btn btn-primary">Lihat Pesan</a>
    </div>

</div>

<div style="display:flex; gap:20px; flex-wrap:wrap;">
    <div style="flex:1; min-width:320px;">
        <h4>Berita Terbaru</h4>
        <ul style="list-style:none; padding:0;">
            @forelse($recentBerita ?? [] as $b)
                <li style="display:flex; gap:12px; padding:8px 0; border-bottom:1px solid #eee; align-items:center;">
                    @php
                        $img = null;
                        if (!empty($b->gambar)) {
                            $candidate = ltrim(str_replace('\\', '/', $b->gambar), '/');
                            if (file_exists(public_path($candidate))) {
                                $img = asset($candidate);
                            }
                        }
                    @endphp
                    <div style="width:64px; height:48px; background:#f6f6f6; display:flex; align-items:center; justify-content:center;">
                        @if($img)
                            <img src="{{ $img }}" alt="thumb" style="max-width:100%; max-height:100%;">
                        @else
                            <small>No img</small>
                        @endif
                    </div>
                    <div>
                        <div style="font-weight:600">{{ $b->judul }}</div>
                        <div style="font-size:12px; color:#666">{{ $b->created_at->format('d M Y H:i') }}</div>
                    </div>
                </li>
            @empty
                <li>Tidak ada berita</li>
            @endforelse
        </ul>
    </div>

    <div style="flex:1; min-width:320px;">
        <h4>Pesan Terbaru</h4>
        <ul style="list-style:none; padding:0;">
            @forelse($recentKontak ?? [] as $k)
                <li style="padding:8px 0; border-bottom:1px solid #eee;">
                    <div style="font-weight:600">{{ $k->nama }} &lt;{{ $k->email }}&gt;</div>
                    <div style="font-size:13px; color:#444;">{{ \Illuminate\Support\Str::limit($k->pesan, 120) }}</div>
                    <div style="font-size:12px; color:#999">{{ $k->created_at->format('d M Y H:i') }}</div>
                </li>
            @empty
                <li>Tidak ada pesan</li>
            @endforelse
        </ul>
    </div>
</div>

@endsection
