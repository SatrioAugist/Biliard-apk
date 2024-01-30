@extends('spica')
@section('content')
        <div class="card-body">
            <h4 class="card-title">Meja Billiard</h4>

            <div class="card-body">
            @if($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
            @endif
            @if (in_array(Auth::user()->role, ['admin', 'owner']))
            <a href="{{ route('table.create') }}" class="btn btn-outline-success">Tambah Data</a>
            <br>
            <br>
            @endif

            <div class="table-responsive">
                <table class="table table-striped table-bordered" >
                        <tr class="table-info">
                            <th style="text-align: center; vertical-align: middle;">No Meja</th>
                            <th style="text-align: center; vertical-align: middle;">Merk</th>
                            <th style="text-align: center; vertical-align: middle;">Ukuran</th>
                            <th style="text-align: center; vertical-align: middle;">Harga/Jam</th>
                            @if (in_array(Auth::user()->role, ['admin','owner']))
                            <th style="text-align: center; vertical-align: middle;">Aksi</th>
                            @endif
                        </tr>
                    @if(count($tablesM) > 0)
                    @foreach ($tablesM as $tables)
                    <tbody>
                        <tr>
                            <td style="text-align: center; vertical-align: middle;">{{ $tables->id }}</td>
                            <td style="text-align: center; vertical-align: middle;">{{ $tables->merk }}</td>
                            <td style="text-align: center; vertical-align: middle;">{{ $tables->ukuran }} feet</td>
                            <td style="text-align: center; vertical-align: middle;">Rp {{ number_format($tables->harga, 0, ',', '.') }}</td>
                            @if (in_array(Auth::user()->role, ['admin', 'owner']))
                        <td style="text-align: center; vertical-align: middle;">
                            <div class="btn-group">
                                <a href="{{ route('tables.edit', $tables->id) }}" class="btn btn-outline-warning btn-xs"
                                    style="border-radius: 10px; margin-right: 5px;">
                                    <i class="mdi mdi-pencil"></i>
                                </a>

                                <form action="{{ route('tables.destroy', $tables->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger btn-xs"
                                        style="border-radius: 10px; margin-left: 5px;"
                                        onclick="return confirm('Konfirmasi Hapus Data !?')">
                                        <i class="mdi mdi-delete-forever"></i>
                                    </button>
                                </form>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td colspan="3" style="text-align: center; vertical-align: middle;">Data Tidak Ditemukan</td>
                    </tr>
                    @endif
                </tbody>
                </table>
            </div>
        </div>
@endsection