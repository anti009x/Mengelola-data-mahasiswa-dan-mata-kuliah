@extends('layouts.app')
@section('content')
@include('layouts.navbar')
<div class="container mt-5">
    <a href="{{ route('mata_kuliahs.create') }}" class="btn btn-dark mb-3">Tambah Mata Kuliah</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card shadow p-3 mb-5 bg-white rounded">
        <div class="table-responsive ">
            <table class="table table-condensed table-bordered table-hover" >
                <thead class="table-condensed w-100 bg-primary text-white">
            <tr class="text-center">
                <th>No</th>
                <th>Nama Mata Kuliah</th>
                <th>Kode Mata Kuliah</th>
                <th>SKS</th>
                <th>Semester</th>
                <th>Nama Dosen</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0" id="general-table-body">
            @foreach($mata_kuliahs as $mata_kuliah)
            <tr class="text-center">
                <td>{{ $loop->iteration }}</td>
                <td>{{ $mata_kuliah->nama_mata_kuliah }}</td>
                <td>{{ $mata_kuliah->kode_mata_kuliah }}</td>
                <td>{{ $mata_kuliah->sks }}</td>
                <td>{{ $mata_kuliah->semester }}</td>
                <td>{{ $mata_kuliah->nama_dosen }}</td>
                <td class="text-center">
                    <a href="{{ route('mata_kuliahs.edit', $mata_kuliah->id) }}" class="btn btn-dark btn-sm">Edit</a>
                    
                    <form action="{{ route('mata_kuliahs.destroy', $mata_kuliah->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm " 
                            onclick="return confirm('Apakah Anda yakin ingin menghapus ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection