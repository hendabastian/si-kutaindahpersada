<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Menu</li>
            <li class="{{Request::is('admin/pemesanan/*') ? 'active' : ''}}">
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <span class="nav-text"><i class="fa fa-shopping-cart"></i> Pemesanan</span> 
                    <span
                    style="{{$pemesananProses->count() == 0 ? 'display:none;' : ''}}"
                    class="label label-warning">{{$pemesananProses->count()}}</span>
                </a>
                <ul aria-expanded="false">
                    <li class="{{Request::is('admin/pemesanan/*') ? 'active' : ''}}">
                        <a
                           class="{{Request::is('admin/pemesanan/*') ? 'active' : ''}}"
                           href="{{route('admin.pemesanan.index')}}">Data Pemesanan <span
                                  class="label label-warning"
                                  style="{{$pemesananProses->count() == 0 ? 'display:none;' : ''}}">{{$pemesananProses->count()}}</span></a>
                    </li>
                    <li><a href="./index.html">Laporan Pemesanan</a></li>
                </ul>
            </li>
            <li class="{{(Request::is('admin/surat-perintah-kerja/*')) ? 'active' : ''}}">
                <a href="{{route('admin.surat-perintah-kerja.index')}}" aria-expanded="false">
                    <i class="fa fa-map-o"></i><span class="nav-text">Surat Perintah Kerja</span>
                </a>
            </li>
            <li class="{{(Request::is('admin/jadwal-pembuatan/*')) ? 'active' : ''}}">
                <a href="{{route('admin.jadwal-pembuatan.index')}}" aria-expanded="false">
                    <i class="fa fa-calendar-o"></i><span class="nav-text">Jadwal Pembuatan Rumah</span>
                </a>
            </li>
            <li class="{{(Request::is('admin/kwitansi/*')) ? 'active' : ''}}">
                <a href="{{route('admin.kwitansi.index')}}" aria-expanded="false">
                    <i class="fa fa-money"></i><span class="nav-text">Kwitansi</span>
                </a>
            </li>
            <hr>
            <li class="nav-label">Informasi</li>
            <li class="{{(Request::is('admin/info-pembangunan-rumah/*')) ? 'active' : ''}}">
                <a href="{{route('admin.info-pembangunan-rumah.index')}}" aria-expanded="false">
                    <i class="fa fa-files-o"></i><span class="nav-text">Informasi Pembangunan Rumah</span>
                </a>
            </li>
            <li class="{{(Request::is('admin/brosur/*')) ? 'active' : ''}}">
                <a href="{{route('admin.brosur.index')}}" aria-expanded="false">
                    <i class="fa fa-list-alt"></i><span class="nav-text">Brosur</span>
                </a>
            </li>
        </ul>
    </div>
</div>