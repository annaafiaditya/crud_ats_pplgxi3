@extends('layout.layout')

@section('content')
<h4 class="mb-4">Tambah Siswa</h4>

<form action="{{ route('siswas.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="nis" class="form-label">NIS</label>
        <input type="number" name="nis" id="nis" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <select class="form-select" name="jurusan" id="jurusan" required>
            <option selected disabled hidden>-- Pilih Jurusan --</option>
            <option value="pplg">Program Keahlian (PPLG)</option>
            <option value="dkv">Desain Komunikasi Visual (DKV)</option>
            <option value="tjkt">Teknik Jaringan Komputer (TJKT)</option>
        </select>
        <div class="form-text">Pilih jurusan sesuai dengan keahlian yang diinginkan.</div>
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@endsection
