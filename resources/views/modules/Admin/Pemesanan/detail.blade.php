@extends('layouts.quixlab')

@section('content')
<a href="{{route('admin.pemesanan.index')}}"
   class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
@if($model->status == 1)
<button type="button" class="btn btn-info" data-toggle="modal"
        data-target="#modalProses">
    <i class="fa fa-check"></i> Proses Pesanan
</button></td>
@endif
@if($model->status == 6)
<button type="button" class="btn btn-info" data-toggle="modal"
        data-target="#modalRap">
    <i class="fa fa-check"></i> Proses RAP
</button></td>
@endif
@if($model->status == 8)
<button type="submit" form="spk-form" class="btn btn-info"
        onclick="return confirm('Anda yakin akan mengirim Surat Perintah Kerja ke pelaksana?')">
    <i class="fa fa-check"></i> Proses SPK
</button></td>

<form action="{{route('admin.pemesanan.proses-spk',  ['id' => $model->id])}}"
      method="post" id="spk-form" name="spk-form">
    @csrf
</form>
@endif

@if ($model->status > 8)
<a href="{{asset('printed/spk_'.$model->no_pemesanan. '.pdf')}}" target="_blank" rel="noopener noreferrer"
   class="btn btn-info">Download Surat Perintah Kerja</a>
@endif

@if ($model->status == 11)
<a href="{{asset('printed/kwitansi_'.$model->no_pemesanan. '.pdf')}}" target="_blank" rel="noopener noreferrer"
   class="btn btn-info">Download Kwitansi</a>
@endif
<hr>
<h4>{{$title}} {!! $model->status_label !!}</h4>
<hr>
<div class="row justify-content-center">
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
                <table class="table table-striped table-bordered">
                    <thead>
                        <th>No</th>
                        <th>Uraian</th>
                        <th>Satuan</th>
                        <th>Volume</th>
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