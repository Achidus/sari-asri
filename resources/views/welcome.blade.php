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
    <nav class="navbar navbar-expand-lg bg-success navbar-dark fixed-top shadow-sm" id="mainNav">
        <div class="container px-5">
            <a class="navbar-brand fw-bold" href="#page-top">BANK SAMPAH SARI ASRI </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="bi-list"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-white ms-auto me-4 my-3 my-lg-0">
                    <li class="nav-item"><a class="nav-link me-lg-3" href="/">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="#tentangKami">Tentang Kami</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="#lokasiKami">Lokasi Kami</a></li>
                    <li class="nav-item"><a class="nav-link me-lg-3" href="{{ route('login') }}">Masuk Petugas</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section>
    <header class="kkn">
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
                <div class="col-3 col-sm-1 col-md-2 text-center">
                  <img src="/images/1.jpeg" class="rounded-circle img-fluid" 
                       style="width: 100px; height: 100px; object-fit: cover;">
                  <p class="small mt-1 mb-0"><strong>Citra Lailatul</strong></p>
                </div>
          
                <!-- Contoh Anggota 2 -->
                <div class="col-3 col-sm-1 col-md-2 text-center">
                  <img src="/images/2.jpeg" class="rounded-circle img-fluid" 
                       style="width: 100px; height: 100px; object-fit: cover;">
                  <p class="small mt-1 mb-0"><strong>Siblih</strong></p>
                </div>
                <div class="col-3 col-sm-1 col-md-2 text-center">
                    <img src="/images/3.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Fauziya</strong></p>
                  </div>
            
                  <!-- Contoh Anggota 2 -->
                  <div class="col-3 col-sm-1 col-md-2 text-center">
                    <img src="/images/4.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Ika Nur F.</strong></p>
                  </div>
                  <div class="col-3 col-sm-1 col-md-2 text-center">
                    <img src="/images/5.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Muslimatil F.</strong></p>
                  </div>
            
                  <!-- Contoh Anggota 2 -->
                  <div class="col-3 col-sm-1 col-md-2 text-center">
                    <img src="/images/6.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Nur Fitriani</strong></p>
                  </div>
                  <div class="col-3 col-sm-1 col-md-2 text-center">
                    <img src="/images/7.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Sevil Felix</strong></p>
                  </div>
            
                  <!-- Contoh Anggota 2 -->
                  <div class="col-3 col-sm-1 col-md-2 text-center">
                    <img src="/images/8.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Ikhwan</strong></p>
                  </div>
                  <div class="col-3 col-sm-1 col-md-2 text-center">
                    <img src="/images/9.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>M.Zainul R.</strong></p>
                  </div>
            
                  <!-- Contoh Anggota 2 -->
                  <div class="col-3 col-sm-1 col-md-2 text-center">
                    <img src="/images/10.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Sintia Putri</strong></p>
                  </div>
                  <div class="col-3 col-sm-1 col-md-2 text-center">
                    <img src="/images/11.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Wibowo Adi</strong></p>
                  </div>
            
                  <!-- Contoh Anggota 2 -->
                  <div class="col-3 col-sm-1 col-md-2 text-center">
                    <img src="/images/12.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Siti Amilatus</strong></p>
                  </div>
                  <div class="col-3 col-sm-1 col-md-2 text-center">
                    <img src="/images/13.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>M.Miftahul F.</strong></p>
                  </div>
            
                  <!-- Contoh Anggota 2 -->
                  <div class="col-3 col-sm-1 col-md-2 text-center">
                    <img src="/images/14.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Wiwin Nur</strong></p>
                  </div>
                  <div class="col-3 col-sm-1 col-md-2 text-center">
                    <img src="/images/15.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Ahmad Rosyidi</strong></p>
                  </div>
            
                  <!-- Contoh Anggota 2 -->
                  <div class="col-3 col-sm-1 col-md-2 text-center">
                    <img src="/images/17.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>M.Fathur R.</strong></p>
                  </div>
                  <div class="col-3 col-sm-1 col-md-2 text-center">
                    <img src="/images/gambar20.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Sintia Rusdianti</strong></p>
                  </div>
            
                  <!-- Contoh Anggota 2 -->
                  <div class="col-3 col-sm-1 col-md-2 text-center">
                    <img src="/images/gambar21.jpeg" class="rounded-circle img-fluid" 
                         style="width: 100px; height: 100px; object-fit: cover;">
                    <p class="small mt-1 mb-0"><strong>Ilma Nafidatul</strong></p>
                  </div>
                  <div class="col-3 col-sm-1 col-md-2 text-center">
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
          <div class="card h-100 shadow-sm border-0 rounded-3">
            @if ($artikel->thumbnail)
              <img src="{{ asset('storage/thumbnail/' . $artikel->thumbnail) }}" 
                   class="card-img-top" 
                   alt="{{ $artikel->judul_postingan }}"
                   style="height: 200px; object-fit: cover;">
            @endif
            <div class="card-body d-flex flex-column">
              <small class="text-uppercase text-success fw-bold">Berita</small>
              <h5 class="card-title fw-bold mt-2">
                {{ Str::limit($artikel->judul_postingan, 70) }}
              </h5>
              <p class="card-text text-muted small">
                {{ Str::limit(strip_tags($artikel->isi ?? ''), 120) }}
              </p>
              <a href="{{ route('admin.artikel.show', $artikel->id) }}" 
                 class="mt-auto text-success fw-bold">
                Baca Selengkapnya >>>
              </a>
            </div>
            <div class="card-footer bg-white border-0">
              <small class="text-muted">{{ $artikel->created_at->format('d M Y') }}</small>
            </div>
          </div>
        </div>
      @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
      {{ $artikels->links() }}
    </div>
  </div>
</section>

<section class="bg-white py-5">
    <div class="container">
        <h2 class="text-center mb-4 fw-bold">Daftar Nasabah</h2>
        <p class="text-muted text-center">Berikut adalah beberapa nasabah Bank Sampah Sari Asri.</p>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>No. Registrasi</th>
                        <th>No. HP</th>
                        <th>Saldo</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($nasabahs as $index => $nasabah)
                        <tr>
                            <td>{{ $nasabahs->firstItem() + $index }}</td>
                            <td>{{ $nasabah->nama_lengkap }}</td>
                            <td>{{ $nasabah->no_registrasi }}</td>
                            <td>{{ $nasabah->no_hp }}</td>
                            <td>Rp{{ number_format($nasabah->saldo->saldo, 0, ',', '.') }}</td>
                            <td>
                                @if ($nasabah->status === 'aktif')
                                    <span class="badge bg-success text-white">Aktif</span>
                                @else
                                    <span class="badge bg-danger text-white">Tidak Aktif</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada nasabah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center mt-3">
            {{ $nasabahs->links() }}
        </div>
    </div>
</section>

<section class="bg-light py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h3 class="fw-bold">Daftar Harga Sampah Terbaru</h3>
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
</body>

</html>
