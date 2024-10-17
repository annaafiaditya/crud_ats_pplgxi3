@extends('layout.layout')

@section('content')
<div class="container">
    <h1>Edit Peminjaman</h1>

    <form action="{{ route('pinjam.update', $pinjam->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="number" class="form-control" id="nis" name="nis" value="{{ old('nis', $pinjam->nis) }}" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $pinjam->nama) }}" required>
        </div>

        <div class="mb-3">
            <label for="barang" class="form-label">Barang</label>
            <select class="form-select" id="barang" name="barang" required>
                <option value="">Pilih Barang</option>
                <option value="tablet" {{ $pinjam->barang == 'tablet' ? 'selected' : '' }}>Tablet</option>
                <option value="laptop" {{ $pinjam->barang == 'laptop' ? 'selected' : '' }}>Laptop</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="waktu" class="form-label">Waktu Peminjaman</label>
            <input type="datetime-local" class="form-control" id="waktu" name="waktu" value="{{ old('waktu', $pinjam->waktu) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('pinjam.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
