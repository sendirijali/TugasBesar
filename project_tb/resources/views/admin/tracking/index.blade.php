<x-admin>
    <div class="container my-5">
        <!-- Judul -->
        <h1 class="text-center mb-4 text-warning fw-bold">📦 Tracking Pengiriman</h1>

        <!-- Card Container -->
        <div class="card shadow border-warning">
            <div class="card-header bg-warning text-white text-center">
                <h4 class="mb-0">Daftar Tracking Paket</h4>
            </div>
            <div class="card-body">
                <!-- Tabel -->
                <table id="tracking" class="table table-striped table-bordered table-hover align-middle">
                    <thead class="table-warning">
                        <tr class="text-center">
                            <th><i class="bi bi-person"></i> Nama</th>
                            <th><i class="bi bi-123"></i> Resi</th>
                            <th><i class="bi bi-geo-alt"></i> Alamat</th>
                            <th><i class="bi bi-telephone"></i> No HP</th>
                            <th><i class="bi bi-card-text"></i> Deskripsi</th>
                            <th><i class="bi bi-truck"></i> Kurir</th>
                            <th colspan="2"><i class="bi bi-tools"></i> Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trackings as $tracking)
                        <tr>
                            <td>{{ $tracking->nama }}</td>
                            <td>{{ $tracking->resi }}</td>
                            <td>{{ $tracking->alamat }}</td>
                            <td>{{ $tracking->handphone }}</td>
                            <td>{{ $tracking->deskripsi }}</td>
                            <td>{{ $tracking->courier->name }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.tracking.edit', $tracking) }}" class="btn btn-sm btn-success">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('admin.tracking.destroy', $tracking) }}" method="post" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Footer -->
            <div class="card-footer text-center">
                <a href="{{ route('admin.tracking.create') }}" class="btn btn-warning btn-lg shadow-sm d-flex align-items-center justify-content-center">
                    <i class="bi bi-plus-lg"></i> TAMBAH
                </a>
            </div>
        </div>
    </div>
</x-admin>
