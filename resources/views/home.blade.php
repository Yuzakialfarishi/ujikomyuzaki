<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tasty Food</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&family=Montserrat:wght@600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>
<body>

<!-- ===== NAVBAR ===== -->
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

<!-- ===== HERO ===== -->
<section class="hero">
  <div class="hero-text">
    <h2>HEALTHY</h2>
    <h3>TASTY FOOD</h3>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    <a href="{{ url('/tentang') }}" class="btn-tentang">TENTANG KAMI</a>
  </div>
  <div class="hero-image">
    <img src="{{ asset('ASET/img-4-2000x2000.png') }}" alt="Healthy Food">
  </div>
</section>

<!-- ===== TENTANG ===== -->
<section class="about">
  <h2>TENTANG KAMI</h2>
  <span class="line-decor"></span>
  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</section>

<!-- ===== KATEGORI ===== -->
<section class="kategori">
  <h2>KATEGORI</h2>
  @foreach ([
    'anh-nguyen-kcA-c3f_3FE-unsplash.jpg',
    'img-2.png',
    'img-3.png',
    'img-4.png'
  ] as $img)
    <div class="card">
      <img src="{{ asset('ASET/' . $img) }}" alt="Kategori">
      <h4>LOREM IPSUM</h4>
      <p>Lorem ipsum dolor sit amet.</p>
    </div>
  @endforeach
</section>

<!-- ===== BERITA ===== -->
<section class="berita" id="berita">
  <h2 class="berita-title">BERITA KAMI</h2>
  <div class="container-berita">
    <div class="berita-kiri">
      <img src="{{ asset('ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}" alt="Main News">
      <div class="berita-konten">
        <h4>LOREM IPSUM</h4>
        <p>Lorem ipsum dolor sit amet.</p>
        <a href="#" class="btn-link">Read more</a>
      </div>
    </div>

    <div class="berita-kanan">
      <div class="berita-grid">
        @foreach ([
          'sanket-shah-SVA7TyHxojY-unsplash.jpg',
          'sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg',
          'jimmy-dean-Jvw3pxgeiZw-unsplash.jpg',
          'luisa-brimble-HvXEbkcXjSk-unsplash.jpg'
        ] as $image)
        <div class="berita-item">
          <img src="{{ asset('ASET/' . $image) }}" alt="News">
          <div>
            <h5>LOREM IPSUM</h5>
            <p>Lorem ipsum dolor sit amet.</p>
            <a href="#" class="btn-link">Read more</a>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>

<!-- ===== GALERI ===== -->
<section class="home-galeri">
  <h3>GALERI KAMI</h3>
  <div class="home-galeri-grid">
    @foreach ([
      'brooke-lark-nBtmglfY0HU-unsplash.jpg',
      'ella-olsson-mmnKI8kMxpc-unsplash.jpg',
      'eiliv-aceron-ZuIDLSz3XLg-unsplash.jpg',
      'jonathan-borba-Gkc_xM3VY34-unsplash.jpg',
      'mariana-medvedeva-iNwCO9ycBlc-unsplash.jpg',
      'monika-grabkowska-P1aohbiT-EY-unsplash.jpg'
    ] as $foto)
      <img src="{{ asset('ASET/' . $foto) }}" alt="Foto Galeri">
    @endforeach
  </div>
  <a href="#" class="btn-home-galeri">LIHAT LEBIH BANYAK</a>
</section>

<!-- ===== FOOTER ===== -->
<footer>
  <div class="footer-content">
    <div class="footer-about">
      <h4>Tasty Food</h4>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>

    <div class="footer-links">
      <h4>Useful Links</h4>
      <ul>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Hewan</a></li>
        <li><a href="#">Galeri</a></li>
        <li><a href="#">Testimonial</a></li>
      </ul>
    </div>

    <div class="footer-privacy">
      <h4>Privacy</h4>
      <ul>
        <li><a href="#">Karir</a></li>
        <li><a href="#">Tentang Kami</a></li>
        <li><a href="#">Kontak Kami</a></li>
        <li><a href="#">Servis</a></li>
      </ul>
    </div>

    <div class="footer-contact">
      <h4>Contact Info</h4>
      <p>Email: tastyfood@gmail.com</p>
      <p>Telepon: +62 812 3456 7890</p>
      <p>Lokasi: Kota Bandung, Jawa Barat</p>
    </div>
  </div>

  <div class="footer-social">
    <a href="#">🔵</a>
    <a href="#">🔷</a>
  </div>
</footer>
</body>
</html>
