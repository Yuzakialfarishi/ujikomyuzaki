@extends('admin.layout')

@section('title', 'Edit Berita')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <!-- Header -->
        <div class="mb-4">
            <h1 class="h3 font-weight-bold text-dark">
                <i class="fas fa-edit"></i> Edit Berita
            </h1>
            <p class="text-muted small">Update informasi berita di bawah</p>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">
                    <i class="fas fa-exclamation-circle"></i> Terjadi Kesalahan!
                </h5>
                <ul class="mb-0">
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
        <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.berita.update', $berita) }}" method="POST" enctype="multipart/form-data" id="beritaForm">
                @csrf
                @method('PUT')

                <!-- Judul Berita -->
                <div class="form-group mb-4">
                    <label for="judul" class="font-weight-bold mb-2">
                        <i class="fas fa-heading"></i> Judul Berita
                    </label>
                    <input type="text" 
                           id="judul"
                           name="judul" 
                           class="form-control form-control-lg @error('judul') is-invalid @enderror"
                           placeholder="Update judul berita..."
                           value="{{ old('judul', $berita->judul) }}" 
                           required>
                    <small class="form-text text-muted mt-1">
                    
                    </small>
                    @error('judul')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Isi Berita -->
                <div class="form-group mb-4">
                    <label for="isi" class="font-weight-bold mb-2">
                        <i class="fas fa-file-alt"></i> Isi Berita
                    </label>
                    <textarea id="isi"
                              name="isi" 
                              class="form-control @error('isi') is-invalid @enderror" 
                              rows="8"
                              placeholder="Edit isi berita di sini..."
                              required>{{ old('isi', $berita->isi) }}</textarea>
                    <small class="form-text text-muted mt-1">
                
                    </small>
                    @error('isi')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Current Image -->
                @if($berita->gambar)
                    <div class="form-group mb-4">
                        <label class="font-weight-bold mb-2">
                            <i class="fas fa-image"></i> Gambar Saat Ini
                        </label>
                        <div class="mt-2">
                            @php
                                $imgUrl = asset('ASET/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg');
                                if (!empty($berita->gambar)) {
                                    $candidate = str_replace('\\', '/', $berita->gambar);
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
                                 alt="Gambar Berita"
                                 style="object-fit: cover;">
                        </div>
                    </div>
                @endif

                <!-- New Image Field -->
                <div class="form-group mb-4">
                    <label for="gambar" class="font-weight-bold mb-2">
                        <i class="fas fa-upload"></i> Ganti Gambar (Opsional)
                    </label>
                    <input type="file" 
                           id="gambar"
                           name="gambar" 
                           class="form-control @error('gambar') is-invalid @enderror" 
                           accept="image/*"
                           onchange="previewImage(this)">
                    <small class="form-text text-muted mt-1">
                        🖼️ Ukuran maksimal: 2MB | Format: JPG, PNG, GIF
                    </small>
                    
                    <!-- New Image Preview -->
                    <div id="imagePreview" class="mt-3" style="display: none;">
                        <label class="font-weight-bold d-block mb-2">Pratinjau Gambar Baru:</label>
                        <img id="previewImg" src="" alt="Preview" class="img-thumbnail rounded" style="max-width: 250px; height: auto;">
                    </div>
                    
                    @error('gambar')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="form-group mt-5 pt-3 border-top">
                    <button type="submit" class="btn btn-primary btn-lg">
                        <i class="fas fa-save"></i> Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary btn-lg">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>

    <!-- Info Section -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card bg-light shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title font-weight-bold">
                                <i class="fas fa-info-circle text-info"></i> Informasi Berita
                            </h5>
                            <dl class="small mb-0">
                                <dt class="font-weight-bold">ID:</dt>
                                <dd class="mb-2">{{ $berita->id }}</dd>
                                
                                <dt class="font-weight-bold">Slug:</dt>
                                <dd class="mb-2"><code>{{ $berita->slug }}</code></dd>
                                
                                <dt class="font-weight-bold">Dibuat:</dt>
                                <dd class="mb-2">{{ $berita->created_at->format('d M Y H:i') }}</dd>
                                
                                <dt class="font-weight-bold">Diubah:</dt>
                                <dd>{{ $berita->updated_at->format('d M Y H:i') }}</dd>
                            </dl>
                        </div>

                        <div class="col-md-6">
                            <h5 class="card-title font-weight-bold">
                                <i class="fas fa-link text-success"></i> URL Publik
                            </h5>
                            <small class="text-muted d-block mb-2">URL untuk mengakses berita ini di frontend:</small>
                            <code class="d-block text-break" style="background-color: #fff; padding: 10px; border-radius: 4px; border: 1px solid #dee2e6; font-size: 0.9rem;">
                                {{ url('/berita/' . ($berita->slug ?: $berita->id)) }}
                            </code>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control, .form-control-lg {
        border-radius: 0.375rem;
        border: 1px solid #dee2e6;
        transition: all 0.3s ease;
        padding: 0.75rem;
        font-size: 1rem;
    }

    .form-control:focus, .form-control-lg:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .form-control.is-invalid:focus {
        border-color: #dc3545;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    .card {
        border-radius: 0.5rem;
        border: none;
    }

    label {
        color: #333;
        font-size: 0.95rem;
    }

    .btn-lg {
        padding: 0.75rem 2rem;
        font-size: 1rem;
        border-radius: 0.375rem;
        margin-right: 0.5rem;
    }

    .img-thumbnail {
        border: 1px solid #dee2e6;
        padding: 0.5rem;
        border-radius: 0.375rem;
    }

    code {
        color: #d63384;
        background-color: #f8f9fa;
    }

    dt {
        margin-bottom: 0.5rem;
    }

    dd {
        margin-left: 0;
        padding-left: 1rem;
    }

    @media (max-width: 768px) {
        .btn-lg {
            display: block;
            width: 100%;
            margin-bottom: 0.5rem;
        }

        .form-control, .form-control-lg {
            font-size: 16px;
        }

        .row.mt-4 {
            margin-top: 2rem !important;
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
