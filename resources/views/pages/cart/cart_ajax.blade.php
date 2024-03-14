@extends('layout')
@section('content')
<section class="shopping-cart dark">
    <div class="container-md">
        <?php

        use Illuminate\Support\Facades\Session;

        $total = 0;

        if (Session::get('cart') == true) {
        ?>

            <div class="row">
                <a class="col-md-2 continue-shopping" href="{{url('/')}}">
                    <p class="text"><i class="fa-solid fa-arrow-left"></i>&nbsp;Tiếp tục mua sắm</p>
                </a>
                <div class="col-md-5 offset-md-2 block-heading">
                    <h2>Giỏ hàng của bạn</h2>
                    <p>Sản phẩm mà bạn đặt hàng sẽ được lưu trữ tạm thời trong giỏ hàng này</p>
                </div>
            </div>
            <div class="shadow-lg p-3 mb-5 bg-body rounded">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="items">
                            <form action="{{url('/update-cart')}}" method="POST">
                                @csrf
                                @foreach(Session::get('cart') as $key =>$cart)
                                <?php
                                $subtotal = $cart['product_price'] * $cart['product_qty'];
                                $total += $subtotal;
                                ?>
                                <div class="product">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img class="img-fluid mx-auto d-block image" src="{{asset('public/uploads/product/'.$cart['product_image'])}}" alt="Product">
                                        </div>
                                        <div class="col-md-10">
                                            <div class="info">
                                                <div class="row">
                                                    <div class="col-md-5 product-name">
                                                        <div class="product-name">
                                                            <a href="#">
                                                                <p class="underline">{{$cart['product_name']}}</p>
                                                            </a>
                                                            <div class="product-info">
                                                                <div>Loại: <span class="value">{{$cart['category']}}</span></div>
                                                                <div>Thương hiệu: <span class="value">{{$cart['brand']}}</span></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-center col-md-3 quantity">
                                                        <label class="text-dark fs-4">Số lượng:</label>
                                                        <div class="quantity-cart">
                                                            <input class="cart_quantity_input form-control quantity-input" type="number" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}" autocomplete="off" min="1">
                                                        </div>

                                                    </div>
                                                    <div class="col-md-3 price">
                                                        <span>{{number_format($cart['product_price'],0,',','.')}}đ</span>
                                                    </div>
                                                    <div class="col-md-1 price">
                                                        <a href="{{url('/delete-product-cart/'.$cart['session_id'])}}" class="alert-delete"><span class="remove-item"><i class="fa-solid fa-square-minus"></i></span></a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach
                                <button type="submit" id="updateCartSubmit"></button>
                                <div class="col-md-2">
                                    <a class="btn bg-danger delete-all-cart text-light" href="{{url('/delete-all-product-cart')}}"><i class="fa-solid fa-xmark"></i>&nbsp;Huỷ tất cả</a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="summary">
                            <h3>Tổng đơn hàng</h3>
                            <div class="summary-item"><span class="text">Tổng tiền</span><span class="price">{{number_format($total,0,',','.')}}đ</span></div>
                            <?php

                            $customer_id = Session::get('customer_id');
                            if ($customer_id != NULL) {
                            ?>
                                <div class="checkout-btn-cart"><a class="btn btn-style-1 btn-block btn-lg checkout-cart" href="{{url('/checkout')}}"><i class="fa-solid fa-credit-card"></i>&nbsp;Thanh toán</a></div>
                            <?php
                            } else {
                            ?>
                                <div class="checkout-btn-cart"><a class="btn btn-style-1 btn-block btn-lg checkout-cart" href="{{url('/login-checkout')}}"><i class="fa-solid fa-credit-card"></i>&nbsp;Thanh toán</a></div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="row">
                <div class="alert-null">
                    <h2>Giỏ hàng của bạn</h2>
                    <p class="info"> Hiện không có sản phẩm nào trong giỏ hàng của bạn. <a class="buy" href="{{url('/')}}">Mua sắm?</a></p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>
@endsection