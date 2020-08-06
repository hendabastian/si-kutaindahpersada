@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{$title}}</div>
            <div class="card-body">
                <form action="{{route('admin.brosur.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input type="text" name="judul" id="judul" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <label for="model">Model</label>
                                <input type="text" name="model" id="model" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <label for="tipe">Tipe</label>
                                <input type="text" name="tipe" id="tipe" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            Rp.
                                        </span>
                                    </div>
                                    <input type="number" name="harga" id="harga" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="lama_pembangunan">Lama Pembangunan</label>
                                <div class="input-group">
                                    <input type="number" name="lama_pembangunan" id="lama_pembangunan"
                                           class="form-control"
                                           required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Bulan</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="luas_tanah">Luas Tanah</label>
                                <div class="input-group">
                                    <input type="number" name="luas_tanah" id="luas_tanah" class="form-control"
                                           required>
                                    <div class="input-group-append">
                                        <span class="input-group-text">m&#178;</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="luas_bangunan">Luas Bangunan</label>
                                <div class="input-group">
                                    <input type="number" name="luas_bangunan" id="luas_bangunan" class="form-control"
                                           required>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">m&#178;</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="10" required>

                                </textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <label for="jangkauan">Jangkauan Pembangunan</label>
                            <textarea name="jangkauan" id="jangkauan" class="form-control" required>
                                
                            </textarea>
                        </div>
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
        tinymce.init({
            selector: '#jangkauan',
            branding: false
        })
</script>
@endpush