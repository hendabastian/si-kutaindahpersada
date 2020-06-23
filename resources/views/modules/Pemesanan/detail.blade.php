@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{$title}}</div>
            <div class="card-body">
                <form action="{{route('pemesanan.delete',  ['id' => $model->id])}}"
                      method="post">
                    @csrf
                    @method('delete')
                    <a href="{{route('pemesanan.detail', ['id' => $model->id])}}"
                       class="btn btn-primary btn-xs"><i class="fa fa-file"></i> Detail</a>
                    <a href="{{route('pemesanan.edit', ['id' => $model->id])}}"
                       class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>
                        Delete</button>
                </form>
                <hr>
                <h4>Deskripsi Pekerjaan:</h4>
                {!! html_entity_decode($model->deskripsi) !!}

                <h4>Alamat</h4>
                {{$model->alamat}}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    tinymce.init({
        selector: '#deskripsi',
        branding: false,
    })
</script>
@endpush