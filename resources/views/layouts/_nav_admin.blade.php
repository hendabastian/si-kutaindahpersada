<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Menu</li>
            <li class="{{Request::is('admin/pemesanan/*') ? 'active' : ''}}">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Pemesanan</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{Request::is('admin/pemesanan/*') ? 'active' : ''}}">
                        <a
                           class="{{Request::is('admin/pemesanan/*') ? 'active' : ''}}"
                           href="{{route('admin.pemesanan.index')}}">Data Pemesanan</a>
                    </li>
                    <li><a href="./index.html">Laporan Pemesanan</a></li>
                </ul>
            </li>
            <li class="{{(Request::is('admin/pemeriksaan-lokasi/*')) ? 'active' : ''}}">
                <a href="{{route('admin.pemeriksaan-lokasi.index')}}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Pemeriksaan Lokasi</span>
                </a>
            </li>
            <li class="{{(Request::is('admin/surat-perintah-kerja/*')) ? 'active' : ''}}">
                <a href="{{route('admin.surat-perintah-kerja.index')}}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Surat Perintah Kerja</span>
                </a>
            </li>
            <li class="{{(Request::is('admin/jadwal-pembuatan/*')) ? 'active' : ''}}">
                <a href="{{route('admin.jadwal-pembuatan.index')}}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Jadwal Pembuatan Rumah</span>
                </a>
            </li>
            <li class="{{(Request::is('admin/kwitansi/*')) ? 'active' : ''}}">
                <a href="{{route('admin.kwitansi.index')}}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Kwitansi</span>
                </a>
            </li>
            <hr>
            <li class="nav-label">Informasi</li>
            <li class="{{(Request::is('admin/info-pembangunan-rumah/*')) ? 'active' : ''}}">
                <a href="{{route('admin.info-pembangunan-rumah.index')}}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Informasi Pembangunan Rumah</span>
                </a>
            </li>
            <li class="{{(Request::is('admin/brosur/*')) ? 'active' : ''}}">
                <a href="{{route('admin.brosur.index')}}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Brosur</span>
                </a>
            </li>
        </ul>
    </div>
</div>