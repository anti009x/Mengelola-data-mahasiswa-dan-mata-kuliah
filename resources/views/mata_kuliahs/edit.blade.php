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
    <form class="row g-2" action="{{ route('mata_kuliahs.update', $dataMataKuliah->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group shadow p-3 mb-5 bg-white rounded">
            <input type="text" name="nama_mata_kuliah" class="form-control" value="{{ old('nama_mata_kuliah', $dataMataKuliah->nama_mata_kuliah) }}" placeholder="Nama Mata Kuliah" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">
            <input type="text" name="kode_mata_kuliah" class="form-control" value="{{ old('kode_mata_kuliah', $dataMataKuliah->kode_mata_kuliah) }}" placeholder="Kode Mata Kuliah" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">
            <input type="number" name="sks" class="form-control" value="{{ old('sks', $dataMataKuliah->sks) }}" placeholder="SKS" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">
            <input type="text" name="semester" class="form-control" value="{{ old('semester', $dataMataKuliah->semester) }}" placeholder="Semester" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">
            <input type="text" name="nama_dosen" class="form-control" value="{{ old('nama_dosen', $dataMataKuliah->nama_dosen) }}" placeholder="Nama Dosen" required>
        </div>

        <button type="submit" class="btn btn-dark mt-2">Update</button>
        <a href="{{ route('mata_kuliahs.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </form>
</div>
@endsection