<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Produk Page</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="{{url('/dashboard')}}">26Shop</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0" method="GET" action="{{url('/produk')}}">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Cari dengan ID atau nama..." aria-label="Search for..." aria-describedby="btnNavbarSearch" name="search" />
                    <button class="btn btn-success" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{url('/logout')}}">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="{{url('/dashboard')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Master
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse show" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{url('/user')}}">User</a>
                                    <a class="nav-link active" href="{{url('/produk')}}">Produk</a>
                                </nav>
                            </div>
                            
                            <div class="sb-sidenav-menu-heading">Transaksi</div>
                            <a class="nav-link" href="{{url('/order')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Order
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        {{Session::get('nama')}}
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Data Produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Produk</li>
                        </ol>
                        @if (session('gagal'))
                            <div class="alert alert-danger">
                              {{ session('gagal') }}
                            </div>
                        @endif
                        @if (session('berhasil'))
                            <div class="alert alert-success">
                              {{ session('berhasil') }}
                            </div>
                        @endif
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabel Produk
                                <button class="btn btn-sm btn-success ms-2" data-bs-toggle="modal" data-bs-target="#modalTambahProduk">Tambah Produk</button>
                                <a href="{{ url('/produk/export/pdf') }}" class="btn btn-sm btn-primary ms-2">Export PDF</a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered small">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>ID Produk</th>
                                                <th>Nama Produk</th>
                                                <th>Stok</th>
                                                <th>Harga</th>
                                                <th>Gambar</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($produk as $no => $data)
                                            <tr>
                                                <td>{{ $no + 1 }}</td>
                                                <td>{{ $data->id_produk}}</td>
                                                <td>{{ $data->nama_produk}}</td>
                                                <td>{{ $data->stok}}</td>
                                                <td>Rp {{ number_format($data->harga, 0, ',', '.') }}</td>
                                                <td>
                                                    @if($data->gambar)
                                                        <img src="{{ asset('storage/' . $data->gambar) }}" width="80">
                                                    @else
                                                        <span class="text-muted">Tidak ada gambar</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#editModal{{ $data->id_produk }}">
                                                        Edit
                                                    </button>
                                                    <!-- Tombol Hapus - Buka Modal -->
                                                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_produk }}">
                                                        Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $produk->links('pagination::bootstrap-5') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 26Shop 2025</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>



        <!-- Modal Tambah Produk -->
        <div class="modal fade" id="modalTambahProduk" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form class="modal-content" action="{{ url('/produk/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTambahLabel">Tambah Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="nama_produk" class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" required>
                        </div>
                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input type="number" class="form-control" name="stok" required>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" required>
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="gambar">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>



        @forelse ($produk as $no => $data)
        <!-- Modal Edit -->
        <div class="modal fade" id="editModal{{ $data->id_produk }}" tabindex="-1" aria-labelledby="editLabel{{ $data->id_produk }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form class="modal-content" action="{{ url('/produk/update', $data->id_produk) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editLabel{{ $data->id_produk }}">Edit Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Produk</label>
                            <input type="text" class="form-control" name="nama_produk" value="{{ $data->nama_produk }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" class="form-control" name="stok" value="{{ $data->stok }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" class="form-control" name="harga" value="{{ $data->harga }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ganti Gambar (opsional)</label>
                            <input type="file" class="form-control" name="gambar">
                            @if($data->gambar)
                                <img src="{{ asset('storage/' . $data->gambar) }}" width="80" class="mt-2">
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
        @empty
        @endforelse


        
        @forelse ($produk as $no => $data)
        <!-- Modal Hapus -->
        <div class="modal fade" id="hapusModal{{ $data->id_produk }}" tabindex="-1" aria-labelledby="hapusLabel{{ $data->id_produk }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form class="modal-content" action="{{ url('/produk/delete', $data->id_produk) }}" method="POST">
                    @csrf
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="hapusLabel{{ $data->id_produk }}">Konfirmasi Hapus</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah kamu yakin ingin menghapus produk <strong>{{ $data->nama_produk }}</strong>?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-sm btn-danger">Ya, Hapus</button>
                    </div>
                </form>
            </div>
        </div>

        @empty
        @endforelse

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
</html>
