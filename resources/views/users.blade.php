@extends('spica')
@section('content')
        <div class="card-body">
            <h4 class="card-title">Daftar Pengguna</h4>

            <section class="content">
    <!-- Default box -->
   
        <div class="card-body">
            @if($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
            @endif
            <a href="{{ route('users.create') }}" class="btn btn-outline-success">Tambah</a>
            <br>
            <br>
            <table class="table table-striped table-bordered ">
                <tr class="table-info">
                    <th style="text-align: center">Nama Lengkap</th>
                    <th style="text-align: center">Username</th>
                    <th style="text-align: center">Role</th>
                    <th style="text-align: center">Aksi</th>
                </tr>
                @if(count($usersM) > 0)
                @foreach ($usersM as $data)
                <tr>
                    <td style="text-align: center">{{ $data->name }}</td>
                    <td style="text-align: center">{{ $data->username }}</td>
                    <td style="text-align: center">{{ $data->role }}</td>
                    <td style="text-align: center">

                        <div class="btn-group" style="margin-right: 1px;">
                            <a href="{{ route('users.edit', $data->id) }}" class="btn btn-outline-warning btn-xs">
                                <i class="mdi mdi-pencil"></i>
                            </a>
                        </div>
                        
                        <div class="btn-group" style="margin-right: 1px;">
                            <a href="{{ route('users.changepassword', $data->id) }}" class="btn btn-outline-warning btn-xs">
                                <i class="mdi mdi-account-key"></i>
                            </a>
                        </div>

                        <form action="{{ route('users.destroy', $data->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-outline-danger btn-xs"
                              
                                onclick="return confirm('Konfirmasi Hapus Data Pengguna !?')">
                                <i class="mdi mdi-delete-forever"></i>
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="4" style="text-align: center">Data Tidak Ditemukan</td>
                </tr>
                @endif
            </table>
        </div>
        <!-- /.card-body -->
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection