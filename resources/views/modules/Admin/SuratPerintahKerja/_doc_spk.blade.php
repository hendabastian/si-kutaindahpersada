<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Perintah Kerja</title>
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
                <h3 style="margin: 5px 0px; text-decoration: underline;">Surat Perintah Kerja</h3>
            </th>
        </tr>
        <tr>
            <td style="text-align: center; width: 100%;">
                <p style="margin: -10px 0px; ">No. {{$pemesanan->no_pemesanan}}</p>
            </td>
        </tr>
    </table>
    <p>Yang bertanda tangan dibawah ini:</p>
    <table style="width: 100%;">
        <tr>
            <td style="width: 20px;">1.</td>
            <td style="width: 100px;">Nama</td>
            <td style="width: 20px;">:</td>
            <td>{{$pemesanan->getUser->name}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Alamat</td>
            <td>:</td>
            <td>{{$pemesanan->alamat}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Jabatan</td>
            <td>:</td>
            <td>Kepala Proyek</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="3"><p>Untuk Selanjutnya disebut <b>"Pemberi Tugas"</b></p></td>
        </tr>
    </table>

    <table style="width: 100%;">
        <tr>
            <td style="width: 20px;">2.</td>
            <td style="width: 100px;">Nama</td>
            <td style="width: 20px;">:</td>
            <td>{{$pelaksana->name}}</td>
        </tr>
        <tr>
            <td></td>
            <td>Alamat</td>
            <td>:</td>
            <td>Komplek Duta Asri Residence No. A14</td>
        </tr>
        <tr>
            <td></td>
            <td>Jabatan</td>
            <td>:</td>
            <td>Pelaksana</td>
        </tr>
        <tr>
            <td></td>
            <td>No. HP</td>
            <td>:</td>
            <td>{{$pelaksana->phone}}</td>
        </tr>
        <tr>
            <td></td>
            <td colspan="4"><p>Untuk Selanjutnya disebut <b>"Sub Kontraktor / Pemegang SPK"</b></p></td>
        </tr>
    </table>
    <p>Pemberi Tugas memerintahkan kepada pemborong untuk melaksanakan <b>Pembangunan {{$pemesanan->tipe_bangunan}}</b> dengan spesifikasi sebagai berikut:</p>
    <table>
        <tr>
            <th style="text-align: left;">Luas Tanah</th>
            <td style="text-align: left;">:</td>
            <td style="text-align: left;">{{$pemesanan->luas_tanah}}</td>
        </tr>
        <tr>
            <th style="text-align: left;">Luas Bangunan</th>
            <td style="text-align: left;">:</td>
            <td style="text-align: left;">{{$pemesanan->luas_bangunan}}</td>
        </tr>
    </table>
    <p>Ketentuan - ketentuan yang harus dipenuhi adalah sebagai berikut:</p>
    <ol>
        <li>Sub Kontraktor bertanggung jawab atas tenaga kerja baik langsung ataupun tidak langsung.</li>
        <li>Sub Kontraktor tidak bisa memindah-tangankan SPK ini.</li>
        <li>Sub Kontraktor menjamin kondisi alat kerja baik agar tidak mengganggu pekerjaan.</li>
        <li>Sub Kontraktor bersedia dicabut SPK nya bila tidak memenuhi ketentuan pada point 1, 2, dan 3 diatas.</li>
        <li>Pemberi Tugas tidak menanggung segala biaya kerusakan Alat KeijaVolume pekeijaan didalam SPK tidak mengikat, yang mengikat adalah harga satuan pekerjaan. Harga satuan adalahharga pasti, tidak ada eskalasi harga. Pembayaran didasarkan kepada volume pekerjaan yang dikerjakan.</li>
        <li>Apabila dikemudian hari terdapat perubahan-perubahan Spek, Jumlah dan Ketentuan akan dituangkan dalam Revisi SPK.</li>
        <li>Harga satuan pekerjaan sudah termasuk Pph (Pajak Penghasilan).</li>
        <li>Hal-hal lain yang tidak terdapat di dalam SPK ini dapat ditambahkan kemudian sesuai kesepakatan bersama.</li>
    </ol>

    <p>Demikian Surat Perintah Kerja ini dibuat untuk dapat dilaksanakan dengan sebenarnya.</p>
</body>

</html>