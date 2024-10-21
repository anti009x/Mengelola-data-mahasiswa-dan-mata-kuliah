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

    <form class="row g-1" action="{{ route('mahasiswas.store') }}" method="POST">
        @csrf

        <div class="form-group shadow p-3 mb-5 bg-white rounded">
  
            <input type="text" name="nama" class="form-control border-2 " placeholder="Nama" value="{{ old('nama') }}" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">
  
            <input type="text" name="nim" class="form-control border-2" placeholder="NIM" value="{{ old('nim') }}" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">

            <input type="email" name="email" class="form-control border-2" placeholder="Email" value="{{ old('email') }}" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">

            <input type="text" name="jurusan" class="form-control border-2" placeholder="Jurusan" value="{{ old('jurusan') }}" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">
            @foreach($mata_kuliahs as $mata_kuliah)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="nama_mata_kuliah[]" value="{{ $mata_kuliah->nama_mata_kuliah }}" id="mataKuliah{{ $mata_kuliah->id }}">
                    <label class="form-check-label" for="mataKuliah{{ $mata_kuliah->id }}">
                        {{ $mata_kuliah->nama_mata_kuliah }}
                    </label>
                </div>
            @endforeach
        </div>

        <button type="submit" class="btn btn-dark mt-2">Simpan</button>
        <a href="{{ route('mahasiswas.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </form>
</div>
@endsection