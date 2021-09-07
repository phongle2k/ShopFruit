@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Contacts</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="{{route('page.trangchu')}}">Trang chủ</a> / <span>Contacts</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="beta-map">
    <div class="abs-fullwidth beta-map wow flipInX"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.7211890908097!2d105.76558846410931!3d21.043839095305238!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313455ea686f6ddf%3A0x80a14cf4e40b2a96!2zR29sZG1hcmsgQ2l0eSAxMzYgSOG7kyBUw7luZyBN4bqtdQ!5e0!3m2!1svi!2s!4v1608131169553!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
</div>
<div class="container">
    <div id="content" class="space-top-none">
        
        <div class="space50">&nbsp;</div>
        <div class="row">
            <div class="col-sm-8">
                <h2>Liên Hệ</h2>
                <div class="space20">&nbsp;</div>
                <p>Địa chỉ: Goldmark City 136 Hồ Tùng Mậu, Đường Hồ Tùng Mậu, Goldmark City, Phú Diễn, Từ Liêm, Hà Nội</p>
                <p>Hotline: 0349887171</p>
                <p>Email: lehongphong2882000@gmail.com</p>
                <p>Website: </p>
                <p>Giờ mở cửa: 8h - 21h hằng ngày</p>
                <div class="space20">&nbsp;</div>
                
                <!-- Success message -->
                @if(Session::has('success'))
                    <div class="alert alert-success">
                        {{Session::get('success')}}
                    </div>
                @endif
                <form action="" method="post" action="{{ route('contact.store') }}">
                <!-- CROSS Site Request Forgery Protection -->
                @csrf

                    <div class="form-block">
                        Name: <br>
                        <input name="name" type="text" placeholder="Tên của bạn">
                    </div>
                    <div class="form-block">
                        Email: <br>
                        <input name="email" type="email" placeholder="Email">
                    </div>
                    <div class="form-block">
                        Phone: <br>
                        <input name="phone" type="phone" placeholder="Phone">
                    </div>
                    <div class="form-block">
                        Chủ đề: <br>
                        <input name="subject" type="text" placeholder="Chủ đề">
                    </div>
                    <div class="form-block">
                        Nội dung: <br>
                        <textarea name="message" placeholder="Nội dung"></textarea>
                    </div>
                    <div class="form-block">
                        <input type="submit" name="send" value="Gửi" class="btn btn-dark btn-block"> 
                    </div>
                </form>
            </div>
            <div class="col-sm-4">
                <h2>Thông tin liên hệ</h2>
                <div class="space20">&nbsp;</div>

                <h6 class="contact-title" style="font-family: Time New Roman"><b>Địa chỉ</b></h6>
                <div class="space20">&nbsp;</div>
                <p">
                    Goldmark City 136 Hồ Tùng Mậu <br>
                    Đường Hồ Tùng Mậu <br>
                    Goldmark City <br>
                    Phú Diễn <br>
                    Từ Liêm <br>
                    Hà Nội
                </p>
                <div class="space20">&nbsp;</div>
                <h6 class="contact-title" style="font-family: Time New Roman"><b>Liên hệ kinh doanh</b></h6>
                <div class="space20">&nbsp;</div>
                <p>
                    Shop bán Bánh số 1 Hà nội <br>
                    Nơi cung cấp các loại Bánh ngọt, mặn, ... uy tín và chất lượng <br>
                    Chuyên sỉ lẻ các loại <br>
                    Liên hệ kinh doanh qua: <br>
                    Hotline: 0349887171 <br>
                    Email: lehongphong2882000@gmail.com
                </p>
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection