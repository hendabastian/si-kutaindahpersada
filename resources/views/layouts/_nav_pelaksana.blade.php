<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Menu</li>
            <li class="{{(Request::is('pelaksana/pemeriksaan-lokasi/*')) ? 'active' : ''}}">
                <a href="{{route('pelaksana.pemeriksaan-lokasi.index')}}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Pemeriksaan Lokasi</span>
                </a>
            </li>
        </ul>
    </div>
</div>