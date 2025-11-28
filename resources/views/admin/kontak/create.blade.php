@extends('admin.layout')

@section('title', 'Tambah Pesan Kontak')

@section('content')

<div class="container">
    <h1 class="mb-4">Tambah Pesan Kontak</h1>

    {{-- Alert error validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
           <form action="{{ route('admin.kontak.store') }}" method="POST">

                @csrf

                <div class="form-group mb-3">
                    <label for="nama" class="fw-bold">Nama</label>
                    <input type="text" id="nama" name="nama"
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama') }}" required>

                    @error('nama')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="email" class="fw-bold">Email</label>
                    <input type="email" id="email" name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required>

                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label for="pesan" class="fw-bold">Pesan</label>
                    <textarea id="pesan" name="pesan" rows="5"
                              class="form-control @error('pesan') is-invalid @enderror"
                              required>{{ old('pesan') }}</textarea>

                    @error('pesan')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button class="btn btn-primary" type="submit">Simpan</button>
                <a href="{{ route('admin.kontak.index') }}" class="btn btn-secondary">Kembali</a>

            </form>
        </div>
    </div>
</div>

@endsection
