@extends('layouts.quixlab')

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">{{$title}}</div>
            <div class="card-body">
                <form action="{{route('direktur.laporan.show-laporan')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="jenis_laporan">Jenis Laporan</label>
                                <select name="jenis_laporan" id="jenis_laporan" class="form-control">
                                    <option value="pemesanan">Pemesanan</option>
                                    <option value="pembayaran">Pembayaran</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="tgl_dari">Dari</label>
                                <input type="date" name="tgl_dari" id="tgl_akhir" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="form-group">
                                <label for="tgl_sampai">Sampai</label>
                                <input type="date" name="tgl_sampai" id="tgl_sampai" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Download Laporan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection