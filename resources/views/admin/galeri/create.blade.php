@extends('admin.layout')

@section('content')
<div class="container-fluid py-4">
    <!-- Header -->
    <div class="mb-4">
        <h1 class="h3 font-weight-bold text-dark">
            <i class="fas fa-images"></i> Tambah Galeri
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
            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Judul Galeri -->
                <div class="form-group mb-4">
                    <label for="judul" class="form-label font-weight-bold">
                        Judul Galeri
                    </label>
                    <input type="text" 
                           id="judul" 
                           name="judul" 
                           class="form-control form-control-lg @error('judul') is-invalid @enderror"
                           placeholder="Masukkan judul galeri"
                           value="{{ old('judul') }}"
                           required>
                    @error('judul')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div class="form-group mb-4">
                    <label for="deskripsi" class="form-label font-weight-bold">
                        Deskripsi
                    </label>
                    <textarea id="deskripsi" 
                              name="deskripsi" 
                              class="form-control @error('deskripsi') is-invalid @enderror" 
                              rows="5"
                              placeholder="Tulis deskripsi galeri">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Gambar -->
                <div class="form-group mb-4">
                    <label for="gambar" class="form-label font-weight-bold">
                        Gambar Galeri
                    </label>
                    <div class="input-group">
                        <input type="file" 
                               id="gambar" 
                               name="gambar" 
                               class="form-control @error('gambar') is-invalid @enderror" 
                               accept="image/*"
                               required
                               onchange="previewImage(this)">
                    </div>
                    <small class="form-text text-muted mt-2 d-block">
                        Format: JPG, PNG, GIF | Ukuran maksimal: 2MB
                    </small>
                    
                    <!-- Image Preview -->
                    <div id="imagePreview" class="mt-4" style="display: none;">
                        <label class="form-label font-weight-bold">Pratinjau Gambar:</label>
                        <div class="mt-2">
                            <img id="previewImg" src="" alt="Preview" class="img-thumbnail rounded" style="max-width: 300px; height: auto;">
                        </div>
                    </div>
                    
                    @error('gambar')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Divider -->
                <hr class="my-4">

                <!-- Action Buttons -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save"></i> Simpan Galeri
                    </button>
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary btn-lg">
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

    .img-thumbnail {
        border: 1px solid #dee2e6;
        padding: 0.5rem;
        border-radius: 0.5rem;
        background-color: #f8f9fa;
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

<script>
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.style.display = 'none';
        }
    }
</script>
@endsection
