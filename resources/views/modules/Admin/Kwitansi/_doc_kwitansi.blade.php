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
            <th style="text-align: center; width: 100%;">
                <h1 style="margin: -5px 0px;">PT. Kuta Indah Persada</h1>
            </th>
        </tr>
        <tr>
            <th style="text-align: center; width: 100%;">
                <p style="margin: -5px 0px;">Jl. Ciawi Tali, No.23A Citereup, Cimahi, Jawa Barat. </p>
            </th>
        </tr>
        <tr>
            <th style="text-align: center; width: 100%;">
                <h3 style="margin: 5px 0px; text-decoration: underline;">Kwitansi</h3>
            </th>
        </tr>
        <tr>
            <td style="text-align: center; width: 100%;">
                <p style="margin: -10px 0px; ">No. Pemesanan: {{$model->no_pemesanan}}</p>
            </td>
        </tr>
    </table>
    <br>
    <table border="1">
        <tr>
            <th style="text-align: left; width: 35px;">No</th>
            <th style="text-align: left; width: 150px;">Uraian</th>
            <th style="text-align: left; width: 150px;">Satuan</th>
            <th style="text-align: left; width: 150px;">Volume</th>
            <th style="text-align: left; width: 150px;">Harga Satuan</th>
            <th style="text-align: left; width: 150px;">Total Harga</th>
            <th style="text-align: left; width: 150px;">Deskripsi</th>
        </tr>
        <tbody>
            @foreach($model->getRAB->getDetail as $index => $item)
            @php
            $total += ($item->volume * $item->harga_satuan);
            @endphp
            <tr>
                <td>{{$no++}}</td>
                <td>{{$item->uraian}}</td>
                <td>{{$item->satuan}}</td>
                <td>{{number_format($item->volume)}}</td>
                <td>{{number_format($item->harga_satuan)}}</td>
                <td>{{number_format($item->volume * $item->harga_satuan)}}</td>
                <td>{{$item->deskripsi}}</td>
            </tr>

            @endforeach
            <tr>
                <th colspan="5" class="text-right">Subtotal</th>
                <td colspan="2">{{number_format($total)}}</td>
            </tr>
            <tr>
                <th colspan="5" class="text-right">PPH 4%</th>
                <td colspan="2">{{number_format($total * 0.04)}}</td>
            </tr>
            <tr>
                <th colspan="5" class="text-right">Jumlah (incl. PPH)</th>
                <td colspan="2">{{number_format($total + ($total * 0.04))}}</td>
            </tr>
            @php
            function penyebut($nilai) {
            $nilai = abs($nilai);
            $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan",
            "sepuluh", "sebelas");
            $temp = "";
            if ($nilai < 12) {
              $temp=" " . $huruf[$nilai];
              } else if ($nilai <20) {
              $temp=penyebut($nilai - 10). " belas" ;
              } else if ($nilai < 100) {
              $temp=penyebut($nilai/10)." puluh". penyebut($nilai % 10);
              } else if ($nilai < 200) {
              $temp=" seratus" . penyebut($nilai - 100);
              } else if ($nilai < 1000) {
              $temp=penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
              } else if ($nilai < 2000) {
              $temp=" seribu" . penyebut($nilai - 1000);
              } else if ($nilai < 1000000) {
              $temp=penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
              } else if ($nilai < 1000000000) {
              $temp=penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
              } else if ($nilai < 1000000000000) {
              $temp=penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
              } else if ($nilai < 1000000000000000) {
              $temp=penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
              }
              return $temp;
              }

              function terbilang($nilai) {
              if($nilai<0) {
              $hasil="minus " . trim(penyebut($nilai));
              } else {
              $hasil=trim(penyebut($nilai));
              }
              return $hasil;
              }
              $terbilang = ucwords(terbilang($total + ($total * 0.04)))." Rupiah";
              @endphp
              <tr>
                <td colspan="7">Terbilang: ## {{$terbilang}}</td>
                </tr>
        </tbody>
    </table>
    <br>
    <table style="width: 100%;">
        <tr>
            <th style="text-align: right; width: 100%;">
            <p style="margin: -5px 0px;">Bandung, {{date('d-M-Y')}}</p>
            </th>
        </tr>
    </table>
</body>

</html>