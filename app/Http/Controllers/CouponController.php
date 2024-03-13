<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;

class CouponController extends Controller
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
    public function insert_coupon(Request $request)
    {
        $this->AuthLogin();
        return view('admin.coupon.insert_coupon');
    }
    public function list_coupon(Request $request)
    {
        $this->AuthLogin();
        $coupon = Coupon::orderby('coupon_id', 'desc')->get();
        return view('admin.coupon.list_coupon')->with(compact('coupon'));
    }
    public function insert_coupon_code(Request $request)
    {
        $this->AuthLogin();
        $data = $request->all();
        $coupon = new Coupon();
        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_times'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->save();
        Session::put('message_success', 'Thêm thành công!');
        return Redirect::to('/insert-coupon');
    }
    public function edit_coupon($coupon_id)
    {
        $this->AuthLogin();
        $edit_coupon_code = Coupon::where('coupon_id', $coupon_id)->get();
        $manager_coupon = view('admin.coupon.edit_coupon')->with(compact('edit_coupon_code'));
        return view('admin_layout')->with('admin.coupon.edit_coupon', $manager_coupon);
    }
    public function update_coupon(Request $request, $coupon_id)
    {
        $this->AuthLogin();
        $data = $request->all();
        $coupon = Coupon::find($coupon_id);
        $coupon->coupon_name = $data['coupon_name'];
        $coupon->coupon_code = $data['coupon_code'];
        $coupon->coupon_time = $data['coupon_times'];
        $coupon->coupon_condition = $data['coupon_condition'];
        $coupon->coupon_number = $data['coupon_number'];
        $coupon->save();
        Session::put('message_success', 'Đã cập nhật lại mã giảm giá!');
        return Redirect::to('/list-coupon');
    }

    //frontend
    public function delete_coupon($coupon_id)
    {
        $coupon = Coupon::find($coupon_id);
        $coupon->delete();
        Session::put('message_success', 'Xoá thành công!');
        return Redirect::to('/list-coupon');
    }
    
}
