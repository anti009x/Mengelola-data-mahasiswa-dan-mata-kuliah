<?php

namespace App\Http\Controllers;

use App\Models\DataMataKuliah;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
class DataMataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mata_kuliahs = DataMataKuliah::all();
        return view('mata_kuliahs.index', compact('mata_kuliahs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mata_kuliahs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_mata_kuliah' => 'required|string|max:255',
            'kode_mata_kuliah' => 'required|string|unique:data_mata_kuliahs,kode_mata_kuliah',
            'sks' => 'required|integer',
            'semester' => 'required|string|max:100',
            'nama_dosen' => 'required|string|max:255',
        ]);

        DataMataKuliah::create($request->all());

        return redirect()->route('mata_kuliahs.index')
                         ->with('success', 'Mata Kuliah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataMataKuliah $dataMataKuliah)
    {
 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataMataKuliah $dataMataKuliah)
    {
        return view('mata_kuliahs.edit', compact('dataMataKuliah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataMataKuliah $dataMataKuliah)
    {
        $request->validate([
            'nama_mata_kuliah' => 'required|string|max:255',
            'kode_mata_kuliah' => 'required|string|unique:data_mata_kuliahs,kode_mata_kuliah,' . $dataMataKuliah->id,
            'sks' => 'required|integer',
            'semester' => 'required|string|max:100',
            'nama_dosen' => 'required|string|max:255',

        ]);

        $dataMataKuliah->update($request->all());

        return redirect()->route('mata_kuliahs.index')
                         ->with('success', 'Mata Kuliah berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataMataKuliah $dataMataKuliah)
    {
        $dataMataKuliah->delete();

        return redirect()->route('mata_kuliahs.index')
                         ->with('success', 'Mata kuliah berhasil dihapus.');
    }


}
