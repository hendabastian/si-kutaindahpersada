@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{$title}}</div>
            <div class="card-body">
                <form action="{{route('admin.brosur.edit', ['id' => $model->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control"
                                       value="{{$model->judul}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="model">Model</label>
                                <input type="text" name="model" id="model" class="form-control" value="{{$model->model}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="text" name="harga" id="harga" class="form-control" value="{{$model->harga}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="lama_pembangunan">Lama Pembangunan</label>
                                <input type="text" name="lama_pembangunan" id="lama_pembangunan" class="form-control" value="{{$model->lama_pembangunan}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="luas_tanah">Luas Tanah</label>
                                <input type="text" name="luas_tanah" id="luas_tanah" class="form-control" value="{{$model->luas_tanah}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="luas_bangunan">Luas Bangunan</label>
                                <input type="text" name="luas_bangunan" id="luas_bangunan" class="form-control" value="{{$model->luas_bangunan}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" cols="30" rows="10">
                            {{$model->deskripsi}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" name="file[]" id="file[]" class="form-control" multiple>
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