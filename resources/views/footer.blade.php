<footer>
    <!-- start subscribe -->
    <div class="subscribe">
        <div class="container">
            <div class="email-subscribe">
                <div class="subscribe-one">
                    <h1>Đăng Ký Nhận Các Ưu Đãi Mới Nhất</h1>
                    <p>Voucher Miễn Phí Giao Hàng Cho Lần Mua Sắm Đầu Tiên</p>
                    <form action="{{URL::to('/send-mail')}}" method="get" class="contact-form">
                        <div class="input-subscribe">
                            <input type="email" name="email" placeholder="Enter Your Email Address">
                            <button type="submit" class="btn btn-style1">Đăng Ký</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end subscribe -->
    <div class="information">
        <div class="container">
            <div class="row flex">
                <div class="contact">
                    <ul class="info flex j-between">
                        <li>
                            <ul>
                                <li><img src="{{URL::to('frontend/img/your-logo.png')}}" alt=""></li>
                                <li class="phone flex">
                                    <p>Phone :</p>
                                    <a href="phone:0974135239">+84 974 135 239</a>
                                </li>
                                <li class="email flex">
                                    <p>Email :</p>
                                    <a href="">phanvanha1234567@gmail.com</a>
                                </li>
                                <li class="address flex">
                                    <p>Address :</p>
                                    <a href="">A8, Đường Man Thiện, Phường Tăng Nhơn Phú A, Tp. Thủ Đức</a>
                                </li>
                                <li class="social flex">
                                    <p>Social :</p>
                                    <div class="icons flex j-between">
                                        <span><a href=""><i class="fab fa-facebook-f"></i></a></span>
                                        <span><a href=""><i class="fab fa-twitter"></i></a></span>
                                        <span><a href=""><i class="fab fa-instagram"></i></a></span>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li>Hỗ Trợ</li>
                                <li><a href="">Điều khoản sử dụng</a></li>
                                <li><a href="">Chính sách bảo mật</a></li>
                                <li><a href="">Chính sách vận chuyển</a></li>
                                <li><a href="">Điều khoản & Điều kiện</a></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li>Thương Hiệu</li>
                                <li><a href="">Giới Thiệu</a></li>
                                <li><a href="">Blog</a></li>
                                <li><a href="">Liên Hệ</a></li>
                                <li><a href="">Câu Hỏi Thường Gặp</a></li>
                            </ul>
                        </li>
                        <li>
                            <ul>
                                <li>Danh Mục Hàng Đầu</li>
                                <li><a href="">Đồ Tập Gym Nam</a></li>
                                <li><a href="">Đồ Tập Gym Nữ</a></li>
                                <li><a href="">Phụ Kiện Tập Gym</a></li>
                                <li><a href="">Thiết Bị Tập Gym</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- start payments -->
<div class="payments">
    <div class="container">
        <div class="payments-one">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h1 class="spacingtech">Chấp Nhận Thanh Toán Đa Dạng</h1>
                    <div class="pay"><img src="{{URL::to('frontend/img/payments.png')}}" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end payments -->