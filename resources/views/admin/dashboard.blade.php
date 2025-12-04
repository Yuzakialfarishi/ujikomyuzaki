@extends('admin.layout')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-12">
        <!-- Header -->
        <div class="mb-4">
            <h1 class="h2 font-weight-bold text-dark mb-2">
                <i class="fas fa-chart-line text-primary"></i> Dashboard Admin
            </h1>
            <p class="text-muted">Selamat datang di panel administrasi TastyFood</p>
        </div>

        <!-- Stats Cards -->
        <div class="row">
            <!-- Card Berita -->
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card dashboard-card card-berita shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="text-muted mb-1 small">Total Berita</p>
                                <h3 class="mb-0 font-weight-bold display-4">{{ $totalBerita }}</h3>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-newspaper"></i>
                            </div>
                        </div>
                        <div class="mt-3 pt-3 border-top">
                            <a href="{{ route('admin.berita.index') }}" class="text-decoration-none small">
                                Lihat Detail <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Galeri -->
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card dashboard-card card-galeri shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="text-muted mb-1 small">Total Galeri</p>
                                <h3 class="mb-0 font-weight-bold display-4">{{ $totalGaleri }}</h3>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-images"></i>
                            </div>
                        </div>
                        <div class="mt-3 pt-3 border-top">
                            <a href="{{ route('admin.galeri.index') }}" class="text-decoration-none small">
                                Lihat Detail <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card Pesan -->
            <div class="col-md-4 col-sm-6 mb-4">
                <div class="card dashboard-card card-kontak shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="text-muted mb-1 small">Pesan Masuk</p>
                                <h3 class="mb-0 font-weight-bold display-4">{{ $totalKontak }}</h3>
                            </div>
                            <div class="stat-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                        </div>
                        <div class="mt-3 pt-3 border-top">
                            <a href="{{ route('admin.kontak.index') }}" class="text-decoration-none small">
                                Lihat Detail <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-light border-bottom">
                        <h5 class="mb-0 font-weight-bold">
                            <i class="fas fa-flash text-warning"></i> Aksi Cepat
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a href="{{ route('admin.berita.create') }}" class="btn btn-primary btn-block py-3">
                                    <i class="fas fa-plus"></i> Tambah Berita
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a href="{{ route('admin.galeri.create') }}" class="btn btn-success btn-block py-3">
                                    <i class="fas fa-plus"></i> Tambah Galeri
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a href="{{ route('admin.kontak.create') }}" class="btn btn-info btn-block py-3">
                                    <i class="fas fa-plus"></i> Tambah Pesan
                                </a>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3">
                                <a href="{{ route('admin.kontak.export') }}" class="btn btn-warning btn-block py-3">
                                    <i class="fas fa-download"></i> Export Pesan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Welcome Message -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="alert alert-info border-0 shadow-sm" role="alert">
                    <div class="d-flex">
                        <div>
                            <h5 class="alert-heading mb-1">
                                <i class="fas fa-info-circle"></i> Selamat Datang di Dashboard
                            </h5>
                            <p class="mb-0">
                                Kelola seluruh konten TastyFood dari panel administrasi ini. 
                                Anda dapat menambah, mengedit, dan menghapus berita, galeri, serta pesan kontak dengan mudah.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Dashboard Cards */
    .dashboard-card {
        border: none;
        border-radius: 0.75rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .dashboard-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 4px;
        background: linear-gradient(90deg, currentColor 0%, transparent 100%);
    }

    .dashboard-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.12) !important;
    }

    .card-berita::before {
        background: linear-gradient(90deg, #3b82f6 0%, transparent 100%);
    }

    .card-berita .stat-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        color: #1e40af;
    }

    .card-galeri::before {
        background: linear-gradient(90deg, #10b981 0%, transparent 100%);
    }

    .card-galeri .stat-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%);
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        color: #065f46;
    }

    .card-kontak::before {
        background: linear-gradient(90deg, #f59e0b 0%, transparent 100%);
    }

    .card-kontak .stat-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #fef3c7 0%, #fde68a 100%);
        border-radius: 0.75rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.75rem;
        color: #92400e;
    }

    .card-body {
        padding: 1.75rem;
    }

    .display-4 {
        font-size: 2.5rem;
        line-height: 1;
        color: #1f2937;
    }

    .stat-icon {
        transition: all 0.3s ease;
    }

    .dashboard-card:hover .stat-icon {
        transform: scale(1.1) rotate(5deg);
    }

    /* Quick Actions */
    .btn-block {
        display: block;
        width: 100%;
    }

    .btn-primary {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        border: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        color: white;
        text-decoration: none;
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    }

    .btn-success {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        border: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-success:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        color: white;
        text-decoration: none;
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
    }

    .btn-info {
        background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
        border: none;
        font-weight: 500;
        transition: all 0.3s ease;
        color: white;
    }

    .btn-info:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(6, 182, 212, 0.3);
        color: white;
        text-decoration: none;
        background: linear-gradient(135deg, #0891b2 0%, #0e7490 100%);
    }

    .btn-warning {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        border: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-warning:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        color: white;
        text-decoration: none;
        background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
    }

    .alert-info {
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        border-left: 4px solid #3b82f6 !important;
        color: #1e40af;
    }

    .alert-info .alert-heading {
        color: #1e40af;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .display-4 {
            font-size: 2rem;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            font-size: 1.5rem;
        }

        .dashboard-card {
            margin-bottom: 1rem;
        }

        .btn-block {
            margin-bottom: 0.5rem;
        }

        .card-body {
            padding: 1.25rem;
        }
    }
</style>
@endsection
