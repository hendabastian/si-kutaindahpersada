@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <form action="{{route('konsumen.pemesanan.edit', ['id' => $model->id])}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card">
                <div class="card-header">
                    <h4>Informasi Konsumen</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <label for="nama_pemesan">Nama Pemesan</label>
                            <input type="text" name="nama_pemesan" id="nama_pemesan" class="form-control"
                                   value="{{$model->nama_pemesan}}">
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <label for="no_ktp">No. KTP</label>
                                <input type="text" name="no_ktp" id="no_ktp" class="form-control"
                                       value="{{$model->no_ktp}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="form-group">
                                <label for="file_ktp">File KTP</label>
                                <input type="file" name="file_ktp" id="file_ktp" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="4"
                                          class="form-control">{{$model->alamat}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Informasi Pembangunan</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="tipe_bangunan">Tipe Bangunan</label>
                                <select name="tipe_bangunan" id="tipe_bangunan" class="form-control">
                                    <option value="" disabled>Pilih Tipe Bangunan</option>
                                    <option value="Rumah" {{($model->tipe_bangunan == 'Rumah') ? 'selected' : ''}}>Rumah
                                    </option>
                                    <option value="Ruko" {{($model->tipe_bangunan == 'Ruko') ? 'selected' : ''}}>Ruko
                                    </option>
                                    <option value="Apartemen"
                                            {{($model->tipe_bangunan == 'Apartemen') ? 'selected' : ''}}>
                                        Apartemen</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="luas_bangunan">Luas Bangunan</label>
                                <input type="text" name="luas_bangunan" id="luas_bangunan" class="form-control"
                                       value="{{$model->luas_bangunan}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="luas_tanah">Luas Tanah</label>
                                <input type="text" name="luas_tanah" id="luas_tanah" class="form-control"
                                       value="{{$model->luas_bangunan}}">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="foto">Alamat Proyek</label>
                                <textarea name="alamat_proyek" id="alamat_proyek" cols="30" rows="4"
                                          class="form-control">{{$model->alamat_proyek}}</textarea>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi Pekerjaan</label>
                            <textarea name="deskripsi" id="deskripsi" cols="30" rows="20">{{$model->deskripsi}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"><i class="fa fa-check"></i>
                    Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    tinymce.init({
        selector: '#deskripsi',
        branding: false,
        plugins: 'advlist autolink lists link charmap print preview anchor searchreplace visualblocks code fullscreen insertdatetime media table contextmenu paste',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    })
</script>
@endpush