<!DOCTYPE html>
<html>
<head>
    <title>Laporan Penjualan</title>
    <style type="text/css">
        .tabel1 {
            font-family: sans-serif;
            color: #232323;
            border-collapse: collapse;
        }
        .tabel1, th, td {
            border: 1px solid #999;
            padding: 8px 20px;
        }
    </style>
</head>
<body>
    <h4 align="center">Laporan Penjualan Berdasarkan Barang</h4>
    <table class="tabel1">
        <thead>
            <tr>
                <th style="width:20%">Merk Barang</th>
                <th style="width:15%">Bulan</th>
                <th style="width:15%">Jumlah Terjual</th>
                <th style="width:15%">Total Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporan as $data)
                <tr>
                    <td>{{ $data->merk }}</td>
                    <td>{{ $data->bulan }}</td>
                    <td>{{ $data->jumlah }}</td>
                    <td>Rp {{ number_format($data->pendapatan, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
