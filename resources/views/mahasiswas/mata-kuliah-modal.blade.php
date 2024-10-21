<div class="modal fade" id="mataKuliahModal{{ $mahasiswa->id }}" tabindex="-1" aria-labelledby="mataKuliahModalLabel{{ $mahasiswa->id }}" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mataKuliahModalLabel{{ $mahasiswa->id }}">Mata Kuliah Yang Diambil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card shadow p-3 mb-2 bg-white rounded ">
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered table-hover">
                            <thead class="table-condensed w-100 bg-primary text-white">
                        <tr>
                            <th>No</th>
                            <th>Mata Kuliah</th>
                            <th>Kode Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Dosen</th>
                        </tr>
                    </thead>
                    <tbody id="general-table-body">
                        @foreach($mahasiswa->mata_kuliah_details as $mata_kuliah)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mata_kuliah['nama_mata_kuliah'] }}</td>
                                <td>{{ $mata_kuliah['kode_mata_kuliah'] }}</td>
                                <td>{{ $mata_kuliah['sks'] }}</td>
                                <td>{{ $mata_kuliah['semester'] }}</td>
                                <td>{{ $mata_kuliah['nama_dosen'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>

