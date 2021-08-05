@extends('layout')
@section('content')
<section>
    <div class="customer-user">
        <div class="container">
            @foreach( $all_user as $key => $name_user)
            <div class="row">
                <div class="user-left  col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="acount">
                        <img class="img-fluid" src="{{URL::to('frontend/img/avata.png')}}" alt="" width="100px" height="100px">
                        <div class="customer">
                            <p>Tài khoản của :</p>
                            <span>{{$name_user->fullname}}</span>
                        </div>
                    </div>
                    <div class="usercart active" data-electronic="showcustomer">
                        <div class="cart-user">
                            <i class="fas fa-user-tie"></i>
                            <span>Thông tin tài khoản </span>
                        </div>
                    </div>
                    <div class="usercart" data-electronic="showcartone">
                        <div class="cart-user">
                            <i class="fas fa-shipping-fast"></i>
                            <span>Đơn hàng của tôi </span>
                        </div>
                    </div>
                    <div class="usercart" data-electronic="showpassword">
                        <div class="cart-user">
                            <i class="fas fa-key"></i>
                            <span>Đổi Mật Khẩu</span>
                        </div>
                    </div>
                </div>
                <div class="user-right  col-xl-9 col-lg-9 col-md-8 col-sm-6 col-12">
                    <div id="showcustomer" class="usercontent active">
                        <h1>Hồ sơ cá nhân</h1>
                        <form action="{{URL::to('/update-user')}}" method="post">
                            <div class="customer_name">
                                <label for="">Họ & Tên :</label>
                                <input type="text" name="name" value="{{$name_user->fullname}}" id="">
                            </div>
                            <div class="customer_name">
                                <label for="">Email :</label>
                                <label for="" class="email">{{$name_user->email}}</label>
                            </div>
                            <div class="customer_name">
                                <label for="">Số Điện Thoại :</label>
                                <input type="text" name="phone" value="{{'0'.($name_user->phone)}}" id="">
                            </div>
                            <div class="customer_name">
                                <label for="" style="vertical-align: top;">Địa chỉ :</label>
                                <textarea required name="address" id="" cols="30" rows="10">{{$name_user->address}}</textarea>
                            </div>
                            <div class="item-form btn">
                                <button class="btn btn-submit-info" type="submit">
                                    <i class="fas fa-wrench"></i>
                                    Cập Nhật
                                </button>
                            </div>
                        </form>
                    </div>
                    <div id="showcartone" class="usercontent">
                        <h1>Chi Tiết Đơn Hàng</h1>
                    </div>
                    <div id="showpassword" class="usercontent">
                        <h1>Thay Đổi Mật Khẩu Mới</h1>
                        <form action="" method="post">
                            <div class="password-show">
                                <label for="">Mật Khẩu Cũ</label>
                                <input type="password" name="password" id="" value="123456">
                            </div>
                            <div class="password-show">
                                <label for="">Mật Khẩu Mới</label>
                                <input type="password" name="password" id="" value="123456789">
                            </div>
                            <div class="password-show">
                                <label for="">Nhập Lại Mật Khẩu</label>
                                <input type="password" name="password" id="" value="123456789">
                            </div>
                            <div class="password-show btn-pass">
                                <button type="button" class="btn-submit-pass">Đổi Mật Khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection