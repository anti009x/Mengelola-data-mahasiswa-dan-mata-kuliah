<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class DataMahasiswa extends Model
{
    //
    use HasFactory;
    protected $table = 'mahasiswas';
    protected $fillable = [
        'nama',
        'nim',
        'email',
        'jurusan',
        'nama_mata_kuliah',
    ];

    public function mataKuliah()
    {
        return $this->belongsTo(DataMataKuliah::class, 'nama_mata_kuliah', 'nama_mata_kuliah');
    }


}
