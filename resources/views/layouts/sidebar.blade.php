@auth
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">Administration</li>
                    <li class="submenu">
                        <a href="#"><i class="fa fa-columns" aria-hidden="true"></i> <span>Params</span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled" style="display: none;">
                            <li><a href="{{ route('city.index') }}"> Cities </a></li>
                            <li><a href="{{ route('companies.index') }}"> Companies </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endauth