@extends('spica')
@section('content')

<div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-facebook d-flex align-items-center">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-grid-large text-white icon-lg"></i>
                    <div class="ms-3 ">
                      <h2 class="text-white font-weight-bold">Meja</h2>
                      <h3 class="text-white card-text">p</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-twitter d-flex align-items-center">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-book-multiple text-white icon-lg"></i>
                    <div class="ms-3 ">
                      <h2 class="text-white font-weight-bold">Reservasi</h2>
                      <h3 class="text-white card-text">{{ \App\Models\ReservationsM::count() }}</h3>
                    </div>
                  </div>  
                </div>
              </div>
            </div>

            <div class="col-md-4 grid-margin stretch-card">
              <div class="card bg-google d-flex align-items-center">
                <div class="card-body py-5">
                  <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-repeat text-white icon-lg"></i>
                    <div class="ms-3 ">
                      <h2 class="text-white font-weight-bold">Transaksi</h2>
                      <h3 class="text-white card-text">{{ \App\Models\TransaksiM::count() }}</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection 