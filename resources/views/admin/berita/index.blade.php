@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 font-weight-bold text-dark mb-0">
                    <i class="fas fa-newspaper text-primary"></i> Daftar Berita
                </h1>
                <p class="text-muted small mt-1">Total: <strong>{{ count($berita) }} berita</strong></p>
            </div>
            <a href="{{ route('admin.berita.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Berita
            </a>
        </div>

        <!-- Table Section -->
        @if(count($berita) > 0)
        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Judul</th>
                            <th style="width: 120px;">Gambar</th>
                            <th style="width: 180px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($berita as $item)
                        <tr>
                            <td class="text-center">
                                <span class="badge badge-secondary">{{ $loop->iteration }}</span>
                            </td>
                            <td>
                                <div class="font-weight-600">{{ $item->judul }}</div>
                                <small class="text-muted d-block mt-1">
                                    <i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y H:i') }}
                                </small>
                            </td>

                            <td class="text-center">
                                @php
                                    $imgUrl = asset('ASET/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg');

                                    if (!empty($item->gambar)) {
                                        $candidate = str_replace('\\', '/', $item->gambar);
                                        $candidate = ltrim($candidate, '/');

                                        if (file_exists(public_path($candidate))) {
                                            $imgUrl = asset($candidate);
                                        }
                                    }
                                @endphp

                                <img src="{{ $imgUrl }}" 
                                     width="100" 
                                     height="80" 
                                     class="img-thumbnail rounded"
                                     alt="Gambar Berita"
                                     style="object-fit: cover;">
                            </td>

                            <td>
                                <div class="btn-group-vertical btn-group-sm" role="group" style="width: 100%;">
                                    <a href="{{ route('admin.berita.edit', $item->id) }}"
                                       class="btn btn-success btn-sm"
                                       title="Edit Berita">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>

                                    <form action="{{ route('admin.berita.destroy', $item->id) }}"
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus berita ini?');">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" 
                                                class="btn btn-danger btn-sm"
                                                title="Hapus Berita"
                                                style="width: 100%; border-radius: 0; border: none;">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="alert alert-info text-center py-5">
            <i class="fas fa-inbox" style="font-size: 2rem;"></i>
            <p class="mt-3 mb-0">Tidak ada berita. <a href="{{ route('admin.berita.create') }}">Buat berita baru</a></p>
        </div>
        @endif
    </div>
</div>

<style>
    .badge-secondary {
        background: #6c757d;
        padding: 0.5rem 0.75rem;
        font-weight: 600;
    }

    .btn-group-vertical .btn {
        border-radius: 0.25rem;
        margin-bottom: 0.25rem;
        width: 100%;
    }

    .btn-group-vertical .btn:last-child {
        margin-bottom: 0;
    }

    .btn-success {
        background: #10b981;
        border: 1px solid #10b981;
        color: white;
    }

    .btn-success:hover {
        background: #059669;
        border-color: #059669;
        color: white;
    }

    .btn-danger {
        background: #ef4444;
        border: 1px solid #ef4444;
        color: white;
    }

    .btn-danger:hover {
        background: #dc2626;
        border-color: #dc2626;
        color: white;
    }

    .table-responsive {
        border-radius: 0.5rem;
    }

    .img-thumbnail {
        border: 1px solid #dee2e6;
        padding: 0.25rem;
        border-radius: 0.375rem;
    }

    @media (max-width: 768px) {
        .table-responsive {
            font-size: 0.875rem;
        }

        .table th, .table td {
            padding: 0.75rem 0.5rem !important;
        }

        .btn-group-vertical {
            flex-direction: row !important;
        }

        .btn-group-vertical .btn {
            flex: 1;
            margin-bottom: 0 !important;
            margin-right: 0.25rem;
        }

        .btn-group-vertical .btn:last-child {
            margin-right: 0;
        }

        .d-flex.justify-content-between {
            flex-direction: column;
        }

        .d-flex.justify-content-between > div:last-child {
            margin-top: 1rem;
            width: 100%;
        }

        .d-flex.justify-content-between > div:last-child .btn {
            width: 100%;
        }
    }
</style>
@endsection
