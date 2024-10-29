<?php

namespace App\Http\Controllers;

use App\Models\DataMataKuliah;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
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
        'nama_file' => 'required|mimes:docx,pdf|max:2048',
    ]);

    if (!extension_loaded('fileinfo')) {
        return redirect()->back()->withErrors(['msg' => 'The fileinfo PHP extension is not enabled.']);
    }

    $file = $request->file('nama_file');
    $fileName = $file->getClientOriginalName();
    try {
        // Generate a random 4-digit number
        $randomNumber = mt_rand(1000, 9999);
        // Append the random number to the file name
        $fileNameWithRandom = pathinfo($fileName, PATHINFO_FILENAME) . '_' . $randomNumber . '.' . $file->getClientOriginalExtension();
        // Simpan file di disk 'internal_storage'
        $filePath = $file->storeAs('', $fileNameWithRandom, 'internal_storage');
    } catch (\Exception $e) {
        return redirect()->back()->withErrors(['msg' => 'File upload failed: ' . $e->getMessage()]);
    }

    DataMataKuliah::create([
        'nama_mata_kuliah' => $request->nama_mata_kuliah,
        'kode_mata_kuliah' => $request->kode_mata_kuliah,
        'sks' => $request->sks,
        'semester' => $request->semester,
        'nama_dosen' => $request->nama_dosen,
        'nama_file' => $fileName,
        'path' => $filePath,
    ]);

    return redirect()->route('mata_kuliahs.index')
                     ->with('success', 'Mata Kuliah berhasil ditambahkan.');
}

        public function downloadSyarat($id)
        {
            $mataKuliah = DataMataKuliah::findOrFail($id);
            $filePath = $mataKuliah->path; // Get the file path from the database

            // Ensure the file exists before attempting to download
            if (!Storage::disk('internal_storage')->exists($filePath)) {
                return redirect()->back()->withErrors(['msg' => 'File not found.']);
            }

            // Use response()->download() to create a download response
            $fullPath = Storage::disk('internal_storage')->path($filePath);
            return response()->download($fullPath);
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
