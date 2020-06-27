@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{$title}}</div>
            <div class="card-body">
                <a href="{{route('konsumen.pemesanan.index')}}"
                    class="btn btn-primary btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
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