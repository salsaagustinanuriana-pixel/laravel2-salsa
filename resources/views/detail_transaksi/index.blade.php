@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Detail Transaksi') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('detail_transaksi.create') }}" class="btn btn-sm btn-outline-primary">Tambah Detail</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Transaksi</th>
                                    <th>Nama Produk</th>
                                    <th>Jumlah</th>
                                    <th>Subtotal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($detailTransaksis as $detail)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $detail->transaksi->kode_transaksi ?? '-' }}</td>
                                    <td>{{ $detail->produk->nama_produk ?? '-' }}</td>
                                    <td>{{ $detail->jumlah }}</td>
                                    <td>Rp {{ number_format($detail->subtotal, 2, ',', '.') }}</td>
                                    <td>
                                        <form action="{{ route('detail_transaksi.index', $detail->id) }}" method="POST">

                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('detail_transaksi.show', $detail->id) }}" class="btn btn-sm btn-outline-dark">Show</a> |
                                            <a href="{{ route('detail_transaksi.edit', $detail->id) }}" class="btn btn-sm btn-outline-success">Edit</a> |
                                            <button type="submit" onclick="return confirm('Yakin ingin hapus?');" class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Data belum tersedia</td>
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
@endsection
