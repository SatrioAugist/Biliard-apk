@extends('spica')
@section('content')

        <div class="card-body">
            <h4 class="card-title">Transaksi</h4>

            <div class="card-body">
            @if($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
            @endif
                @if (in_array(Auth::user()->role, ['admin', 'kasir']))
                    <a href="{{ route('transaksi.create') }}" class="btn btn-outline-success">Transaksi</a>
                    @endif
                    @if (in_array(Auth::user()->role, ['admin', 'kasir','owner']))
                    <a href="{{ url('transaksi/pdf') }}" class="btn btn-outline-warning">Unduh PDF</a>
                    <br><br>
                    @endif
                <form action="{{ route('transaksi.index') }}" method="get">
                    <div class="input-group">
                        <input type="search" name="search" class="form-control" placeholder="Masukan Nama/Tanggal" value="{{ $vcari }}">
                        <button type="submit" class="btn btn-outline-primary" style="border-radius: 10px; margin-left: 5px;">Cari</button>
                        <a href="{{ route('transaksi.index') }}">
                            <button type="button" class="btn btn-outline-danger" style="border-radius: 10px; margin-left: 5px;">Reset</button>
                        </a>
                    </div>
                </form>
                <br><br>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <tr class="table-info">
                            <th style="text-align: center; vertical-align: middle;">Nomor Unik</th>
                            <th style="text-align: center; vertical-align: middle;">Nama Pelanggan</th>
                            <th style="text-align: center; vertical-align: middle;">No Meja</th>
                            <th style="text-align: center; vertical-align: middle;">Harga Bayar</th>
                            <th style="text-align: center; vertical-align: middle;">Uang Bayar</th>
                            <th style="text-align: center; vertical-align: middle;">Uang Kembali</th>
                            <th style="text-align: center; vertical-align: middle;">Tanggal</th>
                            @if (in_array(Auth::user()->role, ['admin', 'kasir']))
                                <th style="text-align: center; vertical-align: middle;">Aksi</th>
                            @endif
                        </tr>
                        @if(count($transaksiM) > 0)
                            @foreach ($transaksiM as $index => $trans)
                                <tr >
                                    <td style="text-align: center; vertical-align: middle;">{{ $trans->nomor_unik }}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{ $trans->nama_pelanggan }}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{ $trans->table_id }}</td>
                                    <td style="text-align: center; vertical-align: middle;">Rp {{ number_format($trans->harga_bayar, 0, ',', '.') }}</td>
                                    <td style="text-align: center; vertical-align: middle;">Rp {{ number_format($trans->uang_bayar, 0, ',', '.') }}</td>
                                    <td style="text-align: center; vertical-align: middle;">Rp {{ number_format($trans->uang_kembali, 0, ',', '.') }}</td>
                                    <td style="text-align: center; vertical-align: middle;">{{ $trans->created_at }}</td>
                                    @if (in_array(Auth::user()->role, ['admin', 'kasir']))
                                        <td style="text-align: center; vertical-align: middle;">
                                            <div class="btn-group">
                                                <a href="{{ route('transaksi.edit', $trans->id) }}" class="btn btn-outline-warning btn-xs" style="border-radius: 10px; margin-right: 5px;">
                                                    <i class="mdi mdi-pencil"></i>
                                                </a>
                                                <a href="{{ url('transaksi/cetak', $trans->id) }}" class="btn btn-outline-primary btn-xs" style="border-radius: 10px; margin-right: 5px;">
                                                    <i class="mdi mdi-cloud-print"></i>
                                                </a>
                                                <form action="  " method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger btn-xs" style="border-radius: 10px; margin-left: 5px;" onclick="return confirm('Konfirmasi Hapus Data !?')">
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