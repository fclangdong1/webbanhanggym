<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Auth;
use App\CatePost;
use App\Gallery;
use App\Slider;
use App\Product;
use Carbon\Carbon;
use App\Models\Comment;
use App\Http\Requests;
use App\Rating;
use Illuminate\Pagination\LengthAwarePaginator;

session_start();

use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function send_comment(Request $request)
    {
        $product_id = $request->product_id;
        $comment_name = $request->comment_name;
        $comment_content = $request->comment_content;
        $comment = new Comment();
        $comment->comment = $comment_content;
        $comment->comment_name = $comment_name;
        $comment->id_products = $product_id;
        // $comment->comment_status = 1;
        // $comment->comment_parent_comment = 0;
        $comment->save();
    }
    // load bình luận
    public function load_comment(Request $request)
    {
        $product_id = $request->product_id;
        $comment = Comment::where('id_products', $product_id)->get();
        // $comment = DB::table('comment')->where('id_products', $product_id)->orderby('id_comment', 'desc')->get();
        // return view('pages.sanpham.show_details')->with('comment', $comment);
        $output = '';
        foreach ($comment as $key => $comm) {
            $output .= '
            <div class="row style_comment flex">
                <div class="col-md-2" style="margin: 0.5rem 0;">

                    <img src="' . url('/frontend/img/usercomment.png') . '" class="img img-responsive img-thumbnail" alt="">
                </div>
                <div class="col-md-8 comment-cart">
                    <p class="name-user"> <i class="fas fa-user"></i>: ' . $comm->comment_name . ' </p>
                    <p class="date"><i class="far fa-clock"></i>: ' . $comm->comment_date . '</p>
                    <p class="comment"> <b>Bình luận :</b> 
                    ' . $comm->comment . '
                    </p>
                    <p class="response"> <b>Trả Lời :</b> .....</p>
                </div>
            </div>
            ';
        }
        echo $output;
    }
    // add sản phẩm
    public function add_product()
    {
        $cate_product = DB::table('type_products')->orderby('id_type', 'desc')->get();
        $brand_product = DB::table('brand')->orderby('id_brand', 'desc')->get();
        return view('pages.admin.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }
    // liet ke sản phẩm
    public function all_product()
    {
        $this->AuthLogin();
        $all_product = DB::table('products')
            ->join('type_products', 'type_products.id_type', '=', 'products.id_type')
            ->join('brand', 'brand.id_brand', '=', 'products.id_brand')
            ->orderby('products.id_products', 'desc')->simplePaginate(5);
        $manager_product  = view('pages.admin.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('pages.admin.all_product', $manager_product);
    }
    // lưu  sản phẩm
    public function save_product(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_slug'] = $request->product_slug;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_status'] = $request->product_status;
        $data['id_brand'] = $request->product_brand;
        $data['id_type'] = $request->product_cate;
        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/product/', $new_image);
            // $data['product_image'] = $get_image;
            $data['product_image'] = $new_image;
            DB::table('products')->insert($data);
            Session::put('message', 'Thêm Sản Phẩm Thành Công');
            return Redirect::to('add-product');
        }
        // $data['product_image'] = '';
        DB::table('products')->insert($data);
        Session::put('message', 'Thêm Sản Phẩm Thành Công');
        return Redirect::to('add-product');
    }
    // active  sản phẩm
    public function unactive_product($product_id)
    {
        DB::table('products')->where('id_products', $product_id)->update(['product_status' => 1]);
        Session::put('message', 'Không kích hoạt');
        return Redirect::to('all-product');
    }
    public function active_product($product_id)
    {
        DB::table('products')->where('id_products', $product_id)->update(['product_status' => 0]);
        Session::put('message', 'Kích hoạt thành công');
        return Redirect::to('all-product');
    }
    // sửa  sản phẩm
    public function edit_product($product_id)
    {
        $cate_product = DB::table('type_products')->orderby('id_type', 'desc')->get();
        $brand_product = DB::table('brand')->orderby('id_brand', 'desc')->get();
        $edit_product = DB::table('products')->where('id_products', $product_id)->get();
        $manager_product = view('pages.admin.edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product)->with('brand_product', $brand_product);
        return view('admin_layout')->with('pages.admin.all_product', $manager_product);
    }
    //update
    public function update_product(Request $request, $product_id)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_slug'] = $request->product_slug;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_content'] = $request->product_content;
        $data['product_status'] = $request->product_status;
        $data['id_brand'] = $request->product_brand;
        $data['id_type'] = $request->product_cate;
        $get_image = $request->file('product_image');
        // dd($get_image->getClientOriginalName());
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image =  $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('uploads/product/', $new_image);
            // $data['product_image'] = $get_image;
            $data['product_image'] = $new_image;
            DB::table('products')->where('id_products', $product_id)->update($data);
            Session::put('message', 'Cập Nhập Sản Phẩm Thành Công');
            return Redirect::to('all-product');
        }
        // $data['product_image'] = ;
        DB::table('products')->where('id_products', $product_id)->update($data);
        Session::put('message', 'Cập Nhập Sản Phẩm Thành Công');
        return Redirect::to('all-product');
    }
    // xóa  sản phẩm
    public function delete_product($product_id)
    {
        DB::table('products')->where('id_products', $product_id)->delete();
        Session::put('message', 'Xóa  thành công');
        return Redirect::to('all-product');
    }
    // END ADmin Page
    // chi tiết sản phẩm
    public function details_product($product_id)
    {
        $cate_product = DB::table('type_products')->where('status', '0')->orderby('id_type', 'desc')->get();
        $brand_product = DB::table('brand')->where('brand_status', '0')->orderby('id_brand', 'desc')->get();
        // $comment_product = DB::table('comment')->where('id_products', $product_id)->orderby('id_comment', 'desc')->get();

        $details_product = DB::table('products')
            ->join('type_products', 'type_products.id_type', '=', 'products.id_type')
            ->join('brand', 'brand.id_brand', '=', 'products.id_brand')->where('products.id_products', $product_id)->get();
        return view('pages.sanpham.show_details')->with('category', $cate_product)->with('brand', $brand_product)->with('product_details', $details_product);
    }
}
