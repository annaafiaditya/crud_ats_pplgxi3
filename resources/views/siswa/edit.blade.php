@extends('layout.layout')

@section('content')
<h4 class="mb-4">Edit Siswa</h4>

<form action="{{ route('siswas.store') }}" method="post">
    @csrf
    <div class="mb-3">
        <label for="nis" class="form-label">NIS</label>
        <input type="number" name="nis" id="nis" class="form-control" required value="{{ old('nis', $siswa->nis) }}">
        @error('nis')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama', $siswa->nama) }}">
        @error('nama')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="jurusan" class="form-label">Jurusan</label>
        <select class="form-select @error('jurusan') is-invalid @enderror" id="jurusan" name="jurusan">
            <option value="pplg" {{ $siswa->jurusan == 'pplg' ? 'selected' : '' }}>Program Keahlian (PPLG)</option>
            <option value="dkv" {{ $siswa->jurusan == 'dkv' ? 'selected' : '' }}>Desain Komunikasi Visual (DKV)</option>
            <option value="tjkt" {{ $siswa->jurusan == 'tjkt' ? 'selected' : '' }}>Teknik Jaringan Komputer (TJKT)</option>
        </select>
        @error('jurusan')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
@endsection
