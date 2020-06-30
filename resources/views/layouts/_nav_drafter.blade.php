<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Menu</li>
            <li class="{{(Request::is('drafter/rancangan-rumah/*')) ? 'active' : ''}}">
                <a href="{{route('drafter.rancangan-rumah.index')}}" aria-expanded="false">
                    <i class="icon-badge menu-icon"></i><span class="nav-text">Rancangan Rumah</span>
                </a>
            </li>
        </ul>
    </div>
</div>