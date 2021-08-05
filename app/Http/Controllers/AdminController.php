<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Slider;
use App\Product;
use Carbon\Carbon;
use App\CatePost;

session_start();

use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
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
    public function index()
    {
        return view('admin_login');
    }
    public function show_dashboard()
    {
        $this->AuthLogin();
        return view('pages.admin.dashboard');
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
        return view('pages.admin.add_category_product');
    }
    // liet ke danh muc san pham
    public function all_category_product()
    {
        $all_category_product = DB::table('type_products')->get();
        $manager_category_product = view('pages.admin.all_category_product')->with('all_category_product', $all_category_product);
        return view('admin_layout')->with('pages.admin.all_category_product', $manager_category_product);
    }
    // thêm danh mục sản phẩm
    public function save_category_product(Request $request)
    {
        $data = array();
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
        DB::table('type_products')->where('id_type', $category_type_id)->update(['status' => 1]);
        Session::put('message', 'Không kích hoạt');
        return Redirect::to('all-category-product');
    }
    public function active_category_product($category_type_id)
    {
        DB::table('type_products')->where('id_type', $category_type_id)->update(['status' => 0]);
        Session::put('message', 'Kích hoạt thành công');
        return Redirect::to('all-category-product');
    }
    // sửa danh mục sản phẩm
    public function edit_category_product($category_type_id)
    {
        $edit_category_product = DB::table('type_products')->where('id_type', $category_type_id)->get();
        $manager_category_product = view('pages.admin.edit_category_product')->with('edit_category_product', $edit_category_product);
        return view('admin_layout')->with('pages.admin.edit_category_product', $manager_category_product);
    }
    //update
    public function update_category_product(Request $request, $category_type_id)
    {
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
        DB::table('type_products')->where('id_type', $category_type_id)->delete();
        Session::put('message', 'Xóa danh mục thành công');
        return Redirect::to('all-category-product');
    }
    // show function danh muc san pham
    public function show_category_home($category_type_id)
    {
        $cate_product = DB::table('type_products')->where('status', '0')->orderby('id_type', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '0')->orderby('id_brand', 'desc')->get();
        $category_by_id = DB::table('products')->join('type_products', 'products.id_type', '=', 'type_products.id_type')->where('products.id_type', $category_type_id)->get();
        $category_name = DB::table('type_products')->where('type_products.id_type', $category_type_id)->limit(1)->get();
        return view('pages.category.show_category')->with('category', $cate_product)->with('brand', $brand_product)->with('category_by_id', $category_by_id)->with('category_name', $category_name);
    }
}
