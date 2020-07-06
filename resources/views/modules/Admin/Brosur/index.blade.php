@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4>Brosur</h4>
            </div>
            <div class="card-body">
                <a href="{{route('admin.brosur.create')}}" class="btn btn-primary">Tambah
                    Brosur</a>
                <hr>
                @if(!empty($model))
                <table class="table table-striped">
                    <thead>
                        <th>Judul</th>
                        <th>Model</th>
                        <th style="width: 220px;">Aksi</th>
                    </thead>
                    <tbody>
                        @foreach($model as $index => $data)

                        <tr>
                            <td>{{$data->judul}}</td>
                            <td>
                                {{$data->model}}
                            </td>
                            <td>
                                <form action="{{route('admin.brosur.delete',  ['id' => $data->id])}}"
                                      method="post">
                                    @csrf
                                    @method('delete')
                                    <a href="{{route('admin.brosur.detail', ['id' => $data->id])}}"
                                       class="btn btn-primary btn-xs"><i class="fa fa-file"></i> Detail</a>
                                    <a href="{{route('admin.brosur.edit', ['id' => $data->id])}}"
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