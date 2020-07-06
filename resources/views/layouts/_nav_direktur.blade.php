<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Menu</li>
            <li class="{{(Request::is('direktur/rab/*')) ? 'active' : ''}}">
                <a href="{{route('direktur.rab.index')}}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Approval Rencana Anggaran Biaya</span>
                </a>
            </li>
        </ul>
    </div>
</div>