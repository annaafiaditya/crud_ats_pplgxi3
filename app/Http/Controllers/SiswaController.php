<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    function index(Request $request) {
        $siswa = Siswa::orderBy('nama', 'ASC')->simplePaginate(5);
        return view('siswa.index', compact('siswa'));
    }
    
    function create() {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|numeric',
            'nama' => 'required|max:100',
            'jurusan' => 'required|min:3',
        ], [
            'nis.required' => 'NIS Pengguna harus diisi!',
            'nama.required' => 'Nama Pengguna harus diisi!',
            'jurusan.required' => 'Jurusan harus diisi!',
            'nama.max' => 'Nama maksimal 100 karakter!',
            'jurusan.min' => 'Jurusan minimal 3 karakter!',
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
        ]);

        return redirect()->route('siswas.index')->with('success', 'Berhasil Menambah Data Siswa!');
    }

    function edit(Siswa $siswa) {
        return view('siswa.edit', compact('siswa'));
    }

    function update(Request $request, Siswa $siswa) {
        $request->validate([
            'nis' => 'required|numeric',
            'nama' => 'required|max:100',
            'jurusan' => 'required',
        ], [
            'nis.required' => 'NIS Pengguna harus diisi!',
            'nama.required' => 'Nama Pengguna harus diisi!',
            'jurusan.required' => 'Jurusan harus diisi!',
            'nama.max' => 'Nama maksimal 100 karakter!',
        ]);

        $siswa->update([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
        ]);

        return redirect()->route('siswas.index')->with('success', 'Berhasil Mengubah Data Siswa!');
    }

    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->back()->with('success', 'Berhasil menghapus data siswa');
    }

    public function showLogin()
    {
        return view('pages.login'); // Sesuaikan dengan path view Anda
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->remember)) {
            return redirect()->intended('home');
        }

        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ]);
    }
}
