@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        <a href="{{asset('uploads/' . $model->file)}}" target="_blank" rel="noopener noreferrer">
            <img src="{{asset('uploads/' . $model->file)}}" style="width: 100%;">
        </a>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{$model->judul}}</div>
            <div class="card-body">
                <form action="{{route('admin.info-pembangunan-rumah.delete',  ['id' => $model->id])}}"
                      method="post">
                    @csrf
                    @method('delete')
                    <a href="{{route('admin.info-pembangunan-rumah.detail', ['id' => $model->id])}}"
                       class="btn btn-primary btn-xs"><i class="fa fa-file"></i> Detail</a>
                    <a href="{{route('admin.info-pembangunan-rumah.edit', ['id' => $model->id])}}"
                       class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                    <button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i>
                        Delete</button>
                </form>
                <hr>
                {!! html_entity_decode($model->deskripsi) !!}
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