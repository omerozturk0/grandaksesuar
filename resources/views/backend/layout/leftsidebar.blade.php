<aside id="sidebar-left" class="sidebar-left">

    <div class="sidebar-header">
        <div class="sidebar-title">
            Navigasyon
        </div>
        <div class="sidebar-toggle hidden-xs" data-toggle-class="sidebar-left-collapsed" data-target="html" data-fire-event="sidebar-left-toggle">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <div class="nano">
        <div class="nano-content">
            <nav id="menu" class="nav-main" role="navigation">
                <ul class="nav nav-main">
                    <li class="{{ Request::is('admin') ? 'nav-active' : '' }}">
                        <a href="{{ url('admin') }}">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span>Panel</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'role' ? 'nav-active' : '' }}">
                        <a href="{{ route('admin.role.index') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>Roller</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'permission' ? 'nav-active' : '' }}">
                        <a href="{{ route('admin.permission.index') }}">
                            <i class="fa fa-unlock" aria-hidden="true"></i>
                            <span>İzinler</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'user' ? 'nav-active' : '' }}">
                        <a href="{{ route('admin.user.index') }}">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Kullanıcılar</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'static' ? 'nav-active' : '' }}">
                        <a href="{{ route('admin.static.index') }}">
                            <i class="fa fa-file-word-o" aria-hidden="true"></i>
                            <span>Statik İçerikler</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'menu' ? 'nav-active' : '' }}">
                        <a href="{{ route('admin.menu.index') }}">
                            <i class="fa fa-align-left" aria-hidden="true"></i>
                            <span>Menüler</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'page' ? 'nav-active' : '' }}">
                        <a href="{{ route('admin.page.index') }}">
                            <i class="fa fa-copy" aria-hidden="true"></i>
                            <span>Sayfalar</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'customergroup' ? 'nav-active' : '' }}">
                        <a href="{{ route('admin.customergroup.index') }}">
                            <i class="fa fa-users" aria-hidden="true"></i>
                            <span>Müşteri Grupları</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'attribute' ? 'nav-active' : '' }}">
                        <a href="{{ route('admin.attribute.index') }}">
                            <i class="fa fa-check-square-o" aria-hidden="true"></i>
                            <span>Öznitelikler</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'category' ? 'nav-active' : '' }}">
                        <a href="{{ route('admin.category.index') }}">
                            <i class="fa fa-bars" aria-hidden="true"></i>
                            <span>Kategoriler</span>
                        </a>
                    </li>
                    <li class="{{ Request::segment(2) == 'product' ? 'nav-active' : '' }}">
                        <a href="{{ route('admin.product.index') }}">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            <span>Ürünler</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

    </div>

</aside>
