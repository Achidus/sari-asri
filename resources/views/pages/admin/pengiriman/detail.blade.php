@extends('layouts.app')

@section('title', 'Detail Pengiriman Sampah')

@push('style')
    <!-- Tambahkan CSS jika diperlukan -->
@endpush

@section('main')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Detail Pengiriman Sampah</h3>
            <h6 class="op-7 mb-2">Halaman ini menampilkan informasi lengkap pengiriman ke pengepul.</h6>
        </div>
        <div class="ms-md-auto mt-3 mt-md-0">
            <a href="{{ route('admin.pengiriman.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>

    <!-- Informasi Pengiriman -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Informasi Pengiriman</div>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <td><strong>Kode Pengiriman</strong></td>
                            <td>:</td>
                            <td>{{ $pengiriman->kode_pengiriman }}</td>
                        </tr>
                        <tr>
                            <td><strong>Tanggal Pengiriman</strong></td>
                            <td>:</td>
                            <td>{{ \Carbon\Carbon::parse($pengiriman->tanggal_pengiriman)->format('d-m-Y H:i') }}</td>
                        </tr>
                        <tr>
                            <td><strong>Nama Pengepul</strong></td>
                            <td>:</td>
                            <td>{{ $pengiriman->pengepul->nama }}</td>
                        </tr>
                        <tr>
                            <td><strong>No HP Pengepul</strong></td>
                            <td>:</td>
                           <td>{{ $pengiriman->pengepul->kontak ?? '-' }}</td>

                        </tr>
                        <tr>
    <td><strong>Total Berat</strong></td>
    <td>:</td>
    <td>{{ $totalBerat }} kg</td> {{-- gunakan variabel totalBerat --}}
</tr>
<tr>
    <td><strong>Jumlah Jenis Sampah</strong></td>
    <td>:</td>
    <td>{{ $jumlahJenisSampah }}</td> {{-- gunakan variabel jumlahJenisSampah --}}
</tr>

                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Detail Sampah Dikirim -->
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Detail Sampah Dikirim</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-head-bg-primary">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Sampah</th>
                                    <th>Berat (kg)</th>
                                    <th>Harga/Kg</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($detailPengiriman as $index => $detail)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $detail->sampah->nama_sampah }}</td>
                                        <td>{{ $detail->berat_kg }}</td>
                                        <td>Rp{{ number_format($detail->harga_per_kg, 2) }}</td>
                                        <td>Rp{{ number_format($detail->harga_total, 2) }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="text-center">Tidak ada detail sampah dikirim.</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Tambahkan JS jika perlu -->
@endpush
