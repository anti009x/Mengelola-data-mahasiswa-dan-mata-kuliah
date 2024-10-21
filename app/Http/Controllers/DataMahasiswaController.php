<?php

namespace App\Http\Controllers;

use App\Models\DataMahasiswa;
use Illuminate\Http\Request;
use App\Models\DataMataKuliah;
class DataMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = DataMahasiswa::all();
        $mahasiswas->transform(function ($mahasiswa) {
            $mata_kuliah_details = [];
            $mata_kuliah_nama_list = json_decode($mahasiswa->nama_mata_kuliah);
            if (is_array($mata_kuliah_nama_list)) {
                foreach ($mata_kuliah_nama_list as $nama_mata_kuliah) {
                    $mata_kuliah = DataMataKuliah::where('nama_mata_kuliah', $nama_mata_kuliah)->first();
                    if ($mata_kuliah) {
                        $mata_kuliah_details[] = [
                            'id' => $mata_kuliah->id,
                            'nama_mata_kuliah' => $mata_kuliah->nama_mata_kuliah,
                            'kode_mata_kuliah' => $mata_kuliah->kode_mata_kuliah,
                            'sks' => $mata_kuliah->sks,
                            'semester' => $mata_kuliah->semester,
                            'nama_dosen' => $mata_kuliah->nama_dosen,
                        ];
                    }
                }
            }
            $mahasiswa->mata_kuliah_details = $mata_kuliah_details;
            return $mahasiswa;
        });

        return view('mahasiswas.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mata_kuliahs = DataMataKuliah::all();
        return view('mahasiswas.create', compact('mata_kuliahs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|integer|unique:mahasiswas,nim',
            'email' => 'required|email|unique:mahasiswas,email',
            'jurusan' => 'required|string|max:100',
            'nama_mata_kuliah' => 'required|array',
            'nama_mata_kuliah.*' => 'required|string|exists:data_mata_kuliahs,nama_mata_kuliah',
        ]);

        $data = $request->all();
        $data['nama_mata_kuliah'] = json_encode($request->nama_mata_kuliah);

        DataMahasiswa::create($data);

        return redirect()->route('mahasiswas.index')
                         ->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DataMahasiswa $dataMahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DataMahasiswa $dataMahasiswa)
    {
        $mata_kuliahs = DataMataKuliah::all();
        return view('mahasiswas.edit', compact('dataMahasiswa', 'mata_kuliahs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DataMahasiswa $dataMahasiswa)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|integer|unique:mahasiswas,nim,' . $dataMahasiswa->id,
            'email' => 'required|email|unique:mahasiswas,email,' . $dataMahasiswa->id,
            'jurusan' => 'required|string|max:100',
            'nama_mata_kuliah' => 'required|array',
            'nama_mata_kuliah.*' => 'required|string|max:255|exists:data_mata_kuliahs,nama_mata_kuliah',
        ]);

        $dataMahasiswa->update($request->all());
        $dataMahasiswa['nama_mata_kuliah'] = json_encode($request->nama_mata_kuliah);

        return redirect()->route('mahasiswas.index')
                         ->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DataMahasiswa $dataMahasiswa)
    {
        $dataMahasiswa->delete();

        return redirect()->route('mahasiswas.index')
                         ->with('success', 'Mahasiswa berhasil dihapus.');
    }

    /**
     * Handle the deletion of related data when a DataMataKuliah is deleted.
     */
    public function profile()
    {
        return view('mahasiswas.profile');
    }
}
