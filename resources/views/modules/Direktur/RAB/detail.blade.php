@extends('layouts.quixlab')

@section('content')
<a href="{{route('direktur.rab.index')}}"
   class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
@if ($model->status == 5)
<button type="button" class="btn btn-info" data-toggle="modal"
        data-target="#modalProses">
    <i class="fa fa-check"></i> Proses RAB
</button></td>
@endif
<hr>
<h4>{{$title}} {!! $model->status_label !!}</h4>
<hr>
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
    @if ($model->status > 4)
    @php
    $no = 1;
    $total = 0;
    @endphp
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-bottom align-middle">
                <h4 class="float-left">Rencana Anggaran Biaya</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <th>No</th>
                        <th>Uraian</th>
                        <th>Satuan</th>
                        <th>Volume</th>
                        <th>Harga Satuan</th>
                        <th>Deskripsi</th>
                    </thead>
                    <tbody>
                        @foreach($model->getRAB->getDetail as $index => $item)
                        @php
                        $total += ($item->volume * $item->harga_satuan);
                        @endphp
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item->uraian}}</td>
                            <td>{{$item->satuan}}</td>
                            <td>{{number_format($item->volume)}}</td>
                            <td>{{number_format($item->harga_satuan)}}</td>
                            <td>{{number_format($item->volume * $item->harga_satuan)}}</td>
                            <td>{{$item->deskripsi}}</td>
                        </tr>

                        @endforeach
                        <tr>
                            <th colspan="5" class="text-right">Subtotal</th>
                            <td colspan="2">{{number_format($total)}}</td>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-right">PPH 4%</th>
                            <td colspan="2">{{number_format($total * 0.04)}}</td>
                        </tr>
                        <tr>
                            <th colspan="5" class="text-right">Jumlah (incl. PPH)</th>
                            <td colspan="2">{{number_format($total + ($total * 0.04))}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
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
</div>

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
                <form action="{{route('direktur.rab.approve', ['id' => $model->id])}}" method="post">
                    @csrf
                    <div class="form-group">
                        <div class="form-check form-check-inline">
                            <input type="radio" name="status" id="statusApprove" value="6" class="form-check-input"
                                   required>
                            <label for="statusApprove" class="form-check-label">Approve</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="status" id="statusTolak" value="4" class="form-check-input"
                                   required>
                            <label for="statusTolak" class="form-check-label">Tolak</label>
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
@endsection

@push('scripts')
<script>
    tinymce.init({
        selector: '#deskripsi',
        branding: false,
    })
</script>
@endpush