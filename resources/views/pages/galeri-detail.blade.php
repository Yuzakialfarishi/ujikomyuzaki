<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $item->judul }} - Galeri Tasty Food</title>

    <link rel="stylesheet" href="{{ asset('css/Galeri.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">

    <style>
        .galeri-detail-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 60px 20px;
            text-align: center;
        }

        .galeri-detail-hero h1 {
            font-size: 2.5rem;
            margin: 0;
        }

        .galeri-detail-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .galeri-detail-image {
            width: 100%;
            max-height: 600px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .galeri-detail-info {
            background: #f9fafb;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
        }

        .galeri-detail-info h2 {
            margin-top: 0;
            color: #1f2937;
        }

        .galeri-detail-info p {
            color: #666;
            line-height: 1.6;
            margin: 10px 0;
        }

        .galeri-meta {
            color: #999;
            font-size: 0.9rem;
        }

        .back-link {
            display: inline-block;
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

        .related-gallery {
            margin-top: 60px;
            padding-top: 40px;
            border-top: 1px solid #e5e7eb;
        }

        .related-gallery h3 {
            margin-bottom: 20px;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .related-item {
            overflow: hidden;
            border-radius: 8px;
            transition: transform 0.3s;
        }

        .related-item:hover {
            transform: scale(1.05);
        }

        .related-item a {
            display: block;
        }

        .related-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
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
        <a href="{{ route('berita.index') }}">BERITA</a>
        <a href="{{ route('galeri.index') }}" class="active">GALERI</a>
        <a href="{{ route('kontak.index') }}">KONTAK</a>
    </nav>
</header>

<!-- HERO -->
<section class="galeri-detail-hero">
    <h1>{{ $item->judul }}</h1>
</section>

<!-- DETAIL CONTENT -->
<section class="galeri-detail-container">
    @php
        $img = asset('ASET/anh-nguyen-kcA-c3f_3FE-unsplash.jpg');
        if (!empty($item->gambar)) {
            $candidate = ltrim(str_replace('\\', '/', $item->gambar), '/');
            if (file_exists(public_path($candidate))) {
                $img = asset($candidate);
            }
        }
    @endphp

    <img src="{{ $img }}" alt="{{ $item->judul }}" class="galeri-detail-image">

    <div class="galeri-detail-info">
        <h2>{{ $item->judul }}</h2>
        @if($item->deskripsi)
            <p>{{ $item->deskripsi }}</p>
        @endif
        <div class="galeri-meta">
            Ditambahkan: {{ $item->created_at->format('d F Y H:i') }}
        </div>
    </div>

    <a href="{{ route('galeri.index') }}" class="back-link">← Kembali ke Galeri</a>

    <!-- RELATED GALLERY -->
    @php
        $related = \App\Models\Galeri::where('id', '!=', $item->id)->latest()->take(6)->get();
    @endphp

    @if($related->count() > 0)
    <div class="related-gallery">
        <h3>Galeri Lainnya</h3>
        <div class="related-grid">
            @foreach($related as $rel)
            <div class="related-item">
                <a href="{{ route('galeri.detail', $rel->id) }}">
                    @php
                        $relImg = asset('ASET/anh-nguyen-kcA-c3f_3FE-unsplash.jpg');
                        if (!empty($rel->gambar)) {
                            $candidate = ltrim(str_replace('\\', '/', $rel->gambar), '/');
                            if (file_exists(public_path($candidate))) {
                                $relImg = asset($candidate);
                            }
                        }
                    @endphp
                    <img src="{{ $relImg }}" alt="{{ $rel->judul }}">
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-container">

        <div class="footer-col brand">
            <h4>Tasty Food</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            <div class="social-icons">
                <img src="{{ asset('ASET/001-facebook.png') }}" alt="Facebook" />
                <img src="{{ asset('ASET/002-twitter.png') }}" alt="Twitter" />
            </div>
        </div>

        <div class="footer-col">
            <h4>Useful links</h4>
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
