@extends('layouts.quixlab')

@section('content')

<a href="{{route('konsumen.pemesanan.index')}}"
   class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
@if($model->status == 1 || $model->status == 0)
<a href="{{route('konsumen.pemesanan.edit', ['id' => $model->id])}}"
   class="btn btn-warning"><i class="fa fa-pencil"></i> Edit</a>
<button type="submit" class="btn btn-danger" onclick="document.getElementById('delete-form').submit()"><i
       class="fa fa-trash"></i>
    Delete</button>
<form action="{{route('konsumen.pemesanan.delete',  ['id' => $model->id])}}"
      method="post" id="delete-form">
    @csrf
    @method('delete')
</form>
@elseif($model->status == 7)
<button type="button" class="btn btn-primary" data-toggle="modal"
        data-target="#modalSetTanggal">
    <i class="fa fa-calendar"></i> Tentukan Tanggal Mulai Pekerjaan
</button>
@endif

@if ($model->status == 11)
<a href="{{asset('printed/kwitansi_' . $model->no_pemesanan . '.pdf')}}" target="_blank" rel="noopener noreferrer"
   class="btn btn-info"><i class="fa fa-money"></i> Download Kwitansi</a>
@endif
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalVerifikasi">
    <i class="fa fa-history"></i> History Verifikasi
</button>
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
                <h4 class="float-left">Rencana Anggaran Pembelian</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Uraian</th>
                        <th>Besaran</th>
                        <th>Jml. Beli</th>
                        <th>Harga Satuan</th>
                        <th>Total Harga</th>
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
<div class="modal fade" id="modalKtp">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">File KTP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
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
<div class="modal fade" id="modalVerifikasi">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">History Verifikasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table">
                            <thead>
                                <th>Status</th>
                                <th>Keterangan</th>
                                <th>Dibuat pada</th>
                            </thead>
                            <tbody>
                                @foreach ($model->getVerifikasi as $indexVerifikasi => $dataVerifikasi)
                                <tr>
                                    <td>{!! $dataVerifikasi->status_label !!}</td>
                                    <td>{{$dataVerifikasi->keterangan}}</td>
                                    <td>{{$dataVerifikasi->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalSetTanggal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tentukan Tanggal Mulai Pekerjaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">x</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('konsumen.pemesanan.tanggal-mulai', ['id' => $model->id])}}"
                      method="post" enctype="multipart/form-data" name="form-tanggal-mulai" id="form-tanggal-mulai">
                    @csrf
                    <div class="form-group">
                        <label for="tanggal">Tanggal Mulai Pekerjaan</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success" form="form-tanggal-mulai"><i class="fa fa-upload"></i> Simpan Tanggal Mulai
                        </button>
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