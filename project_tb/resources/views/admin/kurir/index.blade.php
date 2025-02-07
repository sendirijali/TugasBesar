<x-admin>
    <div class="container my-5">
        <!-- Judul -->
        <h1 class="text-center mb-4 text-warning fw-bold">Tambah Kurir</h1>

        <!-- Card Container -->
        <div class="card shadow border-warning">
            <div class="card-header bg-warning text-white text-center">
                <h4 class="mb-0">Daftar Kurir</h4>
            </div>
            <div class="card-body">
                <!-- Tabel -->
                <table id="tracking" class="table table-striped table-bordered table-hover align-middle">
                    <thead class="table-warning">
                        <tr class="text-center">
                            <th><i class="bi bi-person"></i> Nama</th>
                            <th><i class="bi bi-123"></i> Email</th>
                            <th colspan="2"><i class="bi bi-tools"></i> Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($couriers as $courier)
                        <tr>
                            <td>{{ $courier->name }}</td>
                            <td>{{ $courier->email }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.kurir.edit', $courier) }}" class="btn btn-sm btn-success">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                            </td>
                            <td class="text-center">
                                <form action="{{ route('admin.kurir.destroy', $courier) }}" method="post" style="display: inline;">
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
                <a href="{{ route('admin.kurir.create') }}" class="btn btn-warning btn-lg shadow-sm d-flex align-items-center justify-content-center">
                    <i class="bi bi-plus-lg"></i> TAMBAH
                </a>
            </div>
        </div>
    </div>
</x-admin>
