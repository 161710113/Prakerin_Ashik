<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse slimscrollsidebar">
            <ul class="nav" id="side-menu">
                <li style="padding: 10px 0 0;">
                    <a href="home" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li>
                    <a href="{{route ('merk.index')}}" class="waves-effect"><i class="fa fa-list-ul fa-fw" aria-hidden="true"></i><span class="hide-menu">Merk</span></a>
                </li>
                <li>
                    <a href="{{route ('tipe.index')}}" class="waves-effect"><i class="fa fa-list-ul fa-fw" aria-hidden="true"></i><span class="hide-menu">Tipe</span></a>
                </li>
                <li>
                    <a href="{{route ('lokasi.index')}}" class="waves-effect"><i class="fa fa-list-ul fa-fw" aria-hidden="true"></i><span class="hide-menu">Lokasi</span></a>
                </li>
                <li>
                        <a href="href="{{ route('logout') }} onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="waves-effect">
                        <i class="fa fa-power-off fa-fw"></i>Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                </li>
            </ul>
            {{-- <div class="center p-20">
                <span class="hide-menu"><a href="http://wrappixel.com/templates/pixeladmin/" target="_blank" class="btn btn-danger btn-block btn-rounded waves-effect waves-light">Upgrade to Pro</a></span>
            </div> --}}
        </div>
    </div>