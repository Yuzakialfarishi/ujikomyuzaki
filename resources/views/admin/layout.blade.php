<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: #f0f2f5;
            color: #333;
        }

        /* SIDEBAR - Blue Professional Gradient */
        .sidebar {
            width: 240px;
            height: 100vh;
            background: linear-gradient(180deg, #4A5CC1 0%, #3d47a3 100%);
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 25px;
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            overflow-y: auto;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 35px;
            font-size: 1.5rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 20px;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-left: 3px solid transparent;
            font-weight: 500;
            margin: 5px 0;
        }

        .sidebar a:hover {
            background: rgba(255, 255, 255, 0.12);
            color: white;
            border-left-color: #10b981;
            padding-left: 24px;
        }

        .sidebar a i {
            width: 20px;
            text-align: center;
        }

        /* TOPBAR */
        .topbar {
            height: 70px;
            background: white;
            margin-left: 240px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            border-bottom: 2px solid #e5e7eb;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .topbar-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-name {
            font-size: 0.95rem;
            color: #6b7280;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .user-name i {
            font-size: 1.5rem;
            color: #4A5CC1;
        }

        .btn-logout {
            padding: 8px 16px;
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: white;
            border: none;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.3);
        }

        /* CONTENT */
        .content {
            margin-left: 240px;
            padding: 30px;
            min-height: calc(100vh - 70px);
            background: #f0f2f5;
        }

        /* TABLE STYLING */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        }

        table thead th {
            background: linear-gradient(90deg, #f9fafb 0%, #f3f4f6 100%);
            padding: 16px 14px;
            text-align: left;
            font-weight: 600;
            color: #374151;
            border-bottom: 2px solid #e5e7eb;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        table tbody td {
            padding: 14px 14px;
            border-bottom: 1px solid #e5e7eb;
            font-size: 0.95rem;
            color: #4b5563;
        }

        table tbody tr {
            transition: all 0.2s ease;
        }

        table tbody tr:hover {
            background: #f9fafb;
            box-shadow: inset 0 0 10px rgba(74, 92, 193, 0.05);
        }

        /* BUTTON STYLING */
        .btn {
            padding: 10px 18px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .btn:active {
            transform: translateY(0);
        }

        /* Button Variants */
        .btn-primary { 
            background: #10b981; 
            color: white; 
        }
        .btn-primary:hover {
            background: #059669;
        }

        .btn-danger { 
            background: #ef4444; 
            color: white; 
        }
        .btn-danger:hover {
            background: #dc2626;
        }

        .btn-success {
            background: #10b981;
            color: white;
        }
        .btn-success:hover {
            background: #059669;
        }

        .btn-warning {
            background: #f59e0b;
            color: white;
        }
        .btn-warning:hover {
            background: #d97706;
        }

        .btn-info {
            background: #06b6d4;
            color: white;
        }
        .btn-info:hover {
            background: #0891b2;
        }

        .btn-blue { 
            background: #3b82f6; 
            color: white; 
        }
        .btn-blue:hover {
            background: #2563eb;
        }

        .btn-secondary {
            background: #6b7280;
            color: white;
        }
        .btn-secondary:hover {
            background: #4b5563;
        }

        .btn-outline {
            background: transparent;
            color: #6b7280;
            border: 1.5px solid #d1d5db;
        }
        .btn-outline:hover {
            background: #f3f4f6;
            border-color: #9ca3af;
        }

        /* ALERTS */
        .alert {
            padding: 16px 18px;
            border-radius: 6px;
            margin-bottom: 20px;
            border-left: 4px solid;
            font-weight: 500;
            animation: slideDown 0.3s ease;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: #d1fae5;
            border-left-color: #10b981;
            color: #065f46;
        }

        .alert-danger {
            background: #fee2e2;
            border-left-color: #ef4444;
            color: #991b1b;
        }

        .alert-info {
            background: #dbeafe;
            border-left-color: #3b82f6;
            color: #1e3a8a;
        }

        .alert-warning {
            background: #fef3c7;
            border-left-color: #f59e0b;
            color: #92400e;
        }

        /* CARDS */
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            border: none;
            overflow: hidden;
        }

        .card-header {
            padding: 20px;
            background: linear-gradient(90deg, #f9fafb 0%, #f3f4f6 100%);
            border-bottom: 1px solid #e5e7eb;
        }

        .card-header h4 {
            margin: 0;
            color: #1f2937;
            font-size: 1.1rem;
        }

        .card-body {
            padding: 25px;
        }

        /* FORM ELEMENTS */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
            display: block;
            font-size: 0.95rem;
        }

        .form-control {
            width: 100%;
            border: 1.5px solid #e5e7eb;
            border-radius: 6px;
            padding: 10px 14px;
            transition: all 0.3s ease;
            font-size: 1rem;
            font-family: inherit;
        }

        .form-control:focus {
            border-color: #4A5CC1;
            outline: none;
            box-shadow: 0 0 0 0.3rem rgba(74, 92, 193, 0.1);
        }

        textarea.form-control {
            resize: vertical;
            min-height: 120px;
        }

        .form-control.is-invalid {
            border-color: #ef4444;
        }

        .invalid-feedback {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 5px;
            display: block;
        }

        /* TOOLBAR */
        .toolbar {
            margin-bottom: 25px;
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .toolbar .btn {
            margin: 0;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .sidebar {
                width: 70px;
                padding-top: 15px;
            }

            .sidebar h2 {
                font-size: 0.8rem;
                margin-bottom: 20px;
                writing-mode: vertical-rl;
                transform: rotate(180deg);
                letter-spacing: 0;
            }

            .sidebar a {
                padding: 12px 8px;
                font-size: 0.75rem;
                justify-content: center;
            }

            .sidebar a i {
                width: auto;
            }

            .topbar {
                margin-left: 70px;
                padding: 0 15px;
                height: 60px;
            }

            .topbar-title {
                font-size: 1rem;
            }

            .topbar-user {
                gap: 10px;
            }

            .user-name {
                display: none;
            }

            .btn-logout {
                padding: 6px 12px;
                font-size: 0.8rem;
            }

            .content {
                margin-left: 70px;
                padding: 15px;
                min-height: calc(100vh - 60px);
            }

            table {
                font-size: 0.85rem;
            }

            table thead th,
            table tbody td {
                padding: 10px 8px;
            }

            .btn {
                padding: 8px 12px;
                font-size: 0.8rem;
            }
        }

        /* UTILITY CLASSES */
        .d-flex {
            display: flex;
        }

        .justify-content-between {
            justify-content: space-between;
        }

        .align-items-center {
            align-items: center;
        }

        .w-100 {
            width: 100%;
        }
    </style>

    @yield('css')
</head>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Admin</h2>
        <a href="{{ route('admin.home') ?? '#' }}"><i class="fas fa-chart-line"></i> Dashboard</a>
        <a href="{{ route('admin.berita.index') ?? '#' }}"><i class="fas fa-newspaper"></i> Berita</a>
        <a href="{{ route('admin.galeri.index') ?? '#' }}"><i class="fas fa-images"></i> Galeri</a>
        <a href="{{ route('admin.kontak.index') ?? '#' }}"><i class="fas fa-envelope"></i> Kontak</a>
    </div>

    <!-- TOPBAR -->
    <div class="topbar">
        <div class="d-flex justify-content-between align-items-center w-100">
            <div class="topbar-title">
                @yield('topbar')
            </div>
            <div class="topbar-user">
                @auth
                    <span class="user-name">
                        <i class="fas fa-user-circle"></i> {{ Auth::user()->name }}
                    </span>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn-logout" title="Logout">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">
        @yield('content')
    </div>

</body>
</html>
