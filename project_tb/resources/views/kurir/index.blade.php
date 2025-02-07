<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="//cdn.datatables.net/2.2.0/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>

<body>
    <header>
        <nav
            class="navbar navbar-expand-sm navbar-light bg-primary" data-bs-theme="dark"
        >
            <div class="container">
                <a class="navbar-brand" href="#">Kurir</a>
                <button
                    class="navbar-toggler d-lg-none"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId"
                    aria-controls="collapsibleNavId"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    </ul>
                    <form action="{{route('logout')}}" method="POST" class="d-flex my-2 my-lg-0">
                        @csrf
                        <button
                            class="btn btn-danger my-2 my-sm-0"
                            type="submit"
                        >
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </nav>

    </header>
    <main>
        <div class="container my-5">
            <h3 class="text-primary text-center mb-4 fw-bold">Daftar Pengiriman</h3>
            <table id="tracking" class="table table-striped table-bordered table-hover align-middle">
                <thead class="table-primary text-center">
                    <tr>
                        <th><i class="bi bi-person"></i> Nama</th>
                        <th><i class="bi bi-123"></i> Resi</th>
                        <th><i class="bi bi-geo-alt"></i> Alamat</th>
                        <th><i class="bi bi-telephone"></i> No HP</th>
                        <th><i class="bi bi-card-text"></i> Deskripsi</th>
                        <th><i class="bi bi-card-text"></i> Lokasi 1</th>
                        <th><i class="bi bi-card-text"></i> Lokasi 2</th>
                        <th><i class="bi bi-card-text"></i> Lokasi 3</th>
                        <th><i class="bi bi-tools"></i> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($couriers as $courier)
                    <tr>
                        <td>{{ $courier->nama }}</td>
                        <td>{{ $courier->resi }}</td>
                        <td>{{ $courier->alamat }}</td>
                        <td>{{ $courier->handphone }}</td>
                        <td>{{ $courier->deskripsi }}</td>
                        <td>{{ $courier->lokasi1 }}</td>
                        <td>{{ $courier->lokasi2 }}</td>
                        <td>{{ $courier->lokasi3 }}</td>
                        <td class="text-center">
                            <a href="{{ route('kurir.edit', $courier) }}" class="btn btn-sm btn-success">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.2.0/js/dataTables.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.0/js/buttons.print.min.js"></script>
    <script>
        new DataTable('#tracking', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
    </script>

</body>

</html>
