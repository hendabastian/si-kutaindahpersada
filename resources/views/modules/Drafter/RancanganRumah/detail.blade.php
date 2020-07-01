@extends('layouts.quixlab')

@section('content')
<a href="{{route('drafter.rancangan-rumah.index')}}"
   class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>

<hr>
<h4>{{$title}} {!! $model->status_label !!}</h4>
<hr>
<div class="row justify-content-center">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4>Rancangan Rumah</h4>
            </div>
            <div class="card-body">
                @if($model->status == 3)
                <button class="btn btn-success" data-toggle="modal" data-target="#modalProses">
                    <i class="fa fa-upload"></i> Upload Rancangan Rumah
                </button>
                @else
                <div class="row">
                    @foreach ($model->getRancanganRumah->getAttachments as $index => $attachment)
                    <div class="col-sm-12 col-md-4">
                        <img src="{{asset('uploads/' . $attachment->file)}}" alt="{{$attachment->deskripsi}}"
                             width="100%">
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header border-bottom align-middle">
                <h4 class="float-left">Informasi Konsumen</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Nama Konsumen</th>
                        <td>{{$model->nama_pemesan}}</td>
                    </tr>
                    <tr>
                        <th>Alamat Konsumen</th>
                        <td>{{$model->alamat}}</td>
                    </tr>
                    <tr>
                        <th>No. KTP</th>
                        <td>{{$model->no_ktp}}</td>
                    </tr>
                    <tr>
                        <th>File KTP</th>
                        <td><button type="button" class="btn btn-primary btn-xs" data-toggle="modal"
                                    data-target="#modalKtp">
                                <i class="fa fa-search"></i> Preview
                            </button></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom align-middle">
                <h4 class="float-left">Informasi Pembangunan</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tr>
                        <th>Tipe Bangunan</th>
                        <td>{{$model->tipe_bangunan}}</td>
                    </tr>
                    <tr>
                        <th>Luas Tanah</th>
                        <td>{{$model->luas_tanah}}</td>
                    </tr>
                    <tr>
                        <th>Luas Bangunan</th>
                        <td>{{$model->luas_bangunan}}</td>
                    </tr>
                    <tr>
                        <th>Alamat Proyek</th>
                        <td>{{$model->alamat_proyek}}</td>
                    </tr>
                </table>
                <h5>Deskripsi Pekerjaan:</h5>
                <hr>
                {!!$model->deskripsi!!}
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalProses">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Input Data Lokasi
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('drafter.rancangan-rumah.upload-rancangan', ['id' => $model->id])}}"
                      method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="file">Foto</label>
                        <input type="file" name="file[]" id="file[]" class="form-control" accept="image/*" multiple>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Simpan Data
                            Lokasi</button>
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