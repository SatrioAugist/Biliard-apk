<h1>Daftar Transaksi</h1>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th style="text-align: center; vertical-align: middle;">Nomor Unik</th>
        <th style="text-align: center; vertical-align: middle;">Nama Pelanggan</th>
        <th style="text-align: center; vertical-align: middle;">No Meja</th>
        <th style="text-align: center; vertical-align: middle;">Harga Bayar</th>
        <th style="text-align: center; vertical-align: middle;">Uang Bayar</th>
        <th style="text-align: center; vertical-align: middle;">Uang Kembali</th>
        <th style="text-align: center; vertical-align: middle;">Tanggal</th>
    </tr>
    @foreach ($transaksiM as $trans)
    <tr>
        <td style="text-align: center; vertical-align: middle;">{{ $trans->nomor_unik }}</td>
        <td style="text-align: center; vertical-align: middle;">{{ $trans->nama_pelanggan }}</td>
        <td style="text-align: center; vertical-align: middle;">{{ $trans->table_id }}</td>
        <td style="text-align: center; vertical-align: middle;">{{ $trans->harga_bayar }}</td>
        <td style="text-align: center; vertical-align: middle;">{{ $trans->uang_bayar }}</td>
        <td style="text-align: center; vertical-align: middle;">{{ $trans->uang_kembali }}</td>
        <td style="text-align: center; vertical-align: middle;">{{ $trans->created_at }}</td>
        <td style="text-align: center; vertical-align: middle;">
    </tr>
    @endforeach
</table>