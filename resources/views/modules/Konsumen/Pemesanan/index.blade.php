@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4>Pemesanan</h4>
            </div>
            <div class="card-body">
                <a href="{{route('konsumen.pemesanan.create')}}" class="btn btn-primary">Tambah
                    Pemesanan</a>
                <hr>
                @if($model->isNotEmpty())
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
                                <form action="{{route('konsumen.pemesanan.delete',  ['id' => $data->id])}}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('konsumen.pemesanan.detail', ['id' => $data->id])}}"
                                       class="btn btn-primary btn-xs"><i class="fa fa-file"></i> Detail</a>
                                    <a href="{{route('konsumen.pemesanan.edit', ['id' => $data->id])}}"
                                       class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>
                                        Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                Tidak Ada DataPemesanan
                @endif
            </div>
        </div>
    </div>
</div>
@endsection