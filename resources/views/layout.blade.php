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
    <link rel="stylesheet" href="{{asset('frontend/css/user.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/thanhtoan.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/sweetalert.css')}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="shortcut icon" href="dist/img/logodocument.png" type="image/png" />
    <style type="text/css">
        body {
            font-family: 'Poppins', sans-serif !important;
        }
    </style>
    <title>Phan Ha</title>
</head>

<body>
    @include('header')
    <!-- <section> -->
    @yield('content')
    <!-- </section> -->

    @include('footer')


</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.js')}}"></script>
<script src="{{asset('frontend/js/main.js')}}"></script>
<script src="{{asset('frontend/js/search.js')}}"></script>
<script src="{{asset('frontend/js/detail.js')}}"></script>
<script src="{{asset('frontend/js/users.js')}}"></script>
<script src="{{asset('frontend/js/sweetalert.js')}}"></script>
<!-- khách hàng hủy đơn hàng  -->
<script type="text/javascript">
    function Huydonhang(id) {
        var order_code = id;
        var lydo = $('.lydohuydon').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url: "{{url('/huy-don-hang')}}",
            method: "POST",
            data: {
                order_code: order_code,
                lydo: lydo,
                _token: _token
            },
            success: function(data) {

                alert("hủy đơn hàng thành công")
                location.reload();
            }
        });
    }
</script>
<!-- ajax bình luận -->
<script type="text/javascript">
    $(document).ready(function() {
        load_comment();

        function load_comment() {
            var product_id = $('.comment_product_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/load-comment')}}",
                method: "POST",
                data: {
                    product_id: product_id,
                    _token: _token
                },
                success: function(data) {

                    $('#comment_show1').html(data);
                }
            });
        }
        $('.send-comment').click(function() {
            var product_id = $('.comment_product_id').val();
            var comment_name = $('.comment_name').val();
            var comment_content = $('.comment_content').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/send-comment')}}",
                method: "POST",
                data: {
                    product_id: product_id,
                    comment_name: comment_name,
                    comment_content: comment_content,
                    _token: _token
                },
                success: function(data) {

                    $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công</span>');
                    load_comment();
                    // $('#notify_comment').fadeOut(9000);
                    $('.comment_name').val('');
                    $('.comment_content').val('');
                }
            });
        });
    });
</script>
<!-- ajax giỏ hàng -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.add-to-cart').click(function() {
            var id = $(this).data('id_product');
            // alert(id);
            var cart_product_id = $('.cart_product_id_' + id).val();
            var cart_product_name = $('.cart_product_name_' + id).val();
            var cart_product_image = $('.cart_product_image_' + id).val();
            var cart_product_quantity = $('.cart_product_quantity_' + id).val();
            var cart_product_price = $('.cart_product_price_' + id).val();
            var cart_product_qty = $('.cart_product_qty_' + id).val();
            var _token = $('input[name="_token"]').val();
            if (parseInt(cart_product_quantity) == 0) {

                alert('Sản Phẩm tạm thời hết hàng');
            } else if (parseInt(cart_product_qty) > parseInt(cart_product_quantity)) {
                alert('Làm ơn đặt nhỏ hơn ' + cart_product_quantity);
            } else {

                $.ajax({
                    url: "{{url('/add-cart-ajax')}}",
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token,
                        cart_product_quantity: cart_product_quantity
                    },
                    success: function() {
                        // alert(data);
                        // swal("Hello world!");

                        swal({
                                title: "Đã thêm sản phẩm vào giỏ hàng",
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonClass: "btn-success",
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false
                            },
                            function() {
                                window.location.href = "{{url('/gio-hang')}}";
                            });

                    }

                });
            }


        });
    });
</script>
<script src="https://www.paypal.com/sdk/js?client-id=AdjVxoUrXV076qqWlcY0jaMQo6ICFm0rH-3rxAR2TrzZ8Bw3M_G5wmBys73F8Ohf5n-SNqI-KXF_DdwC">
    // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
</script>
<script>
    var cart_total = document.getElementById("cart_total").value;


    paypal.Buttons({
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        // value: '0.1'
                        value: `${cart_total}`
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
                // This function shows a transaction success message to your buyer.
                // alert('Transaction completed by ' + details.payer.name.given_name);
                window.location.replace('http://phanvanha.com:8000/');
            });
        }
    }).render('#paypal-button-container');
    //This function displays Smart Payment Buttons on your web page.
</script>

</html>