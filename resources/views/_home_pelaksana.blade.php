<div class="row justify-content-center">
    <div class="col-sm-12 col-md-4">
        <div class="card gradient-1">
            <div class="card-body">
                <h3 class="card-title text-white">Pemeriksaan Lokasi</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{$pemesananLokasi->count()}}</h2>
                    <p class="text-white mb-0">Pemesanan Menunggu</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="card gradient-3">
            <div class="card-body">
                <h3 class="card-title text-white">Rencana Anggaran Biaya</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{$pemesananRAB->count()}}</h2>
                    <p class="text-white mb-0">Pemesanan Menunggu</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="card gradient-2">
            <div class="card-body">
                <h3 class="card-title text-white">Jadwal</h3>
                <div class="d-inline-block">
                    <h2 class="text-white">{{$pemesananJadwalPelaksana->count()}}</h2>
                    <p class="text-white mb-0">Pemesanan Menunggu</p>
                </div>
                <span class="float-right display-5 opacity-5"><i class="fa fa-shopping-cart"></i></span>
            </div>
        </div>
    </div>
</div>