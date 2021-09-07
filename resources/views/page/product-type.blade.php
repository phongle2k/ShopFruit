@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm {{$loai_sp->name}}</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('page.trangchu')}}">Trang chủ</a> / <span>Sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="main-content">
            <div class="space60">&nbsp;</div>
            <div class="row">
                <div class="col-sm-3">
                    <ul class="aside-menu">
                    @foreach($loai as $l)
                        <li><a href="{{route('page.product-type',$l->id)}}">{{$l->name}}</a></li>
                    @endforeach
                    </ul>
                </div>
                <div class="col-sm-9">
                    <div class="beta-products-list">
                        <h4>Loại sản phẩm</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($sp_theoloai)}} sản phẩm </p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                        @foreach($sp_theoloai as $sp)
                            <div class="col-sm-4">
                                <div class="single-item">
                                @if($sp->promotion_price != 0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                @endif
                                    <div class="single-item-header">
                                        <a href="{{route('page.chi-tiet-sp',$sp->id)}}"><img src="source/image/product/{{$sp->image}}" alt=""height=250px style="float:left"></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$sp->name}}</p>
                                        <p class="single-item-price">
                                        @if($sp->promotion_price == 0)
                                            <span class="flash-sale">{{number_format($sp->unit_price)}}đ</span>
                                        @else
                                            <span class="flash-del">{{number_format($sp->unit_price)}}đ</span>
                                            <span class="flash-sale">{{number_format($sp->promotion_price)}}đ</span>
                                        @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$sp->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        
                    </div> <!-- .beta-products-list -->

                    <div class="space50">&nbsp;</div>

                    <div class="beta-products-list">
                        <h4>Sản phẩm khuyến mại</h4>
                        <div class="beta-products-details">
                            <p class="pull-left">Tìm thấy {{count($sp_km)}} sản phẩm</p>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                        @foreach($sp_km as $km)
                            <div class="col-sm-4">
                                <div class="single-item">
                                @if($km->promotion_price != 0)
                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                @endif
                                    <div class="single-item-header">
                                        <a href="{{route('page.chi-tiet-sp',$km->id)}}"><img src="source/image/product/{{$km->image}}" alt="" height=250px></a>
                                    </div>
                                    <div class="single-item-body">
                                        <p class="single-item-title">{{$km->name}}</p>
                                        <p class="single-item-price">
                                        @if($sp->promotion_price == 0)
                                            <span class="flash-sale">{{number_format($km->unit_price)}}đ</span>
                                        @else
                                            <span class="flash-del">{{number_format($km->unit_price)}}đ</span>
                                            <span class="flash-sale">{{number_format($km->promotion_price)}}đ</span>
                                        @endif
                                        </p>
                                    </div>
                                    <div class="single-item-caption">
                                        <a class="add-to-cart pull-left" href="{{route('themgiohang',$km->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                        <a class="beta-btn primary" href="product.html">Details <i class="fa fa-chevron-right"></i></a>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        <div class="row">{{$sp_km->links()}}</div>
                        <div class="space40">&nbsp;</div>
                        
                    </div> <!-- .beta-products-list -->
                </div>
            </div> <!-- end section with sidebar and main content -->


        </div> <!-- .main-content -->
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection