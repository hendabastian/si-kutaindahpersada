<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Menu</li>
            <li class="{{Request::is('konsumen/pemesanan/*' ? 'active' : '')}}">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Pemesanan</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('konsumen.pemesanan.index')}}">Data Pemesanan</a></li>
                    <li><a href="./index.html">Laporan Pemesanan</a></li>
                </ul>
            </li>
            <li class="{{(Request::is('konsumen/pemeriksaan-lokasi/*')) ? 'active' : ''}}">
                <a href="widgets.html" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Pemeriksaan Lokasi</span>
                </a>
            </li>
            <li class="{{(Request::is('konsumen/surat-perintah-kerja/*')) ? 'active' : ''}}">
                <a href="widgets.html" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Surat Perintah Kerja</span>
                </a>
            </li>
            <li class="{{(Request::is('konsumen/jadwal-pembuatan/*')) ? 'active' : ''}}">
                <a href="widgets.html" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Jadwal Pembuatan Rumah</span>
                </a>
            </li>
            <hr>
            <li class="nav-label">Informasi</li>
            <li class="{{(Request::is('konsumen/info-pembangunan-rumah/*')) ? 'active' : ''}}">
                <a href="{{route('konsumen.info-pembangunan-rumah.index')}}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Informasi Pembangunan Rumah</span>
                </a>
            </li>
            <li class="{{(Request::is('konsumen/brosur/*')) ? 'active' : ''}}">
                <a href="{{route('konsumen.brosur.index')}}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Brosur</span>
                </a>
            </li>
        </ul>
    </div>
</div>