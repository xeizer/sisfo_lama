<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        @auth
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="../files/assets/images/avatar-4.jpg" alt="User-Profile-Image">
                <div class="user-details">
                    <span id="more-details">{{Auth::user()->name}}<i class="fa fa-caret-down"></i></span>
                </div>
            </div>
            <div class="main-menu-content">
                <ul>
                    <li class="more-details">
                        <a href="{{ route('profil.index') }}"><i class="ti-user"></i>View Profile</a>
                        <a href="{{ route('profil.setting') }}"><i class="ti-settings"></i>Settings</a>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="ti-layout-sidebar-left"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="p-15 p-b-0">
            <form class="form-material">
                <div class="form-group form-primary">
                    <input type="text" name="footer-email" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label"><i class="fa fa-search m-r-10"></i>Search Friend</label>
                </div>
            </form>
        </div>
        @foreach (App\Menu::where('parent', '0')->orderBy('urutan', 'asc')->get() as $lv0)
        <div class="pcoded-navigation-label">{{$lv0->nama_menu}}</div>
        <ul class="pcoded-item pcoded-left-item">
            @foreach (App\Menu::where('parent', $lv0->id)->orderBy('urutan', 'asc')->get() as $lv1)
            <li class="
            @if(App\Menu::where('parent', $lv1->id)->first())
            pcoded-hasmenu
            @isset($active) @if($active==$lv1->kode) active pcoded-trigger @endif @endisset
            @endif">
                <a href="@if(App\Menu::where('parent', $lv1->id)->first()) javascript:void(0) @else {{route($lv1->link)}} @endif" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="{{$lv1->icon}}"></i><b>D</b></span>
                    <span class="pcoded-mtext">{{$lv1->nama_menu}}</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                @foreach (App\Menu::where('parent', $lv1->id)->get() as $lv2)
                <ul class="pcoded-submenu">
                    <li class="
                    @if(App\Menu::where('parent', $lv2->id)->first())
                    pcoded-hasmenu
                    @isset($active) @if($active==$lv2->kode) active pcoded-trigger @endif @endisset
                    @endif">
                        <a href="@if(App\Menu::where('parent', $lv2->id)->first()) javascript:void(0)  @else {{route($lv2->link)}} @endif " class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="icon-pie-chart"></i></span>
                            <span class="pcoded-mtext">{{$lv2->nama_menu}}</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                        @foreach (App\Menu::where('parent', $lv2->id)->get() as $lv3)
                        <ul class="pcoded-submenu">
                            <li class=" ">
                                <a href=" {{route($lv3->link)}}" class="waves-effect waves-dark">
                                    <span class="pcoded-micon"><i class="icon-chart"></i></span>
                                    <span class="pcoded-mtext">{{$lv3->nama_menu}}</span>
                                    <span class="pcoded-mcaret"></span>
                                </a>
                            </li>
                        </ul>
                        @endforeach
                </ul>
                @endforeach

            </li>
            @endforeach

        </ul>
        @endforeach

        @else
        <div class="">
            <div class="main-menu-header">
                <img class="img-80 img-radius" src="../files/assets/images/avatar-4.jpg" alt="User-Profile-Image">
                <div class="user-details">
                    <b class="text-white">Hallo</b>
                </div>
            </div>

        </div>
        <div class="pcoded-navigation-label">Selamat datang</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{route('login')}}" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="ti-key"></i><b>L</b></span>
                    <span class="pcoded-mtext">Login</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>
        </ul>

        @endauth



    </div>
</nav>
