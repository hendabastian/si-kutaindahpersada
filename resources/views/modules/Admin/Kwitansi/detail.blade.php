@extends('layouts.quixlab')

@section('content')
<a href="{{route('admin.kwitansi.index')}}"
   class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
@if($model->status == 10)
<button type="submit" form="kwitansi-form" class="btn btn-info" onclick="return confirm('Anda yakin akan kwitansi ke konsumen?')">
    <i class="fa fa-check"></i> Proses Kwitansi
</button></td>

<form action="{{route('admin.kwitansi.proses-kwitansi',  ['id' => $model->id])}}"
    method="post" id="kwitansi-form" name="kwitansi-form">
  @csrf
</form>
@endif
<hr>
<h4>{{$title}} {!! $model->status_label !!}</h4>
<hr>
<div class="row justify-content-center">
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

    {{-- <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4>Data Pemeriksaan Lokasi</h4>
            </div>
            <div class="card-body">
                @if ($model->getPemeriksaanLokasi->status == 1)
                {{$model->getPemeriksaanLokasi->status_label}}
    @else
    <div class="row">
        <div class="col-sm-12 col-md-4">
            @foreach ($model->getPemeriksaanLokasi->getLokasiAttachment as $index => $attachment)
            <img src="{{asset('uploads/' . $attachment->file)}}" alt="{{$attachment->deskripsi}}"
                 width="100%">
            <hr>
            @endforeach
        </div>
        <div class="col-sm-12 col-md-8">
            <table class="table table-striped">
                <th colspan="2" class="text-center">Hasil Pemeriksaan Lokasi</th>
                <tr>
                    <th>Nama Pemilik</th>
                    <td>{{$model->getPemeriksaanLokasi->nama_pemilik}}</td>
                </tr>
                <tr>
                    <th>Alamat Lokasi</th>
                    <td>{{$model->getPemeriksaanLokasi->alamat_lokasi}}</td>
                </tr>
                <tr>
                    <th>Luas Tanah</th>
                    <td>{{$model->getPemeriksaanLokasi->luas_tanah}}</td>
                </tr>
                <tr>
                    <th>Luas Bangunan</th>
                    <td>{{$model->getPemeriksaanLokasi->luas_bangunan}}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{!! $model->getPemeriksaanLokasi->status_label !!}</td>
                </tr>
            </table>
        </div>
    </div>
    @endif
</div>
</div>
</div> --}}
</div>

<div class="modal fade" id="modalKtp">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">File KTP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <img src="{{asset('uploads/' . $model->file_ktp)}}" alt="" style="width: 100%">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($model->status == 1)
<div class="modal fade" id="modalProses">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Proses Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.pemesanan.proses', ['id' => $model->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input type="radio" name="status" id="statusApprove" value="2" class="form-check-input"
                                   required>
                            <label for="statusApprove" class="form-check-label">Lanjut Pemeriksaan Lokasi</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="status" id="statusTolak" value="0" class="form-check-input"
                                   required>
                            <label for="statusTolak" class="form-check-label">Tolak Pemesanan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="20" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit">Proses Pesanan</button>
                    </div>
                </form>
                <div class="row">
                    <div class="col-sm-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if($model->status == 6)
<div class="modal fade" id="modalRap">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Proses RAP Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa fa-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.pemesanan.proses', ['id' => $model->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input type="radio" name="status" id="statusApprove" value="7" class="form-check-input"
                                   required>
                            <label for="statusApprove" class="form-check-label">Lanjut RAP Ke Konsumen</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="status" id="statusTolak" value="0" class="form-check-input"
                                   required>
                            <label for="statusTolak" class="form-check-label">Tolak Pemesanan</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="20" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success btn-block" type="submit">Proses Pesanan</button>
                    </div>
                </form>
                <div class="row">
                    <div class="col-sm-12">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection

@push('scripts')
<script>
    tinymce.init({
        selector: '#deskripsi',
        branding: false,
    })
</script>
@endpush