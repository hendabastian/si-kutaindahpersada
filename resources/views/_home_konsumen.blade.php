<div class="row justify-content-center">
    <div class="col-sm-12 col-md-3">
        <div class="card gradient-6">
            <div class="card-body">
                <h3 class="card-title text-white">Total Pemesanan</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{$pemesanan->where('user_id', Auth::user()->id)->count()}}</h2>
                    <p class="text-white mb-0">Pemesanan</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-3">
        <div class="card gradient-3">
            <div class="card-body">
                <h3 class="card-title text-white">Diproses</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">
                        {{$pemesanan->where('user_id', Auth::user()->id)->whereBetween('status', [1, 10])->count()}}</h2>
                    <p class="text-white mb-0">Pemesanan</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-clock-o"></i></span>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-3">
        <div class="card gradient-2">
            <div class="card-body">
                <h3 class="card-title text-white">Ditolak</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{$pemesananDitolak->where('user_id', Auth::user()->id)->count()}}</h2>
                    <p class="text-white mb-0">Pemesanan</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-close"></i></span>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-3">
        <div class="card gradient-4">
            <div class="card-body">
                <h3 class="card-title text-white">Selesai</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{$pemesananSelesai->where('user_id', Auth::user()->id)->count()}}</h2>
                    <p class="text-white mb-0">Pemesanan</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-check"></i></span>
            </div>
        </div>
    </div>
</div>