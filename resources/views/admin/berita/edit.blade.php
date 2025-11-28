@extends('admin.layout')

@section('title', 'Edit Berita')

@section('content')

<h1>Edit Berita</h1>

{{-- tampilkan error jika ada --}}
@if ($errors->any())
    <div style="color: red; padding: 10px; border: 1px solid red; margin-bottom: 15px;">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label>Judul</label>
    <input 
        type="text" 
        name="judul" 
        value="{{ old('judul', $berita->judul) }}" 
        class="form-control"
        required
    >

    <label class="mt-2">Isi</label>
    <textarea name="isi" class="form-control" required>{{ old('isi', $berita->isi) }}</textarea>

    <label class="mt-2">Gambar Baru (opsional)</label>
    <input type="file" name="gambar" accept="image/*">

    {{-- tampilkan gambar lama --}}
    @if($berita->gambar)
        <p class="mt-2">Gambar saat ini:</p>
        <img 
            src="{{ asset('uploads/berita/' . $berita->gambar) }}" 
            width="150"
            style="border: 1px solid #ccc; padding: 5px;"
        >
    @endif

    <button type="submit" class="btn btn-primary mt-3">Simpan Perubahan</button>
</form>

@endsection
