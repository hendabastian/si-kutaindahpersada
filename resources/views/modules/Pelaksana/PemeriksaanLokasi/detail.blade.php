@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-12 col-md-12">
        <div class="card">
            <div class="card-header border-bottom">
                <h4>{{$title}}</h4>
            </div>
            <div class="card-body">
                <h5>Data Pemesanan</h5>
                <hr>
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        <h6>Deskripsi Pekerjaan:</h6>
                        <hr>
                        {!!$model->getPemesanan->deskripsi!!}
                    </div>
                    <div class="col-sm-12 col-md-8">
                        <table class="table table-striped">
                            <tr>
                                <th>Tipe Bangunan</th>
                                <td>{{$model->getPemesanan->tipe_bangunan}}</td>
                            </tr>
                            <tr>
                                <th>Luas Tanah</th>
                                <td>{{$model->getPemesanan->luas_tanah}}</td>
                            </tr>
                            <tr>
                                <th>Luas Bangunan</th>
                                <td>{{$model->getPemesanan->luas_bangunan}}</td>
                            </tr>
                            <tr>
                                <th>Alamat Proyek</th>
                                <td>{{$model->getPemesanan->alamat_proyek}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <hr>
                <h5>Data Pemeriksaan Lokasi</h5>
                @if ($model->status == 1)
                <div class="text-center">
                    <button class="btn btn-success" data-toggle="modal" data-target="#modalProses">
                        <i class="fa fa-location-arrow"></i> Input Data Lokasi
                    </button>
                </div>
                <div class="row">

                </div>
                @else
                <div class="row">
                    <div class="col-sm-12 col-md-12">

                    </div>
                </div>
                @endif
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
                <form action="{{route('pelaksana.pemeriksaan-lokasi.proses-lokasi', ['id' => $model->id])}}"
                      method="post">
                    @csrf
                    <div class="form-group">
                        <label for="nama_pemilik">Nama Pemilik</label>
                        <input type="text" name="nama_pemilik" id="nama_pemilik" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="alamat_lokasi">Alamat Lokasi</label>
                        <textarea name="alamat_lokasi" id="alamat_lokasi" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="luas_tanah">Luas Tanah</label>
                                <input type="text" name="luas_tanah" id="luas_tanah" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="form-group">
                                <label for="luas_bangunan">Luas Bangunan</label>
                                <input type="text" name="luas_bangunan" id="luas_bangunan" class="form-control">
                            </div>
                        </div>
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