@extends('layout')
@section('content')

@foreach($detail_product as $key =>$value)

<div class="product-details">
    <div class="">
        <div class="col-md-4">
            <div class="view-product">
                <img src="{{URL::to('public/uploads/product/'.$value->product_image)}}" alt="" />
            </div>
        </div>
        <div class="col-md-5">
            <div class="product-information">
                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                <h2>{{$value->product_name}}</h2>
                <p><b>Mã sản phẩm:</b> {{$value->product_code}}</p>
                @if($value->product_condition == "0")
                <p><b>Tình trạng:</b> Hết hàng</p>
                @else
                <p><b>Điều kiện:</b> Mới</p>
                <p><b>Tình trạng:</b> Còn hàng</p>
                @endif
                <p><b>Loại sản phẩm:</b> {{$value->category_name}}</p>
                <p><b>Thương hiệu: </b><a style="text-transform: capitalize;">{{$value->brand_name}}</a></p>
                <span><span>{{number_format($value->product_price).'₫'}}</span></span>
                @if($value->product_condition == "0")
                <img class="img-condition" src="{{URL::to('public/frontend/images/product-details/sold_out.png')}}" alt="">
                <p class="soldout-note"><i class="fa-solid fa-circle-info"></i> Sản phẩm này đã bán hết, vui lòng quay lại sau. Xin lỗi vì sự bất tiện này </p>
                @else
                <form>
                    @csrf
                    <input type="hidden" class="cart_product_id_{{$value->product_id}}" value="{{$value->product_id}}">
                    <input type="hidden" class="cart_product_name_{{$value->product_id}}" value="{{$value->product_name}}">
                    <input type="hidden" class="cart_product_image_{{$value->product_id}}" value="{{$value->product_image}}">
                    <input type="hidden" class="cart_product_quantity_{{$value->product_id}}" value="{{$value->product_quantity}}">
                    <input type="hidden" class="cart_product_price_{{$value->product_id}}" value="{{$value->product_price}}">
                    <input type="hidden" class="cart_category_product_{{$value->product_id}}" value="{{$value->category_name}}">
                    <input type="hidden" class="cart_brand_product_{{$value->product_id}}" value="{{$value->brand_name}}">

                    <b class="title-qty">Số lượng:</b><input type="number" class="cart_product_qty_{{$value->product_id}} input-number" value="1" min="1">
                    <span>
                        <button type="button" class="btn add-to-cart" name="add-to-cart" data-id="{{$value->product_id}}">
                            <i class="fa-solid fa-cart-plus"></i>Đặt hàng
                        </button>
                    </span>
                </form>
                @endif
            </div>
        </div>
        <div class="col-md-3">
            <div class="text-information">
                <h3>Phương châm KN-MILK</h3>
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{URL::to('public/frontend/images/home/shipping.png')}}" alt="" height="30px">
                    </div>
                    <div class="col-md-9">
                        <p>Giao hàng tận nơi</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <img style="padding-left: 5px;" src="{{URL::to('public/frontend/images/home/ut.png')}}" alt="" height="30px">
                    </div>
                    <div class="col-md-9">
                        <p>Uy tín là hàng đầu </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{URL::to('public/frontend/images/home/quality.png')}}" alt="" height="40px">
                    </div>
                    <div class="col-md-9">
                        <p>Sản phẩm chất lượng cao </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <img style="padding-left: 8px;" src="{{URL::to('public/frontend/images/home/sp.png')}}" alt="" height="38px">
                    </div>
                    <div class="col-md-9">
                        <p>Hỗ trợ khách hàng 24/24 </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <img style="margin-top: -6px; padding-left: 10px;" src="{{URL::to('public/frontend/images/home/phone.jpg')}}" alt="" height="38px">
                    </div>
                    <div class="col-md-9">
                        <p>Liên hệ 0356048258 </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-details-desc">
    <h2 class="titleDetails">Mô tả sản phẩm</h2>
    <span>{!!$value->product_content!!}</span>
</div>
@endforeach
@endsection

@section('content-related')
<div class="title-content" style="margin-top: 20px;">
    <h2 class="title-left">Sản phẩm cùng loại</h2>
</div>
@foreach($related as $key =>$relate)
<div class="col-sm-2">
    <div class="mb-5">
        <div class="single-products">
            <div class="productinfo">
                <form>
                    @csrf
                    <input type="hidden" class="cart_product_id_{{$relate->product_id}}" value="{{$relate->product_id}}">
                    <input type="hidden" class="cart_product_name_{{$relate->product_id}}" value="{{$relate->product_name}}">
                    <input type="hidden" class="cart_product_image_{{$relate->product_id}}" value="{{$relate->product_image}}">
                    <input type="hidden" class="cart_product_price_{{$relate->product_id}}" value="{{$relate->product_price}}">
                    <input type="hidden" class="cart_product_qty_{{$relate->product_id}}" value="1">
                    <input name="quantity" type="hidden" min="1" value="1" />
                    <input type="hidden" class="cart_category_product_{{$relate->product_id}}" value="{{$relate->category_name}}">
                    <input type="hidden" class="cart_brand_product_{{$relate->product_id}}" value="{{$relate->brand_name}}">

                    <a class="img-center" href="{{URL::to('/chi-tiet-san-pham/'.$relate->product_id)}}"><img src="{{URL::to('public/uploads/product/'.$relate->product_image)}}" class="img-products" /></a>
                    <a href="{{URL::to('/chi-tiet-san-pham/'.$relate->product_id)}}">
                        <p class="underline">{{$relate->product_name}}</p>
                    </a>
                    <h2>{{number_format($relate->product_price)}}<span>₫</span></h2>
                    <!-- <div class="btn-show">
                        <button type="button" class="btn add-to-cart" name="add-to-cart" data-id="{{$relate->product_id}}"><i class="fa-solid fa-cart-plus"></i>Đặt hàng</button>
                    </div> -->
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach


@endsection