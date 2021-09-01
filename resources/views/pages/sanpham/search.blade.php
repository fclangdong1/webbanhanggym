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
    <div class="category-list" style="background: white;">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="category">
                        <div class="category-title">
                            <h2>Kết Quả Tìm Kiếm</h2>
                        </div>
                        <div class="category-section">
                            <div class="row">
                                @foreach($search_product as $key=> $product)
                                <input type="hidden" value="{{$product->id_products}}" class="cart_product_id_{{$product->id_products}}">

                                <input type="hidden" id="wishlist_productname{{$product->id_products}}" value="{{$product->product_name}}" class="cart_product_name_{{$product->id_products}}">

                                <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->id_products}}">

                                <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->id_products}}">

                                <input type="hidden" id="wishlist_productprice{{$product->id_products}}" value="{{number_format($product->product_price,0,',','.')}}VNĐ">

                                <input type="hidden" value="{{$product->product_price}}" class="cart_product_price_{{$product->id_products}}">

                                <input type="hidden" value="1" class="cart_product_qty_{{$product->id_products}}">
                                <div class="item-category col-xl-2 col-lg-3 col-md-6 col-sm-6 col-12">
                                    @if($product->product_quantity == 0)
                                    <div class="error">
                                        <p class="error-one">HẾT HÀNG</p>
                                    </div>
                                    @endif
                                    <div class="images-products">
                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$product->id_products)}}">
                                            <img class="image-one" src="{{URL::to('uploads/product/'.$product->product_image)}}" alt="">
                                            <img class="image-two" src="{{URL::to('uploads/product/'.$product->product_image)}}" alt="">
                                        </a>
                                        <div class="love">
                                            <div class="love-one">
                                                <i class="far fa-heart"></i>
                                            </div>
                                        </div>
                                        <div class="views">
                                            <div class="views-one">
                                                <i class="far fa-eye"></i>
                                            </div>
                                        </div>
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