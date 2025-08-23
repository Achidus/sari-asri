@extends('layouts.app')

@section('title', 'Hapus Banner')

@section('main')
<div class="card">
    <div class="card-body">
        <h3>Hapus Banner</h3>
        <p>Apakah Anda yakin ingin menghapus banner: <strong>{{ $banner->nama_banner }}</strong>?</p>
        
        <form action="{{ route('admin.banner.destroy', $banner->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Ya, Hapus</button>
            <a href="{{ route('admin.banner.index') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</div>
@endsection
