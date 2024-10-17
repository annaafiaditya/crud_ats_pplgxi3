@extends('layout.layout')

@section('content')
<div class="container">
    <h1>Tambah Peminjaman</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pinjam.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="number" class="form-control" id="nis" name="nis" required>
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
        </div>

        <div class="mb-3">
            <label for="barang" class="form-label">Barang</label>
            <select class="form-select" id="barang" name="barang" required>
                <option value="">Pilih Barang</option>
                <option value="tablet">Tablet</option>
                <option value="laptop">Laptop</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="waktu" class="form-label">Waktu Peminjaman</label>
            <input type="datetime-local" class="form-control" id="waktu" name="waktu" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('pinjam.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
