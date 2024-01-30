@extends('spica')
@section('content')
<div class="card-body">
  <h4 class="card-title">Reservasi</h4>

  <div class="card-body">
    @if($message = Session::get('success'))
    <div class="alert alert-success">{{ $message }}</div>
    @endif
    @if (in_array(Auth::user()->role, ['admin', 'teller']))
    <a href="{{ route('reservations.create') }}" class="btn btn-outline-success">Tambah</a>
    @endif

    @if (in_array(Auth::user()->role, ['admin', 'teller','owner']))
    <a href="{{ url('reservations/pdf') }}" class="btn btn-outline-warning">Unduh PDF</a>
    <br> <br>
    @endif
    <form action="{{ route('reservations.index') }}" method="get">
      <div class="input-group">
        <input type="search" name="search" class="form-control" placeholder="Masukan Nama produk" value="{{ $vcari }}">
        <button type="submit" style="border-radius: 10px; margin-left: 5px;"
          class="btn btn-outline-primary">Cari</button>
        <a href="{{ route('reservations.index') }}"><button type="button" style="border-radius: 10px; margin-left: 5px;"
            class="btn btn-outline-danger">Reset</button></a>
      </div>
      <br>

      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <tr class="table-info">
            <th style="text-align: center; vertical-align: middle;">Nomor Unik</th>
            <th style="text-align: center; vertical-align: middle;">Nama Pelanggan</th>
            <th style="text-align: center; vertical-align: middle;">No Meja</th>
            <th style="text-align: center; vertical-align: middle;">Merk & Ukuran Meja</th>
            <th style="text-align: center; vertical-align: middle;">Harga/Jam</th>
            <th style="text-align: center; vertical-align: middle;">Jumlah Jam</th>
            <th style="text-align: center; vertical-align: middle;">Jam Mulai</th>
            <th style="text-align: center; vertical-align: middle;">Jam Berakhir</th>
            <th style="text-align: center; vertical-align: middle;">Harga Bayar</th>
            <th style="text-align: center; vertical-align: middle;">Tanggal</th>
            <th style="text-align: center; vertical-align: middle;">Status</th>
            @if (in_array(Auth::user()->role, ['admin', 'teller']))
            <th style="text-align: center; vertical-align: middle;">Aksi</th>
            @endif
          </tr>
          @if(count($reservationsM) > 0)
          @foreach ($reservationsM as $reserv)
          <tr>
            <td style="text-align: center; vertical-align: middle;">{{ $reserv->nomor_unik }}</td>
            <td style="text-align: center; vertical-align: middle;">{{ $reserv->nama_pelanggan }}</td>
            <td style="text-align: center; vertical-align: middle;">{{ $reserv->table_id }}</td>
            <td style="text-align: center; vertical-align: middle;">{{ $reserv->merk }} , {{ $reserv->ukuran }} feet</td>
            <td style="text-align: center; vertical-align: middle;">Rp {{ number_format($reserv->harga, 0, ',', '.') }}
            </td>
            <td style="text-align: center; vertical-align: middle;">{{ $reserv->jumlah_jam }}</td>
            <td style="text-align: center; vertical-align: middle;">{{ $reserv->jam_mulai }}</td>
            <td style="text-align: center; vertical-align: middle;">{{ $reserv->jam_akhir }}</td>
            <td style="text-align: center; vertical-align: middle;">Rp {{ number_format($reserv->harga_bayar, 0, ',','.') }}</td>
            <td style="text-align: center; vertical-align: middle;">{{ $reserv->jam }}</td>
            <td style="text-align: center; vertical-align: middle;">
              @if($reserv->status == 'Selesai')
              <span class="badge badge-success">{{ $reserv->status }}</span>
              @elseif($reserv->status == 'Pending')
              <span class="badge badge-warning">{{ $reserv->status }}</span>
              @else
              <span class="badge badge-secondary">{{ $reserv->status }}</span>
              @endif
            </td>
            @if (in_array(Auth::user()->role, ['admin', 'teller']))
            <td style="text-align: center; vertical-align: middle;">
              <div class="btn-group">
                <a href="{{ route('reservations.edit', $reserv->id) }}" class="btn btn-outline-warning btn-xs"
                  style="border-radius: 10px; margin-right: 6px;">
                  <i class="mdi mdi-pencil"></i>
                </a>
                <a href="{{ url('reservations/cetak', $reserv->id) }}" class="btn btn-outline-primary btn-xs"
                  style="border-radius: 10px; margin-right: 5px;">
                  <i class="mdi mdi-cloud-print"></i>
                </a>
                <form action="{{ route('reservations.destroy', $reserv->id) }}" method="POST"
                  style="display: inline;">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-outline-danger btn-xs" style="border-radius: 10px;"
                    onclick="return confirm('Are you sure you want to delete this reservation?')">
                    <i class="mdi mdi-delete-forever"></i>
                  </button>
                </form>
              </div>
            </td>
            @endif

          </tr>
          @endforeach
          @else
          <tr>
            <td colspan="3" style="text-align: center; vertical-align: middle;">Data Tidak Ditemukan</td>
          </tr>
          @endif
        </table>
      </div>
  </div>
  @endsection