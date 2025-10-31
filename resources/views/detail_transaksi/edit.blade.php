@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Detail Transaksi</h2>

    <form action="{{ route('detail_transaksi.update', $detailTransaksi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="transaksi_id" class="form-label">Transaksi</label>
            <select name="transaksi_id" id="transaksi_id" class="form-select" required>
                @foreach($transaksis as $transaksi)
                <option value="{{ $transaksi->id }}" {{ $detailTransaksi->transaksi_id == $transaksi->id ? 'selected' : '' }}>
                    {{ $transaksi->kode_transaksi }} - {{ $transaksi->tanggal }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="produk_id" class="form-label">Produk</label>
            <select name="produk_id" id="produk_id" class="form-select" required>
                @foreach($produks as $produk)
                <option value="{{ $produk->id }}" {{ $detailTransaksi->produk_id == $produk->id ? 'selected' : '' }}>
                    {{ $produk->nama }} (Rp {{ number_format($produk->harga, 0, ',', '.') }})
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $detailTransaksi->jumlah }}" min="1" required>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('detail_transaksi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

