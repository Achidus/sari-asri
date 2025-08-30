@extends('layouts.app')

@section('title', 'Dashboard')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Dashboard</h3>
            <h6 class="op-7 mb-2">Rincian Data dan Transaksi Bank Sampah Sari Asri</h6>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-3">
    <a href="{{ route('admin.nasabah.index') }}" class="text-decoration-none text-dark">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-icon">
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                            <p class="card-category">Total Nasabah</p>
                            <h4 class="card-title">{{ $totalNasabah }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>
</div>

        <div class="col-sm-6 col-md-3">
            <a href="{{ route('admin.petugas.index') }}" class="text-decoration-none text-dark">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="fas fa-user-check"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Petugas</p>
                                <h4 class="card-title">{{ $totalPetugas }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="{{ route('admin.transaksi.index') }}" class="text-decoration-none text-dark">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-warning bubble-shadow-small">
                                <i class="fas fa-recycle"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Sampah</p>
                                <h4 class="card-title">{{ $totalSampahTerkumpul }} Kg</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="{{ route('admin.transaksi.index') }}" class="text-decoration-none text-dark">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="fas fa-file-invoice-dollar"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Transaksi Setoran</p>
                                <h4 class="card-title">{{ $totalTransaksiSetoran }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</a>
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-3">
            <a href="{{ route('admin.pengiriman.index') }}" class="text-decoration-none text-dark">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                                <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-truck"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Sampah Terkirim</p>
<h4 class="card-title">{{ $totalSampahTerkirim }} Kg</h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="/admin/nasabah/index.blade.php" class="text-decoration-none text-dark">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-secondary bubble-shadow-small">
                                <i class="fas fa-clock"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Permintaan Tarik Saldo</p>
                                <h4 class="card-title">{{ $totalPermintaanPencairan }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="{{ route('admin.feedback.index') }}" class="text-decoration-none text-dark">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-dark bubble-shadow-small">
                                <i class="fas fa-comment-dots"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Feedback Masuk</p>
                                <h4 class="card-title">{{ $totalFeedbackMasuk }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="{{ route('admin.artikel.index') }}" class="text-decoration-none text-dark">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-light bubble-shadow-small">
                                <i class="fas fa-newspaper"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Artikel</p>
                                <h4 class="card-title">{{ $totalArtikel }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 col-md-3">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-danger bubble-shadow-small">
                                <i class="fas fa-box"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Stok Sampah</p>
                                <h4 class="card-title">{{ $totalStokSampah }} Kg</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
            <a href="{{ route('admin.transaksi.index') }}" class="text-decoration-none text-dark">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="fas fa-wallet"></i>
                            </div>
                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Total Saldo Nasabah</p>
<h4 class="card-title">Rp {{ number_format($totalSaldoNasabah, 0, ',', '.') }}</h4>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-3">
            
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center bubble-shadow-small" style="color: #e383c3ff;">
    <i class="fas fa-hand-holding-usd"></i>
</div>

                        </div>
                        <div class="col col-stats ms-3 ms-sm-0">
                            <div class="numbers">
                                <p class="card-category">Keuntungan Bank Sampah 25%</p>
                                <h4 class="card-title">Rp {{ number_format($totalKeuntungan, 0, ',', '.') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-3">
    <div class="card card-stats card-round">
        <div class="card-body py-2 px-3"> 
            <div class="row align-items-center">
                <div class="col-icon">
                    <div class="icon-big text-center bubble-shadow-small" style="color: #b4c86cff; font-size: 1.8rem;"> {{-- kecilkan icon --}}
                        <i class="fas fa-coins"></i>
                    </div>
                </div>
                <div class="col col-stats ms-2">
                    <div class="numbers">
                        <p class="card-category mb-0" style="font-size: 1rem;">Saldo Bersih Nasabah</p>
                        <h4 class="card-title mt-1" style="font-size: 1.5rem;">Rp {{ number_format($totalSaldoBersih, 0, ',', '.') }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card text-white bg-primary shadow-sm">
            <div class="card-body text-center">
                <!-- Logo/Icon di atas judul -->
                <div class="mb-2">
                    <i class="fas fa-university fa-2x"></i> <!-- Contoh Font Awesome icon -->
                </div>

                <!-- Judul -->
                <h5 class="card-title mb-2">Total Saldo Bank</h5>

                <!-- Nominal -->
                <h4 class="card-title">Rp {{ number_format($totalSaldoBank, 0, ',', '.') }}</h4>


                <!-- Keterangan kecil -->
                <small class="d-block">Kas Masuk + Keuntungan Bank - Kas Keluar</small>
            </div>
        </div>
    </div>
</div>

    </div>

    <div class="row mb-4">
    <!-- Transaksi per Bulan -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="card-title mb-0">Transaksi per Bulan</h5>
            </div>
            <div class="card-body">
                <canvas id="transaksiChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Kas Masuk vs Kas Keluar per Bulan -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="card-title mb-0">Kas Masuk per Bulan</h5>
            </div>
            <div class="card-body">
                <canvas id="kasChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Saldo Bersih Bank per Bulan -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="card-title mb-0">Saldo Bersih Bank per Bulan</h5>
            </div>
            <div class="card-body">
                <canvas id="saldoChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Sampah Masuk vs Terkirim -->
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="card-title mb-0">Sampah Masuk vs Terkirim</h5>
            </div>
            <div class="card-body">
                <canvas id="sampahChart"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row mb-4">
    <div class="col-md-6 mb-4">
        <div class="card shadow-sm">
            <div class="card-header">
                <h5 class="card-title mb-0">Nasabah Aktif vs Tidak Aktif</h5>
            </div>
            <div class="card-body">
                <canvas id="nasabahChart"></canvas>
            </div>
        </div>
    </div>
</div>



@endsection
<style>
    a.text-decoration-none.text-dark:hover {
        text-decoration: none;
        color: inherit;
    }
</style>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Transaksi per Bulan
    new Chart(document.getElementById('transaksiChart'), {
        type: 'line',
        data: {
            labels: {!! json_encode($bulan) !!},
            datasets: [{
                label: 'Jumlah Transaksi',
                data: {!! json_encode($transaksiPerBulan) !!},
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 2,
                fill: true,
                tension: 0.3
            }]
        },
        options: { responsive: true }
    });

    // Kas Masuk vs Keluar per Bulan
    new Chart(document.getElementById('kasChart'), {
        type: 'line',
        data: {
            labels: {!! json_encode($bulan) !!},
            datasets: [
                {
                    label: 'Kas Masuk',
                    data: {!! json_encode($kasMasukPerBulan ?? [0,0,0,0,0,0,0,0,0,0,0,0]) !!},
                    backgroundColor: 'rgba(0,255,0,0.2)',
                    borderColor: 'green',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3
                },
                {
                    label: 'Kas Keluar',
                    data: {!! json_encode($kasKeluarPerBulan ?? [0,0,0,0,0,0,0,0,0,0,0,0]) !!},
                    backgroundColor: 'rgba(255,0,0,0.2)',
                    borderColor: 'red',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3
                }
            ]
        },
        options: { responsive: true }
    });

    // Saldo Bersih Bank per Bulan
    new Chart(document.getElementById('saldoChart'), {
        type: 'line',
        data: {
            labels: {!! json_encode($bulan) !!},
            datasets: [{
                label: 'Saldo Bersih Bank (Rp)',
                data: {!! json_encode($saldoBersihPerBulan ?? [0,0,0,0,0,0,0,0,0,0,0,0]) !!},
                backgroundColor: 'rgba(255,165,0,0.2)',
                borderColor: 'orange',
                borderWidth: 2,
                fill: true,
                tension: 0.3
            }]
        },
        options: { responsive: true }
    });

    // Sampah Masuk vs Terkirim
    new Chart(document.getElementById('sampahChart'), {
        type: 'bar',
        data: {
            labels: {!! json_encode($bulan) !!},
            datasets: [
                {
                    label: 'Sampah Masuk (Kg)',
                    data: {!! json_encode($sampahMasukPerBulan ?? [0,0,0,0,0,0,0,0,0,0,0,0]) !!},
                    backgroundColor: 'rgba(128,0,255,0.5)',
                },
                {
                    label: 'Sampah Terkirim (Kg)',
                    data: {!! json_encode($sampahTerkirimPerBulan ?? [0,0,0,0,0,0,0,0,0,0,0,0]) !!},
                    backgroundColor: 'rgba(255,192,203,0.5)',
                }
            ]
        },
        options: { responsive: true, scales: { y: { beginAtZero: true } } }
    });
});

// Diagram Batang Nasabah
new Chart(document.getElementById('nasabahChart'), {
    type: 'bar',
    data: {
        labels: ['Aktif', 'Tidak Aktif'],
        datasets: [{
            label: 'Jumlah Nasabah',
            data: [{{ $nasabahAktif }}, {{ $nasabahTidakAktif }}],
            backgroundColor: ['#28a745', '#dc3545'],
            borderRadius: 8 // sudut rounded
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false // label di atas bar
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    stepSize: 1
                }
            }
        }
    }
});


</script>
@endpush


