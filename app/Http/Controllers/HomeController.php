<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_name', 'asc')->get();
        $all_product = DB::table('tbl_product')
            ->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')
            ->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->where('product_status', '1')->where('product_condition', '1')
            ->orderBy('tbl_product.product_id', 'desc')->limit(12)->get();
        $slider = Slider::orderby('slider_id', 'desc')->where('slider_status', '1')->get();
        return view('pages.home')->with('category', $cate_product)->with('brand', $brand_product)->with('all_product', $all_product)->with('slider', $slider);
    }
    public function all_productss()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();

        $all_product = DB::table('tbl_product')
            ->join('tbl_brand', 'tbl_product.brand_id', '=', 'tbl_brand.brand_id')
            ->join('tbl_category_product', 'tbl_product.category_id', '=', 'tbl_category_product.category_id')
            ->where('product_status', '1')->where('product_condition', '1')->orderBy('product_id')->get();

        return view('pages.all_product_home')->with('category', $cate_product)->with('brand', $brand_product)->with('all_product_home', $all_product);
    }

    public function search_items(Request $request)
    {
        $keywords = $request->keywords_submit;
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();

        $search_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->where('product_status', '1')->where('product_condition', '1')
            ->where('product_name', 'like', '%' . $keywords . '%')
            ->orWhere('category_name', 'like', '%' . $keywords . '%')
            ->orWhere('brand_name', 'like', '%' . $keywords . '%')
            ->get();
        $count_search_product = DB::table('tbl_product')->join('tbl_category_product', 'tbl_category_product.category_id', '=', 'tbl_product.category_id')->join('tbl_brand', 'tbl_brand.brand_id', '=', 'tbl_product.brand_id')
            ->where('product_status', '1')->where('product_condition', '1')
            ->where('product_name', 'like', '%' . $keywords . '%')
            ->orWhere('category_name', 'like', '%' . $keywords . '%')
            ->orWhere('brand_name', 'like', '%' . $keywords . '%')
            ->count();
        return view('pages.productDetail.search')->with('category', $cate_product)->with('brand', $brand_product)->with('search_product', $search_product)->with('keywords', $keywords)->with('count_search_product', $count_search_product);
    }
}
