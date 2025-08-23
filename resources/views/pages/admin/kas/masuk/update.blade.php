@extends('layouts.app')

@section('title', 'Tambah Banner')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')

<form action="{{ isset($kas) ? route('admin.kas.update', $kas->id) : route('admin.kas.store', $jenis) }}" method="POST">
    @csrf
    @if(isset($kas))
        @method('PUT')
    @endif
<div class="mb-3">
        <h4 class="fw-bold">Edit Kas Masuk</h4>
    </div>

    <div class="mb-3">
        <label>Tanggal</label>
       <input type="date" name="tanggal" class="form-control"
       value="{{ isset($kas) && $kas->tanggal ? $kas->tanggal->format('Y-m-d') : \Carbon\Carbon::now()->format('Y-m-d') }}" required>

    </div>

    <div class="mb-3">
        <label>Sumber Dana</label>
        <input type="text" name="sumber_dana" class="form-control" value="{{ $kas->sumber_dana ?? '' }}" required>
    </div>

    <div class="mb-3">
        <label>Keterangan</label>
        <textarea name="keterangan" class="form-control">{{ $kas->keterangan ?? '' }}</textarea>
    </div>

    <div class="mb-3">
        <label>Nominal</label>
        <input type="number" name="nominal" class="form-control" value="{{ $kas->nominal ?? '' }}" required>
    </div>

    <button type="submit" class="btn btn-success">{{ isset($kas) ? 'Update' : 'Simpan' }}</button>
</form>

@endsection

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush
