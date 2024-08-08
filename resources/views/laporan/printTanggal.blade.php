<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .transaksi-container {
            max-width: 1000px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .transaksi-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .transaksi-header h2 {
            margin: 0;
            font-size: 24px;
            color: #333;
        }

        .transaksi-header h3 {
            margin: 10px 0 20px;
            font-size: 18px;
            color: #666;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .total-row {
            font-weight: bold;
            background-color: #f9f9f9;
        }

        .total-row td {
            border-top: 2px solid #ddd;
        }

        .transaksi-body {
            margin-top: 20px;
        }

        .transaksi-body h4 {
            margin: 20px 0;
            font-size: 16px;
            color: #333;
        }

        @media print {
            body {
                margin: 0;
                padding: 0;
            }

            .transaksi-container {
                box-shadow: none;
                border: none;
            }

            table {
                margin: 0;
            }

            th,
            td {
                padding: 8px;
            }
        }
    </style>
</head>

<body>
    <div class="transaksi-container">
        <div class="transaksi-header">
            <h2>Laporan Transaksi</h2>
            <h3>{{ $dari }} Sampai {{ $sampai }}</h3>
        </div>

        <div class="transaksi-body">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Transaksi</th>
                        <th>Tanggal</th>
                        <th>Barang</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transaksi as $item)
                        @foreach ($transaksiDetails[$item->kode_transaksi] as $detail)
                            <tr>
                                <td>{{ $loop->parent->iteration }}</td>
                                <td>{{ $item->kode_transaksi }}</td>
                                <td>{{ $item->tanggal }}</td>
                                <td>{{ $detail->barang }}</td>
                                <td>{{ number_format($detail->harga, 0, ',', '.') }}</td>
                                <td>{{ $detail->jumlah }}</td>
                                <td>{{ number_format($detail->total, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        <tr class="total-row">
                            <td colspan="6" style="text-align: right;"><strong>Total</strong></td>
                            <td>{{ number_format($item->total, 0, ',', '.') }}</td>
                        </tr>
                        <tr class="total-row">
                            <td colspan="6" style="text-align: right;"><strong>Bayar</strong></td>
                            <td>{{ number_format($item->bayar, 0, ',', '.') }}</td>
                        </tr>
                        <tr class="total-row">
                            <td colspan="6" style="text-align: right;"><strong>Kembali</strong></td>
                            <td>{{ number_format($item->kembali, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="text-align: right; font-weight: bold; font-size: 18px; margin-top: 20px;">
                Total Keseluruhan: {{ number_format($total, 0, ',', '.') }}.000
            </div>
        </div>
    </div>
</body>

</html>
