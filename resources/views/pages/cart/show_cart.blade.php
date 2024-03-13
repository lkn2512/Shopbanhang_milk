@extends('layout')
@section('content')
<p class="fs-1 text-center fw-medium title-cart"><img src="{{URL::to('public/frontend/images/cart/cart3.png')}}" class="cart-icon"></img> Giỏ Hàng Của Bạn</p><br>
<div class="col-lg-12">
    <?php

    use Gloudemans\Shoppingcart\Facades\Cart;

    $content = Cart::content();
    ?>
    @foreach($content as $value_content2)
    <div class="cart-item d-md-flex justify-content-between"><a href="{{URL::to('/delete-cart/'.$value_content2->rowId)}}"><span class="remove-item"><i class="fa fa-times"></i></span></a>
        <div class="px-3 my-3">
            <a class="cart-item-product">
                <div class="cart-item-product-thumb"><img src="{{URL::to('public/uploads/product/'.$value_content2->options->image)}}" alt="Product"></div>
                <div class="cart-item-product-info">
                    <h4 class="cart-item-product-title">{{$value_content2->name}}</h4>
                </div>
            </a>
        </div>
        <div class="px-3 my-3 text-center">
            <div class="cart-item-label">Số lượng</div>
            <div class="row quantity-cart">
                <div class="col" style="padding-top: 5px;">
                    <input class="cart_quantity_input" type="text" name="quantity" value="{{$value_content2->qty}}" autocomplete="off" size="2">
                </div>
                <div class="col">
                    <div class="row">
                        <a class="icon_up" href="" name="increase"><i class="fa-solid fa-caret-up"></i></a>
                    </div>
                    <div class="row">
                        <a class="icon_down" href="" name="reduce"><i class="fa-solid fa-caret-down"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="px-3 my-3 text-center">
            <div class="cart-item-label">Giá</div><span class="text-xl font-weight-medium">{{number_format($value_content2->price).'đ'}}</span>
        </div>
        <div class="px-3 my-3 text-center">
            <div class="cart-item-label">Tổng tiền</div><span class="text-xl font-weight-medium">{{number_format($value_content2->price*$value_content2->qty).'đ'}}</span>
        </div>
    </div>
    @endforeach
    <!-- Cart Item-->

    <!-- Coupon + Subtotal-->
    <div class="cart-item-product-total">
        <span>Thành tiền:</span>
        <span>{{number_format(Cart::subtotal()).'đ'}}</span>
    </div>
    <!-- Buttons-->
    <hr class="my-2">
    <div class="row pt-3 pb-5 mb-2">
        <div class="col-sm-6 mb-3"><a class="btn btn-style-1 btn-success btn-block" href="{{URL::to('/')}}"><i class="fa-solid fa-basket-shopping"></i>&nbsp;Tiếp tục mua sắm</a></div>
        <?php

        use Illuminate\Support\Facades\Session;

        $customer_id = Session::get('customer_id');
        $cart_qty = Cart::subtotal();
        // echo $cart_qty;
        if ($customer_id != NULL) {
        ?>
            <div class="col-sm-6 mb-3"><a class="btn btn-style-1 btn-primary btn-block" href="{{URL::to('/checkout')}}"><i class="fa-solid fa-credit-card"></i>&nbsp;Thanh toán</a></div>
        <?php
        } else {
        ?>
            <div class="col-sm-6 mb-3"><a class="btn btn-style-1 btn-primary btn-block" href="{{URL::to('/login-checkout')}}"><i class="fa-solid fa-credit-card"></i>&nbsp;Thanh toán</a></div>
        <?php
        }
        ?>
    </div>
    @endsection