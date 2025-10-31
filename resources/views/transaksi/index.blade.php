@extends('layouts.app')
@section('content')
<div class="content">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-start">Data Transaksi</div>
                        <div class="float-end">
                            <a href="{{ route('transaksis.create') }}" class="btn btn-sm btn-outline-primary">Tambah Transaksi</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Pelanggan</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @forelse ($transaksis as $transaksi)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $transaksi->kode_transaksi }}</td>
                                        <td>{{ \Carbon\Carbon::parse($transaksi->tanggal)->format('d-m-Y') }}</td>
                                        <td>{{ $transaksi->pelanggan->nama ?? '-' }}</td>
                                        <td>Rp {{ number_format($transaksi->total_harga, 2, ',', '.') }}</td>
                                        <td>
                                            <form action="{{ route('transaksis.destroy', $transaksi->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a href="{{ route('transaksis.show', $transaksi->id) }}" class="btn btn-sm btn-outline-dark">Show</a>
                                                <a href="{{ route('transaksis.edit', $transaksi->id) }}" class="btn btn-sm btn-outline-success">Edit</a>
                                                <button type="submit" onclick="return confirm('Yakin ingin hapus transaksi ini?');" class="btn btn-sm btn-outline-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            Belum ada transaksi
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
