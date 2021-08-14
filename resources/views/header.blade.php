<!-- *********************** Start Header ***************** -->
<header>
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2 col-lg-3 col-md-2 col-sm-6 col-6 header-logo">
                    <div class="logo">
                        <a href="{{URL::to('/trang-chu/')}}" class="theme-logo">
                            <img src="{{URL::to('frontend/img/your-logo.png')}}" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-xl-8 col-md-6 mainmenu active">
                    <div class="menu-besto-two">
                        <nav>
                            <div class="close-menu">
                                <a href=""><i class="fas fa-times"></i></a>
                            </div>
                            <!--// dùng để điểu hướng qua trang khác -->
                            <ul class="flex">
                                <li class="home"><a href="{{URL::to('/trang-chu')}}">Trang Chủ</a>
                                </li>
                                <li class="shop"><a href="">Menu <i class="fas fa-angle-down"></i></a>
                                    <ul class="dropdown-shop flex">
                                        @foreach($category as $key => $cate)
                                        <li>
                                            <span><a href="{{URL::to('/danh-muc-san-pham/'.$cate->id_type)}}">{{$cate->name}}</a> <i class="fas fa-angle-right"></i></span>
                                            <!-- <ul class="dropdown-boy flex">
                                                <li><a href="">áo tập gym nam</a></li>
                                                <li><a href="">quần tập gym nam</a></li>
                                                <li><a href="">bộ đồ gym nam</a></li>
                                            </ul> -->
                                        </li>
                                        @endforeach
                                        <!-- <li>
                                            <span><a href="">đồ Tập gym nữ</a>
                                                <i class="fas fa-angle-right"></i></span>
                                            <ul class="dropdown-boy flex">
                                                <li><a href="">áo tập gym nữ</a></li>
                                                <li><a href="">quần tập gym nữ</a></li>
                                                <li><a href="">bộ đồ tập gym nữ</a></li>
                                            </ul>
                                        </li> -->
                                    </ul>
                                </li>

                                <li class="shop"><a href="">Thương Hiệu <i class="fas fa-angle-down"></i></a>
                                    <ul class="dropdown-shop flex">
                                        @foreach($brand as $key => $brand)
                                        <li>
                                            <span><a href="{{URL::to('/thuong-hieu/'.$brand->id_brand)}}">{{$brand->brand_name}}</a> <i class=" fas fa-angle-right"></i></span>

                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="home"><a href="">Blogs</a>
                                </li>
                                <li class="home"><a href="">Giới Thiệu</a>
                                </li>
                                <li class="home"><a href="">Liên hệ</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-6 header-linkicon">
                    <div class="right-blok-box d-flex">
                        <div class="search-wrap">
                            <button type="button" class="search-mobile-btn" data-toggle="modal" data-target="#myModal1"><i class="fas fa-search"></i></button>
                        </div>
                        <button type="button" class="navbar-toggler" for="shownav">
                            <i class="fas fa-bars"></i>
                        </button>
                        <?php
                        $customer_id = Session::get('id_users');
                        if ($customer_id == null) {
                        ?>
                            <div class="acount">
                                <a href="{{URL::to('login-checkout')}}"><i class="fas fa-user-circle"></i></a>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="acount acount-logout">
                                <a href=""><i class="fas fa-chalkboard-teacher"></i>
                                    <i style="padding-left: 0.1rem;" class="fas fa-angle-double-down"></i></a>
                                <div class="customer-ho">
                                    <div class="hoso"><a href="{{URL::to('show-user')}}">Hồ sơ</a></div>
                                    <div class="hoso"><a href="{{URL::to('logout-checkout')}}">Đăng xuất</a></div>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="shopping">
                            <a href="{{URL::to('/gio-hang')}}"><i class="fab fa-shopify"></i></a>
                            <!-- <span class="change">0</span> -->
                        </div>
                        <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                            <div class="modal-content">
                                <div class="container main-search-active">
                                    <div class="sidebar-search-input">
                                        <form action="{{URL::to('/tim-kiem')}}" class="search-bar" method="POST" role="search">
                                            {{csrf_field()}}
                                            <div class="form-search">
                                                <input type="search" name="keywords_sumbmit" placeholder="Tìm Kiếm Sản Phẩm" class="input-text" id="search">
                                                <button type="submit" name="search_items" class="search-btn"><i class="fas fa-search"></i></button>
                                            </div>
                                            <div class="search-close">
                                                <!-- <button type="button" class="close" data-dismiss="modal"><i
                                                            class="fas fa-times"></i></button> -->
                                                <a href=""><i class="fas fa-times"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- *********************** End Header ***************** -->
<div class="totopone"><a href="#" class="totop"><i class="fas fa-angle-double-up"></i></a></div>