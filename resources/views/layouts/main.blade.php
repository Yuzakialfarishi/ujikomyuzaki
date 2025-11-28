<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('title', 'Tasty Food')</title>

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">

  <!-- CSS Utama -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body>

{{-- ===================== NAVBAR ===================== --}}
<header class="navbar">
  <div class="logo">TASTY FOOD</div>
  <button id="menu-toggle">☰</button>
  <nav>
    <ul id="nav-menu">
      <li><a href="{{ url('/') }}">HOME</a></li>
      <li><a href="{{ url('/tentang') }}">TENTANG</a></li>
      <li><a href="{{ url('/berita') }}">BERITA</a></li>
      <li><a href="{{ url('/galeri') }}">GALERI</a></li>
      <li><a href="{{ url('/kontak') }}">KONTAK</a></li>
    </ul>
  </nav>
</header>

{{-- ===================== CONTENT ===================== --}}
<main>
    @yield('content')
</main>

{{-- ===================== FOOTER ===================== --}}
<footer>
  <div class="footer-content">
    <div class="footer-about">
      <h4>Tasty Food</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>

    <div class="footer-links">
      <h4>Useful Links</h4>
      <ul>
        <li><a href="#">Bl
