@extends('layouts.app')

@section('title', 'Nasabah')

@push('style')
<style>
    table thead tr th {
        background-color: #007bff !important; /* biru */
        color: #fff !important;              /* putih */
        text-align: center;
        vertical-align: middle;
    }
</style>
@endpush


@section('main')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Riwayat Pencairan Saldo</h4>
    <a href="{{ route('admin.pencairan_saldo.create') }}" class="btn btn-primary">+ Tambah Pencairan</a>
</div>
<form method="GET" action="{{ route('admin.pencairan_saldo.index') }}" class="mb-3">
    <div class="input-group" style="max-width: 400px;">
        <input type="text" name="search" class="form-control" placeholder="Cari No. Registrasi / Nama Nasabah..."
               value="{{ request('search') }}">
        <div class="input-group-append">
            <button class="btn btn-outline-primary" type="submit">Cari</button>
        </div>
    </div>
</form>

<div class="card">
    <div class="card-body">
        <table class="table table-bordered table-hover">
           <thead>
<tr>
    <th>No</th> <!-- Nomor urut -->
    <th>No. Reg</th>
    <th>Nasabah</th>
    <th>Jumlah</th>
    <th>Metode</th>
    <th>Status</th>
    <th>Tanggal Pengajuan</th>
   <th style="width: 130px;">Aksi</th> <!-- kolom aksi lebih kecil -->

</tr>
</thead>
<tbody>
@forelse($pencairan as $item)
<tr>
    <td>{{ $loop->iteration }}</td> <!-- Nomor urut otomatis -->
    <td>{{ $item->nasabah->no_registrasi }}</td>
    <td>{{ $item->nasabah->nama_lengkap }}</td>
    <td>Rp {{ number_format($item->jumlah_pencairan, 0, ',', '.') }}</td>
    <td>{{ ucfirst($item->metode_pencairan) }}</td>
    <td>
        <span class="badge 
            @if($item->status == 'pending') badge-warning 
            @elseif($item->status == 'disetujui') badge-success 
            @else badge-danger @endif">
            {{ ucfirst($item->status) }}
        </span>
    </td>
    <td>{{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d M Y H:i') }}</td>
   <td>
    <div class="d-flex flex-wrap gap-1"> <!-- gap lebih rapat -->
        <a href="{{ route('admin.pencairan_saldo.edit', $item->id) }}" 
           class="btn btn-warning btn-sm">Edit</a>
        <form action="{{ route('admin.pencairan_saldo.destroy', $item->id) }}" 
              method="POST" 
              onsubmit="return confirm('Yakin hapus data ini?')">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm">Hapus</button>
        </form>
    </div>
</td>

</tr>
@empty
<tr>
    <td colspan="8" class="text-center">Belum ada data</td>
</tr>
@endforelse
</tbody>


        </table>
    </div>
</div>
@endsection
