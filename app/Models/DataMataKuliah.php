<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class DataMataKuliah extends Model
{
    use HasFactory;
    protected $table = 'data_mata_kuliahs';
    protected $fillable = [
        'nama_mata_kuliah', 
        'kode_mata_kuliah', 
        'sks', 
        'semester',
        'nama_dosen',
        'nama_file',
        'path'
    ];

    public function mahasiswa()
    {
        return $this->hasMany(DataMahasiswa::class, 'nama_mata_kuliah', 'nama_mata_kuliah');
    }

}
