@extends('admin.layout')

@section('title', 'Tambah Berita')

@section('content')

<h1 class="mb-4">Tambah Berita</h1>

@if ($errors->any())
    <div class="alert alert-danger mb-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="form-group mb-3">
        <label for="judul">Judul Berita</label>
        <input type="text" id="judul" name="judul" class="form-control"
               value="{{ old('judul') }}" required>
    </div>

    <div class="form-group mb-3">
        <label for="isi">Isi Berita</label>
        <textarea id="isi" name="isi" class="form-control" rows="6" required>{{ old('isi') }}</textarea>
    </div>

    <div class="form-group mb-3">
        <label for="gambar">Gambar Berita</label>
        <input type="file" id="gambar" name="gambar" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan Berita</button>
    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Kembali</a>
</form>

@endsection
