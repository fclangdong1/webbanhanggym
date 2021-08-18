<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Slider;
use App\Product;
use Carbon\Carbon;
use App\CatePost;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Shipping;
use Cart;
use Illuminate\Pagination\LengthAwarePaginator;

session_start();

use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\Types\Null_;

class CheckoutController extends Controller

{

    public function AuthLogin()
    {
        $admin_id = Session::get('id_users');
        if ($admin_id != null) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('admin')->send();
        }
    }
    public function login_checkout()
    {

        return view('login_checkout');
    }
    public function signup_checkout()
    {

        return view('signup_checkout');
    }
    // dang ky tai khoan
    public function add_customer(Request $Request)
    {
        $this->validate(
            $Request,
            [
                'customer_email' => 'required|email|unique:users,email',
                'customer_password' => 'required|min:6',
                // 'customer_name' => 'required',
                'customer_phone' => 'required|min:10|max:10'
            ],
            [
                'customer_email.required' => 'Vui lòng nhập email',
                'customer_email.email' => 'Không đúng định dạng email',
                'customer_email.unique' => 'Email đã có người sử dụng',
                'customer_password.required' => 'Vui lòng nhập mật khẩu',
                'customer_phone.max' => 'Số điện thoại gồm 10 số',
                'customer_phone.min' => 'Số điện thoại gồm 10 số',
                'customer_password.min' => 'Mật khẩu ít nhất 6 kí tự'
            ]
        );
        $data = array();
        $data['email'] = $Request->customer_email;
        $data['fullname'] = $Request->customer_name;
        $data['password'] = md5($Request->customer_password);
        $data['phone'] = $Request->customer_phone;
        $data['id_role'] = 2;
        //Kiểm tra email đã tồn tại hay chưa
        // $user_email = DB::table('users')->where('email', '=', $data['email'])->first();
        // if ($user_email == null) {
        //     $customer_id = DB::table('users')->insert($data);
        //     Session::put('id_users', $customer_id);
        //     Session::put('fullname', $Request->customer_name);
        //     Session::put('message', 'Đăng ký tài khoản thành công');
        //     return Redirect::to('/signup-checkout');
        // } else {
        //     Session::put('message', 'Email đã tồn tại');
        //     return Redirect::to('/chekout');
        // }
        $customer_id = DB::table('users')->insert($data);
        Session::put('id_users', $customer_id);
        Session::put('fullname', $Request->customer_name);
        Session::put('message', 'Đăng ký tài khoản thành công');
        return Redirect::to('/signup-checkout');

        // $customer_id = DB::table('users')->insert($data);
        // Session::put('id_users', $customer_id);
        // Session::put('fullname', $Request->customer_name);
        // Session::put('message', 'Đăng ký tài khoản thành công');
        // return Redirect::to('/signup-checkout');
    }
    public function checkout(Request $Request)
    {

        $data['id_users'] = Session::get('id_users');
        $all_user = DB::table('users')->where('id_users', $data['id_users'])->get();
        $cart = Session::get('cart');

        $cate_product = DB::table('type_products')->where('status', '0')->orderby('id_type', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '0')->orderby('id_brand', 'desc')->get();
        $all_product = DB::table('products')->where('product_status', '0')->orderby('id_products', 'desc')->get();
        $all_product_device = DB::table('products')->where('product_status', '0')->where('id_type', '14')->orderby('id_products', 'desc')->get();
        $all_product_boy = DB::table('products')->where('product_status', '0')->where('id_type', '17')->orderby('id_products', 'desc')->get();
        return view('pages.checkout.show_checkout')->with('category', $cate_product)->with('brand', $brand_product)->with('all_product', $all_product)->with('all_product_device', $all_product_device)->with('all_product_boy', $all_product_boy)->with('all_user', $all_user)->with('cart', $cart);
    }
    public function save_checkout_customer(Request $Request)
    {
        $this->validate(
            $Request,
            [
                'shipping_email' => 'required|email',
                'shipping_address' => 'required',
                'shipping_name' => 'required',
                'shipping_phone' => 'required|min:10|max:10'
            ],
            [
                'shipping_email.required' => 'Vui lòng nhập email',
                'shipping_email.email' => 'Không đúng định dạng email',
                'shipping_address.required' => 'Vui lòng nhập địa chỉ',
                'shipping_name.required' => 'Vui lòng nhập tên người nhận',
                'shipping_phone.max' => 'Số điện thoại gồm 10 số',
                'shipping_phone.min' => 'Số điện thoại gồm 10 số',
            ]
        );
        $data = array();
        $data['shipping_email'] = $Request->shipping_email;
        $data['shipping_name'] = $Request->shipping_name;
        $data['shipping_phone'] = $Request->shipping_phone;
        $data['shipping_address'] = $Request->shipping_address;
        $data['shipping_note'] = $Request->shipping_note;
        $data['shipping_method'] = 0;
        $data['created_at'] = Carbon::now();
        // $data['id_users'] = $user_shiping;
        $data['id_users'] = Session::get('id_users');
        // $all_user = DB::table('users')->where('id_users', $data['id_users'])->get();
        // return view('pages.checkout.show_checkout')->with('all_user', $all_user);

        $shipping_id = DB::table('shipping')->insertGetId($data);
        Session::put('id_shipping', $shipping_id);
        return Redirect::to('/payment');
    }
    public function payment()
    {
        $data['id_shipping'] = Session::get('id_shipping');

        $id_shipping = DB::table('shipping')->where('id_shipping', $data['id_shipping'])->get();
        $cate_product = DB::table('type_products')->where('status', '0')->orderby('id_type', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '0')->orderby('id_brand', 'desc')->get();
        return view('pages.checkout.payment')->with('category', $cate_product)->with('brand', $brand_product)->with('id_shipping', $id_shipping);
    }
    public function order_place(Request $Request)
    {
        //        insert payment
        $data = array();
        $data['payment_method'] = $Request->payment_option;
        $data['payment_status'] = 'Đang chờ xử lý';
        $data['id_order'] = Session::get('id_order');
        $payment_id = DB::table('payments')->insertGetId($data);
        // dd($Request->payment_option);
        //insert order
        $checkout_code = substr(md5(microtime()), rand(0, 26), 5);
        $order = new Order;
        $order->id_users = Session::get('id_users');
        $order->id_shipping =  Session::get('id_shipping');
        $order->payment_id = $payment_id;;
        $order->order_status = 1;

        $order->order_total = $Request->order_total;
        $order->order_code = $checkout_code;
        $order->save();
        Session::put('id_order', $order->id_order);
        // insert order_details
        if (Session::get('cart') == true) {
            foreach (Session::get('cart') as $key => $cart) {
                $order_details = new OrderDetails;

                $order_details->orders_code = $checkout_code;
                $order_details->id_orders = Session::get('id_order');
                $order_details->id_products = $cart['id_products'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_quantity = $cart['product_qty'];
                if (Session::get('coupon_code') != NUll) {
                    $coupon_code = Session::get('coupon_code');
                    $order_details->product_coupon =   $coupon_code[0]['coupon_code'];
                } else {
                    $order_details->product_coupon =  'Không Khuyến Mãi';
                }

                $order_details->save();
            }
        }

        $coupon_code = Session::get('coupon_code');

        if ($coupon_code == true) {
            Session::forget('coupon_code');
            return redirect()->back()->with('mesage', 'Xóa mã thành công');
        }
        if ($data['payment_method'] == 1) {

            Cart::destroy();

            $cate_product = DB::table('type_products')->where('status', '0')->orderby('id_type', 'desc')->get();
            $brand_product = DB::table('brand')->where('brand_status', '0')->orderby('id_brand', 'desc')->get();
            return view('pages.checkout.handcash')->with('category', $cate_product)->with('brand', $brand_product);
        } else {
            echo 'Thanh toán VNPAY';
        }
    }

    public function logout_checkout()
    {
        Session::flush();
        Session::forget('is_users');
        return Redirect::to('/login-checkout');
    }
    public function login_customer(Request $Request)
    {
        $this->validate(
            $Request,
            [
                'email_account' => 'required|email',
                'password_account' => 'required|min:6',
                // 'customer_name' => 'required',
            ],
            [
                'email_account.required' => 'Vui lòng nhập email',
                'email_account.email' => 'Không đúng định dạng email',
                'password_account.required' => 'Vui lòng nhập mật khẩu',

                'password_account.min' => 'Mật khẩu ít nhất 6 kí tự'
            ]
        );

        $email = $Request->email_account;
        $password = md5($Request->password_account);
        $result = DB::table('users')->where('email', $email)->where('password', $password)->first();

        if ($result) {
            if ($result->id_role == 1) {
                Session::put('id_users', $result->id_users);
                Session::put('fullname', $result->fullname);
                return Redirect::to('/dashboard');
            } else {
                Session::put('id_users', $result->id_users);
                return Redirect::to('/trang-chu');
            }
        } else {
            Session::put('message', 'Sai Tài Khoản Hoặc Mật Khẩu!');
            return Redirect::to('/login-checkout');
        }
        Session::save();
    }
    public function manage_order()
    {
        $this->AuthLogin();
        $all_order = DB::table('order')
            ->join('users', 'order.id_users', '=', 'users.id_users')
            ->select('order.*', 'users.fullname')
            ->orderby('order.id_order', 'desc')->get();
        $manager_order  = view('pages.admin.manage_order')->with('all_order', $all_order);
        return view('admin_layout')->with('pages.admin.manager_order', $manager_order);
        // return view('pages.admin.manage_order');
    }
    public function view_order($orderId)
    {
        $this->AuthLogin();

        $order_by_id = DB::table('order')->where('id_order', $orderId)
            ->join('users', 'order.id_users', '=', 'users.id_users')
            // ->join('payments', 'order.payment_id', '=', 'payments.payment_id')
            ->join('shipping', 'order.id_shipping', '=', 'shipping.id_shipping')
            ->join('order_details', 'order.id_order', '=', 'order_details.id_orders')
            ->select('order.*', 'users.*', 'shipping.*', 'order_details.*')->get();
        $manager_order_by_id  = view('pages.admin.view_order')->with('order_by_id', $order_by_id);
        // dd($order_by_id);
        // dd($order_by_id);
        return view('admin_layout')->with('pages.admin.view_order', $manager_order_by_id);


        // return view('pages.admin.view_order');
    }
}
