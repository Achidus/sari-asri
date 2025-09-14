<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistem Informasi Manajemen Bank Sampah Sari Asri</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap"
        rel="stylesheet" />
    <link href="{{ asset('assets/web/css/styles.css') }}" rel="stylesheet" />
</head>

<body id="page-top">
    <!-- Navbar transparan dengan logo hijau bulat -->
<nav class="navbar navbar-expand-lg fixed-top shadow-sm" 
     style="background: rgba(255,255,255,0.8); border-radius: 15px; padding: 10px 20px;">
    <div class="container px-5">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="#page-top" 
           style="color: #28a745; font-weight: 700;">
            <img src="{{ asset('assets/web/img/logo_bank.png') }}" 
                 alt="Logo Bank Sampah Hijau" 
                 style="width: 40px; height: 40px; margin-right: 10px; border-radius: 50%; object-fit: cover;">
            BANK SAMPAH SARI ASRI
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu <i class="bi-list" style="color:#28a745;"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                <li class="nav-item"><a class="nav-link me-lg-3" href="#kkn" style="color:#28a745; font-weight: 700;">Beranda</a></li>
                <li class="nav-item"><a class="nav-link me-lg-3" href="#tentangKami" style="color:#28a745; font-weight: 700;">Tentang Kami</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle me-lg-3" href="#" id="beritaDropdown"
                       role="button" data-bs-toggle="dropdown" aria-expanded="false" 
                       style="color:#28a745; font-weight: 700;">
                        Berita
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="beritaDropdown">
                        <li><a class="dropdown-item" href="#nasabah" style="font-weight: 600;">Daftar Nasabah</a></li>
                        <li><a class="dropdown-item" href="#berita" style="font-weight: 600;">Berita Terbaru</a></li>
                    </ul>
                </li>
                <li class="nav-item"><a class="nav-link me-lg-3" href="#lokasiKami" style="color:#28a745; font-weight: 700;">Lokasi Kami</a></li>
                <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('login') }}" style="color:#28a745; font-weight: 700;">Masuk Petugas</a></li>
            </ul>
        </div>
    </div>
</nav>


    <section>
    <header class="kkn" id="kkn">
    <div class="container px-4 px-lg-5 h-100">
        <div class="row gx-4 gx-lg-5 h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-8 align-self-end">
                <h1 class="text-white font-weight-bold">Selamat Datang di</h1>
                <h1 class="text-white font-weight-bold">KKN Kelompok 03 – Desa Arjosari</h1>
                <h2 class="text-white font-weight-bold">"Universitas Yudharta Pasuruan"</h2>
                <hr class="divider" />
            </div>
            <div class="col-lg-8 align-self-baseline">
                <p class="text-white-75 mb-5">
                    Kami adalah mahasiswa KKN dari Universitas Yudharta yang bertugas di Desa Arjosari Kec. Rejoso.
                    Kami berkomitmen untuk berkontribusi dalam pengembangan masyarakat melalui berbagai kegiatan edukatif, sosial, dan teknologi.
                </p>
                <p class="mt-2 small text-white-50">Juli – Agustus 2025</p>
                <a class="btn btn-primary" href="#profil">Lihat Profil Kelompok</a>
            </div>
        </div>
    </div>
</header>

</section>
<!-- Wave hijau sebagai pembatas -->
<div style="margin-top: -1px; line-height: 0;">
  <svg viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
    <path fill="#198754" fill-opacity="1"
      d="M0,64 C360,128 1080,0 1440,64 
         L1440,256 C1080,192 360,320 0,256 
         Z" />
  </svg>
</div>



        <section id="profil" class="py-4 bg-light">
            <div class="container">
              <h2 class="text-center mb-3">Profil Kelompok 03</h2>
              <p class="text-center mb-4">Anggota Kelompok KKN 03 yang bertugas di Desa Arjosari.</p>
          
              <div class="row justify-content-center gx-2 gy-2">
                <!-- Ulangi hingga 19 orang -->
                <!-- Contoh Anggota 1 -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                  <img src="/images/1.jpeg" class="rounded-circle img-fluid" 
                       style="width: 100px; height: 100px; object-fit: cover;">
                  <p class="small mt-1 mb-0"><strong>Citra Lailatul</strong></p>
                </div>
          
                <!-- Contoh Anggota 2 -->
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                  <img src="/images/2.jpeg" class="rounded-circle img-fluid" 
                       style="width: 100px; height: 100px; object-fit: cover;">
                  <p class="small mt-1 mb-0"><strong>Siblih</strong></p>
                </div>
                <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                    <img src="/images/3.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Fauziya</strong></p>
                  </div>
            
                  <!-- Contoh Anggota 2 -->
                  <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                    <img src="/images/4.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Ika Nur F.</strong></p>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                    <img src="/images/5.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Muslimatil F.</strong></p>
                  </div>
            
                  <!-- Contoh Anggota 2 -->
                  <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                    <img src="/images/6.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Nur Fitriani</strong></p>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                    <img src="/images/7.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Sevil Felix</strong></p>
                  </div>
            
                  <!-- Contoh Anggota 2 -->
                  <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                    <img src="/images/8.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Ikhwan</strong></p>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                    <img src="/images/9.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>M.Zainul R.</strong></p>
                  </div>
            
                  <!-- Contoh Anggota 2 -->
                  <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                    <img src="/images/10.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Sintia Putri</strong></p>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                    <img src="/images/11.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Wibowo Adi</strong></p>
                  </div>
            
                  <!-- Contoh Anggota 2 -->
                  <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                    <img src="/images/12.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Siti Amilatus</strong></p>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                    <img src="/images/13.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>M.Miftahul F.</strong></p>
                  </div>
            
                  <!-- Contoh Anggota 2 -->
                  <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                    <img src="/images/14.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Wiwin Nur</strong></p>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                    <img src="/images/15.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Ahmad Rosyidi</strong></p>
                  </div>
            
                  <!-- Contoh Anggota 2 -->
                  <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                    <img src="/images/17.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>M.Fathur R.</strong></p>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                    <img src="/images/gambar20.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Sintia Rusdianti</strong></p>
                  </div>
            
                  <!-- Contoh Anggota 2 -->
                  <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                    <img src="/images/gambar21.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Ilma Nafrotul Ula</strong></p>
                  </div>
                  <div class="col-6 col-sm-4 col-md-3 col-lg-2 text-center mb-4">

                    <img src="/images/16.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Ahmad Agung</strong></p>
                  </div>
              </div>
            </div>
          </section>
          <div style="margin-top: -1px; line-height: 0;">
  <svg viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none">
    <path fill="#198754" fill-opacity="1"
      d="M0,64 C360,128 1080,0 1440,64 
         L1440,256 C1080,192 360,320 0,256 
         Z" />
  </svg>
</div>

<!-- Floating Feedback Button -->
<div id="feedback-button" 
     class="feedback-btn">
    <i class="bi bi-chat-dots-fill"></i>
</div>

<!-- Feedback Modal -->
<div id="feedback-modal" class="feedback-modal">
    <div class="feedback-card">
        <span id="close-feedback" class="close-btn">&times;</span>
        <h3 class="text-center fw-bold mb-4">💬 Kirim Feedback</h3>

        <form id="feedback-form">
            @csrf
            <!-- Subjek -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Subjek</label>
                <input type="text" name="judul_feedback" 
                       class="form-control custom-input" 
                       placeholder="Tulis subjek feedback" required>
            </div>

            <!-- Nama Pengirim -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Pengirim</label>
                <input type="text" name="nama_pengirim" 
                       class="form-control custom-input" 
                       placeholder="Nama Anda" required>
            </div>

            <!-- Isi Feedback -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Isi Feedback</label>
                <textarea name="isi_feedback" rows="4" 
                          class="form-control custom-input" 
                          placeholder="Tulis pesan Anda..." required></textarea>
            </div>

            <!-- Tombol -->
            <div class="text-end">
                <button type="submit" class="btn btn-gradient px-4">
                    <i class="bi bi-send-fill"></i> Kirim
                </button>
            </div>
        </form>
    </div>
</div>

<style>
/* Floating button */
.feedback-btn {
    position: fixed;
    bottom: 25px;
    right: 25px;
    background: linear-gradient(135deg, #4f46e5, #6d28d9);
    color: white;
    width: 60px; height: 60px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 24px;
    cursor: pointer;
    box-shadow: 0 6px 12px rgba(0,0,0,0.25);
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    z-index: 1000;
}
.feedback-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 8px 16px rgba(0,0,0,0.35);
}

/* Modal background */
.feedback-modal {
    display: none;
    position: fixed; inset: 0;
    background: rgba(0,0,0,0.5);
    backdrop-filter: blur(2px);
    z-index: 1100;
    align-items: center; justify-content: center;
}

/* Modal card */
.feedback-card {
    background: #fff;
    padding: 30px;
    border-radius: 16px;
    width: 100%; max-width: 500px;
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    position: relative;
    animation: fadeIn 0.3s ease-out;
}

/* Close button */
.close-btn {
    position: absolute;
    top: 15px; right: 20px;
    font-size: 22px;
    cursor: pointer;
    color: #888;
    transition: color 0.2s ease;
}
.close-btn:hover { color: #333; }

/* Input styling */
.custom-input {
    border-radius: 10px;
    padding: 10px 14px;
    background: #f9fafb;
    border: 1px solid #ddd;
    transition: all 0.2s;
}
.custom-input:focus {
    border-color: #4f46e5;
    box-shadow: 0 0 6px rgba(79,70,229,0.3);
}

/* Gradient button */
.btn-gradient {
    background: linear-gradient(135deg, #4f46e5, #6d28d9);
    color: white;
    font-weight: 600;
    border-radius: 10px;
    transition: all 0.2s ease;
}
.btn-gradient:hover {
    opacity: 0.9;
    transform: translateY(-1px);
}

/* Animasi */
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(15px); }
    to   { opacity: 1; transform: translateY(0); }
}
.banner-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);   /* 3 kolom */
    grid-template-rows: repeat(2, 250px);    /* 2 baris */
  }

  .banner-item img,
  .empty-slot {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .empty-slot {
    background: #fff; /* biar kelihatan bolong putih */
  }

  @media (max-width: 768px) {
    .banner-grid {
      grid-template-columns: 1fr 1fr;
      grid-auto-rows: 200px;
    }
    .empty-slot { display: none; }
  }

</style>

    <!-- Mashead header-->
    <header class="masthead">
        <div class="container px-5">
            <div class="row gx-5 align-items-center">
                <div class="col-lg-6">
                    <!-- Mashead text and app badges-->
                    <div class="mb-5 mb-lg-0 text-center text-lg-start">
                        <h1 class="display-1 lh-1 mb-3">Bank Sampah Sari Asri.</h1>
                        <p class="lead fw-normal text-muted mb-5">Sampah Bukan Akhir, Tapi Awal Perubahan: Mari Kelola
                            Bersama untuk Masa Depan yang Lebih Baik!</p>
                        <div class="d-flex flex-column flex-lg-row align-items-center">
                
                        </div>
                    </div>
                </div>
                <div class="col-sm-8 col-md-6">
                    <div class="px-5 px-sm-0">
                        <img class="img-fluid" style="max-width: 100%; height: auto;"
                            src="{{ asset('assets/web/img/hero_logo.png') }}" alt="..." />
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Quote/testimonial aside-->
    <aside class="text-center bg-success">
        <div class="container px-5">
            <div class="row gx-5 justify-content-center">
                <div class="col-xl-8">
                    <div class="h2 fs-1 text-white mb-4">"Bersama kita dapat mengubah sampah menjadi manfaat. Jadilah
                        bagian dari solusi!"</div>
                </div>
            </div>
        </div>
    </aside>
    <!-- Basic features section-->
    <section class="bg-light">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
                <div class="col-12 col-lg-5">
                    <h2 class="display-4 lh-1 mb-4" id="tentangKami">Siapa Kami?</h2>
                    <p class="small text-muted  mb-5 mb-lg-0">Bank Sampah Sari Asri adalah Pemuda Desa yang berkomitmen
                        untuk meningkatkan kesadaran masyarakat tentang pentingnya pengelolaan sampah yang baik dan
                        berkelanjutan. Kami berfokus pada program pengumpulan, pengolahan, dan pemanfaatan sampah,
                        dengan tujuan mengurangi dampak lingkungan sekaligus memberikan manfaat ekonomi bagi masyarakat.
                    </p>
                    <br>
                    <p class="small text-muted  mb-5 mb-lg-0">
                        Kami percaya bahwa setiap individu dapat berkontribusi dalam menjaga kebersihan lingkungan.
                        Melalui kolaborasi dengan masyarakat, kami berusaha menciptakan lingkungan yang lebih bersih dan
                        sehat untuk generasi mendatang. Bergabunglah dengan kami dalam gerakan ini dan bersama-sama kita
                        wujudkan Arjosari yang lebih hijau!

                    </p>
                </div>
                <div class="col-sm-8 col-md-6">
                    <div class="px-5 px-sm-0">
                        <img class="img-fluid" style="max-width: 100%; height: auto;"
                            src="{{ asset('assets/web/img/bank_logo.png') }}" alt="..." />
                    </div>
                </div>
            </div>
        </div>
    </section>
<section id="berita" class="py-5 bg-light">
  <div class="container">
    <h2 class="text-center mb-4 fw-bold">Berita Terbaru</h2>
    <div class="row g-4">
      @foreach ($artikels as $artikel)
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm rounded-3">
            @if ($artikel->thumbnail)
              <img src="{{ asset('storage/thumbnail/' . $artikel->thumbnail) }}" 
                   class="card-img-top rounded-top"
                   alt="{{ $artikel->judul_postingan }}"
                   style="height: 220px; object-fit: cover;">
            @endif
            <div class="card-body d-flex flex-column">
              <small class="text-uppercase text-muted fw-bold">Berita Bank Sampah</small>
              <h5 class="card-title fw-bold mt-2">
                {{ Str::limit($artikel->judul_postingan, 90) }}
              </h5>
              <p class="card-text text-muted small">
                {{ $artikel->created_at->format('l, d F Y') }} — 
                {{ Str::words(strip_tags($artikel->isi_postingan), 50, '...') }}
              </p>
              <a href="{{ route('artikel.show', $artikel->slug) }}" 
                 class="mt-auto fw-bold text-success">
                Baca Selengkapnya &gt;&gt;&gt;
              </a>
            </div>
          </div>
        </div>
      @endforeach
    </div>

   <div class="d-flex justify-content-center mt-4">
    {{-- Tambahkan fragment #berita --}}
    {{ $artikels->withQueryString()->fragment('berita')->links() }}
</div>

</div>

  </div>
</section>


{{-- Banner Galeri --}}
@if($banners->count())
<section id="banner" class="bg-white py-5">
  <div class="container-fluid px-0"> {{-- pakai fluid biar full --}}
    <div class="banner-grid">
      @foreach($banners as $index => $banner)
        {{-- Kosongkan slot tengah (index ke-4 → baris 2 kolom 2) --}}
        @if($index === 4)
          <div class="empty-slot"></div>
        @endif

        <div class="banner-item">
          <img src="{{ asset('storage/banners/' . $banner->file_banner) }}"
               alt="{{ $banner->nama_banner }}">
        </div>
      @endforeach
    </div>
  </div>
</section>
@endif



<section class="bg-white py-5" id="nasabah">
    <div class="container">
        <h2 class="text-center mb-4 fw-bold">Daftar Nasabah</h2>
        <p class="text-muted text-center">Berikut adalah beberapa nasabah Bank Sampah Sari Asri.</p>

        <div class="table-responsive">
    <table class="table table-bordered table-hover align-middle">
        <thead class="table-success">
            <tr>
                <th>#</th>
                <th>Nama</th>
               
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
@forelse ($nasabahs as $index => $nasabah)
    <tr style="cursor:pointer;" 
        data-bs-toggle="offcanvas" 
        data-bs-target="#offcanvas{{ $nasabah->id }}" 
        aria-controls="offcanvas{{ $nasabah->id }}">
        <td>{{ $nasabahs->firstItem() + $index }}</td>
        <td>{{ $nasabah->nama_lengkap }}</td>

       
        <td>
            @if ($nasabah->status === 'aktif')
                <span class="badge bg-success text-white">Aktif</span>
            @else
                <span class="badge bg-danger text-white">Tidak Aktif</span>
            @endif
        </td>
    </tr>

    <!-- Offcanvas detail -->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvas{{ $nasabah->id }}" aria-labelledby="offcanvasLabel{{ $nasabah->id }}">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasLabel{{ $nasabah->id }}">{{ $nasabah->nama_lengkap }}</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <p><strong>No. Registrasi:</strong> {{ $nasabah->no_registrasi }}</p>
            <p><strong>No. HP:</strong> {{ $nasabah->no_hp }}</p>
            <p><strong>Saldo:</strong> Rp{{ number_format($nasabah->saldo->saldo, 0, ',', '.') }}</p>
            <p><strong>Status:</strong> {{ $nasabah->status }}</p>
            <!-- Tambahkan info lain jika perlu -->
        </div>
    </div>
@empty
    <tr>
        <td colspan="6" class="text-center">Belum ada nasabah.</td>
    </tr>
@endforelse
        </tbody>
    </table>
</div>

</tbody>

            </table>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $nasabahs->links() }}
        </div>
    </div>
</section>

<section class="bg-light py-5" id="sampah">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h3 class="fw-bold">Daftar Harga Sampah</h3>
                <p class="text-muted">Berikut adalah daftar sampah yang tersedia di Bank Sampah Sari Asri.</p>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Nama Sampah</th>
                        <th>Harga per Kg</th>
                        <th>Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($sampahs as $index => $sampah)
                        <tr>
                            <td>{{ $sampahs->firstItem() + $index }}</td>
                            <td>{{ $sampah->nama_sampah }}</td>
                            <td>Rp{{ number_format($sampah->harga_per_kg, 2, ',', '.') }}</td>
                            <td>
                                @if ($sampah->gambar)
                                    <img src="{{ asset('storage/sampah/' . $sampah->gambar) }}"
                                        alt="{{ $sampah->nama_sampah }}"
                                        style="width: 100px; height: auto;">
                                @else
                                    Tidak ada
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada data sampah</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $sampahs->links() }}
        </div>
    </div>
</section>

    <section class="bg-white">
        <div class="container px-5">
            <div class="row gx-5 align-items-center justify-content-center justify-content-lg-between">
                <div class="col-12 col-lg-5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1976.9741964415975!2d112.9619166061516!3d-7.688687843995048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7c9003b2db66d%3A0xf236e565b328c2e4!2sBANK%20SAMPAH%20SARI%20ASRI!5e0!3m2!1sid!2sid!4v1754059094748!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-sm-8 col-md-6">
                    <div class="px-5 px-sm-0">
                        <h2 class="display-4 lh-1 mb-4" id="lokasiKami">Lokasi Kami</h2>
                        <p class="small text-muted  mb-5 mb-lg-0">Bank Sampah Sari Asri berlokasi di Desa Arjosari, Pasuruan, Jawa Timur. Alamat lengkap kami adalah:
                        </p>
                        <br>
                        <p class="small text-muted  mb-5 mb-lg-0">
                            Dusun Sari Rejo, Desa Arjosari, Rejoso, Pasuruan
                        </p>
                        <br>
                        <p class="small text-muted  mb-5 mb-lg-0">
                            Kami mengundang seluruh warga desa untuk berkunjung dan berpartisipasi dalam program-program
                            kami. Bersama-sama, kita dapat membuat perbedaan dalam pengelolaan sampah dan menciptakan
                            lingkungan yang lebih bersih dan sehat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-black text-center py-5">
        <div class="container px-5">
            <div class="text-white-50 small">
                <div class="mb-2">&copy; Sistem Informasi Manajemen Bank Sampah Desa Arjosari Pasuruan 2025. Repost by <a href="https://siblih.rf.gd" target="_blank" rel="noopener noreferrer" style="color: green;">SIBLIH</a>
</div>
                    
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
  <script>
document.getElementById('feedback-button').addEventListener('click', () => {
    document.getElementById('feedback-modal').style.display = 'flex';
});
document.getElementById('close-feedback').addEventListener('click', () => {
    document.getElementById('feedback-modal').style.display = 'none';
});

// submit via AJAX
document.getElementById('feedback-form').addEventListener('submit', function(e) {
    e.preventDefault();
    let formData = new FormData(this);

    fetch("{{ route('feedback.store') }}", {
        method: "POST",
        headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" },
        body: formData
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message || "Feedback berhasil dikirim!");
        document.getElementById('feedback-modal').style.display = 'none';
        this.reset();
    })
    .catch(err => console.error(err));
});

document.addEventListener("DOMContentLoaded", function () {
    if (window.location.hash === "#berita") {
        document.querySelector("#berita").scrollIntoView({
            behavior: "smooth"
        });
    }
});

</script>





</body>

</html>
