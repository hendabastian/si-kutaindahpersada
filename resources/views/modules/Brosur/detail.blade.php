@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-4">
        @foreach ($model->detailBrosur as $item)
        <a href="{{asset('uploads/' . $item->file)}}" target="_blank" rel="noopener noreferrer">
            <img src="{{asset('uploads/' . $item->file)}}" style="width: 100%;">
        </a>
        <hr>
        @endforeach
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{$model->judul}}</div>
            <div class="card-body">
                <form action="{{route('brosur.delete',  ['id' => $model->id])}}"
                      method="post">
                    @csrf
                    @method('delete')
                    <a href="{{route('brosur.detail', ['id' => $model->id])}}"
                       class="btn btn-primary btn-xs"><i class="fa fa-file"></i> Detail</a>
                    <a href="{{route('brosur.edit', ['id' => $model->id])}}"
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