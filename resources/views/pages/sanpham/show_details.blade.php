@extends('layout')
@section('content')
<!-- *********************** Start Banner ***************** -->
<div class="banner" style="background: white;">
    <div class="house owl-carousel owl-theme container" id="banner-slider">
        <div class="item">
            <img src="{{URL::to('frontend/img/bannergym2.png')}}" alt="">
            <div class="item-content">
                <span>Giảm giá mùa hè!</span>
                <h2 style="color: white;">Máy Chạy Bộ Điện Đa Năng
                    <br style="color: white;"> Phong Cách Đơn Giản
                </h2>
                <p style="color: white;">Giảm Giá Lớn</p>
                <h3 style="color: white;">Sale 30% Off</h3>
                <button class="shopnow"> <a style="color: white; text-decoration: none;" href="{{URL::to('/chi-tiet-san-pham/31')}}">Mua Ngay</a></button>
            </div>
        </div>
        <div class="item">
            <img src="{{URL::to('frontend/img/bannergym3.png')}}" alt="">
            <div class="item-content">
                <span style="color: white;">Đừng Bỏ Lỡ!</span>
                <h2 style="color: white;">Ghế Tập Bụng Đa Năng
                </h2>
                <p style="color: white;">Thiết Bị Tập Gym</p>
                <h3 style="color: white;">Giá chỉ 1,450,000</h3>
                <button class="shopnow"> <a style="color: white; text-decoration: none;" href="{{URL::to('/chi-tiet-san-pham/42')}}">Mua Ngay</a></button>
            </div>
        </div>
        <div class="item">
            <img src="{{URL::to('frontend/img/bannergym1.png')}}" alt="">
            <div class="item-content">
                <span style="color: white;">Áo Ngắn Tay Nam</span>
                <h2 style="color: white;">Kiểu dáng thời trang
                    <br style="color: white;"> Đẳng cấp 4 mùa
                </h2>
                <p style="color: white;">Sản phẩm mới</p>
                <h3 style="color: white;">Giảm giá 15%</h3>
                <button class="shopnow"> <a style="color: white; text-decoration: none;" href="{{URL::to('/chi-tiet-san-pham/45')}}">Mua Ngay</a></button>
            </div>
        </div>
    </div>
</div>
<!-- *********************** End Banner ***************** -->
<section>
    <div class="products-brand" style="padding-top: 3rem;">
        @foreach($product_details as $key => $product)
        <input type="hidden" value="{{$product->id_products}}" class="cart_product_id_{{$product->id_products}}">

        <input type="hidden" id="wishlist_productname{{$product->id_products}}" value="{{$product->product_name}}" class="cart_product_name_{{$product->id_products}}">

        <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->id_products}}">

        <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->id_products}}">

        <input type="hidden" id="wishlist_productprice{{$product->id_products}}" value="{{number_format($product->product_price,0,',','.')}}VNĐ">

        <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->id_products}}">

        <!-- <input type="hidden" value="1" class="cart_product_qty_{{$product->id_products}}"> -->
        <div class="container">
            <div class="detail-products">
                <div class="row">
                    <div class="col-sm-12 col-lg-4 padding-left">
                        <div class="cart-img-detail">
                            <div class="col-md-12 col-lg-12">
                                <img class="img-fluid" src="{{URL::to('/uploads/product/'.$product->product_image)}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6 padding-right">
                        <form action="{{URL::to('/gio-hang')}}" method="GET">
                            {{csrf_field()}}
                            <div class="col-inner text-left">
                                <h1 class="product-title product_title entry-title">{{$product->product_name}}</h1>
                                <div class="product-price-container is-xlarge">
                                    <span class="woocommerce-Price-amount amount">
                                        <b>Giá: </b>
                                        <span>{{number_format($product->product_price).' VNĐ'}}</span>
                                    </span>
                                </div>
                                <div class="quantity">
                                    <label for="">Số Lượng:</label>
                                    <input type="number" name="qty" id="" class="cart_detail cart_product_qty_{{$product->id_products}}" value="1">
                                    <input type="hidden" name="productid_hiden" value="{{$product->id_products}}">
                                </div>
                                @if($product->product_quantity ==0)
                                <span class="text-alert" style="color: red;font-weight: 700;font-size: 3rem;">Hết Hàng</span>
                                @else
                                <button style="cursor: pointer;" type="submit" data-id_product="{{$product->id_products}}" name="add-to-cart" class="btn btn-primary btn-sm add-to-cart">Thêm Giỏ Hàng</button>
                                @endif
                                <!-- <button style="cursor: pointer;" type="submit" data-id_product="{{$product->id_products}}" name="add-to-cart" class="btn btn-primary btn-sm add-to-cart">Thêm Giỏ Hàng</button> -->
                                <div class="note">
                                    <p><b>Tình Trạng:</b> Còn Hàng</p>
                                    <p><b>Điều kiện:</b> Mới 100%</p>
                                    <p><b>Số lượng kho còn: </b>
                                        @if($product->product_quantity ==0)
                                        <span class="text-alert" style="color: red;font-weight: 700;">Hết Hàng</span>
                                        @else
                                        {{$product->product_quantity}}
                                        @endif
                                    </p>
                                    <p><b>Thương hiệu:</b> {{$product->brand_name}}</p>
                                    <p><b>Danh mục:</b> {{$product->name}}</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="category-tab shop-details-tab">
                <div class="col-sm-12 ">
                    <ul class="nav nav-tabs">

                        <a class="chitiet active" data-electronic="details">Mô Tả</a>
                        <a class="chitiet" data-electronic="companyprofile">Chi Tiết Sản Phẩm</a>
                        <a class="chitiet" data-electronic="reviews">Bình Luận</a>
                    </ul>
                </div>
                <div class="tab-content">
                    <div id="details" class="tab-pane active">
                        <p><i class="far fa-arrow-alt-circle-right"></i>
                            <b>{!!$product->product_desc!!}</b>
                        </p>
                    </div>
                    <div id="companyprofile" class="tab-pane">

                        <p><i class="far fa-arrow-alt-circle-right"></i>
                            <b>{!!$product->product_content!!}</b>
                        </p>
                    </div>
                    <div id="reviews" class="tab-pane tab-pane-reviews">
                        <p>
                            Viết đánh giá của bạn
                        </p>
                        <div id="comment_show">
                            <form action="" method="post">
                                @csrf
                                <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$product->id_products}}">
                                <div id="comment_show1"></div>

                            </form>
                        </div>
                        <form action="">
                            @csrf
                            <span>
                                <input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$product->id_products}}">
                                <input type="text" name="comment_name" id="" value="" class="comment_name" placeholder="Tên Bình Luận">
                            </span>
                            <textarea name="comment" class="comment_content" placeholder="Nội dung bình luận" id="" cols="30" rows="10"></textarea>
                            <div id="notify_comment"></div>
                            <button class="btn btn-default pull-right send-comment" type="button"><i class="far fa-arrow-alt-circle-right"></i>Gửi Bình
                                Luận</button>

                        </form>
                    </div>
                </div>

            </div>
        </div>
        @endforeach

    </div>
</section>

@endsection