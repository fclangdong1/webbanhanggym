<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Slider;
use App\Product;
use Carbon\Carbon;
use App\CatePost;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Products;
use App\Http\Controllers\Integer;

session_start();

use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('id_users');
        // Session::get('id_role');
        $admin_role = Session::get('id_role');
        if ($admin_role == 1) {
            return Redirect::to('dashboard');
        } else {
            return Redirect::to('trang-chu')->send();
        }
    }
    public function index()
    {
        return view('admin_login');
    }
    public function show_dashboard()
    {
        $this->AuthLogin();

        // $get = Order::where('order_status', 4)
        //     ->select(\DB::raw('sum(order_total) as order_total'), \DB::raw('DATE(order_date) as order_date'))->groupBy('order_date')->get()->toArray();
        // foreach ($get as $key => $val) {

        //     $chart_data[] = array(
        //         'period' => $val['order_date'],
        //         'sales' => $val['order_total'],


        //     );
        // }
        // echo '<pre>';
        // print_r($chart_data[$key]);
        // echo '</pre>';
        // tỉnh tổng toàn bộ sản phẩm tồn
        $total_product = DB::table('products')->sum('product_quantity');
        //total  trạng  thái đơn hàng
        $order1 = Order::where('order_status', 1)->count();
        $order2 = Order::where('order_status', 2)->count();
        $order3 = Order::where('order_status', 3)->count();
        $order4 = Order::where('order_status', 4)->count();
        $order5 = Order::where('order_status', 5)->count();

        return view('pages.admin.dashboard')->with(compact('order1', 'order2', 'order3', 'order4', 'order5', 'total_product'));
    }
    public function dashboard(Request $request)
    {

        $email = $request->email;
        $password = md5($request->password);
        $result = DB::table('users')->where('id_role', 1)->where('email', $email)->where('password', $password)->first();

        if ($result) {
            Session::put('fullname', $result->fullname);
            Session::put('id_users', $result->id_users);
            if ($result->id_role == 1) {
                return Redirect::to('/dashboard');
            } else {
                Session::put('message', 'Bạn không có quyền truy cập vào ADMIN');
                return Redirect::to('/admin');
            }
        } else {
            Session::put('message', 'Sai Tài Khoản Hoặc Mật Khẩu!');
            return Redirect::to('/admin');
        }
    }
    public function logout()
    {
        $this->AuthLogin();
        Session::put('fullname', null);
        Session::put('id_users', null);
        return Redirect::to('/admin');
    }
    // them danh muc san pham
    public function add_category_product()
    {
        $this->AuthLogin();
        return view('pages.admin.add_category_product');
    }
    // liet ke danh muc san pham
    public function all_category_product()
    {
        $this->AuthLogin();
        $all_category_product = DB::table('type_products')->get();
        $manager_category_product = view('pages.admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('admin_layout')->with('pages.admin.all_category_product', $manager_category_product);
    }
    // thêm danh mục sản phẩm
    public function save_category_product(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $this->validate(
            $request,
            [
                'type_product_name' => 'required',
                'slug_type_product' => 'required',
                'type_product_desc' => 'required',
                'type_product_keywords' => 'required',
                'type_product_status' => 'required',

            ],
            [
                'type_product_name.required' => 'Vui lòng nhập thông tin',
                'slug_type_product.required' => 'Vui lòng nhập thông tin',
                'type_product_desc.required' => 'Vui lòng nhập thông tin',
                'type_product_keywords.required' => 'Vui lòng nhập thông tin',
                'type_product_status.required' => 'Vui lòng nhập thông tin',

            ]
        );
        $data['name'] = $request->type_product_name;
        $data['slug'] = $request->slug_type_product;
        $data['description'] = $request->type_product_desc;
        $data['meta_keywords'] = $request->type_product_keywords;
        $data['status'] = $request->type_product_status;
        $get_image = $request->file('type_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/type/', $new_image);
            // $data['product_image'] = $get_image;
            $data['type_image'] = $new_image;
            DB::table('type_products')->insert($data);
            Session::put('message', 'Cập Nhập Thành Công');
            return Redirect::to('all-category-product');
        }
        DB::table('type_products')->insert($data);
        Session::put('message', 'Thêm Danh Mục Thành Công');
        return Redirect::to('add-category-product');
    }
    // active danh muc san pham
    public function unactive_category_product($category_type_id)
    {
        $this->AuthLogin();
        DB::table('type_products')->where('id_type', $category_type_id)->update(['status' => 1]);
        Session::put('message', 'Không kích hoạt');
        return Redirect::to('all-category-product');
    }
    public function active_category_product($category_type_id)
    {
        $this->AuthLogin();
        DB::table('type_products')->where('id_type', $category_type_id)->update(['status' => 0]);
        Session::put('message', 'Kích hoạt thành công');
        return Redirect::to('all-category-product');
    }
    // sửa danh mục sản phẩm
    public function edit_category_product($category_type_id)
    {
        $this->AuthLogin();
        $edit_category_product = DB::table('type_products')->where('id_type', $category_type_id)->get();
        $manager_category_product = view('pages.admin.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('admin_layout')->with('pages.admin.edit_category_product', $manager_category_product);
    }
    //update
    public function update_category_product(Request $request, $category_type_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->type_product_name;
        $data['slug'] = $request->slug_type_product;
        $data['description'] = $request->type_product_desc;
        // $data['type_image'] = $request->type_image;
        $data['meta_keywords'] = $request->type_product_keywords;
        $get_image = $request->file('type_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/type/', $new_image);
            // $data['product_image'] = $get_image;
            $data['type_image'] = $new_image;
            DB::table('type_products')->where('id_type', $category_type_id)->update($data);
            Session::put('message', 'Cập Nhập Thành Công');
            return Redirect::to('all-category-product');
        }
        DB::table('type_products')->where('id_type', $category_type_id)->update($data);
        Session::put('message', 'Cập Nhập Thành Công');
        return Redirect::to('all-category-product');
    }
    // xóa danh mục sản phẩm
    public function delete_category_product($category_type_id)
    {
        $this->AuthLogin();
        DB::table('type_products')->where('id_type', $category_type_id)->delete();
        Session::put('message', 'Xóa danh mục thành công');
        return Redirect::to('all-category-product');
    }
    // show function danh muc san pham
    public function show_category_home($category_type_id)
    {
        $this->AuthLogin();
        $cate_product = DB::table('type_products')->where('status', '0')->orderby('id_type', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '0')->orderby('id_brand', 'desc')->get();
        $category_by_id = DB::table('products')->join('type_products', 'products.id_type', '=', 'type_products.id_type')->where('products.id_type', $category_type_id)->get();
        $category_name = DB::table('type_products')->where('type_products.id_type', $category_type_id)->limit(1)->get();
        return view('pages.category.show_category')->with('category', $cate_product)->with('brand', $brand_product)->with('category_by_id', $category_by_id)->with('category_name', $category_name);
    }
    // thống kê doanh thu

    public function filter_by_date(Request $request)
    {

        $data = $request->all();
        $this->AuthLogin();
        $from_date = $data['from_date'];
        $to_date = $data['to_date'];
        $get = Order::whereBetween('order_date', [$from_date, $to_date])->where('order_status', 4)
            ->select(\DB::raw('sum(order_total) as order_total'), \DB::raw('DATE(order_date) as order_date'))->groupBy('order_date')->get()->toArray();

        foreach ($get as $key => $val) {

            $chart_data[] = array(
                'period' => $val['order_date'],
                'sales' => $val['order_total'],

            );
        }
        echo $data = json_encode($chart_data);
    }
    public function days_order()
    {

        $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        //  $get = Order::whereBetween('order_date', [$sub30days, $now])->where('order_status', 4)->sum('order_total');

        $get = Order::whereBetween('order_date', [$sub30days, $now])->where('order_status', 4)
            ->select(\DB::raw('sum(order_total) as order_total'), \DB::raw('DATE(order_date) as order_date'))->groupBy('order_date')->get()->toArray();
        // $get = Order::whereBetween('order_date', [$from_date, $to_date])->where('order_status', 4)->get();

        foreach ($get as $key => $val) {

            $chart_data[] = array(
                'period' => $val['order_date'],
                'sales' => $val['order_total'],


            );
        }
        echo $data = json_encode($chart_data);
    }
    public function dashboard_filter(Request $request)
    {

        $data = $request->all();

        // $today = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y H:i:s');
        // $tomorrow = Carbon::now('Asia/Ho_Chi_Minh')->addDay()->format('d-m-Y H:i:s');
        // $lastWeek = Carbon::now('Asia/Ho_Chi_Minh')->subWeek()->format('d-m-Y H:i:s');
        // $sub15days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(15)->format('d-m-Y H:i:s');
        // $sub30days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(30)->format('d-m-Y H:i:s');

        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dau_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoi_thangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();



        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subdays(365)->toDateString();


        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if ($data['dashboard_value'] == '7ngay') {

            $get = Order::whereBetween('order_date', [$sub7days, $now])->where('order_status', 4)
                ->select(\DB::raw('sum(order_total) as order_total'), \DB::raw('DATE(order_date) as order_date'))->groupBy('order_date')->get()->toArray();
        } elseif ($data['dashboard_value'] == 'thangtruoc') {
            $get = Order::whereBetween('order_date', [$dau_thangtruoc, $cuoi_thangtruoc])->where('order_status', 4)
                ->select(\DB::raw('sum(order_total) as order_total'), \DB::raw('DATE(order_date) as order_date'))->groupBy('order_date')->get()->toArray();
        } elseif ($data['dashboard_value'] == 'thangnay') {

            $get = Order::whereBetween('order_date', [$dauthangnay, $now])->where('order_status', 4)
                ->select(\DB::raw('sum(order_total) as order_total'), \DB::raw('DATE(order_date) as order_date'))->groupBy('order_date')->get()->toArray();
        } elseif ($data['dashboard_value'] == 'homnay') {

            $get = Order::whereBetween('order_date', [$now, $now])->where('order_status', 4)
                ->select(\DB::raw('sum(order_total) as order_total'), \DB::raw('DATE(order_date) as order_date'))->groupBy('order_date')->get()->toArray();
        } else {
            $get = Order::whereBetween('order_date', [$sub365days, $now])->where('order_status', 4)
                ->select(\DB::raw('sum(order_total) as order_total'), \DB::raw('DATE(order_date) as order_date'))->groupBy('order_date')->get()->toArray();
        }


        foreach ($get as $key => $val) {

            $chart_data[] = array(
                'period' => $val['order_date'],
                'sales' => $val['order_total'],


            );
        }

        echo $data = json_encode($chart_data);
    }
    // Show users
    public function all_users()
    {
        $this->AuthLogin();
        $show_user = DB::table('users')->orderby('id_users', 'ASC')->simplePaginate(10);
        return view('pages.admin.users.all_user')->with('show_user', $show_user);
    }
    // chuyển quyền khách hàng thành nhân viên
    public function impersonate($id_users)
    {
        $this->AuthLogin();
        DB::table('users')->where('id_users', $id_users)->update(['id_role' => 1]);
        Session::put('message', 'Nấng cấp quyền thành công');
        return Redirect::to('all-users');
    }
}
