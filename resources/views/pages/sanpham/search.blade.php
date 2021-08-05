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
                                <div class="item-category col-xl-2 col-lg-3 col-md-6 col-sm-6 col-12">
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
                                                <i class="fas fa-shopping-cart"></i>
                                                <span>ADD TO CART</span>
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