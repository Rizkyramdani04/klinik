
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Klinik Probeauty | Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

      <!-- Bootstrap core CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assetsDashboard/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assetsDashboard/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assetsDashboard/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assetsDashboard/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/assetsDashboard/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/assetsDashboard/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assetsDashboard/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assetsDashboard/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/" class="logo d-flex align-items-center">
        <img src="/assetsDashboard/img/logo.png" alt="">
        <span class="d-none d-lg-block">Klinik Probeauty</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->



        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="/assetsDashboard/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{ auth()->user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ auth()->user()->name }}</h6>
            </li>

            <hr class="dropdown-divider">

            <li>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">
                      <span class="align-middle">Keluar</span>
                    </button>
                  </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="/dashboard">
          <i class="bx bxs-home"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      {{-- <li class="nav-item">
        <a class="nav-link {{ Request::is('dashboard/daftar*') ? 'collapsed' : '' }}" href="/dashboard/daftar">
            <i class="bx bx-user"></i>
          <Span>Daftar Pasien</Span>
        </a>
      </li> --}}

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bx bx-user"></i><span>Daftar Pasien</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="/dashboard/daftar">
              <i class="bi bi-circle"></i><span>Daftar Baru</span>
            </a>
          </li>
          <li>
            <a href="/dashboard/daftar/pasienLama">
              <i class="bi bi-circle"></i><span>Daftar Lama</span>
            </a>
          </li>
        </ul>

      @can('admin')
      <h6 class="sidebar-headling d-flex justify-content-between align-items-center
      px-3 mt-4 mb-1 text-muted ">
            <span>Administrator</span>
      </h6>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/pasien*') ? 'active' : '' }}" href="/dashboard/pasien">
            <i class="bx bx-user"></i>
          <Span>Data Pasien</Span>
          </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/dokter*') ? 'active' : '' }}" href="/dashboard/dokter">
                <i class="bx bx-user"></i>
                <Span>Data Dokter</Span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard/layanan*') ? 'active' : '' }}" href="/dashboard/layanan">
                <i class="bx bx-user"></i>
                <Span>Layanan</Span>
            </a>
          </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/dashboard/laporan">
          <i class="bx bx-task"></i>
          <span>Laporan</span>
        </a>
      </li><!-- End laporan Nav -->
      @endcan

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <section class="section dashboard">

        @yield('container')


    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <!-- Vendor JS Files -->
  <script src="/assetsDashboard/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/assetsDashboard/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assetsDashboard/vendor/chart.js/chart.umd.js"></script>
  <script src="/assetsDashboard/vendor/echarts/echarts.min.js"></script>
  <script src="/assetsDashboard/vendor/quill/quill.min.js"></script>
  <script src="/assetsDashboard/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/assetsDashboard/vendor/tinymce/tinymce.min.js"></script>
  <script src="/assetsDashboard/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assetsDashboard/js/main.js"></script>

</body>

</html>
