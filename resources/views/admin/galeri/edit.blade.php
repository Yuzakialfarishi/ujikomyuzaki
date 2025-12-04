@extends('admin.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <!-- Header -->
        <div class="mb-4">
            <h1 class="h3 font-weight-bold text-dark">
                <i class="fas fa-edit"></i> Edit Galeri
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
            <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Judul Galeri -->
                <div class="form-group mb-4">
                    <label for="judul" class="form-label font-weight-bold">
                        Judul Galeri
                    </label>
                    <input type="text" 
                           id="judul" 
                           name="judul" 
                           class="form-control form-control-lg @error('judul') is-invalid @enderror"
                           placeholder="Update judul galeri"
                           value="{{ old('judul', $galeri->judul) }}"
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
                              placeholder="Edit deskripsi galeri">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <span class="invalid-feedback d-block">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Current Image -->
                @if($galeri->gambar)
                    <div class="form-group mb-4">
                        <label class="form-label font-weight-bold">
                            <i class="fas fa-image"></i> Gambar Saat Ini
                        </label>
                        <div class="mt-2">
                            @php
                                $imgUrl = asset('ASET/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg');
                                if (!empty($galeri->gambar)) {
                                    $candidate = str_replace('\\', '/', $galeri->gambar);
                                    $candidate = ltrim($candidate, '/');
                                    if (file_exists(public_path($candidate))) {
                                        $imgUrl = asset($candidate);
                                    }
                                }
                            @endphp
                            <img src="{{ $imgUrl }}" 
                                 width="250" 
                                 height="180"
                                 class="img-thumbnail rounded" 
                                 alt="Gambar Galeri"
                                 style="object-fit: cover;">
                        </div>
                    </div>
                @endif

                <!-- New Image Field -->
                <div class="form-group mb-4">
                    <label for="gambar" class="form-label font-weight-bold">
                        <i class="fas fa-upload"></i> Ganti Gambar (Opsional)
                    </label>
                    <div class="input-group">
                        <input type="file" 
                               id="gambar" 
                               name="gambar" 
                               class="form-control @error('gambar') is-invalid @enderror" 
                               accept="image/*"
                               onchange="previewImage(this)">
                    </div>
                    <small class="form-text text-muted mt-2 d-block">
                        Format: JPG, PNG, GIF | Ukuran maksimal: 2MB
                    </small>
                    
                    <!-- New Image Preview -->
                    <div id="imagePreview" class="mt-4" style="display: none;">
                        <label class="form-label font-weight-bold">Pratinjau Gambar Baru:</label>
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
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
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
