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
use Cart;
use Illuminate\Pagination\LengthAwarePaginator;

session_start();

use Illuminate\Support\Facades\Redirect;

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
        $payment_id = DB::table('payments')->insertGetId($data);
        //insert order
        $order_data = array();
        $order_data['id_users'] = Session::get('id_users');
        $order_data['id_shipping'] = Session::get('id_shipping');
        $order_data['payment_id'] = $payment_id;
        $order_data['order_total'] = Cart::priceTotal();
        $order_data['order_status'] = 'Đang chờ xử lý';
        $order_id = DB::table('order')->insertGetId($order_data);
        // insert order_details
        $contentone = Cart::content();
        foreach ($contentone as $y_content) {
            $order_d_data['id_orders'] = $order_id;
            $order_d_data['id_products'] = $y_content->id;
            $order_d_data['product_name'] = $y_content->name;
            $order_d_data['product_price'] = $y_content->price;
            $order_d_data['product_quantity'] = $y_content->qty;
            DB::table('order_details')->insert($order_d_data);
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
            ->join('shipping', 'order.id_shipping', '=', 'shipping.id_shipping')
            ->join('order_details', 'order.id_order', '=', 'order_details.id_orders')
            ->select('order.*', 'users.*', 'shipping.*', 'order_details.*')->get();
        $manager_order_by_id  = view('pages.admin.view_order')->with('order_by_id', $order_by_id);
        return view('admin_layout')->with('pages.admin.view_order', $manager_order_by_id);


        // return view('pages.admin.view_order');
    }
}
