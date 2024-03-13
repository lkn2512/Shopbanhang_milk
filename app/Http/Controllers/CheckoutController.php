<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;
use App\Models\City;
use App\Models\Province;
use App\Models\wards;
use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;

class CheckoutController extends Controller
{
    public function login_checkout()
    {
        // $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        // $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();

        return view('pages.checkout.login-checkout');
    }
    public function register_checkout()
    {
        // $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        // $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();

        return view('pages.checkout.register-checkout');
    }
    public function add_customer(Request $request)
    {
        $data = array();
        $data['customer_name'] = $request->customer_name;
        $data['customer_email'] = $request->customer_email;
        $data['customer_phone'] = $request->customer_phone;
        $data['customer_password'] = md5($request->customer_pass);
        $customer_id = DB::table('tbl_customers')->insertGetId($data);

        Session::put('customer_id', $customer_id);
        Session::put('customer_name', $request->customer_name);
        return Redirect::to('/login-checkout');
    }
    public function checkout()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        $city = City::orderby('name_city', 'desc')->get();
        return view('pages.checkout.show_checkout')->with('category', $cate_product)->with('brand', $brand_product)->with('city', $city);
    }
    public function select_delivery_home(Request $request)
    {
        $data = $request->all();
        if ($data['action']) {
            $output = '';
            if ($data['action'] == 'city') {
                $select_province = Province::where('matp', $data['ma_id'])->orderby('name_quanhuyen', 'desc')->get();
                $output .= '<option>--Chọn Quận Huyện--</option>';
                foreach ($select_province as $key => $province) {
                    $output .= '<option value="' . $province->maqh . '">' . $province->name_quanhuyen . '</option>';
                }
            } else {
                $select_wards = wards::where('maqh', $data['ma_id'])->orderby('name_xaphuong', 'desc')->get();
                $output .= '<option>--Chọn Xã Phường--</option>';
                foreach ($select_wards as $key => $wards) {
                    $output .= '<option value="' . $wards->xaid . '">' . $wards->name_xaphuong . '</option>';
                }
            }
        }
        echo $output;
    }
    public function calculate_fee(Request $request)
    {
        $data = $request->all();
        if ($data['matp']) {
            $feeship = Feeship::where('fee_matp', $data['matp'])->where('fee_maqh', $data['maqh'])->where('fee_xaid', $data['xaid'])->get();
            if ($feeship) {
                $count_feeship = $feeship->count();
                if ($count_feeship > 0) {
                    foreach ($feeship as $key => $fee) {
                        // Session::forget('fee');
                        Session::put('fee', $fee->fee_feeship);
                        Session::save();
                    }
                } else {
                    Session::put('fee', 0);
                    Session::save();
                }
            }
        }
    }
    public function del_fee()
    {
        Session::forget('fee');
        return Redirect()->back();
    }
    public function check_coupon(Request $request)
    {
        $data = $request->all();
        $coupon = Coupon::where('coupon_code', $data['coupon'])->first();
        if ($coupon) {
            $count_coupon = $coupon->count();
            if ($count_coupon > 0) {
                $coupon_session = Session::get('coupon');
                if ($coupon_session) {
                    $is_avaiable = 0;
                    if ($is_avaiable == 0) {
                        $cou[] = array(
                            'coupon_name' => $coupon->coupon_name,
                            'coupon_code' => $coupon->coupon_code,
                            'coupon_condition' => $coupon->coupon_condition,
                            'coupon_number' => $coupon->coupon_number,
                        );
                        Session::put('coupon', $cou);
                    }
                } else {
                    $cou[] = array(
                        'coupon_name' => $coupon->coupon_name,
                        'coupon_code' => $coupon->coupon_code,
                        'coupon_condition' => $coupon->coupon_condition,
                        'coupon_number' => $coupon->coupon_number,
                    );
                    Session::put('coupon', $cou);
                }
                Session::save();
                return Redirect()->back()->with("message_success", "Đã áp dụng mã giảm giá");
            }
        } else {
            return Redirect()->back()->with("message_error", "Mã giảm giá không chính xác hoặc đã hết hạn!");
        }
    }
    public function remove_coupon()
    {
        $coupon = Session::get('coupon');
        if ($coupon == true) {
            Session::forget('coupon');
            return Redirect()->back();
        } else {
            return Redirect()->back();
        }
    }
    public function save_checkout_customer(Request $request)
    {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['shipping_address'] = $request->shipping_address;
        $data['shipping_notes'] = $request->shipping_message;
        $data['shipping_payment'] = $request->payment_option;
        $shipping_id = DB::table('tbl_shipping')->insertGetId($data);

        $order_data = array();
        $order_data['customer_id'] = Session::get('customer_id');
        $order_data['shipping_id'] = $shipping_id;
        $order_data['order_total'] = Cart::subtotal();
        $order_data['order_status'] = 'Đang chờ';
        $order_id = DB::table('tbl_order')->insertGetId($order_data);

        //insert order_detail
        $content = Cart::content();
        foreach ($content as $value_content) {
            $order_detail = array();
            $order_detail['order_id'] = $order_id;
            $order_detail['product_id'] = $value_content->id;
            $order_detail['product_name'] = $value_content->name;
            $order_detail['product_price'] = $value_content->price;
            $order_detail['product_sales_quantity'] = $value_content->qty;
            $order_detail['product_image'] = $value_content->options->image;
            DB::table('tbl_order_details')->insert($order_detail);
        }
        if ($data['shipping_payment'] == 1) {
            Cart::destroy();
            $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_name', 'asc')->get();
            $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_name', 'asc')->get();
            return view('pages.checkout.handcash')->with('category', $cate_product)->with('brand', $brand_product);
        } elseif ($data['shipping_payment'] == 2) {
            echo 'Tạm thời hình thức thanh toán bạn chọn chưa có!';
        } else {
            echo 'Tạm thời hình thức thanh toán bạn chọn chưa có!';
        }
    }
    public function payment()
    {
        $cate_product = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id', 'desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_id', 'desc')->get();
        return view('pages.checkout.payment')->with('category', $cate_product)->with('brand', $brand_product);
    }
    public function logout_checkout()
    {
        Session::flush();
        return Redirect::to('login-checkout');
    }
    public function login_customer(Request $request)
    {
        $email = $request->email_account;
        $password = md5($request->pass_account);
        $result = DB::table('tbl_customers')->where('customer_email', $email)->where('customer_password', $password)->first();

        if ($result) {
            Session::put('customer_id', $result->customer_id);
            Session::put('customer_name', $result->customer_name);
            return Redirect::to('/');
        } else {
            Session::put('message', "Tài khoản hoặc mật khẩu không chính xác!");
            // return Redirect::to('/login-checkout');
            return Redirect::to('login-checkout');
        }
    }
    public function confirm_order(Request $request)
    {
        $data = $request->all();
        $shipping = new Shipping();
        $shipping->shipping_name = $data['shipping_name'];
        $shipping->shipping_email = $data['shipping_email'];
        $shipping->shipping_phone = $data['shipping_phone'];
        $shipping->shipping_address = $data['shipping_address'];
        $shipping->shipping_notes = $data['shipping_notes'];
        $shipping->shipping_method = $data['shipping_method'];
        $shipping->save();
        $shipping_get_id = $shipping->shipping_id;

        $order_code_random = substr(md5(microtime()), rand(0, 26), 5);
        $order = new Order();
        $order->customer_id = Session::get('customer_id');
        $order->shipping_id = $shipping_get_id;
        $order->order_status = 1;
        $order->order_code = $order_code_random;
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $order->created_at = now();
        $order->save();

        if (Session::get('cart')) {
            foreach (Session::get('cart') as $cart) {
                $order_details = new OrderDetails();
                $order_details->order_code = $order->order_code;
                $order_details->product_id = $cart['product_id'];
                $order_details->product_name = $cart['product_name'];
                $order_details->product_image = $cart['product_image'];
                $order_details->product_sales_quantity = $cart['product_qty'];
                $order_details->product_price = $cart['product_price'];
                $order_details->product_feeship = $data['order_fee'];
                $order_details->product_coupon = $data['order_coupon'];
                $order_details->save();
            }
        }
        Session::forget('coupon');
        Session::forget('fee');
        Session::forget('cart');
    }
}
