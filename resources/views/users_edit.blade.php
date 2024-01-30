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
      <h3 class="card-title">Edit Data Pengguna</h3>
    </div>
    <div class="card-body">
      <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
      <br><br>

      <form action="{{ route('users.update', $data->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-group">
          <label>Username</label>
          <input name="username" type="text" class="form-control" placeholder="..." value="{{ $data->username }}"
            >
          @error('username')
          <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="form-group">
          <label>Nama Lengkap</label>
          <input name="name" type="text" class="form-control" placeholder="..." value="{{ $data->name}}">
          @error('name')
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
          @error('jk')
          <p>{{ $message }}</p>
          @enderror
        </div>
        <!-- <input type="submit" name="submit" class="btn btn-success" value="Tambah"> -->
        @csrf
        @method('put')
        <button type="submit" name="submit" class="btn btn-success">Simpan</button>
      </form>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
@endsection