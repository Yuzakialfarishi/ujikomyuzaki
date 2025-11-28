<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel</title>

    <style>
        body {
            margin: 0;
            font-family: "Inter", sans-serif;
            background: #f3f4f6;
        }

        /* SIDEBAR */
        .sidebar {
            width: 240px;
            height: 100vh;
            background: #1f2937;
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            padding-top: 20px;
        }

        .sidebar h2 {
            text-align: center;
            margin-bottom: 30px;
        }

        .sidebar a {
            display: block;
            padding: 12px 20px;
            color: #cbd5e1;
            text-decoration: none;
            transition: 0.2s;
        }

        .sidebar a:hover {
            background: #374151;
            color: white;
        }

        /* TOPBAR */
        .topbar {
            height: 60px;
            background: white;
            margin-left: 240px;
            display: flex;
            align-items: center;
            padding: 0 20px;
            border-bottom: 1px solid #e5e7eb;
        }

        /* CONTENT */
        .content {
            margin-left: 240px;
            padding: 25px;
        }

        /* TABEL */
        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        th {
            background: #f9fafb;
            text-align: left;
        }

        tr:nth-child(even) {
            background: #f3f4f680;
        }

        .btn {
            padding: 7px 14px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        .btn-primary { background: #10b981; color: white; }
        .btn-danger { background: #ef4444; color: white; }
        .btn-blue { background: #3b82f6; color: white; }
        .btn-yellow { background: #f59e0b; color: white; }

        .alert-success {
            background: #d1fae5;
            padding: 12px;
            border-left: 4px solid #10b981;
            margin-bottom: 20px;
        }

        .toolbar button {
            margin-right: 5px;
        }
    </style>

    @yield('css')
</head>
<body>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="{{ route('admin.home') }}">Dashboard</a>
        <a href="{{ route('admin.berita.index') }}">Berita</a>
        <a href="{{ route('admin.galeri.index') }}">Galeri</a>
        <a href="{{ route('admin.kontak.index') }}">Kontak</a>
    </div>

    <!-- TOPBAR -->
    <div class="topbar">
        @yield('topbar')
    </div>

    <!-- CONTENT -->
    <div class="content">
        @yield('content')
    </div>

</body>
</html>
