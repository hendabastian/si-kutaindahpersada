@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">Dashboard</div>
            <div class="card-body">
                <form action="{{route('admin.info-pembangunan-rumah.edit', ['id' => $model->id])}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" value="{{$model->judul}}">
                    </div>
                    <div class="form-group">
                        <input type="textarea" name="deskripsi" id="deskripsi" class="form-control"
                               value="{{$model->data}}">
                    </div>
                    <div class="form-group">
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i> Simpan</button>
                    </div>
                </form>
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