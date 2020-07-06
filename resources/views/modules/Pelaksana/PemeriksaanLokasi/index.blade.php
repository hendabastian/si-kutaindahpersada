@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4>Pemeriksaan Lokasi</h4>
            </div>
            <div class="card-body">
                @if ($model->isNotEmpty())
                <table class="table table-striped">
                    <thead>
                        <th>No. Pemesanan</th>
                        <th>Alamat Proyek</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($model as $index => $data)
                        <tr>
                            <td>{{$data->getPemesanan->no_pemesanan}}</td>
                            <td>{{$data->getPemesanan->alamat_proyek}}</td>
                            <td>{!! $data->status_label !!}</td>
                            <td>
                                <a href="{{route('pelaksana.pemeriksaan-lokasi.detail', ['id' => $data->id])}}"
                                   class="btn btn-primary btn-xs"><i class="fa fa-file"></i> Detail</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                Tidak ada data pemeriksaan lokasi menunggu
                @endif
            </div>
        </div>
    </div>
</div>
@endsection