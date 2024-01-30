@extends('spica')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Billiard APK</h1>
      </div>

    </div>
  </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">

  <!-- Default box -->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tambah Data Meja</h3>
    </div>
    <div class="card-body">
      <a href="{{ route('tables.index') }}" class="btn btn-secondary">Kembali</a>
      <br><br>

      <form action="{{ route('tables.store') }}" method="POST">
        @csrf


        <div class="form-group">
          <label>Merk</label>
          <input name="merk" type="text" class="form-control" placeholder="...">
          @error('merk')
          <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="form-group">
          <label>Ukuran</label>
          <input name="ukuran" type="number" class="form-control" placeholder="...">
          @error('ukuran')
          <p>{{ $message }}</p>
          @enderror
        </div>


        <div class="form-group">
          <label>Harga</label>
          <input name="harga" type="number" class="form-control" placeholder="...">
          @error('harga')
          <p>{{ $message }}</p>
          @enderror
        </div>


        <input type="submit" name="submit" class="btn btn-success" value="Tambah">
      </form>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
@endsection