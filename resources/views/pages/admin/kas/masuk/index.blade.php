@extends('layouts.app')
@section('title', 'Kas ' . ucfirst($jenis))

@section('main')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h2 class="fw-bold">Kas {{ ucfirst($jenis) }}</h2>
        <p class="text-muted">Anda dapat mengelola semua data kas, seperti menambah, mengedit, dan menghapus.</p>
    </div>
    <div>
        <a href="{{ route('admin.kas.create', $jenis) }}" class="btn btn-primary">Tambah Kas</a>
    </div>
</div>

<!-- Kotak Total Kas Masuk -->
<div class="row mb-4">
    <div class="col-md-4">
        <div class="card text-white bg-success shadow-sm">
            <div class="card-body text-center">
                <h5 class="card-title">Total Kas Masuk</h5>
                <h3 class="card-text">Rp{{ number_format($kas->sum('nominal'), 0, ',', '.') }}</h3>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="" method="GET" class="mb-3 d-flex">
            <input type="text" name="search" class="form-control me-2" placeholder="Cari sumber dana atau keterangan" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Cari</button>
        </form>

        <table class="table table-striped table-hover">
            <thead class="table-primary">
                <tr>
                    <th>#</th>
                    <th>Tanggal</th>
                    <th>Sumber Dana</th>
                    <th>Keterangan</th>
                    <th>Nominal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($kas as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->tanggal ? $item->tanggal->format('d-m-Y') : '-' }}</td>
                    <td>{{ $item->sumber_dana }}</td>
                    <td>{{ $item->keterangan }}</td>
                    <td>Rp{{ number_format($item->nominal, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('admin.kas.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admin.kas.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus data?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Data kas kosong</td>
                </tr>
                @endforelse
            </tbody>
        </table>

        {{ $kas->links() }}
    </div>
</div>
@endsection
