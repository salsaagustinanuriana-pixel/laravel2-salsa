@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Tambah Produk</div>
                <div class="card-body">
                    <form action="{{ route('produk-stok.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label>Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control @error('nama_produk') is-invalid @enderror">
                            @error('nama_produk')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Harga</label>
                            <input type="number" step="0.01" name="harga" class="form-control @error('harga') is-invalid @enderror">
                            @error('harga')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Stok</label>
                            <input type="number" name="stok" class="form-control @error('stok') is-invalid @enderror">
                            @error('stok')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
