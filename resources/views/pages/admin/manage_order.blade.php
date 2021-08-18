@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê tất cả đơn hàng
        </div>
        <div class="row w3-res-tb">



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

                        <th>Thứ tự</th>
                        <th>Tên Người đặt</th>
                        <th>Tổng Tiền</th>
                        <th>Trạng Thái</th>
                        <th>Thời Gian</th>

                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach($all_order as $key => $ord)
                    @php
                    $i++;
                    @endphp
                    <tr>
                        <td><i>{{$i}}</i></label></td>
                        <td>{{ $ord->fullname }}</td>
                        <td>{{ $ord->order_total }}</td>
                        <!-- <td>{{ $ord->order_status }}</td> -->


                        <td>@if($ord->order_status==1)
                            Đơn hàng mới
                            @elseif($ord->order_status==2)
                            Đã xử lý
                            @elseif($ord->order_status==3)
                            Đang Giao Hàng
                            @elseif($ord->order_status==4)
                            Đã Nhận Hàng
                            @else
                            Hủy Đơn Hàng
                            @endif
                        </td>

                        <td>{{ $ord->order_date }}</td>
                        <td>
                            <a href="{{URL::to('/view-order/'.$ord->id_order)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-eye text-success text-active"></i></a>

                            <a onclick="return confirm('Bạn có chắc là muốn xóa đơn hàng này ko?')" href="{{URL::to('/delete-order/'.$ord->id_order)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-times text-danger text"></i>
                            </a>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                    </ul>
                </div>
            </div>
        </footer>

    </div>
</div>
@endsection