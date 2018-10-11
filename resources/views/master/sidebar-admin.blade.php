<div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse slimscrollsidebar">
            <ul class="nav" id="side-menu">
                <li style="padding: 10px 0 0;">
                    <a href="{{route ('home')}}" class="waves-effect"><i class="fa fa-spin fa-gears fa-fw" aria-hidden="true"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li>
                    <a href="{{route ('mobil.index')}}" class="waves-effect"><i class="fa fa-car fa-fw" aria-hidden="true"></i><span class="hide-menu">Mobil</span></a>
                </li>
                <li>
                    <a href="{{route ('foto.index')}}" class="waves-effect"><i class="fa fa-picture-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Foto</span></a>
                </li>
                <li>
                    <a href="{{route ('merk.index')}}" class="waves-effect"><i class="fa fa-square fa-fw" aria-hidden="true"></i><span class="hide-menu">Merk</span></a>
                </li>
                <li>
                    <a href="{{route ('tipe.index')}}" class="waves-effect"><i class="fa fa-square-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Tipe</span></a>
                </li>
                <li>
                    <a href="{{route ('lokasi.index')}}" class="waves-effect"><i class="fa fa-map-marker fa-fw" aria-hidden="true"></i><span class="hide-menu">Lokasi</span></a>
                </li>
                <li>
                    <a href="{{route ('berita.index')}}" class="waves-effect"><i class="fa  fa-comments-o fa-fw" aria-hidden="true"></i><span class="hide-menu">Berita</span></a>
                </li>
                <hr>
                <li>
                        <a href="href="{{ route('logout') }} onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="waves-effect">
                        <i class="fa fa-power-off fa-fw"></i><b>Logout</b></a>
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