@extends('layouts.app') {{-- Hapus baris ini jika tidak menggunakan layout utama --}}

@section('content')
<div class="container mt-4">
    <h2>Edit Hobi</h2>

    <form action="{{ route('hobi.update', $hobi->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nama_hobi" class="form-label">Nama Hobi</label>
            <input type="text" name="nama_hobi" class="form-control" value="{{ old('nama_hobi', $hobi->nama_hobi) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('hobi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

