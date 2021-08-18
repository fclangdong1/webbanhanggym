@extends('layout')
@section('content')
<!-- *********************** Start Banner ***************** -->
<!-- <div class="banner" style="background: white;">
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
</div> -->
<!-- *********************** End Banner ***************** -->
<section>
    <div class="payment-cart">
        <div class="container">
            <div class="row">
                <h4>Thông Tin Giao Hàng</h4>
                <form action="{{URL::to('/save-checkout-customer')}}" method="post" class="flex payment-two">
                    {{csrf_field()}}
                    @foreach( $all_user as $key => $name_user)
                    <div class="col-md-6 payment-left">
                        <input class="payment-home" type="text" name="shipping_email" id="" placeholder="Điền email" value="{{$name_user->email}}">
                        @if ($errors->has('shipping_email'))
                        <span style="color: red; font-weight: 700;">{{$errors->first('shipping_email')}}</span>
                        @endif
                        <input class="payment-home" type="text" name="shipping_name" id="" placeholder="Họ & Tên" value="{{$name_user->fullname}}">
                        @if ($errors->has('shipping_name'))
                        <span style="color: red; font-weight: 700;">{{$errors->first('shipping_name')}}</span>
                        @endif
                        <input class="payment-home" type="text" name="shipping_phone" id="" placeholder="Số Điện Thoại" value="{{'0'.($name_user->phone)}}">
                        @if ($errors->has('shipping_phone'))
                        <span style="color: red; font-weight: 700;">{{$errors->first('shipping_phone')}}</span>
                        @endif
                        <input class="payment-home" type="text" name="shipping_address" id="" placeholder="Địa chỉ cụ thể" value="{{$name_user->address}}">
                        @if ($errors->has('shipping_address'))
                        <span style="color: red; font-weight: 700;">{{$errors->first('shipping_address')}}</span>
                        @endif
                        <textarea class="payment-home" name="shipping_note" id="" rows="5" placeholder="Ghi chú đơn hàng của bạn"></textarea>
                    </div>
                    @endforeach
                    <div class="col-md-6 payment-right">
                        <!-- <div class="form-group">
                            <label for="">Chọn Thành Phố</label>
                            <select name="" id="" class="form-control input-sm m-bot15 choose city">
                                <option value="">--Chọn Thành Phố-- </option>
                                <option value="">hà nội1 </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn quận huyện</label>
                            <select name="" id="" class="form-control input-sm m-bot15 choose city">
                                <option value="">--Chọn quận huyện-- </option>
                                <option value="">sơn tây </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Chọn xã phường</label>
                            <select name="" id="" class="form-control input-sm m-bot15 choose city">
                                <option value="">--Chọn Phường Xã-- </option>
                                <option value="">phường 6 </option>
                            </select>
                        </div> -->


                        <!-- <table cellspacing="0" class="shop_table-one" style="line-height: 3rem;">
                            <tbody>
                                <tr class="cart-subtotal-one">
                                    <th>Tạm tính :</th>
                                    <td data-title="Tạm tính">
                                        <span></span>
                                    </td>
                                </tr>
                                <tr class="cart-subtotal-one ">
                                    <th>Phí Giao Hàng :</th>
                                    <td data-title="Tạm tính">
                                        <span>Free</span>
                                    </td>
                                </tr>
                                @if(Session::get('coupon_code'))
                                @foreach(Session::get('coupon_code') as $key => $cou)
                                <tr class="cart-subtotal-one ">
                                    <th>Giảm Giá:</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount">
                                            {{$cou['coupon_condition']}}VNĐ
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <tr class="cart-subtotal-one ">
                                    <th>Giảm Giá:</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount">
                                            0 VNĐ
                                        </span>
                                    </td>
                                </tr>
                                @endif
                                <tr class="cart-subtotal-one">
                                    <th>Tổng :</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount">

                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table> -->
                        <!-- //test -->
                        <table cellspacing="0" class="shop_table-one" style="line-height: 3rem;">
                            @php
                            $total = 0;
                            @endphp
                            @if(Session::get('cart')==true)
                            @foreach(Session::get('cart') as $key => $cart)

                            @php
                            $subtotal = $cart['product_price']*$cart['product_qty'];
                            $total+=$subtotal;
                            @endphp
                            @endforeach
                            @else
                            @endif
                            <tbody>
                                @if(Session::get('coupon_code'))
                                @foreach(Session::get('coupon_code') as $key => $cou)
                                @if($cou['coupon_condition']==1)
                                <tr class="cart-subtotal-one">
                                    <th>Tạm tính :</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount"> {{number_format($total,0,',','.')}}VNĐ</span>
                                    </td>
                                </tr>
                                <tr class="cart-subtotal-one">
                                    <th>Phí Giao Hàng :</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount">Free</span>
                                    </td>
                                </tr>
                                <tr class="cart-subtotal-one ">
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
                                <tr class="cart-subtotal-one">
                                    <th>Tổng :</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount">
                                            {{number_format($total-$total_coupon,0,',','.')}}VNĐ
                                        </span>
                                    </td>
                                </tr>
                                @elseif($cou['coupon_condition']==2)
                                <tr class="cart-subtotal-one">
                                    <th>Tạm tính :</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount"> {{number_format($total,0,',','.')}}VNĐ</span>
                                    </td>
                                </tr>
                                <tr class="cart-subtotal-one ">
                                    <th>Phí Giao Hàng :</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount">Free</span>
                                    </td>
                                </tr>
                                <tr class="cart-subtotal-one ">
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
                                <tr class="cart-subtotal-one">
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
                                <tr class="cart-subtotal-one">
                                    <th>Tạm tính :</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount"> {{number_format($total,0,',','.')}}VNĐ</span>
                                    </td>
                                </tr>
                                <tr class="cart-subtotal-one ">
                                    <th>Phí Giao Hàng :</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount">Free</span>
                                    </td>
                                </tr>
                                <tr class="cart-subtotal-one ">
                                    <th>Giảm Giá :

                                    </th>
                                    <td data-title="Tạm tính">
                                        <span class="amount">0 VNĐ
                                        </span>
                                    </td>
                                </tr>
                                <tr class="cart-subtotal-one">
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
                        <!-- //test -->
                        <div class="submit-agileits">
                            <input type="submit" name="send_order" value="Tiếp Tục Thanh Toán">
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>
@endsection