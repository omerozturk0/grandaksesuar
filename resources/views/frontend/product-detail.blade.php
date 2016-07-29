@extends('frontend.layout.master')
@section('title', $post->title.' - '.settings('site_title'))
@section('description', $post->dsc)
@section('keywords', $post->kyw)
@section('content')
    <!-- CONTENT AREA -->
    <div class="content-area">

        <!-- PAGE -->
        <section class="page-section">
            <div class="container">

                <div class="row product-single">
                    <div class="col-md-6">
                        <div class="badges">
                            <div class="hot">{!! $static->native('new')->title !!}</div>
                        </div>
                        <div class="owl-carousel img-carousel">
                            @foreach($post->pictures as $key => $picture)
                                <div class="item">
                                    <a class="btn btn-theme btn-theme-transparent btn-zoom" href="{{ url('userfiles/bigs/'.$picture->name) }}" data-gal="prettyPhoto"><i class="fa fa-plus"></i></a>
                                    <a href="{{ url('userfiles/bigs/'.$picture->name) }}" data-gal="prettyPhoto"><img class="img-responsive" src="{{ url('userfiles/images/'.$picture->name) }}" alt=""/></a>
                                </div>
                            @endforeach
                        </div>
                        <div class="row product-thumbnails">
                            @foreach($post->pictures as $key => $picture)
                                <div class="col-xs-2 col-sm-2 col-md-3"><a href="#" onclick="jQuery('.img-carousel').trigger('to.owl.carousel', [{{ $key }}, 300]);"><img src="{{ url('userfiles/thumbs/'.$picture->name) }}" alt=""/></a></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="back-to-category">
                            <span class="link"><i class="fa fa-angle-left"></i> {!! $static->native('back')->title !!} <a href="category.html">{!! $static->native('categories')->title !!}</a></span>
                        </div>
                        <h2 class="product-title">{!! $post->title !!}</h2>

                        @if($post->discount)
                            <div class="product-price">
                                {{ ($post->price * (100 - $post->discount)) / 100 }} TL
                                <span style="text-decoration: line-through; font-size: 25px; color: red; font-weight: 500;">{{ $post->price }} TL</span>&nbsp;
                            </div>
                        @else
                            <div class="product-price">{{ $post->price }} TL</div>
                        @endif
                        @if($post->dsc)
                            <hr class="page-divider"/>

                            <div class="product-text">
                                {!! $post->dsc !!}
                            </div>
                        @endif


                        @forelse($post->customergroups as $customergroup)
                            @if(count($customergroup->combinations))
                                <hr class="page-divider"/>

                                <h3>{!! $customergroup->title !!}</h3>

                                <div class="row variable">
                                        @foreach($customergroup->combinations as $key => $combination)
                                            @if(count($customergroup->combinations->where('parent_id', $combination->id)))
                                                <div class="col-sm-6">
                                                    <div class="form-group selectpicker-wrapper">
                                                        <label for="exampleSelect{{ $combination->id }}">
                                                            {!! $combination->title !!}
                                                        </label>
                                                        <select
                                                            id="exampleSelect{{ $combination->id }}"
                                                            class="selectpicker input-price" data-live-search="true" data-width="100%"
                                                            data-toggle="tooltip" title="Özellik Seçiniz">
                                                            @foreach($combination->children as $notRoots)
                                                                <option value="{!! $notRoots->title !!}">{!! $notRoots->title !!}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                </div>
                            @endif
                        @empty
                            <hr class="page-divider"/>

                            <div class="row variable">
                                @if(count($post->attributes))
                                    @foreach($post->attributes as $attribute)
                                        @if(count($post->attributes->where('parent_id', $attribute->id)))
                                            <div class="col-sm-6">
                                                <div class="form-group selectpicker-wrapper">
                                                    <label for="exampleSelect{{ $attribute->id }}">
                                                        {!! $attribute->title !!}
                                                    </label>
                                                    <select
                                                        id="exampleSelect{{ $attribute->id }}"
                                                        class="selectpicker input-price" data-live-search="true" data-width="100%"
                                                        data-toggle="tooltip" title="Özellik Seçiniz">
                                                        @foreach($post->attributes->where('parent_id', $attribute->id) as $notRoots)
                                                            <option value="{!! $notRoots->title !!}">{!! $notRoots->title !!}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                        @endforelse

                        <hr class="page-divider small"/>

                        <div class="buttons">
                            <div class="quantity">
                                <button class="btn btn-sub"><i class="fa fa-minus"></i></button>
                                <input class="form-control qty" type="number" step="1" min="1" name="quantity" value="1" title="Qty">
                                <button class="btn btn-add"><i class="fa fa-plus"></i></button>
                            </div>
                            <button class="btn btn-theme btn-cart btn-icon-left" type="submit"><i class="fa fa-shopping-cart"></i>{!! $static->native('btn-add-cart')->title !!}</button>
                        </div>

                        <hr class="page-divider small"/>

                        <table>
                            <tr>
                                @if(count($post->categories))
                                    <td class="title">{!! $static->native('categories')->title !!}:</td>
                                    <td>
                                        @foreach($post->categories as $key => $category)
                                            {!! $category->name !!},
                                        @endforeach
                                    </td>
                                @endif
                            </tr>
                            <tr>
                                @if($post->product_code)
                                    <td class="title">{!! $static->native('product-code')->title !!}:</td>
                                    <td>{!! $post->product_code !!}</td>
                                @endif
                            </tr>
                        </table>
                        <hr class="page-divider small"/>

                        <ul class="social-icons list-inline">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                        </ul>

                    </div>
                </div>

            </div>
        </section>
        <!-- /PAGE -->

        <!-- PAGE -->
        <section class="page-section md-padding">
            <div class="container">
                <div class="row blocks shop-info-banners">
                    <div class="col-md-4">
                        <div class="block">
                            <div class="media">
                                <div class="pull-right"><i class="fa fa-gift"></i></div>
                                <div class="media-body">
                                    <h4 class="media-heading">Buy 1 Get 1</h4>
                                    Proin dictum elementum velit. Fusce euismod consequat ante.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="block">
                            <div class="media">
                                <div class="pull-right"><i class="fa fa-comments"></i></div>
                                <div class="media-body">
                                    <h4 class="media-heading">Call to Free</h4>
                                    Proin dictum elementum velit. Fusce euismod consequat ante.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="block">
                            <div class="media">
                                <div class="pull-right"><i class="fa fa-trophy"></i></div>
                                <div class="media-body">
                                    <h4 class="media-heading">Money Back!</h4>
                                    Proin dictum elementum velit. Fusce euismod consequat ante.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /PAGE -->

        <!-- PAGE -->
        <section class="page-section">
            <div class="container">
                <div class="tabs-wrapper content-tabs">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#item-description" data-toggle="tab">{!! $static->native('product-description')->title !!}</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="item-description">
                            {!! $post->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /PAGE -->

        <!-- PAGE -->

        <!-- /PAGE -->

        <!-- PAGE -->
        <section class="page-section">
            <div class="container">
                <h2 class="section-title"><span>{!! $static->native('brands')->title !!}</span></h2>
                <div class="partners-carousel">
                    <div class="owl-carousel" id="partners">
                        <div><a href="#"><img src="assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                        <div><a href="#"><img src="assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                        <div><a href="#"><img src="assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                        <div><a href="#"><img src="assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                        <div><a href="#"><img src="assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                        <div><a href="#"><img src="assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                        <div><a href="#"><img src="assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                        <div><a href="#"><img src="assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                        <div><a href="#"><img src="assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                        <div><a href="#"><img src="assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                        <div><a href="#"><img src="assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                        <div><a href="#"><img src="assets/img/preview/partners/brand-logo.jpg" alt=""/></a></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /PAGE -->

    </div>
    <!-- /CONTENT AREA -->
@endsection
@section('js')
    <script type="text/javascript">
        $('.btn-sub').bind('click', function () {
            $val = $('.qty').val();
            if ($val > 1) {
                $('.qty').val(--$val);
            }
        });
        $('.btn-add').bind('click', function () {
            $val = $('.qty').val();
            $('.qty').val(++$val);
        });
    </script>
@endsection
