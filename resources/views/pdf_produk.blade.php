<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        thead {
            background-color: #f2f2f2;
        }

        th, td {
            padding: 8px 10px;
            border: 1px solid #ccc;
        }

        th {
            text-align: left;
            color: #2c3e50;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 10px;
            color: #999;
        }

        /* Gambar Produk */
        .product-image {
            width: 50px;
            height: auto;
        }
    </style>
</head>
<body>

    <h2>Laporan Data Produk</h2>

    <table>
        <thead>
            <tr>
                <th>ID Produk</th>
                <th>Nama Produk</th>
                <th>Stok</th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produks as $produk)
                <tr>
                    <td>{{ $produk->id_produk }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->stok }}</td>
                    <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        Dicetak pada {{ \Carbon\Carbon::now()->format('d-m-Y H:i') }}
    </div>

</body>
</html>
