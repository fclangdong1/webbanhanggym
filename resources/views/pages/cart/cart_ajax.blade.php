@extends('layout')
@section('content')
<!-- *********************** Start Banner ***************** -->
<div class="banner" style="background: white;">
    <div class="house owl-carousel owl-theme container" id="banner-slider">
        <div class="item">
            <img src="{{URL::to('frontend/img/bannergym3.png')}}" alt="">
            <div class="item-content">
                <span>Giảm giá mùa hè!</span>
                <h2 style="color: white;">Áo Sơ Mi
                    <br style="color: white;"> Phong Cách Đơn Giản
                </h2>
                <p style="color: white;">Giảm Giá Lớn</p>
                <h3 style="color: white;">Sale 30% Off</h3>
                <button class="shopnow">Mua Ngay</button>
            </div>
        </div>
        <div class="item">
            <img src="{{URL::to('frontend/img/bannergym1.png')}}" alt="">
            <div class="item-content">
                <span style="color: white;">Đừng Bỏ Lỡ!</span>
                <h2 style="color: white;">Balo Mark Ryden
                </h2>
                <p style="color: white;">Phụ kiện thời trang</p>
                <h3 style="color: white;">Giá chỉ 99,000 VNĐ</h3>
                <button class="shopnow">Mua Ngay</button>
            </div>
        </div>
        <div class="item">
            <img src="{{URL::to('frontend/img/bannergym2.png')}}" alt="">
            <div class="item-content">
                <span style="color: white;">Áo Hoodie Dài Tay</span>
                <h2 style="color: white;">Kiểu dáng thời trang
                    <br style="color: white;"> Đẳng cấp 4 mùa
                </h2>
                <p style="color: white;">Sản phẩm mới</p>
                <h3 style="color: white;">Giảm giá 15%</h3>
                <button class="shopnow">Mua Ngay</button>
            </div>
        </div>
    </div>
</div>
<!-- *********************** End Banner ***************** -->
<section>
    <div class="cart-shopping">
        <div class="container">
            <h2>Giỏ Hàng Của Bạn</h2>
            <div class="row">
                <div class="cart-left col-xl-8 col-lg-8 col-md-7 col-12">
                    <form action="{{URL::to('/update-cart')}}" method="POST">
                        @csrf
                        <div class="cart-left-form">
                            <table class="shop-table">
                                <thead>
                                    <tr class="cart_items">
                                        <th class="product-name" colspan="3">Sản Phẩm</th>
                                        <th class="product-price">Giá</th>
                                        <th class="product-quantity" style="width: 9rem;">Số Lượng</th>
                                        <th class="product-subtotal">Tạm Tính</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $total = 0;
                                    @endphp
                                    @if(Session::get('cart')==true)
                                    @foreach(Session::get('cart') as $key => $cart)
                                    @php
                                    $subtotal = $cart['product_price']*$cart['product_qty'];
                                    $total+=$subtotal;
                                    @endphp
                                    <tr>
                                        <td class="product-remove"><a href="{{URL::to('/del-product/'.$cart['session_id'])}}">X</a></td>
                                        <td class="product-thumbnail"> <a href=""><img style="width: 100px; height:130px;" src="{{URL::to('uploads/product/'.$cart['product_image'])}}" alt=""></a></td>
                                        <td class="product-thumbnail"> <a href="">{{$cart['product_name']}}</a></td>
                                        <td class="product-price">
                                            <span class="price">{{number_format($cart['product_price'],0,',','.')}}VNĐ</span>
                                        </td>
                                        <td class="amount">
                                            <input type="number" value="{{$cart['product_qty']}}" min="1" max="{{$cart['product_quantity']}}" class="cart_quantity" name="cart_qty[{{$cart['session_id']}}]" id="">
                                            <input type="hidden" name="rowId_cart" class="form-control" value="">
                                        </td>
                                        <td class="product-subtotal" data-title="tạm tính">
                                            <span class="total-price">
                                                {{number_format($subtotal,0,',','.')}}VNĐ
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    @endif

                                </tbody>
                            </table>
                        </div>

                        <div class="home-menu flex" style="align-items: center; justify-content: space-between;">
                            <div class="left">
                                <a href="{{URL::to('/trang-chu')}}"><i class="fas fa-angle-double-left"></i> Tiếp Tục Mua Hàng</a>
                            </div>
                            <div class="right">
                                <!-- <a href=""><i class="fab fa-angellist"></i> Cập Nhập Giỏ Hàng</a> -->
                                <input type="submit" name="update_qty" value="Cập Nhập Giỏ Hàng">
                            </div>
                        </div>
                    </form>

                </div>
                <div class="cart-right col-xl-4 col-lg-4 col-md-5 col-12">
                    <div class="cart-total">
                        <table cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="product-name" colspan="2" style="border-width:3px;">Thông Tin Đơn Hàng
                                    </th>
                                </tr>
                            </thead>
                        </table>
                        <!-- <h2>Thông Tin Đơn Hàng</h2> -->
                        <table cellspacing="0" class="shop_table" style="width:100%">

                            <tbody>
                                @if(Session::get('coupon_code'))
                                @foreach(Session::get('coupon_code') as $key => $cou)
                                @if($cou['coupon_condition']==1)
                                <tr class="cart-subtotal">
                                    <th>Tạm tính :</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount"> {{number_format($total,0,',','.')}}VNĐ</span>
                                    </td>
                                </tr>
                                <tr class="shipping ">
                                    <th>Phí Giao Hàng :</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount">Free</span>
                                    </td>
                                </tr>
                                <tr class="shipping ">
                                    <th>Giảm Giá :
                                        @if(Session::get('coupon_code'))

                                        @csrf
                                        <a class="btn btn-default check_out" href="{{URL::to('/unset-coupon')}}"><i style="color: red;" class="fas fa-trash-alt"></i></a>
                                        @endif
                                    </th>
                                    <td data-title="Tạm tính">
                                        <span class="amount"> @php
                                            $total_coupon= ($total*$cou['coupon_number'])/100;
                                            echo '
                                            '.number_format($total_coupon,0,',','.').'VNĐ';
                                            @endphp</span>
                                    </td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Tổng :</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount">
                                            {{number_format($total-$total_coupon,0,',','.')}}VNĐ
                                        </span>
                                    </td>
                                </tr>
                                @elseif($cou['coupon_condition']==2)
                                <tr class="cart-subtotal">
                                    <th>Tạm tính :</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount"> {{number_format($total,0,',','.')}}VNĐ</span>
                                    </td>
                                </tr>
                                <tr class="shipping ">
                                    <th>Phí Giao Hàng :</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount">Free</span>
                                    </td>
                                </tr>
                                <tr class="shipping ">
                                    <th>Giảm Giá :
                                        @if(Session::get('coupon_code'))
                                        <a class="btn btn-default check_out" href="{{URL::to('/unset-coupon')}}"><i style="color: red;" class="fas fa-trash-alt"></i></a>
                                        @endif
                                    </th>
                                    <td data-title="Tạm tính">
                                        <span class="amount"> @php
                                            $total_coupon= $cou['coupon_number'];
                                            echo '
                                            '.number_format($total_coupon,0,',','.').'VNĐ';
                                            @endphp</span>
                                    </td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Tổng :</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount">
                                            {{number_format($total-$total_coupon,0,',','.')}}VNĐ
                                        </span>
                                    </td>
                                </tr>

                                @endif
                                @endforeach
                                @else
                                <tr class="cart-subtotal">
                                    <th>Tạm tính :</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount"> {{number_format($total,0,',','.')}}VNĐ</span>
                                    </td>
                                </tr>
                                <tr class="shipping ">
                                    <th>Phí Giao Hàng :</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount">Free</span>
                                    </td>
                                </tr>
                                <tr class="shipping ">
                                    <th>Giảm Giá :

                                    </th>
                                    <td data-title="Tạm tính">
                                        <span class="amount">0 VNĐ
                                        </span>
                                    </td>
                                </tr>
                                <tr class="cart-subtotal">
                                    <th>Tổng :</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount">
                                            {{number_format($total,0,',','.')}}VNĐ
                                        </span>
                                    </td>
                                </tr>
                                @endif
                            </tbody>

                        </table>
                        <div class="payment">
                            <?php
                            $user_id = Session::get('id_users');
                            if ($user_id != NULL) {
                            ?>
                                <a class="checkout-button button" href="{{URL::to('/checkout')}}">Tiến Hành Thanh Toán</a>
                            <?php
                            } else {
                            ?>

                                <a class="checkout-button button" href="{{URL::to('/login-checkout')}}">Tiến Hành Thanh Toán</a>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        {!! session()->get('message') !!}
                    </div>
                    @elseif(session()->has('error'))
                    <div class="alert alert-danger">
                        {!! session()->get('error') !!}
                    </div>
                    @endif
                    <form class="checkout_coupon mb-0" method="GET" action="{{URL::to('/check-coupon')}}">
                        @csrf
                        <div class="coupon">
                            <p class="widget-title"><i class="fas fa-tags"></i> Mã Giảm Giá</p>
                        </div>
                        <input type="text" name="coupon_code" id="coupon_code" class="input-text" placeholder="Mã ưu đãi">
                        <input type="submit" value="ÁP DỤNG" name="check_coupon" class="is-form expand check_coupon">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection