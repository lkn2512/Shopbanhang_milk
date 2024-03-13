<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Coupon;
use App\Models\Feeship;
use App\Models\Shipping;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Customer;
use App\Models\Product;

class OrderController extends Controller
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

    //Order-admin
    public function manage_order()
    {
        $this->AuthLogin();
        $order = Order::orderby('created_at', 'desc')->get();
        return view('admin.order.manage_order')->with(compact('order'));
    }
    public function view_order($order_code)
    {
        $this->AuthLogin();
        $order = Order::where('order_code', $order_code)->get();
        foreach ($order as $key => $ord) {
            $customer_id = $ord->customer_id;
            $shipping_id = $ord->shipping_id;
            $order_status = $ord->order_status;
        }
        $customer = Customer::where('customer_id', $customer_id)->first();
        $shipping = Shipping::where('shipping_id', $shipping_id)->first();
        $order_detail = OrderDetails::with('product')->where('order_code', $order_code)->get();
        foreach ($order_detail as $key => $ord) {
            $product_coupon = $ord->product_coupon;
            $product_feeship = $ord->product_feeship;
        }

        if ($product_coupon != '0') {
            $coupon = Coupon::where('coupon_code', $product_coupon)->first();
            $coupon_condition = $coupon->coupon_condition;
            $coupon_number = $coupon->coupon_number;
        } else {
            $coupon_condition = 2;
            $coupon_number = 0;
        }
        $qty_count = OrderDetails::with('product')->where('order_code', $order_code)->sum('product_sales_quantity');

        return view('admin.order.view_order')->with(compact('order', 'customer', 'shipping', 'order_detail', 'qty_count', 'coupon_condition', 'coupon_number', 'product_feeship', 'order_status'));
    }
    public function update_qty(Request $request)
    {
        $data = $request->all();
        $order_detail = OrderDetails::where('product_id', $data['order_product_id'])->where('order_code', $data['order_code'])->first();
        $order_detail->product_sales_quantity = $data['order_qty'];
        $order_detail->save();
    }
    public function update_order_quantity(Request $request)
    {
        //update order
        $data = $request->all();
        $order = Order::find($data['order_id']);
        $order->order_status = $data['order_status'];
        $order->save();

        if ($order->order_status == 2) {
            foreach ($data['order_product_id'] as $key => $product_id) {
                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                foreach ($data['quantity'] as $key2 => $qty) {
                    if ($key == $key2) {
                        $pro_remain = $product_quantity - $qty;
                        $product->product_quantity = $pro_remain;
                        $product->product_sold = $product_sold + $qty;
                        $product->save();
                    }
                }
            }
        } elseif ($order->order_status != 2 && $order->order_status != 3) {
            foreach ($data['order_product_id'] as $key => $product_id) {
                $product = Product::find($product_id);
                $product_quantity = $product->product_quantity;
                $product_sold = $product->product_sold;
                foreach ($data['quantity'] as $key2 => $qty) {
                    if ($key == $key2) {
                        $pro_remain = $product_quantity + $qty;
                        $product->product_quantity = $pro_remain;
                        $product->product_sold = $product_sold - $qty;
                        $product->save();
                    }
                }
            }
        }
    }
}
