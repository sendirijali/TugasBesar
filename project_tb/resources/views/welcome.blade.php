<!doctype html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <style>
    .timeline {
        position: relative;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    .timeline-item {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        position: relative;
    }

    .timeline-item:last-child {
        margin-bottom: 0;
    }

    .timeline-icon {
        flex-shrink: 0;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
        margin-right: 15px;
    }

    .timeline-content {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        width: 100%;
    }

    .timeline-content h6 {
        margin-bottom: 5px;
    }

    .timeline-content p {
        margin-bottom: 0;
    }

    .timeline-content small {
        display: block;
        margin-top: 5px;
        color: #6c757d;
    }

    </style>

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="//cdn.datatables.net/2.2.0/css/dataTables.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.0/css/buttons.dataTables.css">

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-sm bg-warning container-fluid" data-bs-theme="dark">
            <div class="container">
                <a class ="navbar-brand" href="">Sistem Tracking Pengiriman</a>
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="btn btn-warning">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="btn btn-warning d-block w-100">Log
                                in</a>
                        @endauth
                    </div>
                @endif
            </div>
        </nav>

    </header>
    <main>
        <div class="container py-5">
            <h2 class="text-center mb-4">Lacak Paket Anda</h2>
            <form action="" class="mb-5 d-flex justify-content-center">
                <div class="input-group" style="max-width: 600px;">
                    <input type="text" class="form-control" name="search" placeholder="Masukkan Resi Anda" />
                    <button class="btn btn-danger" type="submit">Cari</button>
                </div>
            </form>
    
            @forelse ($trackings as $track)
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-warning text-white">
                        <h5 class="mb-0">Resi: {{ $track->resi }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="timeline">
                            @if (!$track->lokasi1)
                                <div class="">
                                    <h6 class="fw-bold">Paket Anda Sedang di Proses :)</h6>
                                </div>
                            @endif
                            @if ($track->lokasi1)
                                <div class="timeline-item">
                                    <div class="timeline-icon bg-danger text-white">
                                        <i class="bi bi-geo-alt"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <h6 class="fw-bold">Lokasi 1</h6>
                                        <p>{{ $track->lokasi1 }}</p>
                                        <small class="text-muted">Status: Barang diterima di lokasi 1</small>
                                    </div>
                                </div>
                            @endif
    
                            @if ($track->lokasi2)
                                <div class="timeline-item">
                                    <div class="timeline-icon bg-warning text-white">
                                        <i class="bi bi-truck"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <h6 class="fw-bold">Lokasi 2</h6>
                                        <p>{{ $track->lokasi2 }}</p>
                                        <small class="text-muted">Status: Dalam perjalanan ke lokasi 3</small>
                                    </div>
                                </div>
                            @endif
    
                            @if ($track->lokasi3)
                                <div class="timeline-item">
                                    <div class="timeline-icon bg-success text-white">
                                        <i class="bi bi-check-circle"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <h6 class="fw-bold">Lokasi 3</h6>
                                        <p>{{ $track->lokasi3 }}</p>
                                        <small class="text-muted">Status: Barang telah tiba di tujuan</small>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="alert alert-warning text-center">
                    Tidak ada data tracking yang ditemukan.
                </div>
            @endforelse
            @forelse ($trackings as $track)
            <div class="card mb-4">
                <div class="card-body">
                    <div class="progress" style="height: 30px;">
                        @if ($track->lokasi1)
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 33%;">
                                {{ $track->lokasi1 }}
                            </div>
                        @endif
    
                        @if ($track->lokasi2)
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 33%;">
                                {{ $track->lokasi2 }}
                            </div>
                        @endif
    
                        @if ($track->lokasi3)
                            <div class="progress-bar bg-success" role="progressbar" style="width: 34%;">
                                {{ $track->lokasi3 }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-transparent text-dark">
                    <h5 class="mb-0">Status Pengiriman :</h5>
                </div>                        
                <div class="progress p-4" style="height: 5rem;">
                    @if ($track->lokasi1 && !$track->lokasi2 && !$track->lokasi3)
                        <div class="progress-bar bg-transparent" role="progressbar" style="width: 100%;">
                            <span class="h4 text-danger">Sedang di Kirim || {{$track->lokasi1}}</span>
                        </div>
                    @elseif ($track->lokasi1 && $track->lokasi2 && !$track->lokasi3)
                        <div class="progress-bar bg-transparent" role="progressbar" style="width: 100%;">
                            <span class="h4 text-warning">Sedang di Kirim || {{$track->lokasi2}}</span>
                        </div>
                    @elseif ($track->lokasi1 && $track->lokasi2 && $track->lokasi3)
                        <div class="progress-bar bg-transparent" role="progressbar" style="width: 100%;">
                            <span class="h4 text-success">Selesai</span>
                        </div>
                    @endif
                </div>
            </div>
            
        @empty
        @endforelse
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
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

</body>

</html>
