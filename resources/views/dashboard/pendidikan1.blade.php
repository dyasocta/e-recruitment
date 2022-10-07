<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Recruitment</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #ECBC76">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon">
                    <img src="asset/img/logo2.png" style="width: 100; height: 30pt" alt="">
                </div>
                <div class="sidebar-brand-text mx-2"><img src="asset/img/logo3.png" style="width: 100; height: 30pt" alt=""><sup></sup></div>
                {{-- <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div> --}}
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.html">
                    <i class="bi bi-house-fill"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                File Pelamar
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="bi bi-clipboard-plus-fill"></i>
                    <span>Data Pelamar</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Pelamar:</h6>
                        <a class="collapse-item" href="/biodata1">Biodata</a>
                        <a class="collapse-item" href="/pendidikan1">Pendidikan</a>
                        <a class="collapse-item" href="/updokmen1">Upload Dokumen</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="bi bi-megaphone-fill"></i>
                    <span>Pengumuman</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="bi bi-briefcase-fill"></i>
                    <span>Lowongan</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengaturan
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('change-password') }}">
                    <i class="bi bi-gear-fill"></i>
                    <span>Ubah Passord</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="bi bi-box-arrow-in-right"></i>
                    <span>Logout</span></a>
            </li>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block" >

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b style="color:#f06626">{{ Auth::user()->name }}</b></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div class="card-mb-7">
                                <div class="card-header">
                                    Pendidikan
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('pendidikan.store') }}" method="POST">
                                        @csrf
                                            <div class="form-group row mb-2">
                                                <label for="jenjang" class="col-sm-3 col-form-label">JENJANG</label>
                                                <div class="col-sm-9">
                                                    <select name="jenjang" class="form-select" required>
                                                        <option value="">PILIH JENJANG</option>
                                                        <option value="SD">SD</option>
                                                        <option value="SMP">SMP</option>
                                                        <option value="SLTA / SEDERAJAT">SLTA / SEDERAJAT</option>
                                                        <option value="D3">D3</option>
                                                        <option value="D4 / S1">D4 / S1</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-2">
                                                <label for="institusi" class="col-sm-3 col-form-label">SEKOLAH (INSTITUSI)</label>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control phone" name="institusi" id="institusi" placeholder="PILIH INSTITUSI" required>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-2">
                                                <label for="jurusan" class="col-sm-3 col-form-label">JURUSAN</label>
                                                <div class="col-sm-9">
                                                    <select name="jurusan" class="form-select" required>
                                                        <option value="">PILIH JURUSAN</option>
                                                        <option value="A">A</option>
                                                        <option value="B">B</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-2">
                                                <label for="kota" class="col-sm-3 col-form-label">KOTA</label>
                                                <div class="col-sm-9">
                                                    <select name="kota" class="form-select" id="kota" required>
                                                        <option value="">PILIH KOTA</option>
                                                        {{-- @foreach ($regencies as $kota)
                                                        <option value="{{$kota->id}}">{{$kota->name}}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-2">
                                                <label for="tanggal_lulus" class="col-sm-3 col-form-label">TANGGAL LULUS</label>
                                                <div class="col-sm-9">
                                                <input type="date" class="form-control" name="tanggal_lulus" id="tanggal_lulus" required>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-2">
                                                <label for="nilai_uan_ipk" class="col-sm-3 col-form-label">NILAI RATA-RATA UAN / IPK</label>
                                                <div class="col-sm-9">
                                                <input type="text" class="form-control" name="nilai_uan_ipk" id="nilai_uan_ipk" placeholder="NILAI RATA-RATA UAN / IPK" required>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-2">
                                                <label for="akreditasi" class="col-sm-3 col-form-label">AKREDITASI</label>
                                                <div class="col-sm-9">
                                                    <select name="akreditasi" class="form-select" required>
                                                        <option value="">PILIH AKREDITASI</option>
                                                        <option value="UNGGUL">UNGGUL</option>
                                                        <option value="BAIK SEKALI">BAIK SEKALI</option>
                                                        <option value="BAIK">BAIK</option>
                                                        <option value="TIDAK TERAKREDITASI">TIDAK TERAKREDITASI</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-md btn-primary">Save</button>
                                            <a href="{{ route('home') }}" class="btn btn-md btn-secondary">back</a>
                                        </form>

                                        <div class="table-responsive mt-3">
                                            <table class="table table-striped table-bordered" style="width: 100%">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text-center align-middle" style="width: 5%">TINGKAT</th>
                                                        <th scope="col" class="text-center align-middle" style="width: 15%">JURUSAN</th>
                                                        <th scope="col" class="text-center align-middle" style="width: 15%">NAMA SEKOLAH <br> (INSTITUSI)</th>
                                                        <th scope="col" class="text-center align-middle" style="width: 15%">KOTA</th>
                                                        <th scope="col" class="text-center align-middle" style="width: 10%">NILAI UAN <br> (IPK)</th>
                                                        <th scope="col" class="text-center align-middle" style="width: 15%">TANGGAL KELULUSAN</th>
                                                        <th scope="col" class="text-center align-middle" style="width: 15%">AKREDITASI</th>
                                                        <th scope="col" class="text-center align-middle" style="width: 10%">#</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    {{-- @forelse ($pendidikans as $pendidikan)
                                                    @if ($pendidikan->pendidikan_user_id == Auth::user()->id)
                                                    <tr>
                                                        <td class="text-center align-middle">{{ $pendidikan->jenjang }}</td>
                                                        <td class="text-center align-middle">{{ $pendidikan->jurusan }}</td>
                                                        <td class="text-center align-middle">{{ $pendidikan->institusi }}</td>
                                                        <td class="text-center align-middle">{{ $pendidikan->kota }}</td>
                                                        <td class="text-center align-middle">{{ $pendidikan->nilai_uan_ipk }}</td>
                                                        <td class="text-center align-middle">{{ date('d-m-Y', strtotime($pendidikan->tanggal_lulus)) }}</td>
                                                        <td class="text-center align-middle">{{ $pendidikan->akreditasi }}</td>
                                                        <td class="text-center">
                                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                                action="{{ route('pendidikan.destroy', $pendidikan->id) }}" method="POST">
                                                                <a href="" class="btn btn-sm btn-primary mb-1 mt-1">EDIT</a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger mb-1 mt-1">HAPUS</button>
                                                            </form>
                                                    </tr>
                                                    @endif
                                                    @empty
                                                    <tr>
                                                        <td class="text-center text-mute" colspan="7">Data Pendidikan tidak tersedia</td>
                                                    </tr>
                                                    @endforelse --}}
                                                </tbody>
                                            </table>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; e-recruitment mascitra.com 2022</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
