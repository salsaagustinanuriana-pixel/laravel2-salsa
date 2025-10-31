@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Tambah Detail Transaksi</div>
                <div class="card-body">
                    <form action="{{ route('detail_transaksi.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="">Transaksi</label>
                            <select name="transaksi_id" class="form-control @error('transaksi_id') is-invalid @enderror">
                                <option>-- pilih transaksi --</option>
                                @foreach ($transaksis as $transaksi)
                                <option value="{{ $transaksi->id }}" {{ old('transaksi_id') == $transaksi->id ? 'selected' : ''}}>
                                    {{ $transaksi->kode_transaksi }}
                                </option>
                                @endforeach
                            </select>
                            @error('transaksi_id')
                            <span class="invalid-feedback"> {{ $message }}</span>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for=""> Produk</label>
                            <select name="produk_id" class="form-control @error('produk_id') is-invalid @enderror">
                                <option>-- Pilih Produk --</option>
                                @foreach ($produks as $produk)
                                <option value="{{ $produk->id }}" {{ old('produk_id') == $produk->id ? 'selected' : '' }}>
                                    {{ $produk->nama_produk }}
                                </option>
                                @endforeach
                            </select>
                            @error('produk_id')
                            <span class="invalid-feedback">{{ $message }} </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control @error('jumlah') is-invalid @enderror">
                            @error('jumlah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Harga Satuan</label>
                            <input type="number" name="harga_satuan" class="form-control @error('harga_satuan') is-invalid @enderror">
                            @error('harga_satuan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-block btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
