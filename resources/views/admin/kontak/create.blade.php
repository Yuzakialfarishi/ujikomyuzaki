@extends('admin.layout')

@section('title', 'Tambah Pesan Kontak')

@section('content')

<div class="container-fluid py-4">
    <!-- Header -->
    <div class="mb-4">
        <h1 class="h3 font-weight-bold text-dark">
            <i class="fas fa-envelope"></i> Tambah Pesan Kontak
        </h1>
    </div>

    <!-- Error Alert -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <strong><i class="fas fa-exclamation-circle"></i> Error!</strong>
            <ul class="mb-0 mt-2">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Form Card -->
    <div class="card shadow">
        <div class="card-body p-5">
            <form action="{{ route('admin.kontak.store') }}" method="POST">
                @csrf

                <!-- Nama -->
                <div class="form-group mb-4">
                    <label for="nama" class="form-label font-weight-bold">
                        Nama
                    </label>
                    <input type="text" 
                           id="nama" 
                           name="nama" 
                           class="form-control form-control-lg @error('nama') is-invalid @enderror"
                           placeholder="Masukkan nama lengkap"
                           value="{{ old('nama') }}"
                           required>
                    @error('nama')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Email -->
                <div class="form-group mb-4">
                    <label for="email" class="form-label font-weight-bold">
                        Email
                    </label>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           class="form-control form-control-lg @error('email') is-invalid @enderror"
                           placeholder="Masukkan alamat email"
                           value="{{ old('email') }}"
                           required>
                    @error('email')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Pesan -->
                <div class="form-group mb-4">
                    <label for="pesan" class="form-label font-weight-bold">
                        Pesan
                    </label>
                    <textarea id="pesan" 
                              name="pesan" 
                              class="form-control @error('pesan') is-invalid @enderror" 
                              rows="5"
                              placeholder="Tulis pesan Anda di sini"
                              required>{{ old('pesan') }}</textarea>
                    @error('pesan')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Divider -->
                <hr class="my-4">

                <!-- Action Buttons -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save"></i> Simpan Pesan
                    </button>
                    <a href="{{ route('admin.kontak.index') }}" class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-times"></i> Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .form-control, .form-control-lg {
        border: 1.5px solid #e9ecef;
        border-radius: 0.5rem;
        padding: 0.85rem 1rem;
        transition: all 0.3s ease;
    }

    .form-control:focus, .form-control-lg:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.15);
    }

    .form-control.is-invalid,
    .form-control.is-invalid:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.25rem rgba(220, 53, 69, 0.15);
    }

    .form-label {
        color: #2c3e50;
        font-size: 0.95rem;
        margin-bottom: 0.75rem;
    }

    .card {
        border: none;
        border-radius: 0.75rem;
        background-color: #fff;
    }

    .btn-lg {
        padding: 0.85rem 2rem;
        font-size: 1rem;
        border-radius: 0.5rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3);
    }

    .btn-outline-secondary:hover {
        transform: translateY(-2px);
    }

    .gap-2 {
        gap: 0.75rem;
    }

    hr {
        border: none;
        border-top: 2px solid #e9ecef;
    }

    @media (max-width: 768px) {
        .card {
            border-radius: 0.5rem;
        }

        .card-body {
            padding: 1.5rem !important;
        }

        .btn-lg {
            width: 100%;
            padding: 0.75rem 1.5rem;
        }

        .d-flex {
            flex-direction: column;
        }

        .form-control, .form-control-lg {
            font-size: 16px;
            padding: 0.75rem;
        }
    }
</style>

@endsection
