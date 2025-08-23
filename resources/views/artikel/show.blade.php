<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>{{ $artikel->judul_postingan }} - Bank Sampah Sari Asri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/web/css/styles.css') }}" rel="stylesheet" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-success navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Bank Sampah Sari Asri</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
                    data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false">
                Menu
                <i class="bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#tentangKami">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#lokasiKami">Lokasi Kami</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Detail Artikel -->
    <section class="container my-5">
        <h4 class="text-success fw-bold">BERITA BANK SAMPAH SARI ASRI</h4>
        <h2 class="fw-bold">{{ $artikel->judul_postingan }}</h2>
        <p class="text-muted">{{ \Carbon\Carbon::parse($artikel->created_at)->format('d M Y') }} | Admin</p>

        @if($artikel->thumbnail)
            <img src="{{ asset('storage/thumbnail/' . $artikel->thumbnail) }}" 
                 class="img-fluid rounded mb-4" alt="{{ $artikel->judul_postingan }}">
        @endif

        <div class="mb-4">
            {!! $artikel->isi_postingan !!}
        </div>

        <a href="/" class="btn btn-outline-success">&larr; Kembali ke Berita</a>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-center py-3">
        <p class="text-white-50 small mb-0">
            &copy; Sistem Informasi Manajemen Bank Sampah Desa Arjosari Pasuruan 2025. 
            Repost by <a href="https://siblih.rf.gd" target="_blank" style="color: green;">SIBLIH</a>
        </p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
