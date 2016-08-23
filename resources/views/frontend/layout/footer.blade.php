<!-- FOOTER -->
<footer class="footer">
    <div class="footer-widgets">
        <div class="container">
            <div class="row">

                <div class="col-md-3">
                    <div class="widget">
                        <h4 class="widget-title">{!! $static->native('about-us')->title !!}</h4>
                        {!! $static->native('about-us')->content !!}
                        <ul class="social-icons">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget">
                        <h4 class="widget-title">{!! $static->native('newsletter')->title !!}</h4>
                        {!! $static->native('newsletter')->content !!}
                        <form action="#">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter Your Mail and Get $10 Cash"/>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-theme btn-theme-transparent">{!! $static->native('subscribe')->title !!}</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget widget-categories">
                        <h4 class="widget-title">{!! $static->native('information')->title !!}</h4>
                        {!! $frontMenus->makeNavBar('bottom') !!}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="widget widget-tag-cloud">
                        <h4 class="widget-title">Item Tags</h4>
                        <ul>
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Jeans</a></li>
                            <li><a href="#">Top Sellers</a></li>
                            <li><a href="#">E commerce</a></li>
                            <li><a href="#">Hot Deals</a></li>
                            <li><a href="#">Supplier</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Theme</a></li>
                            <li><a href="#">Website</a></li>
                            <li><a href="#">Isamercan</a></li>
                            <li><a href="#">Themeforest</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="footer-meta">
        <div class="container">
            <div class="row">

                <div class="col-sm-6">
                    <div class="copyright">Copyright 2014 BELLA SHOP   |   All Rights Reserved   |   Designed By Jthemes</div>
                </div>
                <div class="col-sm-6">
                    <div class="payments">
                        <ul>
                            <li><img src="{{ url('assets/img/preview/payments/visa.jpg') }}" alt="Visa"/></li>
                            <li><img src="{{ url('assets/img/preview/payments/mastercard.jpg') }}" alt="Master Card"/></li>
                            <li><img src="{{ url('assets/img/preview/payments/paypal.jpg') }}" alt="Paypal"/></li>
                            <li><img src="{{ url('assets/img/preview/payments/american-express.jpg') }}" alt="American Express"/></li>
                            <li><img src="{{ url('assets/img/preview/payments/visa-electron.jpg') }}" alt="Visa Electron"/></li>
                            <li><img src="{{ url('assets/img/preview/payments/maestro.jpg') }}" alt="Maestro"/></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</footer>
<!-- /FOOTER -->

<div id="to-top" class="to-top"><i class="fa fa-angle-up"></i></div>
