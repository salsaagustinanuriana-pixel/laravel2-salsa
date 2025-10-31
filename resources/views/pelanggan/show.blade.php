@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-3">
        <div class="col-md-6">
            <h4 class="fw-bold">Detail Pelanggan</h4>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>

    <div class="card border-dark">
        <div class="card-body">
            <div class="mb-2 d-flex">
                <strong class="me-2">Nama:</strong>
                <span>{{ $pelanggan->nama }}</span>
            </div>
            <div class="mb-2 d-flex">
                <strong class="me-2">No HP:</strong>
                <span>{{ $pelanggan->no_hp }}</span>
            </div>
            <div class="mb-2 d-flex">
                <strong class="me-2">Alamat:</strong>
                <span>{{ $pelanggan->alamat }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
