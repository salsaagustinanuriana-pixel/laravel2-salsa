@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">Edit Pembayaran</div>
                <div class="card-body">
                    <form action="{{ route('pembayarans.update', $pembayaran->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label> Transaksi</label>
                            <input type="text" value="{{ $pembayaran->transaksi->kode_transaksi }}" class="form-control" disabled>
                        </div>

                        <div class="mb-3">
                            <label>Metode Pembayaran</label>
                            <select name="metode" class="form-control @error('metode') is-invalid @enderror">
                                <option value="">-- Pilih Metode --</option>
                                <option value="tunai" {{ old('metode', $pembayaran->metode) == 'tunai' ? 'selected' : '' }}>Tunai</option>
                                <option value="transfer" {{ old('metode', $pembayaran->metode) == 'transfer' ? 'selected' : '' }}>Transfer</option>
                                <option value="qris" {{ old('metode', $pembayaran->metode) == 'qris' ? 'selected' : '' }}>QRIS</option>
                            </select>
                            @error('metode')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Jumlah Bayar</label>
                            <input type="number" step="0.01" name="jumlah_bayar" value="{{ old('jumlah_bayar', $pembayaran->jumlah_bayar) }}" class="form-control @error('jumlah_bayar') is-invalid @enderror">
                            @error('jumlah_bayar')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Update</button>
                        <a href="{{ route('transaksis.show', $pembayaran->transaksi_id) }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

