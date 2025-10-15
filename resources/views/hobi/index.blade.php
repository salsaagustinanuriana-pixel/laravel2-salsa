@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Hobi</h2>

    <a href="{{ route('hobi.create') }}" class="btn btn-primary mb-3">Tambah Hobi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Hobi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($hobi as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nama_hobi }}</td>
                <td>
                    <a href="{{ route('hobi.edit', $item->id) }}" class="btn btn-sm btn-success">Edit</a>
                    <a href="{{ route('hobi.show', $item->id) }}" class="btn btn-sm btn-warning">Show</a>
                    <form action="{{ route('hobi.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus hobi ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3">Belum ada data hobi.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
