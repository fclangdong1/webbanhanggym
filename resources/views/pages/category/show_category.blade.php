@extends('layout')
@section('content')
<!-- *********************** Start Banner ***************** -->
<div class="banner" style="background: white;">
    <div class="house owl-carousel owl-theme container" id="banner-slider">
        <div class="item">
            <img src="{{URL::to('frontend/img/bannergym3.png')}}" alt="">
            <div class="item-content">
                <span>Giảm giá mùa hè!</span>
                <h2 style="color: white;">Áo Sơ Mi
                    <br style="color: white;"> Phong Cách Đơn Giản
                </h2>
                <p style="color: white;">Giảm Giá Lớn</p>
                <h3 style="color: white;">Sale 30% Off</h3>
                <button class="shopnow">Mua Ngay</button>
            </div>
        </div>
        <div class="item">
            <img src="{{URL::to('frontend/img/bannergym1.png')}}" alt="">
            <div class="item-content">
                <span style="color: white;">Đừng Bỏ Lỡ!</span>
                <h2 style="color: white;">Balo Mark Ryden
                </h2>
                <p style="color: white;">Phụ kiện thời trang</p>
                <h3 style="color: white;">Giá chỉ 99,000 VNĐ</h3>
                <button class="shopnow">Mua Ngay</button>
            </div>
        </div>
        <div class="item">
            <img src="{{URL::to('frontend/img/bannergym2.png')}}" alt="">
            <div class="item-content">
                <span style="color: white;">Áo Hoodie Dài Tay</span>
                <h2 style="color: white;">Kiểu dáng thời trang
                    <br style="color: white;"> Đẳng cấp 4 mùa
                </h2>
                <p style="color: white;">Sản phẩm mới</p>
                <h3 style="color: white;">Giảm giá 15%</h3>
                <button class="shopnow">Mua Ngay</button>
            </div>
        </div>
    </div>
</div>
<!-- *********************** End Banner ***************** -->
<section>
    <div class="shop-section">
        <div class="container">
            <div class="row">
                <div class="services" style="flex-wrap: wrap;">
                    <div class="services-item boder-right col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href=""><i class="fas fa-truck"></i></a>
                        <div class="services-text">
                            <h5>Giao Hàng Miễn Phí</h5>
                            <p>Tất Cả Đơn Hàng</p>
                        </div>
                    </div>
                    <div class="services-item boder-right col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href=""><i class="far fa-credit-card"></i></a>
                        <div class="services-text">
                            <h5>Thanh Toán An Toàn</h5>
                            <p>An toàn 100%</p>
                        </div>
                    </div>
                    <div class="services-item boder-right col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href=""><i class="far fa-comment-alt"></i></a>
                        <div class="services-text">
                            <h5>Hỗ Trợ 24/7</h5>
                            <p>Hỗ trợ trực tuyến</p>
                        </div>
                    </div>
                    <div class="services-item col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                        <a href=""><i class="fas fa-wallet"></i></a>
                        <div class="services-text">
                            <h5>Bảo Hành 24 Ngày</h5>
                            <p>Lỗi từ nhà sản xuất</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="category-list" style="background: white;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="category">
                        @foreach( $category_name as $key => $name_category)
                        <div class="category-title">
                            <h2 style="color: black;">{{$name_category->name}}</h2>
                        </div>
                        @endforeach
                        <div class="category-section">
                            <div class="row">
                                @foreach($category_by_id as $key=> $product)
                                <input type="hidden" value="{{$product->id_products}}" class="cart_product_id_{{$product->id_products}}">

                                <input type="hidden" id="wishlist_productname{{$product->id_products}}" value="{{$product->product_name}}" class="cart_product_name_{{$product->id_products}}">

                                <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->id_products}}">

                                <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->id_products}}">

                                <input type="hidden" id="wishlist_productprice{{$product->id_products}}" value="{{number_format($product->product_price,0,',','.')}}VNĐ">

                                <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->id_products}}">

                                <input type="hidden" value="1" class="cart_product_qty_{{$product->id_products}}">
                                <div class="item-category col-xl-2 col-lg-3 col-md-6 col-sm-6 col-12">
                                    <div class="images-products">
                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->id_products)}}">
                                            <img class="image-one" src="{{URL::to('uploads/product/'.$product->product_image)}}" alt="">
                                            <img class="image-two" src="{{URL::to('uploads/product/'.$product->product_image)}}" alt="">
                                        </a>
                                    </div>
                                    <div class="text-products">
                                        <h3><a href="">{{$product->product_name}}</a></h3>
                                        <!-- <p> Mã số: 0020234</p> -->
                                        <div class="price-item">
                                            <span class="price">{{number_format($product->product_price).' VNĐ'}}</span>
                                            <!-- <span class="price-discount">195,000đ </span> -->
                                        </div>


                                        <div class="addtocart">
                                            <div class="shopping">
                                                <button type="button" data-id_product="{{$product->id_products}}" name="add-to-cart" class="btn add-to-cart"> <i class="fas fa-shopping-cart"></i> ADD TO
                                                    CART</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection