@extends('admin_layout')
@section('admin_content')
<div class="header-top">
    <div class="row">
        <div class="col-md-3">
            <h3 class="title-content"><i class="fa-solid fa-circle-info"></i> Chi tiết đơn hàng</h3>
        </div>
        <div class="col-md-9 btn-header">
            <a href="{{URL::to('/manage-order')}}"><button type="button" class="btn-back" data-mdb-ripple-init><i class="fa-solid fa-arrow-left"></i> Trở về</button></a>
            <a href="javascript:location.reload(true)"> <button type="button" class="btn-ref refesh-page" data-mdb-ripple-init><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
        </div>
    </div>
</div><br>
<section class="h-100 gradient-custom">
    <div class="container py-2 h-100">
        <div class="col-lg-12 col-xl-12">
            <div class="card" style="border-radius: 10px; ">
                <div class="card-header px-4 py-3" style="background-color: #008080;">
                    <h5 class="text-light mb-0">Chi tiết đơn hàng của,
                        <span style="color: #FFA500;">{{$shipping->shipping_name}}</span>!
                    </h5>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <p class="lead fw-normal mb-0" style="color: #008080; font-size: 20px;">Các sản phẩm đã đặt</p>
                        <p class="small text-dark mb-0">Tài khoản đăng nhập: {{$customer->customer_email}}</p>
                    </div>
                    @foreach($order_detail as $key => $detail)
                    <div class="card shadow-0 border mb-4 color_qty_{{$detail->product_id}}">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col align-items-center d-flex">
                                    <img src="{{URL::to('public/uploads/product/'.$detail->product_image)}}" class="img-fluid" alt="">
                                </div>
                                <div class="col align-items-center d-flex">
                                    <p class="text-dark mb-0">{{$detail->product_name}}</p>
                                </div>
                                <div class="col text-center d-flex  align-items-center">
                                    <p class="text-dark mb-0 small fw-bold">Tồn kho: x{{$detail->product->product_quantity}}</p>
                                </div>
                                <div class="col text-center d-flex  align-items-center">
                                    @if($order_status==1)
                                    <p class="text-dark mb-0 small">Số lượng: <input type="number" min="1" class="order_qty_{{$detail->product_id}}" value="{{$detail->product_sales_quantity}}" name="product_sales_quantity" style="width: 40px;"></p>
                                    @else
                                    <p class="text-dark mb-0 small">Số lượng: x{{$detail->product_sales_quantity}}<input type="hidden" min="1" class="order_qty_{{$detail->product_id}}" value="{{$detail->product_sales_quantity}}" name="product_sales_quantity"></p>
                                    @endif
                                    <input type="hidden" name="order_qty_storage" class="order_qty_storage_{{$detail->product_id}}" value="{{$detail->product->product_quantity}}">
                                    <input type="hidden" name="order_code" class="order_code" value="{{$detail->order_code}}">
                                    <input type="hidden" name="order_product_id" class="order_product_id" value="{{$detail->product_id}}">
                                    @if($order_status==1)
                                    <button class="btn-update-qty update_quantity_order" name="update_quantity_order" data-product_id="{{$detail->product_id}}"><i class="fa-solid fa-check"></i></button>
                                    @endif
                                </div>
                                <div class="col text-center d-flex  align-items-center">
                                    <p class="text-dark mb-0 small">Giá: {{number_format($detail->product_price,0,',','.')}}đ</p>
                                </div>
                                <div class="col text-center d-flex  align-items-center">
                                    <p class="text-dark mb-0 small">Tổng: {{number_format(($detail->product_sales_quantity*$detail->product_price),0,',','.')}}đ</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <hr class="mb-4" style="background-color: #e0e0e0; opacity: 1;">
                    <div class="row">
                        <div class="col">
                            <p class="text-dark mb-2"><span class="fw-bold me-2">Tên khách hàng:</span>{{$shipping->shipping_name}}</p>
                            <p class="text-dark mb-2"><span class="fw-bold me-2">Số điện thoại:</span>{{$shipping->shipping_phone}}</p>
                            <p class="text-dark mb-2"><span class="fw-bold me-2">Email:</span>{{$shipping->shipping_email}}</p>
                            <p class="text-dark mb-2"><span class="fw-bold me-2">Hình thức thanh toán:</span>
                                @if($shipping->shipping_method==1)
                                Thanh toán khi nhận hàng
                                @else
                                Chuyển khoản
                                @endif
                            </p>
                            <p class="text-dark mb-2 text-break"><span class="fw-bold me-2">Ghi chú:</span>{{$shipping->shipping_notes}}</p>
                            <p class="text-dark mb-2 text-break"><span class="fw-bold me-2">Địa chỉ giao hàng:</span>{{$shipping->shipping_address}}</p>
                        </div>
                        <div class="col float-right">
                            <?php
                            $total = 0;
                            foreach ($order_detail as $key => $detail) {
                                $subtotal = $detail->product_sales_quantity * $detail->product_price;
                                $total += $subtotal;
                            }
                            ?>
                            <p class="text-dark mb-2"><span class="fw-bold me-2"> Số lượng sản phẩm đặt:</span>x{{$qty_count}}</p>
                            <p class="text-dark mb-2"><span class="fw-bold me-2">Tổng tiền đơn hàng:</span>{{number_format($total,0,',','.')}}đ</p>
                            <p class="text-dark mb-2"><span class="fw-bold me-2">Mã Giảm giá:</span>
                                @if($detail->product_coupon!='0')
                                {{$detail->product_coupon}}
                                @else
                                Không có
                                @endif
                            </p>

                            <!-- <p class="text-dark mb-2"><span class="fw-bold me-2">Thuế:</span>0đ</p> -->
                            <p class="text-dark mb-2"><span class="fw-bold me-2">Chi phí vận chuyển:</span>
                                {{number_format($product_feeship,0,',','.')}}đ
                            </p>
                            <p class="text-danger mb-2"><span class="fw-bold me-2">Thành tiền:</span>
                                <?php
                                $total_coupon = 0;
                                $total_feeship = 0;
                                if ($coupon_condition == 1) {
                                    $total_after_coupon = ($total * $coupon_number) / 100;
                                    $total_coupon = ($total - $total_after_coupon) + $product_feeship;
                                    if ($total_coupon < 0) {
                                        $total_coupon = 0;
                                    }
                                } else {
                                    $total_coupon = ($total - $coupon_number) + $product_feeship;
                                    if ($total_coupon < 0) {
                                        $total_coupon = 0;
                                    }
                                }
                                ?>
                                {{number_format($total_coupon,0,',','.')}}đ
                            </p>
                        </div>
                    </div>
                </div>
                <!-- <div class="card-footer border-0 px-4 py-5" style="background-color: #008080; border-bottom-left-radius: 10px; border-bottom-right-radius: 10px;">
                    <h5 class="d-flex align-items-center  text-white text-uppercase mb-0"><span class=" mb-0 ms-2"></span></h5>
                </div> -->
            </div>
        </div>
        @if($order_status==3)
        <div class="alert alert-danger" role="alert" style="margin-top: 20px; font-size: 16px;">
            <i class="fa-solid fa-xmark"></i> Đơn hàng này đã bị huỷ!
        </div>
        @else
        <div class="order-processing">
            @foreach($order as $key => $or)
            @if($or->order_status==1)
            <form>
                @csrf
                <select class="form-control order_details form-select form-select-lg mb-3" name="" id="">
                    <option id="{{$or->order_id}}" value="1" selected>Chờ xử lý</option>
                    <option id="{{$or->order_id}}" value="2">Đã xử lý</option>
                    <option id="{{$or->order_id}}" value="3">Huỷ đơn hàng</option>
                </select>
            </form>
            @elseif($or->order_status==2)
            <form>
                @csrf
                <select class="form-control order_details form-select form-select-lg mb-3" name="" id="">
                    <option id="{{$or->order_id}}" value="1">Chờ xử lý</option>
                    <option id="{{$or->order_id}}" value="2" selected>Đã xử lý</option>
                    <option id="{{$or->order_id}}" value="3">Huỷ đơn hàng</option>
                </select>
            </form>
            @else
            <form>
                @csrf
                <select class="form-control order_details form-select form-select-lg mb-3" name="" id="">
                    <option id="{{$or->order_id}}" value="1">Chờ xử lý</option>
                    <option id="{{$or->order_id}}" value="2">Đã xử lý</option>
                    <option id="{{$or->order_id}}" value="3" selected>Huỷ đơn hàng</option>
                </select>
            </form>
            @endif
            @endforeach
        </div>
        @endif
    </div>
</section>
<section>
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12">
                <div class="card card-stepper text-black" style="border-radius: 16px;">
                    <div class="card-body p-5">
                        <div class="d-flex justify-content-between align-items-center mb-5">
                            <div>
                                <h5 class="mb-0">Mã đơn hàng
                                    <span class="text-primary font-weight-bold">
                                        @foreach($order as $key =>$orderCode)
                                        #{{$orderCode->order_code}}
                                        @endforeach
                                    </span>
                                </h5>
                            </div>
                            <div class="text-end">
                                <p class="mb-0">Dự kiến: <span>01/12/24</span></p>
                                <p class="mb-0">USPS <span class="font-weight-bold">234094567242423422898</span></p>
                            </div>
                        </div>
                        <ul id="progressbar-2" class="d-flex justify-content-between mx-0 mt-0 mb-5 px-0 pt-0 pb-2">
                            <li class="step0 active text-center" id="step1"></li>
                            <li class="step0 active text-center" id="step2"></li>
                            <li class="step0 active text-center" id="step3"></li>
                            <li class="step0 text-muted text-end" id="step4"></li>
                        </ul>
                        <div class="d-flex justify-content-between">
                            <div class="d-lg-flex align-items-center">
                                <i class="fas fa-clipboard-list fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                <div>
                                    <p class="fw-bold mb-1">Đơn hàng</p>
                                    <p class="fw-bold mb-0">Đã xử lý</p>
                                </div>
                            </div>
                            <div class="d-lg-flex align-items-center">
                                <i class="fas fa-box-open fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                <div>
                                    <p class="fw-bold mb-1">Đơn hàng</p>
                                    <p class="fw-bold mb-0">Đã vận chuyển</p>
                                </div>
                            </div>
                            <div class="d-lg-flex align-items-center">
                                <i class="fas fa-shipping-fast fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                <div>
                                    <p class="fw-bold mb-1">Đơn hàng</p>
                                    <p class="fw-bold mb-0">Đang giao hàng</p>
                                </div>
                            </div>
                            <div class="d-lg-flex align-items-center">
                                <i class="fas fa-home fa-3x me-lg-4 mb-3 mb-lg-0"></i>
                                <div>
                                    <p class="fw-bold mb-1">Đơn hàng</p>
                                    <p class="fw-bold mb-0">Đã giao hàng</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection