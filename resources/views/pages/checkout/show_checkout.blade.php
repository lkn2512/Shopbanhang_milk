@extends('layout')
@section('content')
<?php

use Illuminate\Support\Facades\Session;

$total = 0;
if (Session::get('cart')) {
    foreach (Session::get('cart') as $key => $cart) {
        $subtotal = $cart['product_price'] * $cart['product_qty'];
        $total += $subtotal;
    }
}
if (Session::get('fee')) {
    $total_after_fee = $total + Session::get('fee');
}
?>

@if (Session::get('cart'))
<div class="row">
    <div class="heading-checkout text-center">
        <h2><i class="fa-solid fa-truck"></i> Thông tin giao hàng</h2>
        <p>Hoàn tất các thông tin cần thiết để chúng tôi có thể nhận được đơn hàng của bạn</p>
    </div>

    <div class="col-lg-8 content-checkout">
        <!-- fee_shipping -->
        <div class="row">
            <form>
                @csrf
                <div class="col-md-10 mb-3" style="margin-left: -7px;">
                    <label for="address" style="padding-bottom: 5px;">Địa chỉ thanh toán</label>
                    <div class="row">
                        <div class="col-md-4 form-group">
                            <select class="form-select choose city" name="city" id="city">
                                <option value="" selected>Tỉnh thành</option>
                                @foreach($city as $key=>$ci)
                                <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <select class="form-select province choose" name="province" id="province">
                                <option value="" selected>Quận huyện</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <select class="form-select wards" name="wards" id="wards">
                                <option value="" selected>Xã phường</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button type="button" class="calculate_delivery btn-submit-feeship" name="calculate_order">Xác nhận</button>
                </div>
            </form>
        </div>
        <!-- END - fee_shipping -->

        <!-- coupon -->
        <div class="row">
            <form action="{{url('/check-coupon')}}" method="post">
                @csrf
                <div class="col-md-5 card-left mb-3">
                    <div data-mdb-input-init class="form-outline">
                        <label class="form-label" for="form6Example1">Mã giảm giá (Nếu có)</label>
                        <input type="text" id="form6Example1" class="form-control" name="coupon" placeholder="Mã giảm giá" /><br>
                        <button data-mdb-ripple-init type="submit" class="btn check_coupon" name="check_coupon">Áp dụng</button>

                        <?php
                        if (session()->has('message_success')) {
                            echo '<div class="alert alert-success">';
                            echo '<i class="fa-solid fa-check"></i>&nbsp;', session()->get('message_success');
                            echo '</div>';
                        } elseif (session()->has('message_error')) {
                            echo '<div class="alert alert-danger">';
                            echo '<i class="fa-solid fa-triangle-exclamation"></i>&nbsp;', session()->get('message_error');
                            echo '</div>';
                        }
                        ?>
                    </div>
                </div>
                <?php
                if (Session::get('coupon')) {
                    foreach (Session::get('coupon') as $key => $cou) {
                        if ($cou['coupon_condition'] == 1) {
                ?>
                            <div class="col-md-6 card-right"><a href="{{url('/remove-coupon')}}" class="alert-delete"><span class="remove-item-coupon"><i class="fa fa-times"></i></span></a>
                                <article class="card-coupon">
                                    <section class="coupon-left">
                                        <time>
                                            <span style="color: white;">Sale</span><span>Giới hạn</span>
                                        </time>
                                    </section>
                                    <section class="card-cont">
                                        <small><i class="fa-solid fa-ticket"></i>&nbsp;Phiếu giảm giá</small>
                                        <h3>{{$cou['coupon_name']}}</h3>
                                        <div class="even-date">
                                            <i class="fa-solid fa-code-compare"></i>
                                            <span>&nbsp;{{$cou['coupon_code']}}</span>
                                        </div>
                                        <div class="even-info">
                                            <i class="fa-solid fa-circle-dollar-to-slot"></i>
                                            <p>&nbsp;Giảm: {{$cou['coupon_number']}}%</p>
                                            <span>Áp dụng cho toàn sản phẩm trong giỏ hàng</span>
                                        </div>
                                    </section>
                                </article>
                            </div>
                        <?php
                        } elseif ($cou['coupon_condition'] == 2) {
                        ?>
                            <div class="col-md-6 card-right"><a href="{{url('/remove-coupon')}}" class="alert-delete"><span class="remove-item-coupon"><i class="fa fa-times"></i></span></a>
                                <article class="card-coupon">
                                    <section class="coupon-left">
                                        <time>
                                            <span style="color: white;">Sale</span><span>Giới hạn</span>
                                        </time>
                                    </section>
                                    <section class="card-cont">
                                        <small><i class="fa-solid fa-ticket"></i>&nbsp;Phiếu giảm giá</small>
                                        <h3>{{$cou['coupon_name']}}</h3>
                                        <div class="even-date">
                                            <i class="fa-solid fa-code-compare"></i>
                                            <span>&nbsp;{{$cou['coupon_code']}}</span>
                                        </div>
                                        <div class="even-info">
                                            <i class="fa-solid fa-circle-dollar-to-slot"></i>
                                            <p>&nbsp;Giảm: {{number_format($cou['coupon_number'],0,',','.')}}đ</p>
                                            <span>Áp dụng cho toàn sản phẩm trong giỏ hàng</span>
                                        </div>
                                    </section>
                                </article>
                            </div>
                    <?php
                        }
                    }
                } else {
                    ?>
                    <div class="col-md-6 card card-right-null">
                        <div data-mdb-input-init class="form-outline">
                            <p class="notes-coupon-null">Phiếu giảm giá của bạn sẽ xuất hiện ở đây khi bạn sử dụng mã giảm giá</p>
                        </div>
                    </div>
                <?php
                }
                ?>
            </form>
        </div>
        <!-- END - coupon -->
        <form>
            @csrf
            @if(Session::get('fee'))
            <input name="order_fee" type="hidden" class="order_fee" value="{{Session::get('fee')}}" />
            @else
            <input name="order_fee" type="hidden" class="order_fee" value="0" />
            @endif

            @if(Session::get('coupon'))
            @foreach(Session::get('coupon') as $key =>$cou)
            <input name="order_coupon" type="hidden" class="order_coupon" value="{{$cou['coupon_code']}}" />
            @endforeach
            @else
            <input name="order_coupon" type="hidden" class="order_coupon" value="0" />
            @endif

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="username">Họ và tên</label>
                    <div class="input-group">
                        <input name="shipping_name" type="text" class="form-control shipping_name" placeholder="Họ và tên" required />
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="address">Số điện thoại</label>
                    <input name="shipping_phone" type="number" min="1" class="form-control shipping_phone" placeholder="Số điện thoại" required />
                </div>
            </div>
            <div class="mb-3">
                <label for="address">Địa chỉ</label>
                <input name="shipping_address" type="text" class="form-control shipping_address" placeholder="Địa chỉ giao hàng" required />
            </div>
            <div class=" mb-3">
                <label for="address">Ghi chú</label>
                <textarea style="resize:none" rows="4" type="text" name="shipping_notes" class="form-control shipping_notes" id="exampleInputPassword1"></textarea>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="email">Email <span class="text-muted">(Không bắt buộc)</span></label>
                    <input name="shipping_email" type="email" class="form-control shipping_email" placeholder="you@example.com">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Hình thức thanh toán</label>
                    <select class="form-select payment_select" name="payment_select" style="width: 360px;">
                        <option value="1" selected>Tiền mặt</option>
                        <option value="2">Chuyển khoản</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cc-name">Tên trên thẻ</label>
                    <input type="text" class="form-control" placeholder="">
                    <small class="text-muted">Tên đầy đủ như hiển thị trên thẻ</small>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cc-number">Số thẻ tín dụng</label>
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="cc-expiration">Hết hạn</label>
                    <input type="text" class="form-control" placeholder="">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="cc-cvv">Mã CVV</label>
                    <input type="text" class="form-control" placeholder="">
                </div>
            </div>
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input">
                <label class="custom-control-label" for="same-address">Địa chỉ giao hàng giống với địa chỉ thanh toán của tôi</label>
            </div>
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input">
                <label class="custom-control-label">Lưu thông tin này cho lần sau</label>
            </div>
            <hr class="mb-3">
            <button type="button" class="btn bg-primary text-white btn-lg btn-block send_order" name="send_order">Xác nhận</button>
            <br>
        </form>
    </div>
    <div class="col-lg-4">
        <div class="card position-sticky top-0 ">
            <div class="p-3 bg-light">
                <h6 class="mb-3">Chi tiết hoá đơn</h6>
                @foreach(Session::get('cart') as $key =>$cart)
                <div class="d-flex justify-content-between mb-1">
                    <span style="padding-right: 80px;"><i class="fa-solid fa-caret-right"></i> {{$cart['product_name']}} (x{{$cart['product_qty']}})</span><span>{{number_format($cart['product_qty'] * $cart['product_price'],0,',','.')}}đ</span>
                </div>
                @endforeach
                <hr style="border: 1px solid black;">
                <div class="d-flex justify-content-between mb-1">
                    <span>Tiền đơn hàng:</span> <span>{{number_format($total, 0, ',', '.')}}đ</span>
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <span>Phiếu giảm giá:</span>
                    <span class="text-danger">
                        <?php
                        if (Session::get('coupon')) {
                            foreach (Session::get('coupon') as $key => $cou) {
                                if ($cou['coupon_condition'] == 1) {
                        ?>
                                    -{{$cou['coupon_number']}}%
                                <?php
                                } elseif ($cou['coupon_condition'] == 2) {
                                ?>
                                    -{{number_format($cou['coupon_number'],0,',','.')}}đ
                            <?php
                                }
                            }
                        } else {
                            ?>
                            0đ
                        <?php
                        }
                        ?>
                    </span>
                </div>
                <div class="d-flex justify-content-between mb-1">
                    <span>Phí vận chuyển:</span>
                    <span>
                        {{number_format(Session::get('fee'),0,',','.')}}đ
                    </span>
                </div>
                <hr style="border: 1px solid black;">
                <div class="d-flex justify-content-between mb-4">
                    <strong>Thành tiền</strong>
                    <strong class="text-dark">
                        <?php
                        if (Session::get('fee') && !Session::get('coupon')) {
                            $total_after = $total_after_fee;
                        } elseif (!Session::get('fee') && Session::get('coupon')) {
                            foreach (Session::get('coupon') as $key => $cou) {
                                if ($cou['coupon_condition'] == 1) {
                                    $total_coupon = ($total * $cou['coupon_number']) / 100 + Session::get('fee');
                                    $total_after_coupon = $total - $total_coupon;
                                } elseif ($cou['coupon_condition'] == 2) {
                                    $total_after_coupon = $total - $cou['coupon_number'] + Session::get('fee');
                                }
                            }
                            $total_after = $total_after_coupon;
                        } elseif (Session::get('fee') && Session::get('coupon')) {
                            foreach (Session::get('coupon') as $key => $cou) {
                                if ($cou['coupon_condition'] == 1) {
                                    $total_coupon = ($total * $cou['coupon_number']) / 100;
                                    $total_after_coupon = $total - $total_coupon;
                                } elseif ($cou['coupon_condition'] == 2) {
                                    $total_after_coupon = $total - $cou['coupon_number'];
                                }
                            }
                            $total_after = $total_after_coupon;
                            $total_after = $total_after + Session::get('fee');
                        } elseif (!Session::get('fee') && !Session::get('coupon')) {
                            $total_after = $total;
                        }
                        if ($total_after < 0) {
                        ?>
                            0đ
                        <?php
                        } else {
                            echo number_format($total_after, 0, ',', '.') . 'đ';
                        }
                        ?>
                    </strong>
                </div>
                <div class="form-check mb-1 small">
                    <input class="form-check-input" type="checkbox" value="" id="tnc">
                    <label class="form-check-label" for="tnc">
                        Tôi đồng ý với các <a href="#">điều khoản và điều kiện</a>
                    </label>
                </div>
                <div class="form-check mb-3 small">
                    <input class="form-check-input" type="checkbox" value="" id="subscribe">
                    <label class="form-check-label" for="subscribe">
                        Nhận email về các cập nhật và sự kiện sản phẩm. Nếu bạn thay đổi ý định, bạn có thể hủy đăng ký bất cứ lúc nào. <a href="#">Chính sách bảo mật</a>
                    </label>
                </div>
                <a href="{{url('/your-cart')}}"><button class="btn bg-success text-light w-100 "><i class="fa-solid fa-reply"></i> Xem lại giỏ hàng</button></a>
            </div>
        </div>
    </div>
</div>
@endif

@endsection