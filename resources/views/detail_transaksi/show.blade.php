@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Detail Transaksi {{ $detailTransaksi->id }}</h2>

    <div class="card">
        <div class="card-body">
            <p><strong>Kode Transaksi:</strong> {{ $detailTransaksi->transaksi->kode_transaksi ?? '-' }}</p>
            <p><strong>Tanggal Transaksi:</strong> {{ $detailTransaksi->transaksi->tanggal ?? '-' }}</p>
            <p><strong>Produk:</strong> {{ $detailTransaksi->produk->nama ?? '-' }}</p>
            <p><strong>Harga Produk:</strong> Rp {{ number_format($detailTransaksi->produk->harga ?? 0, 0, ',', '.') }}</p>
            <p><strong>Jumlah:</strong> {{ $detailTransaksi->jumlah }}</p>
            <p><strong>Subtotal:</strong> Rp {{ number_format($detailTransaksi->subtotal, 0, ',', '.') }}</p>
        </div>
    </div>

    <a href="{{ route('detail_transaksi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
