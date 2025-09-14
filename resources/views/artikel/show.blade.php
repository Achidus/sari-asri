@extends('layouts.frontend')

@section('title', $artikel->judul_postingan)

@section('content')
<div class="container py-5">
    <style>
        /* Thumbnail utama */
        .main-thumbnail {
            max-width: 700px;
            width: 100%;
            height: auto;
        }

        /* Gambar tambahan di artikel */
        .media-img {
            max-width: 600px;
            width: 100%;
            height: auto;
            margin-bottom: 20px;
        }

        /* Supaya gambar tidak rusak di layar kecil */
        @media (max-width: 768px) {
            .media-img,
            .main-thumbnail {
                float: none !important;
                margin: 15px auto !important;
                display: block;
                max-width: 100% !important;
            }
        }
    </style>

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
                     class="img-fluid rounded shadow-sm mb-4 main-thumbnail">
            @endif
        </div>
    </div>

    <!-- Full teks artikel dengan gambar disisipkan -->
    <div class="row mt-5">
        <div class="col-12">
            @php
                $words = explode(' ', strip_tags($artikel->isi_postingan));
                $totalWords = count($words);
                $mediaCount = $artikel->media->count();
                $chunkSize = $mediaCount > 0 ? floor($totalWords / ($mediaCount + 1)) : $totalWords;
            @endphp

            <div class="artikel-content fs-5 lh-lg">
                @foreach(range(0, $mediaCount) as $i)
                    {!! implode(' ', array_slice($words, $i * $chunkSize, $chunkSize)) !!}

                    @if($i < $mediaCount)
                        @php $media = $artikel->media[$i]; @endphp
                        <div class="my-4 d-block">
                            <img src="{{ asset('storage/media/' . $media->file_gambar) }}"
                                 class="img-fluid rounded shadow media-img
                                        {{ $i % 2 == 0 ? 'float-md-start me-md-3' : 'float-md-end ms-md-3' }}">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
