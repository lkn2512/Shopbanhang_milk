@extends('layout')
@section('content')
<div class="title-content">
    <h2 class="title-left">Tất cả sản phẩm</h2>
</div>
@foreach($all_product_home as $key =>$all_pro_h)
<div class="col-sm-2">
    <div class="mb-5">
        <div class="single-products">
            <div class="productinfo">
                <form>
                    @csrf
                    <input type="hidden" class="cart_product_id_{{$all_pro_h->product_id}}" value="{{$all_pro_h->product_id}}">
                    <input type="hidden" class="cart_product_name_{{$all_pro_h->product_id}}" value="{{$all_pro_h->product_name}}">
                    <input type="hidden" class="cart_product_image_{{$all_pro_h->product_id}}" value="{{$all_pro_h->product_image}}">
                    <input type="hidden" class="cart_product_price_{{$all_pro_h->product_id}}" value="{{$all_pro_h->product_price}}">
                    <input type="hidden" class="cart_product_qty_{{$all_pro_h->product_id}}" value="1">
                    <input type="hidden" class="cart_category_product_{{$all_pro_h->product_id}}" value="{{$all_pro_h->category_name}}">
                    <input type="hidden" class="cart_brand_product_{{$all_pro_h->product_id}}" value="{{$all_pro_h->brand_name}}">
                    <a class="img-center" href="{{URL::to('/chi-tiet-san-pham/'.$all_pro_h->product_id)}}"><img class="img-products" src="{{URL::to('public/uploads/product/'.$all_pro_h->product_image)}}" alt="" /></a>
                    <a href="{{URL::to('/chi-tiet-san-pham/'.$all_pro_h->product_id)}}">
                        <p class="underline">{{$all_pro_h->product_name}}</p>
                    </a>
                    <h2>{{number_format($all_pro_h->product_price)}}<span>₫</span></h2>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection