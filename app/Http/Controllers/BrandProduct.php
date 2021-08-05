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

class BrandProduct extends Controller
{
    // them thuong hieu
    public function add_brand_product()
    {
        return view('pages.admin.add_brand_product');
    }
    // liet ke danh muc san pham
    public function all_brand_product()
    {
        $all_brand_product = DB::table('brand')->get();
        $manager_brand_product = view('pages.admin.all_brand_product')->with('all_brand_product', $all_brand_product);
        return view('admin_layout')->with('pages.admin.all_brand_product', $manager_brand_product);
    }
    // thêm  thương hiệu
    public function save_brand_product(Request $request)
    {
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_slug'] = $request->brand_product_slug;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;
        DB::table('brand')->insert($data);
        Session::put('message', 'Thêm Thương Hiệu Thành Công');
        return Redirect::to('add-brand-product');
    }
    // active  thương hiệu
    public function unactive_brand_product($brand_product_id)
    {
        DB::table('brand')->where('id_brand', $brand_product_id)->update(['brand_status' => 1]);
        Session::put('message', 'Không kích hoạt');
        return Redirect::to('all-brand-product');
    }
    public function active_brand_product($brand_product_id)
    {
        DB::table('brand')->where('id_brand', $brand_product_id)->update(['brand_status' => 0]);
        Session::put('message', 'Kích hoạt thành công');
        return Redirect::to('all-brand-product');
    }
    // sửa  thương hiệu
    public function edit_brand_product($brand_product_id)
    {
        $edit_brand_product = DB::table('brand')->where('id_brand', $brand_product_id)->get();
        $manager_brand_product = view('pages.admin.edit_brand_product')->with('edit_brand_product', $edit_brand_product);
        return view('admin_layout')->with('pages.admin.all_brand_product', $manager_brand_product);
    }
    //update
    public function update_brand_product(Request $request, $brand_product_id)
    {
        $data = array();
        $data['brand_name'] = $request->brand_product_name;
        $data['brand_slug'] = $request->brand_product_slug;
        $data['brand_desc'] = $request->brand_product_desc;
        $data['brand_status'] = $request->brand_product_status;
        DB::table('brand')->where('id_brand', $brand_product_id)->update($data);
        Session::put('message', 'Cập Nhập Thành Công');
        return Redirect::to('all-brand-product');
    }
    // xóa  thương hiệu
    public function delete_brand_product($brand_product_id)
    {
        DB::table('brand')->where('id_brand', $brand_product_id)->delete();
        Session::put('message', 'Xóa  thành công');
        return Redirect::to('all-brand-product');
    }
    // show function thuong hiệu san pham
    public function show_brand_home($brand_id)
    {
        $cate_product = DB::table('type_products')->where('status', '0')->orderby('id_type', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '0')->orderby('id_brand', 'desc')->get();
        $show_brand_id = DB::table('products')->join('brand', 'products.id_brand', '=', 'brand.id_brand')->where('products.id_brand', $brand_id)->get();
        $brand_name = DB::table('brand')->where('brand.id_brand', $brand_id)->limit(1)->get();
        return view('pages.brand.show_brand')->with('category', $cate_product)->with('brand', $brand_product)->with('show_brand_id', $show_brand_id)->with('brand_name', $brand_name);
    }
}
