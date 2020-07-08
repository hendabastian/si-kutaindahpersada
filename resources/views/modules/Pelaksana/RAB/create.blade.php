@extends('layouts.quixlab')

@section('content')
<a href="{{route('pelaksana.rab.index')}}"
   class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
<hr>
<h4>{{$title}}</h4>
<hr>
<div class="row justify-content-center">
    <div class="col-sm-12 col-md-4">
        <div class="card">
            <div class="card-header border-bottom">
                <h4>Tambah Uraian Biaya</h4>
            </div>
            <div class="card-body">
                <form action="{{route('pelaksana.rab.save-barang', ['rab_id' => $getRAB->id])}}" method="post"
                      name="form-save-barang" id="form-save-barang">
                    @csrf
                    <div class="form-group">
                        <label for="uraian">Uraian</label>
                        <input type="text" name="uraian" id="uraian" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="satuan">Satuan</label>
                        <input type="text" name="satuan" id="satuan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="volume">Volume</label>
                        <input type="number" name="volume" id="volume" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="harga_satuan">Harga Satuan</label>
                        <input type="number" name="harga_satuan" id="harga_satuan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" id="deskripsi" class="form-control">
                    </div>
                    <div class="form-group text-right">
                        <button type="submit" class="btn btn-success" form="form-save-barang"><i
                               class="fa fa-cart-plus"></i> Tambah Pembelian</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-8">
        <div class="card">
            <div class="card-header border-bottom">
                <h4>Rancangan Biaya</h4>
            </div>
            <div class="card-body">
                @if($getRAB->getDetail->isEmpty())
                <h4>Belum ada Rincian</h4>
                @else
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
                        @foreach($getRAB->getDetail as $index => $item)
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
                @endif
            </div>
            <div class="card-footer">
                <form action="{{route('pelaksana.rab.save-rab', ['rab_id' => $getRAB->id])}}" method="post"
                      name="form-save-rab"
                      id="form-save-rab">
                    @csrf
                    <button type="submit" class="btn btn-success" form="form-save-rab"
                            onclick="return confirm('Pastikan data yang diinput sudah benar-benar sesuai')"><i
                           class="fa fa-save"></i> Simpan RAB & Ajukan ke Direktur</button>
                </form>
            </div>
        </div>


    </div>
</div>

@endsection