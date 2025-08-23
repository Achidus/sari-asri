@extends('layouts.app')

@section('title', 'Tambah Banner')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
<div class="container mt-4">

<form action="{{ isset($kas) ? route('admin.kas.update', $kas->id) : route('admin.kas.store', $jenis) }}" method="POST">
    @csrf
    @if(isset($kas))
        @method('PUT')
    @endif

    <div class="card p-4 shadow-sm rounded">
        <h4 class="mb-4">{{ isset($kas) ? 'Edit Kas' : 'Tambah Kas Masuk' }}</h4>
        <div class="row g-3">

            <div class="col-md-6">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" class="form-control"
                       value="{{ isset($kas) ? $kas->tanggal->format('Y-m-d') : \Carbon\Carbon::now()->format('Y-m-d') }}" required>
            </div>

            <div class="col-md-6">
                <label for="sumber_dana" class="form-label">Sumber Dana</label>
                <input type="text" id="sumber_dana" name="sumber_dana" class="form-control" 
                       value="{{ $kas->sumber_dana ?? '' }}" required>
            </div>

            <div class="col-md-6">
                <label for="nominal" class="form-label">Nominal</label>
                <input type="number" id="nominal" name="nominal" class="form-control" 
                       value="{{ $kas->nominal ?? '' }}" required>
            </div>

            <div class="col-12">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea id="keterangan" name="keterangan" class="form-control" rows="3">{{ $kas->keterangan ?? '' }}</textarea>
            </div>

        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-success">{{ isset($kas) ? 'Update' : 'Simpan' }}</button>
        </div>
    </div>
</form>
</div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
