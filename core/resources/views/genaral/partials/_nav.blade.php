<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">Hyrax<span>Blog</span></a>
            <form method="get" action="/search" class="form-search-m">
                <input name="search" type="text"/>
                <button type="submit" class="fa fa-search btn btn-search"></button>
            </form>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ url('/') }}">Trang chủ</a></li>
                <li><a href="#">eBooks</a></li>
                <li><a href="/blog/lap-trinh">Lập trình</a></li>
                <li><a href="/blog/do-hoa">Đồ họa</a></li>
                <li><a href="#">Giới thiệu</a></li>
                <li><a href="#">Liên hệ</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right form-search">
                <li>
                    <form method="get" action="/search">
                        <input name="search" type="text"/>
                        <button type="submit" class="fa fa-search btn btn-search"></button>
                    </form>
                </li>
            </ul>
            @if(Auth::check())
                <ul class="nav navbar-nav navbar-auth navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{ $user->name }} <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            @if($user->getRole()->name == 'Admin')
                                <li><a href="{{ route('admin.getIndex') }}"><span>Bảng điều khiển</span></a></li>
                            @endif
                            <li><a href="{{ route('member.index', array(str_slug($user->name), $user->id)) }}"><span>Trang cá nhân</span></a></li>
                            <li><a href="{{ route('getLogout') }}">Đăng xuất</a></li>
                        </ul>
                    </li>
                </ul>
            @else
                <ul class="nav navbar-nav navbar-auth navbar-right">
                    <li><a href="{{ route('getLogin') }}">Đăng nhập</a></li>
                </ul>
            @endif
        </div><!-- /.navbar-collapse -->
    </div>
</nav>