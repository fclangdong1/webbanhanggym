<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('frontend/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/cart_detail.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/cart.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/signup.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="shortcut icon" href="dist/img/logodocument.png" type="image/png" />
    <style type="text/css">
        body {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
    <title>ĐĂNG KÝ</title>
</head>

<body>
    <section class="section-sign">
        <!-- <div class="col-xs-2 col-sm-3 col-md-3 col-lg-4"></div> -->
        <div class="col-xs-8 col-sm-6 col-md-6 col-lg-4 form-background">
            <h3>Tạo Tài Khoản!</h3>
            <div class="icon">
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-google-plus-g"></i></a>
                <a href=""><i class="fab fa-linkedin-in"></i></a>
            </div>
            <?php
            $message = Session::get('message');
            if ($message) {
                echo '<div class="text-alert" style="color:#006400;font-size: 1.5rem;
                font-weight: 700;
                text-align: center;">' . $message . '</div>';
                Session::put('message', null);
            }
            ?>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form">
                <div class="row">
                    <form action="{{URL::to('/add-customer')}}" name="sign-form" id="sign-form" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-item">
                                <!-- <label for="email">Email :</label> -->
                                <input type="email" id="email" name="customer_email" value="" placeholder="Email" class="form-control" />
                                @if ($errors->has('customer_email'))
                                <span style="color: red; font-weight: 700;">{{$errors->first('customer_email')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-item">
                                <!-- <label for="fullname">Họ Và Tên :</label> -->
                                <input type="text" id="fullname" name="customer_name" value="" placeholder="Full Name" class="form-control" />
                                @if ($errors->has('customer_name'))
                                <span style="color: red; font-weight: 700;">{{$errors->first('customer_name')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-item">
                                <!-- <label for="password">Mật Khẩu :</label> -->
                                <input type="password" id="password" name="customer_password" value="" placeholder="Password" class="form-control" />
                                @if ($errors->has('customer_password'))
                                <span style="color: red; font-weight: 700;">{{$errors->first('customer_password')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-item">
                                <!-- <label for="phone">Số Điện Thoại :</label> -->
                                <input type="tel" id="phone" name="customer_phone" value="" placeholder="Phone" class="form-control" />
                                @if ($errors->has('customer_phone'))
                                <span style="color: red; font-weight: 700;">{{$errors->first('customer_phone')}}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-item">
                                <button type="submit" name="login" class="btn-login miss">Đăng
                                    Ký</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-item center">
                                <h2>Đã có tài khoản ?</h2>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-item center">
                                <a href="{{URL::to('/login-checkout')}}" class="creat">Đăng Nhập </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
        $("#sign-form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },
                fullname: {
                    required: true,
                    minlenght: 1
                },
                password: {
                    required: true,
                    minlenght: 6
                },
                phone: {
                    required: true,
                    minlenght: 10
                }
            },
            messages: {
                email: {
                    required: "Vui lòng nhập Email",
                    email: "Không đúng định dạng Email"
                },
                fullname: {
                    required: "Vui lòng nhập họ tên của bạn",
                    minlenght: "Tên phải hơn 1 ký tự"
                },
                password: {
                    required: "Vui lòng nhập  mật khẩu",
                    minlenght: "Mật khẩu phải lớn hơn 6 ký tự"
                },
                phone: {
                    required: true,
                    minlenght: 10
                }
            }
        })
    </script>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
<script src="{{asset('frontend/js/search.js')}}"></script>
<script src="{{asset('frontend/js/detail.js')}}"></script>

</html>