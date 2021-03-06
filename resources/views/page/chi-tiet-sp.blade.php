@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Sản phẩm {{$sanpham->name}} </h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('page.trangchu')}}">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        <div class="row">
            <div class="col-sm-9">
        
                <div class="row">
                    <div class="col-sm-4">
                        <img src="source/image/product/{{$sanpham->image}}" alt="" height=240px>
                    </div>
                    <div class="col-sm-8">
                        <div class="single-item-body">
                            <p class="single-item-title" ><b>{{$sanpham->name}}</b></p>
                            <p class="single-item-price">
                            @if($sanpham->promotion_price == 0)
                                <span class="flash-sale">{{number_format($sanpham->unit_price)}}đ</span>
                            @else
                                <span class="flash-del">{{number_format($sanpham->unit_price)}}đ</span>
                                <span class="flash-sale">{{number_format($sanpham->promotion_price)}}đ</span>
                            @endif
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="space20">&nbsp;</div>

                        <div class="single-item-desc">
                            <p>{{$sanpham->description}}</p>
                        </div>
                        <div class="space20">&nbsp;</div>
                        <p>Số lượng:</p>
                        <div class="single-item-options">
                            <select class="wc-select" name="color">
                                <option>Số lượng</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <a class="add-to-cart" href="{{route('themgiohang',$sanpham->id)}}"><i class="fa fa-shopping-cart"></i></a>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="space40">&nbsp;</div>
                <div class="woocommerce-tabs">
                    <ul class="tabs">
                        <li><a href="#tab-description">Mô tả</a></li>
                    </ul>

                    <div class="panel" id="tab-description">
                        <p>{{$sanpham->description}}</p>
                        
                    </div>
                </div>
                <div class="space50">&nbsp;</div>
                <div class="beta-products-list">
                    <h4>Sản phẩm tương tự</h4>
                    <br>
                    <div class="row">
                        @foreach($sp_tuongtu as $sptt)
                        <div class="col-sm-4">
                            <div class="single-item">
                                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>

                                <div class="single-item-header">
                                    <a href="{{route('page.chi-tiet-sp',$sptt->id)}}"><img src="source/image/product/{{$sptt->image}}" alt="" height=250px></a>
                                </div>
                                <div class="single-item-body">
                                    <p class="single-item-title">{{$sptt->name}}</p>
                                    <p class="single-item-price">
                                    @if($sptt->promotion_price == 0)
                                        <span class="flash-sale">{{number_format($sptt->unit_price)}}đ</span>
                                    @else
                                        <span class="flash-del">{{number_format($sptt->unit_price)}}đ</span>
                                        <span class="flash-sale">{{number_format($sptt->promotion_price)}}đ</span>
                                    @endif
                                    </p>
                                </div>
                                <div class="single-item-caption">
                                    <a class="add-to-cart pull-left" href="{{route('themgiohang',$sptt->id)}}"><i class="fa fa-shopping-cart"></i></a>
                                    <a class="beta-btn primary" href="#">Details <i class="fa fa-chevron-right"></i></a>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="row">{{$sp_tuongtu->links()}}</div>
                </div> <!-- .beta-products-list -->
            
            </div>
            <div class="col-sm-3 aside">
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm khuyến mại</h3>
                    <div class="widget-body">
                    @foreach($spham_km as $sm)
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('page.chi-tiet-sp',$sm->id)}}"><img src="source/image/product/{{$sm->image}}" alt=""></a>
                                <div class="media-body">
                                    {{$sm->name}}
                                    @if($sm->promotion_price == 0)
                                        <span class="flash-sale">{{number_format($sm->unit_price)}}đ</span>
                                    @else
                                        <span class="flash-del">{{number_format($sm->unit_price)}}đ</span>
                                        <span class="flash-sale">{{number_format($sm->promotion_price)}}đ</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div> <!-- best sellers widget -->
                <div class="widget">
                    <h3 class="widget-title">Sản phẩm mới</h3>
                    <div class="widget-body">
                    @foreach($spham_moi as $snew)
                        <div class="beta-sales beta-lists">
                            <div class="media beta-sales-item">
                                <a class="pull-left" href="{{route('page.chi-tiet-sp',$snew->id)}}"><img src="source/image/product/{{$snew->image}}" alt=""></a>
                                <div class="media-body">
                                    {{$snew->name}}
                                    @if($snew->promotion_price == 0)
                                        <span class="flash-sale">{{number_format($snew->unit_price)}}đ</span>
                                    @else
                                        <span class="flash-del">{{number_format($snew->unit_price)}}đ</span>
                                        <span class="flash-sale">{{number_format($snew->promotion_price)}}đ</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    
                </div> <!-- best sellers widget -->
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection