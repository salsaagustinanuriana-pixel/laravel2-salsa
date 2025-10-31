@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Edit Transaksi</div>
                <div class="card-body">
                    <form action="{{ route('transaksis.update', $transaksi) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label>Kode Transaksi</label>
                            <input type="text" name="kode_transaksi" value="{{ old('kode_transaksi', $transaksi->kode_transaksi) }}" class="form-control @error('kode_transaksi') is-invalid @enderror">
                            @error('kode_transaksi')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" value="{{ old('tanggal', $transaksi->tanggal) }}" class="form-control @error('tanggal') is-invalid @enderror">
                            @error('tanggal')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Pelanggan</label>
                            <select name="pelanggan_id" class="form-control @error('pelanggan_id') is-invalid @enderror">
                                <option value="">-- Pilih Pelanggan --</option>
                                @foreach ($pelanggans as $pelanggan)
                                <option value="{{ $pelanggan->id }}" {{ old('pelanggan_id', $transaksi->pelanggan_id) == $pelanggan->id ? 'selected' : '' }}>
                                    {{ $pelanggan->nama }}
                                </option>
                                @endforeach
                            </select>
                            @error('pelanggan_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Total Harga</label>
                            <input type="number" step="0.01" name="total_harga" value="{{ old('total_harga', $transaksi->total_harga) }}" class="form-control @error('total_harga') is-invalid @enderror">
                            @error('total_harga')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('transaksis.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
