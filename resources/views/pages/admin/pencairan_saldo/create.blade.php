@extends('layouts.app')

@section('title', 'Nasabah')

@push('style')
<style>
   .floating-alert {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    min-width: 350px;
    padding: 25px 40px;
    font-size: 1.5rem;
    text-align: center;
    border-radius: 15px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.3);
    z-index: 9999;
    opacity: 0;
    animation: fadeInOut 4s forwards;
}

@keyframes fadeInOut {
    0% { opacity: 0; transform: translate(-50%, -60%); }
    10% { opacity: 1; transform: translate(-50%, -50%); }
    90% { opacity: 1; transform: translate(-50%, -50%); }
    100% { opacity: 0; transform: translate(-50%, -40%); }
}

</style>
@endpush

@section('main')

@if(session('error'))
    <div class="floating-alert alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@if(session('success'))
    <div class="floating-alert alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif



<div class="card">
    <div class="card-header">
        <h4>Tambah Pencairan Saldo</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.pencairan_saldo.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nasabah</label>
                <select name="nasabah_id" class="form-control" required>
                    <option value="">-- Pilih Nasabah --</option>
                    @foreach($nasabah as $n)
                        <option value="{{ $n->id }}">
                            {{ $n->nama_lengkap }} 
                            (Saldo: Rp {{ number_format(optional($n->saldo)->saldo ?? 0, 0, ',', '.') }})
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>Jumlah Pencairan</label>
                <input type="number" name="jumlah_pencairan" class="form-control" min="1000" required>
            </div>

            <div class="form-group">
    <label>Metode Pencairan</label>
    <select name="metode_pencairan" class="form-select" required>
        <option value="Tarik Tunai">Tarik Tunai</option>
        <option value="Transfer">Transfer</option>
    </select>
</div>


            <div class="form-group">
                <label>Nomor Rekening (Jika Transfer)</label>
                <input type="text" name="nomor_rekening" class="form-control">
            </div>

            <div class="form-group">
    <label>Status</label>
    <select name="status" class="form-select" required>
        <option value="pending">Pending</option>
        <option value="disetujui">Disetujui</option>
        <option value="ditolak">Ditolak</option>
    </select>
</div>


            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.pencairan_saldo.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
