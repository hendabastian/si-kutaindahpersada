<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kwitansi</title>
</head>

<style>
    p {
        font-size: 12pt;
    }
</style>

<body style="width: 100%;">
    <table style="width: 100%;">
        <tr>
            <td style="text-align: center;">
                <img src="{{public_path('img/kop.jpg')}}" alt="">
                <hr>
            </td>
        </tr>
        <tr>
            <th style="text-align: center; width: 100%;">
                <h3 style="margin: 5px 0px; text-decoration: underline;">Laporan Pembayaran</h3>
            </th>
        </tr>
        <tr>
            <td style="text-align: center; width: 100%;">
                <p style="margin: -10px 0px; ">Dicetak Pada: {{date('d-m-Y')}}</p>
            </td>
        </tr>
    </table>
    <br>
    <table border="1">
        <tr>
            <th style="text-align: left; width: 35px;">No.</th>
            <th style="text-align: left; width: 150px;">Nomor Pemesanan</th>
            <th style="text-align: left; width: 150px;">Tgl. Pemesanan</th>
            <th style="text-align: left; width: 150px;">Jumlah Pembayaran</th>
        </tr>
        <tbody>
            @if($model->isNotEmpty())
            @foreach ($model as $index => $item)
            @php
            $totalBayar[$index] = 0;
            @endphp
            <tr>
                <td>{{$no++}}</td>
                <td>{{$item->no_pemesanan}}</td>
                <td>{{$item->created_at}}</td>
                @foreach($item->getRAB->getDetail as $indexRAB => $itemRAB)
                    @php
                        $totalBayar[$index] += ($itemRAB->volume + $itemRAB->harga_satuan);
                    @endphp
                @endforeach
                <td>Rp. {{number_format($totalBayar[$index] + 0.04)}}</td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="5">Tidak ada data pemesanan</td>
            </tr>
            @endif
        </tbody>
    </table>
    <br>
    <table style="width: 100%;">
        <tr>
            <th style="text-align: right; width: 100%;">
                <p style="margin: -5px 0px;">Bandung, {{date('d-M-Y')}}</p>
            </th>
        </tr>
        <tr>
            <td style="text-align: right; width: 100%;">
                <img src="{{public_path('img/ttd.png')}}" style="width: 190px;">
            </td>
        </tr>
    </table>
</body>

</html>