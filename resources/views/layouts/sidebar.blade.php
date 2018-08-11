@auth
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    @if(isset($company))


                        <li class="menu-title">Main</li>
                        @can('index',\App\User::class)
                            <li><a href="{{ route('post.index',compact('company')) }}">Posts</a></li>
                        @endcan
                        @can('index',\App\Token::class)
                            <li><a href="{{ route('token.index',compact('company')) }}">Tokens</a></li>
                        @endcan
                        @can('index',\App\Deal::class)
                            <li class="submenu">
                                <a href="#"><i class="fa fa-columns" aria-hidden="true"></i> <span>Deals</span> <span
                                            class="menu-arrow"></span></a>
                                <ul class="list-unstyled" style="display: none;">
                                    <li><a href="{{ route('provider.index',compact('company')) }}">Providers </a></li>
                                    <li><a href="{{ route('client.index',compact('company')) }}">Clients </a></li>
                                </ul>
                            </li>
                        @endcan
                        @can('index',\App\Store::class)
                            <li><a href="{{ route('section.index',compact('company')) }}">Stores</a></li>
                        @endcan
                    @endif
                </ul>
            </div>
        </div>
    </div>
@endauth