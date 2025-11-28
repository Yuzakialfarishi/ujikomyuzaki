@extends('admin.layout')

@section('content')
<div class="container mt-4">

    <h2 class="mb-4">Edit Galeri</h2>

    <!-- Notifikasi Error -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm p-4">
        <form action="{{ route('admin.galeri.update', $galeri->id) }}" 
              method="POST" 
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <!-- Judul -->
            <div class="mb-3">
                <label class="form-label">Judul Galeri</label>
                <input type="text" 
                       name="judul" 
                       value="{{ old('judul', $galeri->judul) }}" 
                       class="form-control" 
                       required>
            </div>

            <!-- Deskripsi -->
            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" 
                          class="form-control" 
                          rows="4">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
            </div>

            <!-- Gambar Lama -->
            <div class="mb-3">
                <label class="form-label d-block">Gambar Saat Ini</label>

                @if($galeri->gambar)
                    <img src="{{ asset('uploads/galeri/' . $galeri->gambar) }}"
                         width="200" class="img-thumbnail mb-2">
                @else
                    <p class="text-muted fst-italic">Tidak ada gambar</p>
                @endif
            </div>

            <!-- Upload Gambar Baru -->
            <div class="mb-3">
                <label class="form-label">Ganti Gambar (opsional)</label>
                <input type="file" name="gambar" class="form-control">
                <small class="text-danger">Format: JPG, JPEG, PNG</small>
            </div>

            <!-- Tombol -->
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Kembali</a>

        </form>
    </div>

</div>
@endsection
