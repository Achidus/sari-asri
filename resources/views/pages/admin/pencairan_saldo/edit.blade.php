@extends('layouts.app')

@section('title', 'Nasabah')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
<div class="card">
    <div class="card-header">
        <h4>Edit Pencairan Saldo</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.pencairan_saldo.update', $pencairan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nasabah</label>
                <select name="nasabah_id" class="form-control" required>
                    @foreach($nasabah as $n)
                        <option value="{{ $n->id }}" {{ $n->id == $pencairan->nasabah_id ? 'selected' : '' }}>
                           {{ $n->nama_lengkap }} (Saldo: Rp {{ number_format($n->sisa_saldo, 0, ',', '.') }})

                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Jumlah Pencairan</label>
                <input type="number" name="jumlah_pencairan" class="form-control" min="1000" 
                       value="{{ $pencairan->jumlah_pencairan }}" required>
            </div>

            <div class="form-group">
    <label>Metode Pencairan</label>
    <select name="metode_pencairan" class="form-select" required>
        <option value="Tarik Tunai" {{ $pencairan->metode_pencairan == 'Tarik Tunai' ? 'selected' : '' }}>Tarik Tunai</option>
        <option value="Transfer" {{ $pencairan->metode_pencairan == 'Transfer' ? 'selected' : '' }}>Transfer</option>
    </select>
</div>


            <div class="form-group">
                <label>Nomor Rekening (Jika Transfer)</label>
                <input type="text" name="nomor_rekening" class="form-control" 
                       value="{{ $pencairan->nomor_rekening }}">
            </div>

            
<div class="form-group">
    <label for="status">Status</label>
    <select name="status" id="status" class="form-select" required>
        <option value="pending" {{ $pencairan->status == 'pending' ? 'selected' : '' }}>Pending</option>
        <option value="disetujui" {{ $pencairan->status == 'disetujui' ? 'selected' : '' }}>Disetujui</option>
        <option value="ditolak" {{ $pencairan->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
    </select>
</div>


            <button type="submit" class="btn btn-success">Update</button>
            <a href="{{ route('admin.pencairan_saldo.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
