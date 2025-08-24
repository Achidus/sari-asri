<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f9f9f9;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
        footer {
            background: #f1f1f1;
        }
        /* Navbar styling */
        .navbar-custom {
            background: linear-gradient(90deg, #28a745, #218838);
        }
        .navbar-custom .navbar-brand {
            color: #ffffffff !important;
            font-weight: bold;
            font-size: 1.3rem;
        }
        .navbar-custom .nav-link {
            color: #e2e2e2 !important;
            transition: color 0.3s, background 0.3s;
            border-radius: 5px;
            padding: 8px 15px;
            margin-left: 5px;
        }
        .navbar-custom .nav-link:hover,
        .navbar-custom .nav-link.active {
            color: #fff !important;
            background: rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg fixed-top" 
     style="background: rgba(255,255,255,0.9); /* lebih solid */
            backdrop-filter: blur(0px); /* hilangkan blur */
            box-shadow: 0 2px 8px rgba(0,0,0,0.1); /* sedikit bayangan */
            border-radius: 15px; /* membuat ujung membulat */
            margin: 10px 20px; /* memberi jarak dari tepi layar */
            padding: 10px 20px;">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}" style="color: #28a745; font-weight: bold;">
            🌱 Bank Sampah Sari Asri
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="filter: invert(45%) sepia(80%) saturate(500%) hue-rotate(90deg);"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link @if(request()->is('/')) active @endif" href="{{ url('/') }}" style="color: #28a745;">
                        Beranda
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="beritaDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #28a745;">
                        Berita
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="beritaDropdown">
                        <li><a class="dropdown-item" href="{{ url('/#berita') }}">Daftar Berita</a></li>
                        <li><a class="dropdown-item" href="{{ url('/#nasabah') }}">Daftar Nasabah</a></li>
                        <li><a class="dropdown-item" href="{{ url('/#sampah') }}">Daftar Harga Sampah</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>



<!-- Tambahkan padding-top pada main agar konten tidak tertutup navbar -->
<main style="padding-top: 80px;">
    @yield('content')
</main>


    <!-- Footer -->
    <footer class="text-center py-3 mt-5">
        <small>&copy; {{ date('Y') }} Bank Sampah Sari Asri</small>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
