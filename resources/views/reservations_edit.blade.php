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
      <a href="{{ route('reservations.index') }}" class="btn btn-secondary">Kembali</a>
      <br><br>

      <form action="{{ route('reservations.update', $reservations->id)}}" method="POST">
         @csrf
        @method('put')

        <div class="form-group">
          <label>Nomor Unik</label>
          <input name="nomor_unik" type="text" class="form-control" placeholder="..."
            value="{{ $reservations->nomor_unik}}">
          @error('nomor_unik')
          <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="form-group">
          <label>Nama Pelanngan</label>
          <input name="nama_pelanggan" type="text" class="form-control" placeholder="..."
            value="{{ $reservations->nama_pelanggan}}">
          @error('nama_pelanggan')
          <p>{{ $message }}</p>
          @enderror
        </div>


        <div class="form-group">
          <label>Jumlah Jam</label>
          <input name="jumlah_jam" type="number" class="form-control" placeholder="..."
            value="{{ $reservations->jumlah_jam}}">
          @error('jumlah_jam')
          <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="form-group">
          <label>Jam Mulai</label>
          <input name="jam_mulai" type="time" class="form-control" placeholder="..."
            value="{{ $reservations->jam_mulai}}">
          @error('jam_mulai')
          <p>{{ $message }}</p>
          @enderror
        </div>

        <div class="form-group">
          <label>Jam Akhir</label>
          <input name="jam_akhir" type="time" class="form-control" placeholder="..."
            value="{{ $reservations->jam_akhir}}">
          @error('jam_akhir')
          <p>{{ $message }}</p>
          @enderror
        </div>


        <div class="form-group">
          <label for="">No Meja + Merk + Ukuran + Harga</label>
          <select name="table_id" class="form-control" required>
            <option value="">Pilih Meja</option>
            @foreach ($tablesM as $data)
            <?php 
                    if($data->id == $reservations->table_id):
                         $selected = "selected";
                else:
                         $selected = "";
                endif
                ?>
            <option {{ $selected}} value="{{ $data->id }}">
              {{$data->merk}} - {{$data->ukuran}} - {{$data->harga}}
            </option>
            @endforeach
          </select>
          @error('table_id')
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