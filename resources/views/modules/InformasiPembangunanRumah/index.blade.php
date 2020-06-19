@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4>Informasi Pembangunan Rumah</h4>
            </div>
            <div class="card-body">
                <a href="{{route('info-pembangunan-rumah.create')}}" class="btn btn-primary">Tambah Informasi
                    Pembangunan Rumah</a>
                <hr>
                @if(!empty($model))
                <table class="table table-striped">
                    <thead>
                        <th>Deskripsi</th>
                        <th style="width: 200px;">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach($model as $index => $data)
                
                        <tr>
                            <td>
                                {{$data->deskripsi}}
                            </td>
                            <td>
                                <a href="{{route('info-pembangunan-rumah.view', ['id' => $data->id])}}"
                                   class="btn btn-primary btn-xs"><i class="fa fa-file"></i> Detail</a>
                                <a href="{{route('info-pembangunan-rumah.edit', ['id' => $data->id])}}"
                                   class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="{{route('info-pembangunan-rumah.delete', ['id' => $data->id])}}"
                                   class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                Tidak Ada Data Informasi pembangunan Rumah
                @endif
            </div>
        </div>
    </div>
</div>
@endsection