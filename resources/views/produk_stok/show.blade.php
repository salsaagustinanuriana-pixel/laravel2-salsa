@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Detail Produk</div>
                <div class="card-body">
                    <p><strong>Nama Produk:</strong> {{ $produk->nama_produk }}</p>
                    <p><strong>Harga:</strong> Rp{{ number_format($produk->harga, 2, ',', '.') }}</p>
                    <p><strong>Stok:</strong> {{ $produk->stok }}</p>
                    <a href="{{ route('produk-stok.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
