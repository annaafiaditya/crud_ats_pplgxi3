@extends('layout.layout')

@section('content')
<div class="container">
    <h1 class="mb-4">Data Peminjaman</h1>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('pinjam.create') }}" class="btn btn-primary">Tambah Peminjaman</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama</th>
                <th>Barang</th>
                <th>Waktu Peminjaman</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($pinjam as $item)
                <tr>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ ucfirst($item->barang) }}</td> <!-- Capitalize first letter of barang -->
                    <td>{{ $item->waktu }}</td> <!-- Format waktu -->
                    <td>
                        <a href="{{ route('pinjam.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pinjam.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data peminjaman.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        {{ $pinjam->links() }} <!-- Pagination links -->
    </div>
</div>
@endsection
