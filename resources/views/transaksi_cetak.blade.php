<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: "Courier New", monospace;
            text-align: left;
            /* Mengatur konten ke tengah */
        }

        h1 {
            text-align: center;
        }

        .invoice {
            width: 50%;
            /* Lebar invoice */
            margin: 0 auto;
            /* Mengatur posisi ke tengah */
            border: 2px solid #000;
            /* Garis border untuk invoice */
            padding: 20px;
            /* Ruang dalam di sekitar invoice */
        }

        .invoice-item {
            margin-bottom: 20px;
            text-align: left;
            /* Konten item invoice rata kiri */
        }

        .item-label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Struk Transaksi</h1>

    @foreach($transaksiM as $data)
    <div class="invoice">
        <div class="invoice-item">
            <span class="item-label">Nomor Unik:</span> {{ $data->nomor_unik }}
        </div>
        <P>=====================================</P>
        <div class="invoice-item">
            <span class="item-label">Nama Pelanggan:</span> {{ $data->nama_pelanggan }}
        </div>
        <P>=====================================</P>
        <div class="invoice-item">
            <span class="item-label">Nomor Meja:</span> {{ $data->id }}
        </div>
        <P>=====================================</P>
        <div class="invoice-item">
            <span class="item-label">Harga/Jam:</span> {{ $data->harga_bayar }}
        </div>
        <P>=====================================</P>
        <div class="invoice-item">
            <span class="item-label">Jumlah Jam:</span> {{ $data->uang_bayar }}
        </div>
        <P>=====================================</P>
        <div class="invoice-item">
            <span class="item-label">Jam Mulai:</span> {{ $data->uang_kembali }}
        </div>
        <P>=====================================</P>
        <div class="invoice-item">
            <span class="item-label">Tanggal:</span> {{ $data->created_at }}
        </div>

    </div>
    @endforeach
</body>

</html>