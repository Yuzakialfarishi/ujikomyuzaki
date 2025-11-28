<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Tasty Food</title>

  <!-- Bootstrap Admin -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ route('admin.home') }}">ADMIN PANEL</a>

    <ul class="navbar-nav flex-row">
      <li class="nav-item me-3"><a href="{{ route('admin.berita.index') }}" class="nav-link">Berita</a></li>
      <li class="nav-item me-3"><a href="{{ route('admin.galeri.index') }}" class="nav-link">Galeri</a></li>
      <li class="nav-item"><a href="{{ route('admin.kontak.index') }}" class="nav-link">Kontak</a></li>
    </ul>
  </div>
</nav>

<div class="container mt-4">
  @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
