
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Dashboard - SB Admin</title>
    <link href="{{base_url()}}/static/css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="{{base_url()}}/static/assets/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <script src="{{base_url()}}/static/assets/font-awesome-513/all.min.js" crossorigin="anonymous"></script>
    @yield('css')

</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="index.html">SI PDK & JKN</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <ul class="navbar-nav  ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i> Superuser</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">Profil</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="login.html">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                      <a class="nav-link" href="penduduk.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-address-card"></i></div>
                        Data Penduduk
                    </a>
                    <a class="nav-link" href="keluarga.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Data Keluarga
                    </a>
                    <a class="nav-link" href="jkn.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                        Data JKN
                    </a>
                    <a class="nav-link" href="apb.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                        Data APB
                    </a>
                    <a class="nav-link" href="login.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                        Keluar
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">v0.0.0</div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>
          @yield('content')
      </main>
      <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Your Website 2020</div>
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
<script src="{{base_url()}}/static/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="{{base_url()}}/static/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="{{base_url()}}/static/js/scripts.js"></script>
<script src="{{base_url()}}/static/assets/chartjs/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{base_url()}}/static/assets/demo/chart-area-demo.js"></script>
<script src="{{base_url()}}/static/assets/demo/chart-bar-demo.js"></script>
<script src="{{base_url()}}/static/assets/datatables/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="{{base_url()}}/static/assets/datatables/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
@yield('js')

</body>
</html>
