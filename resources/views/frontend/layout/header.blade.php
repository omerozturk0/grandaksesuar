<!-- Popup: Shopping cart items -->
<div class="modal fade popup-cart" id="popup-cart" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="container">
            <div class="cart-items">
                <div class="cart-items-inner">
                    <div class="media">
                        <a class="pull-left" href="#"><img class="media-object item-image" src="{{ url('assets/img/preview/shop/order-1s.jpg') }}" alt=""></a>
                        <p class="pull-right item-price">$450.00</p>
                        <div class="media-body">
                            <h4 class="media-heading item-title"><a href="#">1x Standard Product</a></h4>
                            <p class="item-desc">Lorem ipsum dolor</p>
                        </div>
                    </div>
                    <div class="media">
                        <p class="pull-right item-price">$450.00</p>
                        <div class="media-body">
                            <h4 class="media-heading item-title summary">Subtotal</h4>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-body">
                            <div>
                                <a href="#" class="btn btn-theme btn-theme-dark" data-dismiss="modal">Close</a><!--
                                --><a href="shopping-cart.html" class="btn btn-theme btn-theme-transparent btn-call-checkout">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Popup: Shopping cart items -->

<!-- Header top bar -->
<div class="top-bar">
    <div class="container">
        <div class="top-bar-left">
            <ul class="list-inline">
                <li class="icon-user"><a href="login.html"><img src="{{ url('assets/img/icon-1.png') }}" alt=""/> <span>Login</span></a></li>
                <li class="icon-form"><a href="login.html"><img src="{{ url('assets/img/icon-2.png') }}" alt=""/> <span>Not a Member? <span class="colored">Sign Up</span></span></a></li>
                <li><a href="mailto:{{ settings('site_email') }}"><i class="fa fa-envelope"></i> <span>{{ settings('site_email') }}</span></a></li>
            </ul>
        </div>
        <div class="top-bar-right">
            {!! $frontMenus->makeNavBar() !!}
        </div>
    </div>
</div>
<!-- /Header top bar -->

<!-- HEADER -->
<header class="header fixed">
    <div class="header-wrapper">
        <div class="container">

            <!-- Logo -->
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ url('assets/img/logo-bella-shop.png') }}" alt="{{ settings('site_title') }}" title="{{ settings('site_title') }}" /></a>
            </div>
            <!-- /Logo -->

            <!-- Header search -->
            <div class="header-search">
                <input class="form-control" type="text" placeholder="Aramak istediğiniz kelime..."/>
                <button><i class="fa fa-search"></i></button>
            </div>
            <!-- /Header search -->

            <!-- Header shopping cart -->
            <div class="header-cart">
                <div class="cart-wrapper">
                    <a href="#" class="btn btn-theme-transparent" data-toggle="modal" data-target="#popup-cart"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs"> 0 item(s) - $0.00 </span> <i class="fa fa-angle-down"></i></a>
                    <!-- Mobile menu toggle button -->
                    <a href="#" class="menu-toggle btn btn-theme-transparent"><i class="fa fa-bars"></i></a>
                    <!-- /Mobile menu toggle button -->
                </div>
            </div>
            <!-- Header shopping cart -->

        </div>
    </div>
    <div class="navigation-wrapper">
        <div class="container">
            <!-- Navigation -->
            <nav class="navigation closed clearfix">
                <a href="#" class="menu-toggle-close btn"><i class="fa fa-times"></i></a>
                {!! $nav->makeNavBar() !!}
            </nav>
            <!-- /Navigation -->
        </div>
    </div>
</header>
<!-- /HEADER -->
