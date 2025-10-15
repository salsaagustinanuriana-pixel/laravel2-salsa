@extends('layouts.app') {{-- Hapus baris ini jika tidak menggunakan layout utama --}}

@section('content')
<div class="container mt-4">
    <h2>Detail Dosen</h2>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $dosen->nama }}</h5>
            <p class="card-text"><strong>NIPD:</strong> {{ $dosen->nipd }}</p>
        </div>
    </div>
    <a href="{{ route('dosen.index') }}" class="btn btn-secondary mt-3">← Kembali ke Daftar Dosen</a>
</div>
@endsection
