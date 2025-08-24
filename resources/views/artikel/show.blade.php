@extends('layouts.frontend')

@section('title', $artikel->judul_postingan)

@section('content')
<div class="container py-5">
    <div class="row align-items-center mb-4">
        <!-- Kiri: Judul + Tanggal -->
        <div class="col-md-7 col-12 mb-3 mb-md-0">
            <p class="text-uppercase text-success fw-bold" 
               style="font-size: 1.1rem; margin-bottom: 0.5rem;">
                BERITA BANK SAMPAH SARI ASRI
            </p>
            <h1 class="fw-bold display-4 mb-3" style="line-height: 1.2;">
                {{ $artikel->judul_postingan }}
            </h1>
            <p class="text-muted small mb-0">{{ $artikel->created_at->format('d M Y') }}</p>
        </div>

        <!-- Kanan: Thumbnail -->
        <div class="col-md-5 col-12 text-center text-md-end">
            @if ($artikel->thumbnail)
                <img src="{{ asset('storage/thumbnail/' . $artikel->thumbnail) }}" 
                     class="img-fluid rounded shadow-sm mb-4"
                     style="max-width: 100%; height: auto; border-radius: 15px;">
            @endif
        </div>
    </div>

    <!-- Full teks artikel dengan jarak dari thumbnail -->
    <div class="row mt-5"> <!-- mt-5 menambahkan margin-top supaya agak jauh -->
        <div class="col-12">
            <div class="artikel-content fs-5 lh-lg">
                {!! $artikel->isi_postingan !!}
            </div>
        </div>
    </div>
</div>
@endsection
