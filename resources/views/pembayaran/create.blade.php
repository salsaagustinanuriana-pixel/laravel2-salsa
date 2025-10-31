@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Tambah Data Pembayaran</div>
                <div class="card-body">
                    <form action="{{ route('pembayarans.store') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="">Transaksi</label>
                            <select name="transaksi_id" class="form-control @error('transaksi_id') is-invalid @enderror">
                                <option>-- pilih --</option>
                                @foreach ($transaksis as $transaksi)
                                <option value="{{ $transaksi->id }}" {{ old('transaksi_id') == $transaksi->id ? 'selected' : '' }}>
                                    {{ $transaksi->kode_transaksi }} - Rp{{ number_format($transaksi->total_harga, 2) }}
                                </option>
                                @endforeach
                            </select>
                            @error('transaksi_id')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Metode Pembayaran</label>
                            <input type="text" name="metode" value="{{ old('metode') }}" class="form-control @error('metode') is-invalid @enderror" placeholder="cash / transfer">
                            @error('metode')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="">Jumlah Bayar</label>
                            <input type="number" step="0.01" name="jumlah_bayar" value="{{ old('jumlah_bayar') }}" class="form-control @error('jumlah_bayar') is-invalid @enderror">
                            @error('jumlah_bayar')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                            <a href="{{ route('pembayarans.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
