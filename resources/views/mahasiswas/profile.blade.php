@extends('layouts.app')

@section('content')
@include('layouts.navbar')
<div class="container mt-5">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div>
                    <h2 class="text-1xl font-medium text-gray-900 text-responsive">Informasi Pribadi</h2>
                    <p class="text-sm text-gray-50">Ini Adalah Informasi Pribadi Anda Harap Diisi Dengan Benar</p>
                    </div>
                    <label class="mt-1 text-sm text-gray-500"> Nama </label>
                    <div class="form-group w-25">
                        <input type="text" name="nama" class="form-control border-2 " placeholder="Nama" value="Rizky Sulaeman" required>
                    </div>
                    <label class="mt-1 text-sm text-gray-500"> NIM </label>
                    <div class="form-group w-25">
                        <input type="text" name="nama" class="form-control border-2 " placeholder="NIM" value="21031397072" required>
                    </div>
                    <label class="mt-1 text-sm text-gray-500"> Email </label>
                    <div class="form-group w-25">
                        <input type="text" name="nama" class="form-control border-2 " placeholder="Email" value="riskisuleman21@student.polindra.ac.id" required>
                    </div>
                    <label class="mt-1 text-sm text-gray-500"> Jurusan </label>
                    <div class="form-group w-25">
                        <input type="text" name="nama" class="form-control border-2 " placeholder="Jurusan" value="S1 Rekayasa Perangkat Lunak" required>
                    </div>
                </div>
                <button  type="submit" class="btn btn-dark mt-2">Simpan</button>
            </div>
        </div>
    </div>

    <div class="py-12 mt-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div>
                    <h2 class="text-1xl font-medium text-gray-900 text-responsive">Update Password</h2>
                    <p class="text-sm text-gray-50">Jika Anda Ingin Mengganti Password Silahkan Diisi Dengan Password Baru</p>
                    </div>
                    <label class="mt-1 text-sm text-gray-500"> Password Lama </label>
                    <div class="form-group w-25">
                        <div class="input-group">
                            <input type="password" name="password_lama" class="form-control border-2" placeholder="Password Lama" value="1245" required disabled>
                
                                <span class="input-group-text" onclick="togglePasswordVisibility('password_lama')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                        <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                    </svg>
                                </span>
               
                        </div>
                    </div>
                
                    <label class="mt-1 text-sm text-gray-500"> Password Baru </label>
                    <div class="form-group w-25">
                        <div class="input-group">
                            <input type="text" name="password_baru" class="form-control border-2 " placeholder="Password Baru" value="" required>
                            <span class="input-group-text" onclick="togglePasswordVisibility('password_baru')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                    <label class="mt-1 text-sm text-gray-500"> Konfirmasi Password Baru </label>
                    <div class="form-group w-25">
                        <div class="input-group">
                            <input type="text" name="konfirmasi_password_baru" class="form-control border-2 " placeholder="Konfirmasi Password Baru" value="" required>
                            <span class="input-group-text" onclick="togglePasswordVisibility('konfirmasi_password_baru')">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2M2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                                </svg>
                            </span>
                        </div>
                    </div>
                </div>
                <button  type="submit" class="btn btn-dark mt-2">Update</button>
            </div>
        </div>
    </div>


    <div class="py-12 mt-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <div>
                    <h2 class="text-1xl font-medium text-gray-900 text-responsive">Delete Akun</h2>
                    <p class="text-sm text-gray-50">Jika Anda Ingin Menghapus Akun Anda Silahkan Klik Tombol Dibawah Ini</p>
        
                    </div>

                    <button  type="submit" class="btn btn-danger ">Hapus</button>
                </div>
 
            </div>
        </div>
    </div>

</div>
@endsection