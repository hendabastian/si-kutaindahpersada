<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Menu</li>
            <li class="{{(Request::is('pelaksana/pemeriksaan-lokasi/*')) ? 'active' : ''}}">
                <a href="{{route('pelaksana.pemeriksaan-lokasi.index')}}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Pemeriksaan Lokasi</span>
                    <span
                          style="{{$pemesananLokasi->count() == 0 ? 'display:none;' : ''}}"
                          class="label label-warning">{{$pemesananLokasi->count()}}</span>
                </a>
            </li>
            <li class="{{(Request::is('pelaksana/rab/*')) ? 'active' : ''}}">
                <a href="{{route('pelaksana.rab.index')}}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Rencana Anggaran Biaya</span>
                    <span
                          style="{{$pemesananRAB->count() == 0 ? 'display:none;' : ''}}"
                          class="label label-warning">{{$pemesananRAB->count()}}</span>
                </a>
            </li>
            <li class="{{(Request::is('pelaksana/jadwal-pembuatan/*')) ? 'active' : ''}}">
                <a href="{{route('pelaksana.jadwal-pembuatan.index')}}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Jadwal Pembuatan Rumah</span>
                    <span
                          style="{{$pemesananJadwal->count() == 0 ? 'display:none;' : ''}}"
                          class="label label-warning">{{$pemesananJadwal->count()}}</span>
                </a>
            </li>
        </ul>
    </div>
</div>