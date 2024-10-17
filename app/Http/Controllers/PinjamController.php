<?php

namespace App\Http\Controllers;

use App\Models\Pinjam;
use Illuminate\Http\Request;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pinjam = Pinjam::orderBy('nama', 'ASC')->simplePaginate(5);
        return view('pinjam.index', compact('pinjam'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pinjam.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|integer',
            'nama' => 'required|string|max:100',
            'barang' => 'required',
            'waktu' => 'required|date',
        ]);

        Pinjam::create($request->all());

        return redirect()->route('pinjam.index')->with('success', 'Data peminjaman berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pinjam $pinjam)
    {
        return view('pinjam.show', compact('pinjam'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pinjam $pinjam)
    {
        return view('pinjam.edit', compact('pinjam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pinjam $pinjam)
    {
        $request->validate([
            'nis' => 'required|integer',
            'nama' => 'required|string|max:100',
            'barang' => 'required',
            'waktu' => 'required|date',
        ]);

        $pinjam->update($request->all());

        return redirect()->route('pinjam.index')->with('success', 'Data peminjaman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pinjam $pinjam)
    {
        $pinjam->delete();

        return redirect()->route('pinjam.index')->with('success', 'Data peminjaman berhasil dihapus.');
    }
}
