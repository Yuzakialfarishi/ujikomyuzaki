<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita - Tasty Food</title>

    <link rel="stylesheet" href="{{ asset('css/berita.css') }}?v={{ time() }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    {{-- Import Str supaya tidak error --}}
    @php
        use Illuminate\Support\Str;
    @endphp
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
<section class="berita-hero">
    <h1>BERITA KAMI</h1>
</section>

<!-- ======= BERITA UTAMA ======= -->
<section class="berita-utama container">
    <div class="berita-box">
      <div class="image">
        <img src="{{ asset('ASET/eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg') }}" alt="Berita Utama">
      </div>
      <div class="text">
        <h2>APA SAJA MAKANAN KHAS<br>NUSANTARA?</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo, dui diam convallis arcu.</p>
        <p>Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet viverra ante.</p>
        <a href="#" class="btn-black">BACA SELENGKAPNYA</a>
      </div>
    </div>
</section>



<!-- ======= BERITA LAINNYA ======= -->
<section class="berita-lainnya container">
    <h3>BERITA LAINNYA</h3>

    <div class="berita-grid">
        @foreach(range(1, 8) as $i)
        <div class="berita-card">
            <img src="{{ asset('ASET/'.($i % 4 == 1 ? 'sanket-shah-SVA7TyHxojY-unsplash.jpg' : ($i % 4 == 2 ? 'sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg' : ($i % 4 == 3 ? 'jimmy-dean-Jvw3pxgeiZw-unsplash.jpg' : 'luisa-brimble-HvXEbkcXjSk-unsplash.jpg')))) }}" alt="Gambar Berita {{ $i }}">
            
            <h4>LOREM IPSUM</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare, augue eu rutrum commodo.</p>
            <a href="#">Baca selengkapnya</a>
        </div>
        @endforeach
    </div>
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
