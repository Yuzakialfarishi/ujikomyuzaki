<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tentang Kami</title>

  <!-- LINK ke file CSS -->
  <link rel="stylesheet" href="{{ asset('css/tentang.css') }}">
</head>
<body>

  <!-- ======= NAVBAR ======= -->
  <header class="navbar">
    <div class="logo">TASTY FOOD</div>
    <nav class="nav-links">
      <a href="{{ url('/') }}">HOME</a>
      <a href="{{ url('/tentang') }}">TENTANG</a> 
      <a href="{{ url('/berita') }}">BERITA</a>
      <a href="{{ url('/galeri') }}">GALERI</a>
      <a href="{{ url('/kontak') }}">KONTAK</a>
    </nav>
  </header>

  <!-- ======= HERO SECTION ======= -->
  <section class="tentang-hero">
    <h1>TENTANG KAMI</h1>
  </section>

  <!-- ======= BAGIAN: TASTY FOOD ======= -->
  <section class="tentang-description container">
    <div class="text-column">
      <h3>TASTY FOOD</h3>
      <p class="bold">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare,
        augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem
        eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet
        viverra ante.
      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus ornare,
        augue eu rutrum commodo, dui diam convallis arcu, eget consectetur ex sem
        eget lacus. Nullam vitae dignissim neque, vel luctus ex. Fusce sit amet
        viverra ante.
      </p>
    </div>
    <div class="image-column">
      <img src="{{ asset('ASET/brooke-lark-oaz0raysASk-unsplash.jpg') }}" alt="Makanan 1">
      <img src="{{ asset('ASET/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg') }}" alt="Makanan 2">
    </div>
  </section>

  <!-- ======= BAGIAN: VISI ======= -->
  <section class="tentang-vision container">
    <div class="image-column">
      <img src="{{ asset('ASET/fathul-abrar-T-qI_MI2EMA-unsplash.jpg') }}" alt="Visi 1">
      <img src="{{ asset('ASET/michele-blackwell-rAyCBQTH7ws-unsplash.jpg') }}" alt="Visi 2">
    </div>
    <div class="text-column">
      <h3>VISI</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus. 
        Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit. 
        Curabitur facilisis lectus vitae eros malesuada eleifend. Mauris eget tellus odio. 
        Phasellus vestibulum turpis ac sem commodo, et posuere eros consequat. 
        Duis nec ex at ante volutpat posuere. Morbi vel nunc tortor. Nulla facilisi. 
        Nulla accumsan ullamcorper purus nec venenatis. 
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
        Integer imperdiet erat vel leo rutrum lobortis.
      </p>
    </div>
  </section>

  <!-- ======= BAGIAN: MISI ======= -->
  <section class="tentang-mission container">
    <div class="text-left">
      <h3>MISI</h3>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce scelerisque magna aliquet cursus tempus.
        Duis viverra metus et turpis elementum elementum. Aliquam rutrum placerat tellus et suscipit.
        Curabitur facilisis lectus vitae eros malesuada eleifend. Mauris eget tellus odio. Phasellus vestibulum turpis
        ac sem commodo, at posuere eros consequat. Duis nec ex at ante volutpat posuere. Morbi vel nunc tortor. Nulla
        facilisi. Nulla accumsan ullamcorper purus nec venenatis. Lorem ipsum dolor sit amet, consectetur adipiscing
        elit. Integer imperdiet erat vel leo rutrum lobortis.
      </p>
    </div>
    <div class="image-right">
      <img src="{{ asset('ASET/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" alt="Misi">
    </div>
  </section>

  <!-- ======= FOOTER ======= -->
  <footer class="footer">
    <div class="container footer-container">
      
      <!-- Kolom 1: Tentang -->
      <div class="footer-col">
        <h3>Tasty Food</h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>
        <div class="footer-socials">
          <a href="#"><img src="{{ asset('ASET/001-facebook.png') }}" alt="Facebook" /></a>
          <a href="#"><img src="{{ asset('ASET/002-twitter.png') }}" alt="Twitter" /></a>
        </div>
      </div>

      <!-- Kolom 2: Useful Links -->
      <div class="footer-col">
        <h4>Useful Links</h4>
        <ul>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Resep</a></li>
          <li><a href="#">Outlet</a></li>
          <li><a href="#">Testimonial</a></li>
        </ul>
      </div>

      <!-- Kolom 3: Privacy -->
      <div class="footer-col">
        <h4>Privacy</h4>
        <ul>
          <li><a href="#">Kebijakan</a></li>
          <li><a href="#">Tentang Kami</a></li>
          <li><a href="#">Berita</a></li>
        </ul>
      </div>

      <!-- Kolom 4: Kontak -->
      <div class="footer-col">
        <h4>Contact Info</h4>
        <ul>
          <li><a href="mailto:tastyfood@gmail.com">tastyfood@gmail.com</a></li>
          <li><a href="tel:+628123456789">+62 812 3456 789</a></li>
          <li><a href="#">Kota Bandung, Jawa Barat</a></li>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <p>&copy; Copyright 2025 Tasty Food. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
