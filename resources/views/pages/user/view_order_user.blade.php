@extends('layout')
@section('content')
<div class="table-agile-info container">

    <div class="panel panel-default">
        <div class="panel-heading">
            Thông tin Khách Hàng
        </div>

        <div class="table-responsive">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>

                        <th>Tên khách hàng</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>


                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>{{$order_by_id['0']->fullname}}</td>
                        <td>0{{$order_by_id['0']->phone}}</td>
                        <td>{{$order_by_id['0']->email}}</td>

                    </tr>

                </tbody>
            </table>

        </div>

    </div>
</div>
<br>
<div class="table-agile-info container">

    <div class="panel panel-default">
        <div class="panel-heading">
            Thông tin vận chuyển hàng
        </div>


        <div class="table-responsive">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>

                        <th>Tên người Nhận</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Ghi chú</th>
                        <th>Hình thức thanh toán</th>


                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>

                    <tr>

                        <td>{{$order_by_id['0']->shipping_name}}</td>
                        <td>{{$order_by_id['0']->shipping_address}}</td>
                        <td>0{{$order_by_id['0']->shipping_phone}}</td>
                        <td>{{$order_by_id['0']->shipping_email}}</td>
                        <td>{{$order_by_id['0']->shipping_note}}</td>
                        <td>@if($order_by_id['0']->shipping_method==0) Tiền Mặt @else VNPAY @endif</td>


                    </tr>

                </tbody>
            </table>

        </div>

    </div>
</div>
<br><br>
<div class="table-agile-info container">

    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê chi tiết đơn hàng
        </div>

        <div class="table-responsive">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>

            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên sản phẩm</th>
                        <th>Mã Đơn Hàng</th>
                        <th>Mã giảm giá</th>
                        <!-- <th>Phí ship hàng</th> -->
                        <th>Số lượng</th>
                        <th>Giá bán</th>
                        <!-- <th>Giá gốc</th> -->
                        <th>Tổng tiền</th>

                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach($order_by_id as $details)
                    @php
                    $i++;
                    @endphp
                    <tr>

                        <td><i>{{$i}}</i></label></td>
                        <td>{{$details->product_name}}</td>
                        <td>{{$details->orders_code}}</td>
                        <td>{{$details->product_coupon}}</td>
                        <td>{{$details->product_quantity}}</td>
                        <td>{{$details->product_price}}</td>
                        <td>{{$tatol =$details->product_price*$details->product_quantity}}</td>

                    </tr>
                    @endforeach
                </tbody>

            </table>
            <div style="display: flex;">
                <h1>Tổng Tiền phải thanh toán : </h1>
                <span style="color: red;font-weight: 700; padding-left: 10px; font-size: 36px;">{{number_format($details->order_total,0,',','.')}}</span>
            </div>
        </div>

    </div>
</div>

@endsection