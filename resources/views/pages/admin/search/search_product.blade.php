@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div class="panel-heading">
            Liệt kê sản phẩm
        </div>

        <div class="row w3-res-tb">
            <div class="col-sm-5 m-b-xs">
                <select class="input-sm form-control w-sm inline v-middle" name="keywords_sumbmit">
                    <option value="0">Áo Gym Nam</option>
                    <option value="1">Áo Gym Nữ</option>
                    <option value="2">Phụ Kiện </option>
                    <option value="3">Thiết Bị</option>
                </select>
                <button class="btn btn-sm btn-default" type="submit" name="search_brand">Apply</button>
            </div>
            <div class="col-sm-4">
            </div>
            <form action="{{URL::to('/search-product')}}" method="POST">
                {{csrf_field()}}
                <div class="col-sm-3">
                    <div class="input-group">
                        <input type="search" name="keywords_sumbmit" class="input-sm form-control" placeholder="Search">
                        <span class="input-group-btn">
                            <button class="btn btn-sm btn-default" type="submit" name="search_items">Go!</button>
                        </span>
                    </div>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<span class="text-alert">' . $message . '</span>';
                Session::put('message', null);
            }
            ?>
            <table class="table table-striped b-t b-light" id="myTable">
                <thead>
                    <tr>
                        <th style="width:20px;">
                            <label class="i-checks m-b-none">
                                <input type="checkbox"><i></i>
                            </label>
                        </th>
                        <th>Tên sản phẩm</th>
                        <!-- <th>Thư viện ảnh</th> -->
                        <th>Hình ảnh</th>
                        <!-- <th>Tài liệu</th> -->
                        <th>Số lượng</th>
                        <th>Slug</th>
                        <th>Giá bán</th>
                        <!-- <th>Giá gốc</th> -->
                        <th>Danh mục</th>
                        <th>Thương hiệu</th>

                        <th>Hiển thị</th>

                        <th style="width:30px;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($all_product as $key => $pro)
                    <tr>
                        <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>

                        <td>{{ $pro->product_name }}</td>
                        <td><img src="/uploads/product/{{ $pro->product_image}}" height="100px" width="100px"></td>
                        <td>{{ $pro->product_quantity }}</td>
                        <td>{{ $pro->product_slug }}</td>
                        <td>{{ number_format($pro->product_price,0,',','.') }}đ</td>
                        <td>{{ $pro->name}}</td>
                        <td>{{ $pro->brand_name }}</td>

                        <td><span class="text-ellipsis">
                                <?php
                                if ($pro->product_status == 0) {
                                ?>
                                    <a href="{{URL::to('/unactive-product/'.$pro->id_products)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                                <?php
                                } else {
                                ?>
                                    <a href="{{URL::to('/active-product/'.$pro->id_products)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                                <?php
                                }
                                ?>
                            </span></td>

                        <td>
                            <a href="{{URL::to('/edit-product/'.$pro->id_products)}}" class="active styling-edit" ui-toggle-class="">
                                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
                            <a onclick="return confirm('Bạn có chắc là muốn xóa sản phẩm này ko?')" href="{{URL::to('/delete-product/'.$pro->id_products)}}" class="active styling-edit" ui-toggle-class="">
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
                        {!!$all_product->links()!!}
                    </ul>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection