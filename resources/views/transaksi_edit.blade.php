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
      <h3 class="card-title">Edit Data Transaksi</h3>
    </div>
    <div class="card-body">
      <a href="{{ route('transaksi.index') }}" class="btn btn-secondary">Kembali</a>
      <br><br>

      <form action="{{ route('transaksi.update', $transaksi ->id) }}" method="POST">
        @csrf
        @method('put')

        <div class="form-group">
          <label for="">Nomor Unik</label>
          <select name="reservations_id" class="form-control">
            <option value="">Pilih Nomor Unik</option>
            @foreach ($reservationsM as $data)
            <?php 
                    if($data->id == $transaksi->reservations_id):
                         $selected = "selected";
                    else:
                            $selected = "";
                    endif
                    ?>
            <option {{ $selected}} value="{{ $data->id }}">
              {{ $data->nomor_unik }} - {{ $data->nama_pelanggan }} - {{$data->table_id}} - {{$data->harga_bayar}}
            </option>
            @endforeach
          </select>

          @error('reservations_id')
          <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="form-group">
          <label>Uang Bayar</label>
          <input name="uang_bayar" type="number" class="form-control" placeholder="..."
            value="{{ $transaksi->uang_bayar}}">
          @error('uang_bayar')
          <p>{{ $message }}</p>
          @enderror
        </div>





        <input type="submit" name="submit" class="btn btn-success" value="Simpan">
      </form>
    </div>
    <!-- /.card-body -->
    <!-- /.card-footer-->
  </div>
  <!-- /.card -->

</section>
<!-- /.content -->
@endsection