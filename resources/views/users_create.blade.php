@extends('spica')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Billiard Apk</h1>
      </div>

    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tambah Data Pengguna</h3>
    </div>
    <div class="card-body">
      <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
      <br><br>

      <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="form-group">
          <label>Username</label>
          <input name="username" type="text" class="form-control" placeholder="...">
          @error('username')
          <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="form-group">
          <label>Nama Lengkap</label>
          <input name="name" type="text" class="form-control" placeholder="...">
          @error('name')
          <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="form-group">
          <label>Password</label>
          <input name="password" type="password" class="form-control" placeholder="...">
          @error('password')
          <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="form-group">
          <label>Ulangi Password</label>
          <input name="password_confirm" type="password" class="form-control" placeholder="...">
          @error('password_confirm')
          <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="form-group">
          <label>Role</label>
          <select name="role" class="form-control">
            <option>-Pilih Role</option>
            <option value="kasir">Kasir</option>
            <option value="owner">Owner</option>
            <option value="teller">Teller</option>
          </select>
          @error('role')
          <p>{{ $message }}</p>
          @enderror
        </div>
        <button type="submit" name="submit" class="btn btn-success"> Tambah</button>
      </form>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
@endsection