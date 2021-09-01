@extends('layout')
@section('content')
<section>
    <div class="customer-user">
        <div class="container">

            <div class="row">
                @foreach( $all_user as $key => $name_user)
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
                @endforeach
                <div class="user-right  col-xl-9 col-lg-9 col-md-8 col-sm-6 col-12">
                    <div id="showcustomer" class="usercontent active">
                        @foreach( $all_user as $key => $name_user)
                        <h1>Hồ sơ cá nhân</h1>
                        <form action="{{URL::to('/update-user')}}" method="post">
                            {{ csrf_field() }}
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
                        @endforeach
                    </div>
                    <div id="showcartone" class="usercontent">

                        <div class="table-agile-info">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h1>Đơn hàng của bạn</h1>
                                </div>
                                <div class="row w3-res-tb">
                                </div>
                                <div class="table-responsive">

                                    <table class="table table-striped b-t b-light">
                                        <thead>
                                            <tr>

                                                <th>Thứ tự</th>
                                                <th>Mã Đơn Hàng</th>
                                                <th>Tổng Tiền</th>
                                                <th>Trạng Thái</th>
                                                <!-- <th>Thanh Toán</th> -->
                                                <th>Thời Gian</th>

                                                <th style="width:30px;"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $i = 0;
                                            @endphp
                                            @foreach( $history_order as $key => $history_order)
                                            @php
                                            $i++;
                                            @endphp
                                            <tr>

                                                <td><i>{{$i}}</i></label></td>
                                                <td>{{$history_order->order_code}}</td>
                                                <td>{{number_format($history_order->order_total,0,',','.')}}</td>

                                                @if($history_order->order_status == 1)
                                                <td>Đơn Hàng Mới</td>
                                                @elseif($history_order->order_status == 2)
                                                <td> Đã xử Lý</td>
                                                @elseif($history_order->order_status == 3)
                                                <td>Đang giao hàng</td>
                                                @elseif($history_order->order_status == 4)
                                                <td>Đã Nhận Hàng</td>
                                                @elseif($history_order->order_status == 5)
                                                <td>Hủy Đơn Hàng</td>
                                                @endif
                                                <td>{{$history_order->order_date}}</td>
                                                <td class="flex">
                                                    <button style="width:9rem; margin-bottom: 0.5rem;" class="btn btn-success"><a style="color: white;" href="{{URL::to('/view-order-user/'.$history_order->id_order)}}">Xem Đơn Hàng</a></button>
                                                    @if($history_order->order_status == 1)
                                                    <button type="button" style="width:9rem;" class="btn btn-danger" data-toggle="modal" data-target="#Huyhang+{{$history_order->order_code}}"> Hủy Đơn Hàng</button>
                                                    <!-- The Modal -->
                                                    <div class="modal" id="Huyhang+{{$history_order->order_code}}">
                                                        <div class="modal-dialog">
                                                            <form id="{{$history_order->order_code}}">
                                                                @csrf
                                                                <div class="modal-content">
                                                                    <!-- Modal Header -->
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Lý Do Hủy Đơn Hàng</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    </div>
                                                                    <!-- Modal body -->
                                                                    <div class="modal-body">
                                                                        <p><textarea name="lydo" style="padding-left: 1rem;" class="lydohuydon" require placeholder="Lý do hủy đơn hàng..." rows="4" cols="55"></textarea></p>
                                                                    </div>
                                                                    <!-- Modal footer -->
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                                                        <button type="button" id="{{$history_order->order_code}}" onclick="Huydonhang(this.id)" class="btn btn-success">Gửi</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <footer class="panel-footer">
                                    <div class="row">

                                        <div class="col-sm-5 text-center">
                                            <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50
                                                items</small>
                                        </div>
                                        <div class="col-sm-7 text-right text-center-xs">
                                            <ul class="pagination pagination-sm m-t-none m-b-none">
                                            </ul>
                                        </div>
                                    </div>
                                </footer>

                            </div>
                        </div>

                    </div>
                    <div id="showpassword" class="usercontent">
                        <h1>Thay Đổi Mật Khẩu Mới</h1>
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo '<span class="text-alert">' . $message . '</span>';
                            Session::put('message', null);
                        }
                        ?>
                        <form action="{{URL::to('/changPassword')}}" method="post">
                            {{ csrf_field() }}
                            <div class="password-show">
                                <label for="">Mật Khẩu Cũ</label>
                                <input type="password" name="password_old" id="" value="" placeholder="*********">
                                @if ($errors->has('password_old'))
                                <span style="color: red; font-weight: 700;">{{$errors->first('password_old')}}</span>
                                @endif
                            </div>
                            <div class="password-show">
                                <label for="">Mật Khẩu Mới</label>
                                <input type="password" name="password" id="" value="" placeholder="*********">
                                @if ($errors->has('password'))
                                <span style="color: red; font-weight: 700;">{{$errors->first('password')}}</span>
                                @endif
                            </div>
                            <div class="password-show">
                                <label for="">Nhập Lại Mật Khẩu</label>
                                <input type="password" name="password_comfirm" id="" value="" placeholder="*********">
                                @if ($errors->has('password_comfirm'))
                                <span style="color: red; font-weight: 700;">{{$errors->first('password_comfirm')}}</span>
                                @endif
                            </div>
                            <div class="password-show btn-pass">
                                <button type="submit" class="btn-submit-pass">Đổi Mật Khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection