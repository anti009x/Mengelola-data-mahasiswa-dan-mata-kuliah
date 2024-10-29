@extends('layouts.app')
@section('content')
@include('layouts.navbar')
<div class="container mt-5">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada masalah dengan input Anda.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="row g-2" action="{{ route('mata_kuliahs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group shadow p-3 mb-5 bg-white rounded">

            <input type="text" name="nama_mata_kuliah" class="form-control" placeholder="Nama Mata Kuliah" value="{{ old('nama_mata_kuliah') }}" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">

            <input type="text" name="kode_mata_kuliah" class="form-control" placeholder="Kode Mata Kuliah" value="{{ old('kode_mata_kuliah') }}" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">

            <input type="number" name="sks" class="form-control" placeholder="SKS" value="{{ old('sks') }}" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">

            <input type="text" name="semester" class="form-control" placeholder="Semester" value="{{ old('semester') }}" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">

            <input type="text" name="nama_dosen" class="form-control" placeholder="Nama Dosen" value="{{ old('nama_dosen') }}" required>
        </div>
        
        <div class="form-group shadow p-3 mb-5 bg-white rounded">

            <input type="file" name="nama_file" class="form-control" placeholder="Syarat dan Ketentuan" accept=".docx,.pdf" required>

        </div>

        <button type="submit" class="btn btn-dark mt-2">Simpan</button>
        <a href="{{ route('mata_kuliahs.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </form>
</div>
@endsection