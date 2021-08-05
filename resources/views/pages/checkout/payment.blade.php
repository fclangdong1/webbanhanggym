@extends('layout')
@section('content')
<section>
    <div class="cart-shopping">
        <div class="container">
            <h2>Thanh Toán Đặt Mua</h2>
            <div class="row">
                <div class="cart-left col-xl-8 col-lg-8 col-md-7 col-12">
                    <form action="{{URL::to('/update-cart-quantity')}}" method="post">
                        {{csrf_field()}}
                        <?php
                        $content = Cart::content();
                        ?>
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
                                    @foreach($content as $v_content)
                                    <tr>
                                        <td class="product"><a href=""></a></td>
                                        <td class="product-thumbnail"> <a href=""><img style="width: 100px; height:130px;" src="{{URL::to('uploads/product/'.$v_content->options->image)}}" alt=""></a></td>
                                        <td class="product-thumbnail"> <a href="">{{ $v_content->name}}</a></td>
                                        <td class="product-price">
                                            <span class="price">{{ number_format($v_content->price).' '.'VNĐ'}}</span>
                                        </td>
                                        <td class="amount">
                                            <input type="number" value="{{ $v_content->qty}}" class="cart_quantity" name="sldvsl" id="">
                                            <input type="hidden" name="rowId_cart" class="form-control" value="{{ $v_content->rowId}}">
                                        </td>
                                        <td class="product-subtotal" data-title="tạm tính">
                                            <span class="total-price">
                                                <?php
                                                $subtotal = $v_content->price * $v_content->qty;
                                                echo  number_format($subtotal) . ' ' . 'VNĐ';
                                                ?>
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- <div class="home-menu flex" style="align-items: center; justify-content: space-between;">
                            <div class="left">
                                <a href="{{URL::to('/trang-chu')}}"><i class="fas fa-angle-double-left"></i> Tiếp Tục Mua Hàng</a>
                            </div>
                            <div class="right">
                                <input type="submit" name="update_qty" value="Cập Nhập Giỏ Hàng">
                            </div>
                        </div> -->
                    </form>

                </div>
                <div class="cart-right col-xl-4 col-lg-4 col-md-5 col-12">
                    <div class="cart-total">
                        <?php
                        $content = Cart::content();
                        ?>
                        <table cellspacing="0">
                            <thead>
                                <tr>
                                    <th class="product-name" colspan="2" style="border-width:3px;">Địa chỉ giao hàng
                                    </th>
                                </tr>
                            </thead>
                        </table>
                        <!-- <h2>Thông Tin Đơn Hàng</h2> -->
                        <table cellspacing="0" class="shop_table" style="width:100%">
                            <tbody style="line-height: 1.5rem;">
                                <tr class="cart-subtotal">
                                    <th>Họ Tên :</th>

                                </tr>
                                <tr class="shipping ">
                                    <th style="font-weight: 300;">Phan Văn Hà</th>
                                    <td data-title="Tạm tính">
                                        <span class="amount">
                                            <!-- A8 khu cảnh vệ đường man thiện phường tăng nhơn phú a quận 9 -->
                                        </span>
                                    </td>
                                </tr>
                                <tr class="shipping ">
                                    <th>Địa Chỉ :</th>

                                </tr>
                                <tr class="cart-subtotal">
                                    <th style="font-weight: 300;">A8 khu cảnh vệ đường man thiện phường tăng nhơn phú a quận 9</th>

                                </tr>
                                <tr class="shipping ">
                                    <th>Số Điện Thoại :</th>

                                </tr>
                                <tr class="cart-subtotal">
                                    <th style="font-weight: 300;">0974135239</th>

                                </tr>
                                <tr class="shipping ">
                                    <th>Tổng Tiền</th>

                                </tr>
                                <tr class="cart-subtotal">
                                    <th style="font-weight: 300;">{{Cart::priceTotal().' '.'VNĐ'}}</th>

                                </tr>
                            </tbody>
                        </table>
                        <form action="{{URL::to('/order-place')}}" method="post">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="">Phương Thức Thanh Toán</label>
                                <select name="payment_option" id="" class="form-control input-sm m-bot15 choose city">
                                    <option value="">--Chọn Phương Thức Thanh Toán-- </option>
                                    <option value="1">Tiền mặt</option>
                                    <option value="2">VNPAY</option>
                                </select>
                            </div>
                            <div class=" payment">
                                <input type="submit" value="Đặt Hàng" class="checkout-button button" name="send_order_place">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection