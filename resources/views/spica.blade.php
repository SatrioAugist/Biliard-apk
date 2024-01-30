<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Billiard APK</title>
  <!-- base:css -->
<!-- public/css/dashboard.css -->
  <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha384-ezr9A2z5s7G5sJQDzQYD7sG1fbDrlbBIOBjEgXz9X4wpihtbFEcdq7x64Jd6MI9x" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" />
</head>

<body>
  <div class="container-scroller d-flex">

    <!-- partial:./partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">


        <li class="nav-item">
          <a class="nav-link" href="{{ url('/') }}">
            <i class="mdi mdi-view-quilt menu-icon icon-lg"></i>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ url('table') }}">
            <i class="mdi mdi-grid-large menu-icon"></i>
            <span class="menu-title">Meja</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ url('reservations') }}">
            <i class=" mdi mdi-book-multiple  menu-icon"></i>
            <span class="menu-title">Reservasi</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ url('transaksi') }}">
            <i class=" mdi mdi-repeat  menu-icon"></i>
            <span class="menu-title">Transaksi</span>
          </a>
        </li>

        @if (in_array(Auth::user()->role, ['admin','owner']))
        <li class="nav-item text-xm">
          <a class="nav-link" href="{{ url('users') }}">
            <i class=" mdi mdi-account menu-icon"></i>
            <span class="menu-title">Pengguna</span>
          </a>
        </li>
        @endif

        @if (in_array(Auth::user()->role, ['admin','owner']))
        <li class="nav-item">
          <a class="nav-link" href="{{ url('log') }}">
            <i class=" mdi mdi-history  menu-icon"></i>
            <span class="menu-title">Aktivitas</span>
          </a>
        </li>
        @endif

        <li class="nav-item">
          <a href="#" class="nav-link" id="logout-button" onclick="confirmLogout()">
            <i class="mdi mdi-logout  menu-icon text-danger"></i>
            <span class="text-danger menu-title">Logout</span>
          </a>
        </li>

      </ul>
    </nav>

    <script>
      function confirmLogout() {
        var confirmation = confirm('Are you sure you want to log out?');
        if (confirmation) {
          // Redirect to the logout URL only if the user confirms.
          window.location.href = "{{ url('logout') }}";
        } else {
          // If the user cancels the logout, do nothing.
        }
      }
    </script>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:./partials/_navbar.html -->
      <nav class="navbar col-lg-12 col-12 px-0 py-0 py-lg-4 d-flex flex-row">
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <div class="navbar-brand-wrapper">
          </div>
          <h3 class="font-weight-bold mb-0 d-none d-md-block ms-2 mt-1">Hallo,{{ Auth::user()->name}} ({{Auth::user()->role}})</h3>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item">
              <h4 class="mb-0 font-weight-bold d-none d-xl-block  p-2">
                <div id="real-time-clock"></div>
                <script src="{{ asset('js/realtime.js') }}"></script>
              </h4>
            </li>



          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
            data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
      </nav>

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
          <!-- row end -->
        </div>
        <footer class="footer">

          <div class="d-sm-flex justify-content-center justify-content-sm-between  py-2">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © <a href=""
                target="_blank">satrioaugist@gmail.com </a>2023</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Only the best <a href=""
                target="_blank"> billiard </a>apk</span>
          </div>

        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- base:js -->
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
  <!-- endinject -->
  <!-- plugin js for this page -->
  <script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- Custom js for this page-->
  <script src="{{ asset('js/dashboard.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript"> let table = new DataTable('#myTable');</script>
  <!-- End custom js for this page-->
</body>

</html>