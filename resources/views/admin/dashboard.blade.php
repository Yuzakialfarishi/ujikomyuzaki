@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<h1>Dashboard Admin</h1>

<div class="card">
    <h3>Total Berita</h3>
    <p>{{ $totalBerita }}</p>
</div>

<div class="card">
    <h3>Total Galeri</h3>
    <p>{{ $totalGaleri }}</p>
</div>

<div class="card">
    <h3>Pesan Masuk</h3>
    <p>{{ $totalKontak }}</p>
</div>
@endsection
