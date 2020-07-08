<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Menu</li>
            <li class="{{(Request::is('konsumen/pemesanan/*') ? 'active' : '')}}">
                <a class="{{(Request::is('konsumen/pemesanan/*') ? 'active' : '')}}"
                   href="{{route('konsumen.pemesanan.index')}}"><i class="fa fa-shopping-cart"></i>
                    <span class="nav-text">Pemesanan</span>
                    <span
                          style="{{$pemesananTanggalKonsumen->count() == 0 ? 'display:none;' : ''}}"
                          class="label label-warning">{{$pemesananTanggalKonsumen->count()}}</span></a>

            </li>
            <li class="{{(Request::is('konsumen/pemeriksaan-lokasi/*')) ? 'active' : ''}}">
                <a href="{{route('konsumen.pemeriksaan-lokasi.index')}}" aria-expanded="false">
                    <i class="fa fa-map-o"></i><span class="nav-text">Pemeriksaan Lokasi</span>
                    <span
                          style="{{$pemesananLokasi->count() == 0 ? 'display:none;' : ''}}"
                          class="label label-warning">{{$pemesananLokasi->count()}}</span>
                </a>
            </li>

            <li class="{{(Request::is('konsumen/jadwal-pembuatan/*')) ? 'active' : ''}}">
                <a href="{{route('konsumen.jadwal-pembuatan.index')}}" aria-expanded="false">
                    <i class="fa fa-calendar-o"></i><span class="nav-text">Jadwal Pembuatan Rumah</span>
                </a>
            </li>
            <hr>
            <li class="nav-label">Informasi</li>
            <li class="{{(Request::is('konsumen/info-pembangunan-rumah/*')) ? 'active' : ''}}">
                <a href="{{route('konsumen.info-pembangunan-rumah.index')}}" aria-expanded="false">
                    <i class="fa fa-files-o"></i><span class="nav-text">Informasi Pembangunan Rumah</span>
                </a>
            </li>
            <li class="{{(Request::is('konsumen/brosur/*')) ? 'active' : ''}}">
                <a href="{{route('konsumen.brosur.index')}}" aria-expanded="false">
                    <i class="fa fa-list-alt"></i><span class="nav-text">Brosur</span>
                </a>
            </li>
        </ul>
    </div>
</div>