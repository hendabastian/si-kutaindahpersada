@extends('layouts.quixlab')

@section('content')
<a href="{{route('konsumen.pemesanan.index')}}"
   class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
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
<hr>
<h4>{{$title}}</h4>
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
                        <td>{{$model->file_ktp}}</td>
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