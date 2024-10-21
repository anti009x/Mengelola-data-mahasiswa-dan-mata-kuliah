@extends('layouts.app')

@section('content')
    @include('layouts.navbar')
  <div class="container mt-5">
    <a href="{{ route('mahasiswas.create') }}" class="btn btn-dark mb-3">Tambah Mahasiswa</a>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="card shadow p-3 mb-5 bg-white rounded ">
        <div class="table-responsive">
            <table class="table table-condensed table-bordered table-hover">
                <thead class="table-condensed w-100 bg-primary text-white">
                    <tr class="text-center ">
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Email</th>
                        <th>Jurusan</th>
                        <th>Mata Kuliah</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="general-table-body">
                    @foreach($mahasiswas as $mahasiswa)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $mahasiswa->nama }}</td>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->email }}</td>
                        <td>{{ $mahasiswa->jurusan }}</td>
                        <td>
                            <button type="button" class="btn btn-link text-dark" data-bs-toggle="modal" data-bs-target="#mataKuliahModal{{ $mahasiswa->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                                </svg>
                            </button>
                            
                            <!-- Include the Mata Kuliah Modal Component -->
                            @include('mahasiswas.mata-kuliah-modal')
                        </td>
                        <td class="text-center">
                            <a href="{{ route('mahasiswas.edit', $mahasiswa->id) }}" class="btn btn-dark btn-sm">Edit</a>
                            <form action="{{ route('mahasiswas.destroy', $mahasiswa->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection