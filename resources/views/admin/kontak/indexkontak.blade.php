@extends('admin.layout')

@section('content')

<div class="row">
    <div class="col-12">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 font-weight-bold text-dark mb-0">
                    <i class="fas fa-envelope text-primary"></i> Pesan Masuk
                </h1>
                <p class="text-muted small mt-1">Total: <strong>{{ count($kontak) }} pesan</strong></p>
            </div>
            <a href="{{ route('admin.kontak.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Tambah Pesan
            </a>
        </div>

        <!-- Success Message -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Toolbar -->
        <div class="toolbar mb-4">
            <div class="row">
                <div class="col-md-8 mb-2 mb-md-0">
                    <form method="GET" action="{{ route('admin.kontak.index') }}" class="d-flex gap-2">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..." class="form-control" style="flex: 1;">
                        <button class="btn btn-info" type="submit">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </form>
                </div>
                <div class="col-md-4 text-right">
                    <a href="{{ route('admin.kontak.export') }}" class="btn btn-success w-100">
                        <i class="fas fa-download"></i> Export CSV
                    </a>
                </div>
            </div>
        </div>

        <!-- Table Section -->
        @if(count($kontak) > 0)
        <div class="card shadow-sm">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th style="width: 50px;">No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th style="width: 150px;">Tanggal</th>
                            <th style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($kontak as $index => $k)
                        <tr>
                            <td class="text-center">
                                <span class="badge badge-secondary">{{ $index + 1 }}</span>
                            </td>
                            <td>
                                <div class="font-weight-600">{{ $k->nama }}</div>
                            </td>
                            <td>
                                <small class="text-muted"><i class="fas fa-envelope"></i> {{ $k->email }}</small>
                            </td>
                            <td>
                                <small class="text-muted">{{ Str::limit($k->pesan, 50) }}</small>
                            </td>
                            <td>
                                <small class="text-muted">
                                    <i class="fas fa-calendar"></i> {{ $k->created_at->format('d M Y H:i') }}
                                </small>
                            </td>

                            <td>
                                <form action="{{ route('admin.kontak.destroy', $k->id) }}" 
                                      method="POST" 
                                      class="d-inline"
                                      onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" title="Hapus Pesan">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted p-4">
                                <i class="fas fa-inbox" style="font-size: 2rem;"></i>
                                <p class="mt-2 mb-0">Tidak ada pesan. <a href="{{ route('admin.kontak.create') }}">Buat pesan baru</a></p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        @else
        <div class="alert alert-info text-center py-5">
            <i class="fas fa-inbox" style="font-size: 2rem;"></i>
            <p class="mt-3 mb-0">Tidak ada pesan. <a href="{{ route('admin.kontak.create') }}">Buat pesan baru</a></p>
        </div>
        @endif
    </div>
</div>

<style>
    .toolbar .gap-2 {
        gap: 0.75rem;
    }

    .badge-secondary {
        background: #6c757d;
        padding: 0.5rem 0.75rem;
        font-weight: 600;
    }

    .btn-info {
        background: #06b6d4;
        border: 1px solid #06b6d4;
        color: white;
    }

    .btn-info:hover {
        background: #0891b2;
        border-color: #0891b2;
        color: white;
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

    .w-100 {
        width: 100%;
    }

    .form-control {
        border: 1.5px solid #e5e7eb;
        border-radius: 0.375rem;
        padding: 0.625rem 0.875rem;
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: #4A5CC1;
        outline: none;
        box-shadow: 0 0 0 0.25rem rgba(74, 92, 193, 0.15);
    }

    .table-responsive {
        border-radius: 0.5rem;
    }

    @media (max-width: 768px) {
        .table-responsive {
            font-size: 0.875rem;
        }

        .table th, .table td {
            padding: 0.75rem 0.5rem !important;
        }

        .d-flex.justify-content-between {
            flex-direction: column;
        }

        .d-flex.justify-content-between > div:last-child {
            margin-top: 1rem;
            width: 100%;
        }

        .toolbar .row {
            flex-direction: column;
        }

        .toolbar .col-md-4 {
            margin-top: 0.5rem;
        }

        .w-100 {
            width: 100%;
        }
    }
</style>

@endsection
