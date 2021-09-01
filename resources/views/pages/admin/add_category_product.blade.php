@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm danh mục sản phẩm
            </header>
            <div class="panel-body">

                <div class="position-center">
                    <form role="form" action="{{URL::to('/save-category-product')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên danh mục</label>
                            <input type="text" class="form-control" onkeyup="ChangeToSlug();" name="type_product_name" id="slug" placeholder="danh mục">
                            @if ($errors->has('type_product_name'))
                            <span style="color: red; font-weight: 700;">{{$errors->first('type_product_name')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hình ảnh</label>
                            <input type="file" name="type_image" class="form-control" id="exampleInputEmail1">
                            @if ($errors->has('type_image'))
                            <span style="color: red; font-weight: 700;">{{$errors->first('type_image')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Slug</label>
                            <input type="text" name="slug_type_product" class="form-control" id="convert_slug" placeholder="Tên danh mục">
                            @if ($errors->has('slug_type_product'))
                            <span style="color: red; font-weight: 700;">{{$errors->first('slug_type_product')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Mô tả danh mục</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="type_product_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                            @if ($errors->has('type_product_desc'))
                            <span style="color: red; font-weight: 700;">{{$errors->first('type_product_desc')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Từ khóa danh mục</label>
                            <textarea style="resize: none" rows="8" class="form-control" name="type_product_keywords" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                            @if ($errors->has('type_product_keywords'))
                            <span style="color: red; font-weight: 700;">{{$errors->first('type_product_keywords')}}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Hiển thị</label>
                            <select name="type_product_status" class="form-control input-sm m-bot15">
                                <option value="1">Hiển thị</option>
                                <option value="0">Ẩn</option>

                            </select>
                        </div>
                        <?php
                        $message = Session::get('message');
                        if ($message) {
                            echo '<div class="text-alert" style="color:#006400;">' . $message . '</div>';
                            Session::put('message', null);
                        }
                        ?>
                        <button type="submit" name="add_category_product" class="btn btn-info">Thêm danh mục</button>
                    </form>
                </div>

            </div>
        </section>

    </div>
    @endsection