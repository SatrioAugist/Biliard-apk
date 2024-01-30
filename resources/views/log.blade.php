@extends('spica')
@section('content')
<!-- Content Header (Page header) -->


<!-- Main content -->
    <!-- Default box -->
    <div class="card-body">
        <h4 class="card-title">Aktivitas</h4>
        
        <div class="card-body">
            @if($message = Session::get('success'))
            <div class="alert alert-success">{{ $message }}</div>
            @endif
            <br>
            <table class="table table-striped table-bordered">
                <tr class="table-info">
                    <th style="text-align: center; vertical-align: middle;">Nama User & Role</th>
                    <th style="text-align: center; vertical-align: middle;">Activity</th>
                    <th style="text-align: center; vertical-align: middle;">Tanggal & Waktu</th>
                </tr>
                @if(count($LogM) > 0)
                @foreach ($LogM as $data)
                <tr>
                    <td style="text-align: center; vertical-align: middle;">{{ $data->name }},{{ $data->role }}</td>
                    <td style="text-align: center; vertical-align: middle;">{{ $data->activity }}</td>
                    <td style="text-align: center; vertical-align: middle;">{{ $data->created_at }}</td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="3" style="text-align: center; vertical-align: middle;">Data Tidak Ditemukan</td>
                </tr>
                @endif
            </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->
</section>
<!-- /.content -->
@endsection