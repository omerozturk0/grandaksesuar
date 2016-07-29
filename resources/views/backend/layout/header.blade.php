<header class="header">
    <div class="logo-container">
        <a href="{{ url('/admin') }}" class="logo">
            <img src="{{ url('/assets/images/logo.png') }}" height="35" alt="Porto Admin"/>
        </a>

        <div class="visible-xs toggle-sidebar-left" data-toggle-class="sidebar-left-opened" data-target="html"
             data-fire-event="sidebar-left-opened">
            <i class="fa fa-bars" aria-label="Toggle sidebar"></i>
        </div>
    </div>

    <!-- start: search & user box -->
    <div class="header-right">

        <span class="separator"></span>

        <div id="userbox" class="userbox">
            <a href="#" data-toggle="dropdown">
                <figure class="profile-picture">
                    <img src="//gravatar.com/avatar/{{ md5(auth()->user()->email) }}" alt="{{ auth()->user()->name }}" class="img-circle"
                         data-lock-picture="assets/images/!logged-user.jpg"/>
                </figure>
                <div class="profile-info" data-lock-name="{{ auth()->user()->name }}" data-lock-email="{{ auth()->user()->email }}">
                    <span class="name">{{ auth()->user()->name }}</span>
                    <span class="role">Yönetici</span>
                </div>

                <i class="fa custom-caret"></i>
            </a>

            <div class="dropdown-menu">
                <ul class="list-unstyled">
                    <li class="divider"></li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="{{ route('admin.user.edit', auth()->user()->id) }}"><i class="fa fa-user"></i> Profil</a>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="{{ url('admin/settings') }}"><i class="fa fa-cog"></i> Ayarlar</a>
                    </li>
                    <li>
                        <a role="menuitem" tabindex="-1" href="{{ url('admin/auth/logout') }}"><i class="fa fa-power-off"></i> Çıkış Yap</a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <!-- end: search & user box -->
</header>