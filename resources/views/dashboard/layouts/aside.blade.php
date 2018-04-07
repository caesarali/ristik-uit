<aside class="main-sidebar">
    <section class="sidebar">
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin') }}"><i class="fa fa-circle-o"></i> Home</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-file-text-o"></i> <span>Jurnal</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('jurnal.index') }}"><i class="fa fa-circle-o"></i> List Jurnal</a>
                    </li>
                    <li>
                        <a href="{{ route('peneliti.index') }}"><i class="fa fa-circle-o"></i> Peneliti</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{ route('redaksi.index') }}"><i class="fa fa-user-circle"></i> <span>Dewan Redaksi</span></a>
            </li>
            <li>
                <a href="{{ route('gallery.index') }}"><i class="fa fa-image"></i> <span>Galeri</span></a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-cog"></i> <span>Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('profile.index') }}">
                            <i class="fa fa-circle-o"></i> Profile Lembaga
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('password.change') }}">
                            <i class="fa fa-circle-o"></i> Password
                        </a>
                    </li>
                </ul>
            </li>

            <li class="header">LAINNYA</li>
            <li><a href="{{ url('/') }}"><i class="fa fa-circle-o text-aqua"></i> <span>Lihat Halaman Utama</span></a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-circle-o text-red"></i> <span>Log Out</span></a></li>
        </ul>
    </section>
</aside>