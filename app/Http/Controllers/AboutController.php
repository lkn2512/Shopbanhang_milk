<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AboutController extends Controller
{
    public function contact_us()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_name', 'asc')->get();
        return view('pages.about_us.contact')->with('category', $cate_product)->with('brand', $brand_product);
    }
}
