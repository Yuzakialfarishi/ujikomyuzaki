<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $berita->judul }} - Tasty Food</title>

    <link rel="stylesheet" href="{{ asset('css/berita.css') }}?v={{ time() }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        .berita-detail-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 20px;
            text-align: center;
        }

        .berita-detail-hero h1 {
            font-size: 2.5rem;
            margin: 0;
        }

        .berita-detail-content {
            max-width: 800px;
            margin: 40px auto;
            padding: 0 20px;
            line-height: 1.8;
        }

        .berita-detail-image {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .berita-meta {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 20px;
        }

        .berita-detail-content p {
            margin-bottom: 16px;
            font-size: 1.05rem;
            color: #333;
        }

        .back-link {
            display: inline-block;
            margin-top: 40px;
            padding: 10px 20px;
            background: #10b981;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.3s;
        }

        .back-link:hover {
            background: #059669;
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<header class="navbar">
    <div class="logo">TASTY FOOD</div>
    <nav class="nav-links">
        <a href="{{ route('home') }}">HOME</a>
        <a href="{{ route('tentang') }}">TENTANG</a>
        <a href="{{ route('berita.index') }}" class="active">BERITA</a>
        <a href="{{ route('galeri.index') }}">GALERI</a>
        <a href="{{ route('kontak.index') }}">KONTAK</a>
    </nav>
</header>

<!-- HERO -->
<section class="berita-detail-hero">
    <h1>{{ $berita->judul }}</h1>
</section>

<!-- CONTENT -->
<section class="berita-detail-content">
    @php
        $img = asset('ASET/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg');
        if (!empty($berita->gambar)) {
            $candidate = ltrim(str_replace('\\', '/', $berita->gambar), '/');
            if (file_exists(public_path($candidate))) {
                $img = asset($candidate);
            }
        }
    @endphp

    @if($img)
        <img src="{{ $img }}" alt="{{ $berita->judul }}" class="berita-detail-image">
    @endif

    <div class="berita-meta">
        Dipublikasikan: {{ $berita->created_at->format('d F Y H:i') }}
    </div>

    <div class="berita-body">
        {!! nl2br(e($berita->isi)) !!}
    </div>

    <a href="{{ route('berita.index') }}" class="back-link">← Kembali ke Berita</a>
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-container container">

        <div class="footer-col brand">
            <h3>Tasty Food</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit...</p>
            <div class="social-icons">
                <a href="#"><img src="{{ asset('ASET/001-facebook.png') }}" alt="Facebook"></a>
                <a href="#"><img src="{{ asset('ASET/002-twitter.png') }}" alt="Twitter"></a>
            </div>
        </div>

        <div class="footer-col">
            <h4>Useful Links</h4>
            <ul>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Hewan</a></li>
                <li><a href="#">Galeri</a></li>
                <li><a href="#">Testimonial</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Privacy</h4>
            <ul>
                <li><a href="#">Karir</a></li>
                <li><a href="#">Tentang Kami</a></li>
                <li><a href="#">Kontak Kami</a></li>
                <li><a href="#">Servis</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>Contact Info</h4>
            <ul>
                <li><a href="mailto:tastyfood@gmail.com">tastyfood@gmail.com</a></li>
                <li><a href="tel:+6281234567890">+62 812 3456 7890</a></li>
                <li>Kota Bandung, Jawa Barat</li>
            </ul>
        </div>

    </div>

    <div class="footer-bottom">
        <p>Copyright ©2024 All rights reserved</p>
    </div>
</footer>

</body>
</html>
