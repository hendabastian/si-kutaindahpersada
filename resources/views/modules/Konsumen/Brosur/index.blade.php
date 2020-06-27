@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4>Brosur</h4>
            </div>
            <div class="card-body">
                <a href="{{route('brosur.create')}}" class="btn btn-primary">Tambah
                    Brosur</a>
                <hr>
                @if(!empty($model))
                <table class="table table-striped">
                    <thead>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th style="width: 220px;">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach($model as $index => $data)

                        <tr>
                            <td>{{$data->judul}}</td>
                            <td>
                                {!! html_entity_decode($data->deskripsi) !!}
                            </td>
                            <td>
                                <form action="{{route('brosur.delete',  ['id' => $data->id])}}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('brosur.detail', ['id' => $data->id])}}"
                                       class="btn btn-primary btn-xs"><i class="fa fa-file"></i> Detail</a>
                                    <a href="{{route('brosur.edit', ['id' => $data->id])}}"
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
                Tidak Ada DataBrosur
                @endif
            </div>
        </div>
    </div>
</div>
@endsection