@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Detail Pembayaran
                    <a href="{{ route('transaksis.index') }}" class="btn btn-sm btn-outline-secondary float-end">Kembali</a>
                </div>

                <div class="card-body">
                    <table class="table table-borderless">
                        <tr>
                            <th>Kode Transaksi</th>
                            <td>{{ $pembayaran->transaksi->kode_transaksi }}</td>
                        </tr>
                        <tr>
                            <th>Metode Pembayaran</th>
                            <td>{{ $pembayaran->metode }}</td>
                        </tr>
                        <tr>
                            <th>Jumlah Bayar</th>
                            <td>Rp{{ number_format($pembayaran->jumlah_bayar, 2, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Kembalian</th>
                            <td>
                                Rp{{ number_format($pembayaran->jumlah_bayar - $pembayaran->transaksi->total_harga, 2 , ',', '.') }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

