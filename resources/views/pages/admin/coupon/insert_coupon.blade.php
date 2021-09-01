@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm mã giảm giá
            </header>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <div class="panel-body">

                <div class="position-center">
                    <form role="form" action="{{URL::to('/insert-coupon-code')}}" method="GET">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên mã giảm giá</label>
                            <input type="text" name="coupon_name" class="form-control" id="exampleInputEmail1">
                            @if ($errors->has('coupon_name'))
                            <span style="color: red; font-weight: 700;">{{$errors->first('coupon_name')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày bắt đầu</label>
                            <input type="date" name="coupon_date_start" class="form-control date_coupon" id="start_coupon">
                            @if ($errors->has('coupon_date_start'))
                            <span style="color: red; font-weight: 700;">{{$errors->first('coupon_date_start')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ngày kết thúc</label>
                            <input type="date" name="coupon_date_end" class="form-control" id="end_coupon">
                            @if ($errors->has('coupon_date_end'))
                            <span style="color: red; font-weight: 700;">{{$errors->first('coupon_date_end')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã giảm giá</label>
                            <input type="text" name="coupon_code" class="form-control" id="exampleInputEmail1">
                            @if ($errors->has('coupon_code'))
                            <span style="color: red; font-weight: 700;">{{$errors->first('coupon_code')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Số lượng mã</label>
                            <input type="number" name="coupon_time" class="form-control" id="exampleInputEmail1">
                            @if ($errors->has('coupon_time'))
                            <span style="color: red; font-weight: 700;">{{$errors->first('coupon_time')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Tính năng mã</label>
                            <select name="coupon_condition" class="form-control input-sm m-bot15">
                                <option value="0">----Chọn-----</option>
                                <option value="1">Giảm theo phần trăm</option>
                                <option value="2">Giảm theo tiền</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Nhập số % hoặc tiền giảm</label>
                            <input type="number" name="coupon_number" class="form-control" id="exampleInputEmail1">
                            @if ($errors->has('coupon_number'))
                            <span style="color: red; font-weight: 700;">{{$errors->first('coupon_number')}}</span>
                            @endif
                        </div>


                        <button type="submit" name="add_coupon" class="btn btn-info">Thêm mã</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
    @endsection