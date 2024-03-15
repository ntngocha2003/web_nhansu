<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{auth()->guard('admin')->user()->name}}</strong>
                             </span>
                             <b class="caret"></b></span> </span> </a>
                    </div>
                </li>
                <li class="active">
                    <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="{{route('room.index')}}">Quản lý phòng</a></li>
                        <li><a href="{{route('user.index')}}">Quản lý khách hàng</a></li>
                        <li><a href="{{route('order.index')}}">Quản lý đặt phòng</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>