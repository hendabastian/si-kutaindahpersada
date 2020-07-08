<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Menu</li>
            <li class="{{(Request::is('direktur/rab/*')) ? 'active' : ''}}">
                <a href="{{route('direktur.rab.index')}}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Approval Rencana Anggaran Biaya</span>
                    <span
                          style="{{$pemesananDirektur->count() == 0 ? 'display:none;' : ''}}"
                          class="label label-warning">{{$pemesananDirektur->count()}}</span>
                </a>
            </li>
        </ul>
    </div>
</div>