<!-- Page Header -->
<header class="page-header">
    <h2>@yield('subtitle', 'Boş Sayfa')</h2>

    <div class="right-wrapper pull-right">
        <ol class="breadcrumbs">
            <li>
                <a href="{{ url('/admin') }}">
                    <i class="fa fa-home"></i>
                </a>
            </li>
            @yield('breadcrumb', '<li><span>Boş Sayfa</span></li>')
        </ol>
    </div>

</header>