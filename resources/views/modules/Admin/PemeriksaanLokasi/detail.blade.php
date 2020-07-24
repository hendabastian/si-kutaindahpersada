@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom align-middle">
                <h4 class="float-left">Kolom Diskusi</h4>
                <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                        data-target="#modalDiskusi">
                    <i class="fa fa-inbox"></i> Tambah diskusi
                </button>
            </div>
            <div class="card-body">
                @if($model->getDiskusi->isNotEmpty())
                @foreach ($model->getDiskusi as $item)
                <h5>{{$item->getUser->name}}</h5>
                <h6>{{$item->created_at}}</h6>
                <p>{{$item->content}}</p>
                <hr>
                @endforeach
                @else
                <h4 class="text-center">Belum ada diskusi</h4>
                @endif
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalDiskusi">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Diskusi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">x</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <form action="{{route('post-diskusi', ['pemesanan_id' => $model->id])}}" method="post" name="form-diskusi" id="form-diskusi">
                                @csrf
                                <div class="form-group">
                                    <textarea name="content" id="content" class="form-control" rows="10"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success" form="form-diskusi"><i class="fa fa-save"></i> Simpan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
                    {!! $model->status_label !!}
                </div>
                @else
                <div class="row">
                    <div class="col-sm-12 col-md-4">
                        @foreach ($model->getLokasiAttachment as $index => $attachment)
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
                                <td>{{$model->nama_pemilik}}</td>
                            </tr>
                            <tr>
                                <th>Alamat Lokasi</th>
                                <td>{{$model->alamat_lokasi}}</td>
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
                                <th>Status</th>
                                <td>{!! $model->status_label !!}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection