<div id="header">
    <div class="header-top">
        <div class="container">
            <div class="pull-left auto-width-left">
                <ul class="top-menu menu-beta l-inline">
                    <li><a href="{{route('contact.store')}}"><i class="fa fa-home"></i>Goldmark City 136 Hồ Tùng Mậu, Hà Nội</a></li>
                    <li><a href="{{route('contact.store')}}"><i class="fa fa-phone"></i>(+84) 34 988 7171</a></li>
                </ul>
            </div>
            <div class="pull-right auto-width-right">
                <ul class="top-details menu-beta l-inline">
                @if(Auth::check())
                    <li><a href="">Chào bạn {{Auth::user()->full_name}}</a></li>
                    <li><a href="{{route('page.logout')}}">Đăng xuất</a></li>

                @else
                    <li><a href="{{route('page.signin')}}">Đăng kí</a></li>
                    <li><a href="{{route('page.login')}}">Đăng nhập</a></li>
                @endif
                </ul>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-top -->
    <div class="header-body">
        <div class="container beta-relative">
            <div class="pull-left">
                <a href="{{route('page.trangchu')}}" id="logo"><img src="source/assets/dest/images/logo-cake.png" width="200px" alt=""></a>
            </div>
            <div class="pull-right beta-components space-left ov">
                <div class="space10">&nbsp;</div>
                <div class="beta-comp">
                    <form role="search" method="get" id="searchform" action="{{route('page.search')}}">
                        <input type="text" value="" name="key" id="s" placeholder="Nhập từ khóa..." />
                        <button class="fa fa-search" type="submit" id="searchsubmit"></button>
                    </form>
                </div>

                <div class="beta-comp">
                @if(Session::has('cart'))
                    <div class="cart">
                        <div class="beta-select"><i class="fa fa-shopping-cart"></i> 
                            Giỏ hàng (  @if(Session::has('cart')) {{Session('cart')->totalQty}} 
                                        @else Trống 
                                        @endif)
                            
                            <i class="fa fa-chevron-down"></i></div>
                            <div class="beta-dropdown cart-body">
                            
                            @foreach($product_cart as $product)
                            <div class="cart-item">
                                <div class="media">
                                    <a class="cart-item-delete" href="{{route('xoagiohang',$product['item']['id'])}}" ><i class="fa fa-times"></i></a>
                                    <a class="pull-left" href="{{route('page.chi-tiet-sp',$product['item']['id'])}}"><img src="source/image/product/{{$product['item']['image']}}" alt="" height="25px"></a>
                                    <div class="media-body">
                                        <span class="cart-item-title">{{$product['item']['name']}}</span>
                                        <span class="cart-item-amount">SL: {{$product['qty']}}*<span>{{number_format($product['item']['unit_price'])}}Đồng</span></span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="cart-caption">
                                <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format(Session('cart')->totalPrice)}} đồng</span></div>
                                <div class="clearfix"></div>

                                <div class="center">
                                    <div class="space10">&nbsp;</div>
                                    <a href="checkout.html" class="beta-btn primary text-center">Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .cart -->
                @endif    
                </div>
            </div>
            <div class="clearfix"></div>
        </div> <!-- .container -->
    </div> <!-- .header-body -->
    <div class="header-bottom" style="background-color: #0277b8;">
        <div class="container">
            <a class="visible-xs beta-menu-toggle pull-right" href="#"><span class='beta-menu-toggle-text'>Menu</span> <i class="fa fa-bars"></i></a>
            <div class="visible-xs clearfix"></div>
            <nav class="main-menu">
                <ul class="l-inline ov">
                    <li><a href="{{route('page.trangchu')}}">Trang chủ</a></li>
                    <li><a href="#">Sản phẩm</a>
                        <ul class="sub-menu">
                        @foreach($loai_sp as $loai)
                            <li><a href="{{route('page.product-type',$loai->id)}}">{{$loai -> name}}</a></li>
                        @endforeach
                        </ul>
                    </li>
                    <li><a href="{{route('page.about')}}">Giới thiệu</a></li>
                    <li><a href="{{route('contact.store')}}">Liên hệ</a></li>
                </ul>
                <div class="clearfix"></div>
            </nav>
        </div> <!-- .container -->
    </div> <!-- .header-bottom -->
</div> <!-- #header -->