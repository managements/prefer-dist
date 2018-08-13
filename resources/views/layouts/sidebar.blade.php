@auth
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    @can('city',\App\City::class)
                    <li><a href="{{route('Cities.index')}}">Cities</a></li>
                    @endcan
                </ul>
            </div>
        </div>
    </div>
@endauth