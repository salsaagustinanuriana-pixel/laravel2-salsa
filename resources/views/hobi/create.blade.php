@extends('layouts.app') {{-- Hapus baris ini jika tidak menggunakan layout utama --}}

@section('content')
<div class="container mt-4">
    <h2>Tambah Hobi Baru</h2>

    <form action="{{ route('hobi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_hobi" class="form-label">Nama Hobi</label>
            <input type="text" name="nama_hobi" class="form-control" value="{{ old('nama_hobi') }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
