@extends('layout.layout')

@section('content')
    <div class="container">
        <h4 class="mb-4">Login ke Perpustakaan</h4>

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nis" class="form-label">Nis</label>
                <input type="nis" name="nis" id="nis" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="nama" name="nama" id="nama" class="form-control" required>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Ingat Saya</label>
            </div>

            <button type="submit" class="btn btn-primary">Login</button>
        </form>
        <p class="mt-3">Belum punya akun? <a href="{{ route('siswas.create') }}">Daftar</a></p>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
@endsection
