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

    <form class="row g-2" action="{{ route('mahasiswas.update', $dataMahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group shadow p-3 mb-5 bg-white rounded">

            <input type="text" name="nama" class="form-control" value="{{ old('nama', $dataMahasiswa->nama) }}" placeholder="Nama" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">

            <input type="text" name="nim" class="form-control" value="{{ old('nim', $dataMahasiswa->nim) }}" placeholder="NIM" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">

            <input type="email" name="email" class="form-control" value="{{ old('email', $dataMahasiswa->email) }}" placeholder="Email" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">
  
            <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan', $dataMahasiswa->jurusan) }}" placeholder="Jurusan" required>
        </div>

        <div class="form-group shadow p-3 mb-5 bg-white rounded">
            
                <p class="text-dark ">Mata Kuliah Yang Diambil</p>
                @foreach($mata_kuliahs as $mata_kuliah)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="nama_mata_kuliah[]" value="{{ $mata_kuliah->nama_mata_kuliah }}" id="mataKuliah{{ $mata_kuliah->id }}"
                            @if(in_array($mata_kuliah->nama_mata_kuliah, json_decode($dataMahasiswa->nama_mata_kuliah, true))) checked @endif>
                        <label class="form-check-label" for="mataKuliah{{ $mata_kuliah->id }}">
                            {{ $mata_kuliah->nama_mata_kuliah }}
                        </label>
                    </div>
                @endforeach
     
        </div>

        <button type="submit" class="btn btn-dark mt-2">Update</button>
        <a href="{{ route('mahasiswas.index') }}" class="btn btn-secondary mt-2">Kembali</a>
    </form>
</div>
@endsection