@extends('layouts.quixlab')

@section('content')
<style>


    .progressbar {
        counter-reset: step;
    }

    .progressbar li {
        list-style-type: none;
        width: 25%;
        float: left;
        font-size: 12px;
        position: relative;
        text-align: center;
        text-transform: uppercase;
        color: #7d7d7d;
    }

    .progressbar li:before {
        width: 30px;
        height: 30px;
        content: counter(step);
        counter-increment: step;
        line-height: 30px;
        border: 2px solid #7d7d7d;
        display: block;
        text-align: center;
        margin: 0 auto 10px auto;
        border-radius: 50%;
        background-color: white;
    }

    .progressbar li:after {
        width: 100%;
        height: 2px;
        content: '';
        position: absolute;
        background-color: #7d7d7d;
        top: 15px;
        left: -50%;
        z-index: -1;
    }

    .progressbar li:first-child:after {
        content: none;
    }

    .progressbar li.active {
        color: green;
    }

    .progressbar li.active:before {
        border-color: #55b776;
    }

    .progressbar li.active+li:after {
        background-color: #55b776;
    }
</style>
<div class="row justify-content-center">
    <div class="col-md-12">
        <ul class="progressbar" style="width: 100%;">
            <li>Pekerjaan Awal</li>
            <li>Pembangunan Pondasi</li>
            <li>Pekerjaan Struktur</li>
            <li>Pekerjaan Dinding</li>
            <li>Pekerjaan Kusen, Pintu & Jendela</li>
            <li>Pekerjaan Rangka Atap</li>
            <li>Pekerjaan Plumbing</li>
            <li>Finishing</li>
        </ul>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4>Pemesanan</h4>
            </div>
            <div class="card-body">
                @if(!empty($model))
                <table class="table table-striped">
                    <thead>
                        <th>No. Pemesanan</th>
                        <th>Nama Konsumen</th>
                        <th>Tipe Bangunan</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Selesai</th>
                    </thead>
                    <tbody>
                        @foreach($model as $index => $data)
                        <tr>
                            <td>
                                {{$data->no_pemesanan}}
                            </td>
                            <td>{{$data->nama_pemesan}}</td>
                            <td>{{$data->tipe_bangunan}}</td>
                            <td>{{date('d-M-Y', strtotime($data->getJadwal->tgl_mulai)) }}</td>
                            <td>{{date('d-M-Y', strtotime($data->getJadwal->tgl_selesai)) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                Tidak Ada Data Pemesanan
                @endif
            </div>
        </div>
    </div>
</div>
@endsection