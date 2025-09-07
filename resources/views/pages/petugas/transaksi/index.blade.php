@extends('layouts.app')

@section('title', 'Daftar Transaksi')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Transaksi</h3>
            <h6 class="op-7 mb-2">
                Anda dapat mengelola semua transaksi, seperti mengedit, menghapus, dan lainnya.
            </h6>
        </div>
        
    </div>

    {{-- Form Pencarian --}}
    <form action="{{ route('petugas.transaksi.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" name="search" class="form-control" placeholder="Cari nama, no HP, atau no registrasi"
            value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">
            <i class="fas fa-search"></i> Cari
        </button>
    </div>
</form>




    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="clearfix mb-3"></div>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-head-bg-primary">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tanggal Setoran</th>
                                    <th>Nama Nasabah</th>
                                    <th>Berat (kg)</th>
                                    <th>Total (Rp)</th>
                                    <th>Keuntungan 25%</th> {{-- Tambahan --}}
        <th>Saldo Bersih Nasabah</th> {{-- Tambahan --}}

                                    <th style="width: 250px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($transaksis as $index => $transaksi)
                                    @php
        $totalTransaksi = $transaksi->total_transaksi ?? $transaksi->detailTransaksi->sum('harga_total');
        $keuntungan = $totalTransaksi * 0.25;
        $saldoBersih = $totalTransaksi * 0.75;
    @endphp
    <tr>
        <td>{{ $transaksis->firstItem() + $index }}</td>
        <td>{{ \Carbon\Carbon::parse($transaksi->tanggal_transaksi)->format('d-m-Y') }}</td>
        <td>{{ $transaksi->nasabah->nama_lengkap }}</td>
        <td>{{ number_format($transaksi->total_berat, 2, ',', '.') }}</td>
        <td>Rp{{ number_format($totalTransaksi, 0, ',', '.') }}</td>
        <td>Rp{{ number_format($keuntungan, 0, ',', '.') }}</td> {{-- Tambahan --}}
        <td>Rp{{ number_format($saldoBersih, 0, ',', '.') }}</td> {{-- Tambahan --}}
        <td>

                                            <div class="row row-cols-2 g-1">
                                                <div class="col">
                                                    <a href="{{ route('petugas.transaksi.show', $transaksi->id) }}" class="btn btn-sm btn-info w-100">
                                                        <i class="fas fa-info-circle"></i> Detail
                                                    </a>
                                                </div>
                                                
                                                <div class="col">
                                                    <a href="{{ route('petugas.transaksi.print', $transaksi->id) }}" class="btn btn-sm btn-secondary w-100">
                                                        <i class="fas fa-print"></i> Cetak
                                                    </a>
                                                </div>
                                                
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="text-center">Belum ada transaksi.</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="float-right">
                        {{ $transaksis->withQueryString()->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@push('scripts')
    <!-- JS Libraries -->
@endpush
