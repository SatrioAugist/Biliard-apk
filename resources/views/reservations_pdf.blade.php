<h1>Daftar Reservasi</h1>
<table width="100%" border="1" cellpadding="5" cellspacing="0">
    <tr>
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
    </tr>
    @foreach ($reservationsM as $reserv)
    <tr>
        <td style="text-align: center; vertical-align: middle;">{{ $reserv->nomor_unik }}</td>
        <td style="text-align: center; vertical-align: middle;">{{ $reserv->nama_pelanggan }}</td>
        <td style="text-align: center; vertical-align: middle;">{{ $reserv->table_id }}</td>
        <td style="text-align: center; vertical-align: middle;">{{ $reserv->merk }} , {{ $reserv->ukuran }} feet</td>
        <td style="text-align: center; vertical-align: middle;">{{ $reserv->harga }}</td>
        <td style="text-align: center; vertical-align: middle;">{{ $reserv->jumlah_jam }}</td>
        <td style="text-align: center; vertical-align: middle;">{{ $reserv->jam_mulai }}</td>
        <td style="text-align: center; vertical-align: middle;">{{ $reserv->jam_akhir }}</td>
        <td style="text-align: center; vertical-align: middle;">{{ $reserv->harga_bayar }}</td>
        <td style="text-align: center; vertical-align: middle;">{{ $reserv->created_at }}</td>

    </tr>
    @endforeach
</table>