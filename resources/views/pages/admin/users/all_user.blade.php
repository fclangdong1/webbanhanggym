@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê users
        </div>
        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle">
                    <option value="0">Bulk action</option>
                    <option value="1">Delete selected</option>
                    <option value="2">Bulk edit</option>
                    <option value="3">Export</option>
                </select>
                <button class="btn btn-sm btn-default">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                        <button class="btn btn-sm btn-default" type="button">Go!</button>
                    </span>
                </div>
            </div>
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

                        <th>Thứ Tự</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Địa Chỉ</th>
                        <th style="width:120px">Quyền</th>
                        <th>chức năng</th>

                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                @php
                $i = 0;
                @endphp
                @foreach( $show_user as $key => $show_users)
                @php
                $i++;
                @endphp
                <tbody>
                    <tr>
                        <td><i>{{$i}}</i></label></td>
                        <td>{{$show_users->fullname}}</td>
                        <td>{{$show_users->email}}</td>
                        <td>0{{$show_users->phone}}</td>
                        <td>{{$show_users->address}}</td>

                        @if($show_users->id_role ==2)
                        <td>

                            <p>Khách Hàng</p>

                        </td>
                        <td>

                            <p><a style="margin:5px 0;" class="btn btn-sm btn-danger" href="">Xóa user</a></p>
                            <p><a style="margin:5px 0;" class="btn btn-sm btn-success" href="{{URL::to('/impersonate/'.$show_users->id_users)}}">Chuyển quyền</a></p>

                        </td>

                        @else
                        <td>

                            <p>ADMIN</p>

                        </td>
                        <td>

                            <p><a style="margin:5px 0;" class="btn btn-sm btn-danger" href="">Xóa user</a></p>

                        </td>

                        @endif

                    </tr>


                </tbody>
                @endforeach
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-5 text-center">
                    <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
                </div>
                <div class="col-sm-7 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-none m-b-none">
                        {!!$show_user->links()!!}
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection