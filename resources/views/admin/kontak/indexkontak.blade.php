@extends('admin.layout')

@section('content')

<h1 class="mb-4">Pesan Masuk</h1>

@if(session('success'))
    <div class="alert-success">{{ session('success') }}</div>
@endif

<div class="toolbar d-flex" style="margin-bottom: 15px; gap:10px; align-items:center;">
    <a href="{{ route('admin.kontak.create') }}" class="btn btn-primary">+ New</a>

    <form method="GET" action="{{ route('admin.kontak.index') }}" class="d-inline" style="margin:0;">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email" class="form-control" style="display:inline-block; width:220px; margin-right:6px;">
        <button class="btn btn-blue" type="submit">Filter</button>
    </form>

    <a href="{{ route('admin.kontak.export') }}" class="btn btn-yellow">Export CSV</a>
</div>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Pesan</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>

    <tbody>
        @forelse($kontak as $index => $k)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $k->nama }}</td>
            <td>{{ $k->email }}</td>
            <td>{{ $k->pesan }}</td>
            <td>{{ $k->created_at->format('d-m-Y H:i') }}</td>

            <td>
                <form action="{{ route('admin.kontak.destroy', $k->id) }}" method="POST" onsubmit="return confirm('Hapus pesan ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" style="text-align:center;">Tidak ada pesan</td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection
