<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Billiard Apk</title>
  <!-- base:css -->
  <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <!-- endinject -->
</head>

<body>
  <div class="container-scroller d-flex">
    <div class="container-fluid page-body-wrapper full-page-wrapper d-flex">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <h2>Satsat-Billiard</h2>
              </div>

              @if(session('success'))
              <p class="alert alert-success">{{ session('success') }}</p>
              @endif
              @if($errors->any())
              @foreach($errors->all() as $err)
              <p class="alert alert-danger">{{ $err }}</p>
              @endforeach
              @endif

            <h4>Hello! Temanku</h4>
              <h6 class="font-weight-light">Masuk untuk melanjutkan.</h6>

              <form action="{{route('login.action')}}" method="post">
                @csrf
                <div class="input-group mb-3">
                  <input name="username" value="{{old('username')}}" type="text" class="form-control"
                    placeholder="Username">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="mdi mdis-account"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input name="password" type="password" class="form-control" placeholder="Password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-key"></span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-8">

                  </div>
                  <!-- /.col -->
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                  </div>
                  <!-- /.col -->
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>

  <!-- endinject -->
  <script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
  <!-- endinject -->
</body>

</html>