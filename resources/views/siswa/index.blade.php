@extends('layout.layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Siswa di Perpustakaan</h4>
        <a href="{{ route('siswas.create') }}" class="btn btn-success">Tambah Siswa</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Updated At</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td> <!-- Nomor urut -->
                    <td>{{ $data->nis }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->jurusan }}</td>
                    <td>{{ $data->updated_at->format('d-m-Y H:i') }}</td> <!-- Format tanggal -->
                    <td>
                        <a href="{{ route('siswas.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <button onclick="showModalDelete({{ $data->id }}, '{{ $data->nama }}')" type="button" class="btn btn-danger btn-sm">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-end">
        {{ $siswa->links() }} <!-- Pagination -->
    </div>

    <!-- Modal hapus -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form class="modal-content" action="" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Siswa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Apakah Anda yakin ingin menghapus Data Siswa <strong id="name_siswa"></strong>?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">HAPUS</button>
                </div>
            </form>
        </div>
    </div>

    @push('script')
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function showModalDelete(id, name) {
            $('#name_siswa').text(name);
            $('#exampleModal').modal('show');

            const url = "{{ route('siswas.delete', ':id') }}".replace(':id', id);
            $('form').attr('action', url);
        }
    </script>
    @endpush
@endsection
