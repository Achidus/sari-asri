@extends('layouts.app')

@section('title', 'Permintaan Admin')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Permintaan Admin</h3>
            <h6 class="op-7 mb-2">Di sini Anda dapat mengelola permintaan admin, menyetujui, menolak, atau mengubah sistem persetujuan.</h6>
        </div>
    </div>

    <!-- Tombol Aktif / Non Aktif -->
    <div class="mb-4">
        <form action="{{ route('petugas.toggle-permission') }}" method="POST">
            @csrf
            <div class="form-check form-switch big-switch">
                <input type="checkbox" class="form-check-input" id="requirePermission"
                    name="require_permission" onchange="this.form.submit()"
                    {{ $setting && $setting->require_permission ? 'checked' : '' }}>
                <label class="form-check-label fw-bold ms-2" for="requirePermission">
                    {{ $setting && $setting->require_permission ? 'Aktif' : 'Non Aktif' }}
                </label>
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered table-head-bg-primary">
                           <thead>
    <tr>
        <th>Admin</th>
       
        <th>Aksi</th>
        <th>Tabel</th>
        <th>ID Data</th>
        <th>Status</th>
        <th style="width: 200px">Opsi</th>
    </tr>
</thead>

                            <tbody>
                                @forelse ($permissions as $p)
                                    <tr>
                                     <td>{{ $p->petugas?->nama ?? '-' }}</td>





                                        <td>{{ $p->action }}</td>
                                        {{-- Kolom Tabel --}}
<td>
    @if ($p->table_name === 'kas')
        @php
            $kas = \App\Models\Kas::find($p->record_id);
        @endphp
        {{ $kas ? 'Kas ' . ucfirst($kas->jenis) : 'Kas' }}
    @elseif ($p->table_name === 'artikel')
        Artikel
    @elseif ($p->table_name === 'nasabah')
        Nasabah
    @else
        {{ ucfirst($p->table_name) }}
    @endif
</td>


{{-- Kolom ID Data --}}
<td>{{ $p->row_number }}</td>







                                        <td>
                                            @if ($p->status === 'approved')
                                                <span class="badge bg-success text-white">Disetujui</span>
                                            @elseif ($p->status === 'rejected')
                                                <span class="badge bg-danger text-white">Ditolak</span>
                                            @else
                                                <span class="badge bg-warning text-dark">Pending</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-start">
                                                <form method="POST"
                                                    action="{{ route('petugas.permissions.approve', $p->id) }}"
                                                    class="me-2">
                                                    @csrf
                                                    <button class="btn btn-success btn-sm">
                                                        <i class="fas fa-check"></i> Setujui
                                                    </button>
                                                </form>
                                                <form method="POST"
                                                    action="{{ route('petugas.permissions.reject', $p->id) }}">
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fas fa-times"></i> Tolak
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">
                                            <div class="text-center">
                                                Belum ada permintaan admin.
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

{{-- Custom CSS --}}
<style>
    .big-switch .form-check-input {
        width: 3rem;
        height: 1.5rem;
    }

    .big-switch .form-check-label {
        font-size: 1.1rem;
    }
</style>

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
