@extends('frontend.layout.master')
@section('title', $post->name.' - '.settings('site_title'))
@section('description', $post->dsc)
@section('keywords', $post->kyw)
@section('content')
    <!-- CONTENT AREA -->
    <div class="content-area">

        <!-- BREADCRUMBS -->
        <section class="page-section breadcrumbs">
            <div class="container">
                <div class="page-header">
                    <h1>{!! $post->name !!}</h1>
                </div>
                <ul class="breadcrumb">
                    @foreach($post->ancestorsAndSelf()->with('translates')->get() as $cat)
                        <li><a href="{{ url('cat/'.$cat->slug) }}">{!! $cat->name !!}</a></li>
                    @endforeach
                </ul>
            </div>
        </section>
        <!-- /BREADCRUMBS -->

        <!-- PAGE WITH SIDEBAR -->
        <section class="page-section with-sidebar">
            <div class="container">
                <div class="row">
                    <!-- SIDEBAR -->
                    <aside class="col-md-3 sidebar" id="sidebar">
                        <!-- widget search -->
                        <div class="widget">
                            <div class="widget-search">
                                <input class="form-control" type="text" placeholder="{!! $static->native('search')->title !!}">
                                <button><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <!-- /widget search -->
                        <!-- widget shop categories -->
                        <div class="widget shop-categories">
                            <h4 class="widget-title">{!! $static->native('categories')->title !!}</h4>
                            <div class="widget-content">
                                <ul>
                                    <li>
                                        <span class="arrow"><i class="fa fa-angle-down"></i></span>
                                        <a href="#">{!! $post->name !!}</a>
                                        <ul class="children active">
                                            @foreach($post->getDescendants() as $child)
                                                <li>
                                                    <a href="#">{!! $child->name !!}
                                                        <span class="count">{{ count($child->products) }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /widget shop categories -->
                        <!-- widget tabs -->
                        <div class="widget widget-tabs">
                            <div class="widget-content">
                                <ul id="tabs" class="nav nav-justified">
                                    <li><a href="#tab-s1" data-toggle="tab">POPÜLER</a></li>
                                    <li class="active"><a href="#tab-s2" data-toggle="tab">İNDİRİM</a></li>
                                    <li><a href="#tab-s3" data-toggle="tab">YENİ</a></li>
                                </ul>
                                <div class="tab-content">
                                    <!-- tab 1 -->
                                    <div class="tab-pane fade" id="tab-s1">
                                        <div class="product-list">
                                            @foreach($popularProducts as $product)
                                                <div class="media">
                                                    <a class="pull-left media-link" href="{{ url($product->slug) }}">
                                                        @if(count($product->pictures))
                                                            <img class="media-object" src="{{ url('userfiles/thumbs/'.$product->pictures->first()->name) }}" title="{!! $product->name !!}" alt="{{ $product->pictures->first()->name }}" width="70">
                                                        @else
                                                            <img src="{{ url('assets/images/product.png') }}" alt="Image Not Found" width="70" />
                                                        @endif
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><a href="{{ url($product->slug) }}">{!! $product->name !!}</a></h4>
                                                        @if($product->discount)
                                                            <div class="price"><ins>{{ ($product->price * (100 - $product->discount)) / 100 }} TL</ins> <del>{{ $product->price }} TL</del></div>
                                                        @else
                                                            <div class="price"><ins>{{ $product->price }} TL</ins></div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- tab 2 -->
                                    <div class="tab-pane fade in active" id="tab-s2">
                                        <div class="product-list">
                                            @foreach($discountProducts as $product)
                                                <div class="media">
                                                    <a class="pull-left media-link" href="{{ url($product->slug) }}">
                                                        @if(count($product->pictures))
                                                            <img class="media-object" src="{{ url('userfiles/thumbs/'.$product->pictures->first()->name) }}" title="{!! $product->name !!}" alt="{{ $product->pictures->first()->name }}" width="70">
                                                        @else
                                                            <img src="{{ url('assets/images/product.png') }}" alt="Image Not Found" width="70" />
                                                        @endif
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><a href="{{ url($product->slug) }}">{!! $product->name !!}</a></h4>
                                                        @if($product->discount)
                                                            <div class="price"><ins>{{ ($product->price * (100 - $product->discount)) / 100 }} TL</ins> <del>{{ $product->price }} TL</del></div>
                                                        @else
                                                            <div class="price"><ins>{{ $product->price }} TL</ins></div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <!-- tab 3 -->
                                    <div class="tab-pane fade" id="tab-s3">
                                        <div class="product-list">
                                            @foreach($newestProducts as $product)
                                                <div class="media">
                                                    <a class="pull-left media-link" href="{{ url($product->slug) }}">
                                                        @if(count($product->pictures))
                                                            <img class="media-object" src="{{ url('userfiles/thumbs/'.$product->pictures->first()->name) }}" title="{!! $product->name !!}" alt="{{ $product->pictures->first()->name }}" width="70">
                                                        @else
                                                            <img src="{{ url('assets/images/product.png') }}" alt="Image Not Found" width="70" />
                                                        @endif
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <h4 class="media-heading"><a href="{{ url($product->slug) }}">{!! $product->name !!}</a></h4>
                                                        @if($product->discount)
                                                            <div class="price"><ins>{{ ($product->price * (100 - $product->discount)) / 100 }} TL</ins> <del>{{ $product->price }} TL</del></div>
                                                        @else
                                                            <div class="price"><ins>{{ $product->price }} TL</ins></div>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /widget tabs -->
                        <!-- widget tag cloud -->
                        <div class="widget widget-tag-cloud">
                            <a class="btn btn-theme btn-title-more" href="#">{!! $static->native('see-all')->title !!}</a>
                            <h4 class="widget-title"><span>Tags</span></h4>
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
                        <!-- /widget tag cloud -->
                    </aside>
                    <!-- /SIDEBAR -->
                    <!-- CONTENT -->
                    <div class="col-md-9 content" id="content">
                        @if(count($post->pictures))
                            @if(count($post->pictures) > 1)
                                <div class="main-slider sub">
                                    <div class="owl-carousel" id="main-slider">

                                        @foreach($post->pictures as $picture)
                                            <!-- Slide 1 -->
                                            <div class="item slide{{ $picture->id }} sub">
                                                <img src="{{ url('userfiles/banners/'.$picture->name) }}" class="slide-img" alt="{{ $picture->name }}" />
                                                @if($picture->title or $picture->dsc)
                                                    <div class="caption">
                                                        <div class="container">
                                                            <div class="div-table">
                                                                <div class="div-cell">
                                                                    <div class="caption-content">
                                                                        @if($picture->title)
                                                                            <h2 class="caption-title"><span>{!! $picture->title !!}</span></h2>
                                                                        @endif
                                                                        @if($picture->dsc)
                                                                            <h3 class="caption-subtitle"><span>{!! $picture->dsc !!}</span></h3>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                            <!-- /Slide 1 -->
                                        @endforeach

                                    </div>
                                </div>
                            @else
                                <img src="{{ url('userfiles/banners/'.$post->pictures->first()->name) }}" alt="{{ $post->pictures->first()->name }}" width="848" />
                            @endif
                        @endif

                        <!-- shop-sorting -->
                        <div class="shop-sorting">
                            <div class="row">
                                <div class="col-sm-8" @if(!count($post->pictures)) style="margin-top: 10px;" @endif>
                                    <form class="form-inline" action="">
                                        <div class="form-group selectpicker-wrapper">
                                            <select
                                                class="selectpicker input-price" data-live-search="true" data-width="100%"
                                                data-toggle="tooltip" title="Select">
                                                <option>Product Name</option>
                                                <option>Product Name</option>
                                                <option>Product Name</option>
                                            </select>
                                        </div>
                                        <div class="form-group selectpicker-wrapper">
                                            <select
                                                class="selectpicker input-price" data-live-search="true" data-width="100%"
                                                data-toggle="tooltip" title="Select">
                                                <option>Select Manifacturers</option>
                                                <option>Select Manifacturers</option>
                                                <option>Select Manifacturers</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /shop-sorting -->

                        @if(count($post->products))
                            <!-- Products grid -->
                            <div class="row products grid">
                                @foreach($post->products()->paginate(9) as $product)
                                    <div class="col-md-4 col-sm-6">
                                        <div class="thumbnail no-border no-padding">
                                            <div class="media">
                                                <a class="media-link" href="{{ url($product->slug) }}">
                                                    @if(count($product->pictures))
                                                        <img src="{{ url('userfiles/images/'.$product->pictures->first()->name) }}" title="{!! $product->name !!}" alt="{{ $product->pictures->first()->name }}">
                                                    @else
                                                        <img src="{{ url('assets/images/product.png') }}" alt="Image Not Found" />
                                                    @endif
                                                    <span class="icon-view">
                                                        <strong><i class="fa fa-eye"></i></strong>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="caption text-center">
                                                <h4 class="caption-title">{!! $product->name !!}</h4>
                                                @if($product->discount)
                                                    <div class="price"><ins>{{ ($product->price * (100 - $product->discount)) / 100 }} TL</ins> <del>{{ $product->price }} TL</del></div>
                                                @else
                                                    <div class="price"><ins>{{ $product->price }} TL</ins></div>
                                                @endif
                                                <div class="buttons">
                                                    <a class="btn btn-theme btn-theme-transparent btn-icon-left" href="#"><i class="fa fa-shopping-cart"></i>{!! $static->native('btn-add-cart')->title !!}</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!-- /Products grid -->
                        @endif

                        @if(count($post->products))
                            <!-- Pagination -->
                            <div class="pagination-wrapper">
                                {!! $post->products()->paginate(9) !!}
                            </div>
                            <!-- /Pagination -->
                        @endif

                    </div>
                    <!-- /CONTENT -->

                </div>
            </div>
        </section>
        <!-- /PAGE WITH SIDEBAR -->

        <!-- PAGE -->
        {!! $static->native('alt-slogan')->content !!}
        <!-- /PAGE -->

    </div>
    <!-- /CONTENT AREA -->
@endsection
