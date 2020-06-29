@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
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
                        <th>Status</th>
                        <th style="width: 220px;">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach($model as $index => $data)

                        <tr>
                            <td>
                                {!! html_entity_decode($data->no_pemesanan) !!}
                            </td>
                            <td>{!! $data->status_label !!}</td>
                            <td>
                                <a href="{{route('admin.pemesanan.detail', ['id' => $data->id])}}"
                                   class="btn btn-primary btn-xs"><i class="fa fa-file"></i> Detail</a>
                            </td>
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