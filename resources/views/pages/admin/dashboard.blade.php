@extends('admin_layout')
@section('admin_content')
<div class="container-fluid">
    <style type="text/css">
        p.title_thongke {
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
    </style>
    <div class="row">
        <p class="title_thongke">Thống kê đơn hàng doanh số</p>

        <form autocomplete="off">
            @csrf

            <div class="col-md-2">
                <p>Từ ngày: <input type="text" id="datepicker" class="form-control"></p>

                <input type="button" id="btn-dashboard-filter" class="btn btn-primary btn-sm" value="Lọc kết quả"></p>

            </div>

            <div class="col-md-2">
                <p>Đến ngày: <input type="text" id="datepicker2" class="form-control"></p>

            </div>

            <div class="col-md-2">
                <p>
                    Lọc theo:
                    <select class="dashboard-filter form-control">
                        <option>--Chọn--</option>
                        <option value="homnay">Hôm Nay</option>
                        <option value="7ngay">7 ngày qua</option>
                        <option value="thangtruoc">tháng trước</option>
                        <option value="thangnay">tháng này</option>
                        <option value="365ngayqua">365 ngày qua</option>
                    </select>
                </p>
            </div>

        </form>
        <div class="col-md-12">
            <div id="chart" style="height: 250px; color: red;"></div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-9 col-xs-12">
            <p class="title_thongke ">Thống kê trạng thái đơn hàng</p>
            <div style="display: flex;">
                <div class="col-md-5 col-xs-12 justify-content-center">
                    <div id="donut-example"></div>
                </div>
                <div class="col-md-4 col-xs-12" style="padding-top:8rem">
                    <div><i class="fas fa-circle" style="color:#F11142;"></i> <span style="font-weight: 700;"> : Đơn Hàng Mới </span></div>
                    <div><i class="fas fa-circle" style="color:#4211F1;"></i> <span style="font-weight: 700;"> : Đã Xử Lý</span></div>
                    <div><i class="fas fa-circle" style="color:#11DBF1;"></i> <span style="font-weight: 700;"> : Đang Giao Hàng</span></div>
                    <div><i class="fas fa-circle" style="color:#11F137;"></i> <span style="font-weight: 700;"> : Đã Nhận Hàng</span></div>
                    <div><i class="fas fa-circle" style="color:#F1E611;"></i> <span style="font-weight: 700;"> : Hủy Hàng</span></div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-xs-12">
            <p class="title_thongke">Tổng sản phẩm tồn</p>
            <div id="donut-product"></div>
        </div>
    </div>
    @endsection