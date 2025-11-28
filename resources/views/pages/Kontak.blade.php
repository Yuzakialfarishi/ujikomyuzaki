<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Kami - Tasty Food</title>

    <link rel="stylesheet" href="{{ asset('css/kontak.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

    <!-- NAVBAR -->
    <header class="navbar">
        <div class="logo">TASTY FOOD</div>

        <nav class="nav-links">
            <a href="{{ route('home') }}">HOME</a>
            <a href="{{ route('tentang') }}">TENTANG</a>
            <a href="{{ route('berita.index') }}">BERITA</a>
            <a href="{{ route('galeri.index') }}">GALERI</a>
            <a href="{{ route('kontak.index') }}" class="active">KONTAK</a>
        </nav>
    </header>

    <!-- HERO KONTAK -->
    <section class="hero-kontak">
        KONTAK KAMI
    </section>

    <!-- FORM KONTAK -->
    <section class="kontak-section">
        <form class="kontak-form" method="POST" action="{{ route('kontak.store') }}">
            @csrf

            @if(session('success'))
                <div class="alert-success" style="margin-bottom:10px">{{ session('success') }}</div>
            @endif

            <input type="text" name="nama" placeholder="Nama" required>
            <input type="email" name="email" placeholder="Email" required>
            <textarea name="pesan" placeholder="Pesan" required></textarea>

            <button type="submit">KIRIM</button>
        </form>
    </section>

    <!-- INFO KONTAK -->
    <section class="kontak-info">
        <div class="info-item">
            <img src="{{ asset('ASET/Group 66.png') }}" alt="Email">
            <h4>EMAIL</h4>
            <p>tastyfood@gmail.com</p>
        </div>

        <div class="info-item">
            <img src="{{ asset('ASET/Group 67.png') }}" alt="Phone">
            <h4>PHONE</h4>
            <p>+62 852 3456 7890</p>
        </div>

        <div class="info-item">
            <img src="{{ asset('ASET/Group 68.png') }}" alt="Location">
            <h4>LOCATION</h4>
            <p>Kota Bandung, Jawa Barat</p>
        </div>
    </section>
<section class="maps-section">
    <h2 class="maps-title">Lokasi Kami</h2>

    <div class="maps-wrapper">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.229478455381!2d107.661412!3d-6.943211399999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e7c381e3c323%3A0x5f5160f6c9796e4b!2sCYBERLABS%20-%20Jasa%20Digital%20Marketing%20%7C%20Jasa%20Pembuatan%20Website%20%7C%20Jasa%20Pembuatan%20Aplikasi!5e0!3m2!1sid!2sid!4v1732684340000!5m2!1sid!2sid"
            width="100%"
            height="420"
            style="border:0; border-radius:18px;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</section>


</body>
</html>
