@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4>{{$title}}</h4>
            </div>
            <div class="card-body">
                @if($model->isNotEmpty())
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