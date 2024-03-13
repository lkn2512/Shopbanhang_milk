<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function AuthLogin()
    {
        $admin_id = Session::get('admin_id');
        if ($admin_id) {
            return Redirect::to('admin.dashboard');
        } else {
            return Redirect::to('admin-login')->send();
        }
    }
    public function add_product()
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_name', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_name', 'asc')->get();
        return view('admin.product.add_product')->with('cate_product', $cate_product)->with('brand_product', $brand_product);
    }

    public function all_product()
    {
        $this->AuthLogin();
        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->orderBy('tbl_product.product_id', 'desc')->get();
        $manager_product = view('admin.product.all_product')->with('all_product', $all_product);
        return view('admin_layout')->with('admin.product.all_product', $manager_product);
    }
    public function save_product(Request $request)
    {
        $this->AuthLogin();
        $data = array();
        $data['product_code'] = $request->product_code;
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_content'] = $request->product_content;
        $data['product_desc'] = $request->product_desc;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_condition'] = $request->product_condition;
        $data['product_status'] = $request->product_status;
        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image']  = $new_image;
            DB::table('tbl_product')->insert($data);
            Session::put('message_success', 'Thêm sản phẩm thành công!');
            return Redirect::to('all-product');
        }
        $data['product_image']  = '';
        DB::table('tbl_product')->insert($data);
        return Redirect::to('add-product');
    }
    public function unactive_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 1]);
        return Redirect::to('all-product');
    }
    public function active_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->update(['product_status' => 0]);
        return Redirect::to('all-product');
    }
    public function edit_product($product_id)
    {
        $this->AuthLogin();
        $cate_product = DB::table('tbl_category_product')->orderBy('category_name', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->orderBy('brand_name', 'asc')->get();

        $edit_product = DB::table('tbl_product')->where('product_id', $product_id)->get();
        $manager_product = view('admin.product.edit_product')->with('edit_product', $edit_product)->with('cate_product', $cate_product)->with('brand_product', $brand_product);
        return view('admin_layout')->with('admin.product.edit_product', $manager_product);
    }
    public function update_product(Request $request, $product_id)
    {
        $this->AuthLogin();
        $data = array();
        $data['product_code'] = $request->product_code;
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_quantity'] = $request->product_quantity;
        $data['product_content'] = $request->product_content;
        $data['product_desc'] = $request->product_desc;
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_status'] = $request->product_status;
        $data['product_condition'] = $request->product_condition;

        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product', $new_image);
            $data['product_image']  = $new_image;
            DB::table('tbl_product')->where('product_id', $product_id)->update($data);
            Session::put('message_success', 'Đã cập nhật lại sản phẩm!');
            return Redirect::to('all-product');
        }
        DB::table('tbl_product')->where('product_id', $product_id)->update($data);
        Session::put('message_success', 'Đã cập nhật lại sản phẩm!');
        return Redirect::to('all-product');
    }
    public function delete_product($product_id)
    {
        $this->AuthLogin();
        DB::table('tbl_product')->where('product_id', $product_id)->delete();
        return Redirect::to('all-product');
    }

    ///frontend
    public function details_product(Request $request, $product_id)
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_name', 'asc')->get();
        $detail_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_product.product_id', $product_id)->get();

        foreach ($detail_product as $val) {
            $category_id = $val->category_id;
            $brand_id = $val->brand_id;
        }
        $related_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->where('tbl_category_product.category_id', $category_id)
            ->where('product_condition', '1')
            ->where('product_status', '1')
            ->whereNotIn('tbl_product.product_id', [$product_id])->get();


        return view('pages.productDetail.show_detail')
            ->with('category', $cate_product)->with('brand', $brand_product)->with('detail_product', $detail_product)->with('related', $related_product);
    }
}
