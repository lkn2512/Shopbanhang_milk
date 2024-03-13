@extends('layout')
@section('content')
<h3 class="search-title">CÓ {{$count_search_product}} KẾT QUẢ TÌM KIẾM PHÙ HỢP </h3>
@foreach($search_product as $key =>$searh_pro)
<div class="col-sm-3">
    <div class="product-image-wrapper photo">
        <div class="p-3 mb-5">
            <div class="single-products">
                <div class="productinfo">
                    <form>
                        @csrf
                        <input type="hidden" class="cart_product_id_{{$searh_pro->product_id}}" value="{{$searh_pro->product_id}}">
                        <input type="hidden" class="cart_product_name_{{$searh_pro->product_id}}" value="{{$searh_pro->product_name}}">
                        <input type="hidden" class="cart_product_image_{{$searh_pro->product_id}}" value="{{$searh_pro->product_image}}">
                        <input type="hidden" class="cart_product_price_{{$searh_pro->product_id}}" value="{{$searh_pro->product_price}}">
                        <input type="hidden" class="cart_product_qty_{{$searh_pro->product_id}}" value="1">
                        <input type="hidden" class="cart_category_product_{{$searh_pro->product_id}}" value="{{$searh_pro->category_name}}">
                        <input type="hidden" class="cart_brand_product_{{$searh_pro->product_id}}" value="{{$searh_pro->brand_name}}">
                        <a class="img-center" href="{{URL::to('/chi-tiet-san-pham/'.$searh_pro->product_id)}}">
                            <img class="img-products" src="{{URL::to('public/uploads/product/'.$searh_pro->product_image)}}" />
                        </a>
                        <a href="{{URL::to('/chi-tiet-san-pham/'.$searh_pro->product_id)}}">
                            <p class="underline">{{$searh_pro->product_name}}</p>
                        </a>
                        <h2>{{number_format($searh_pro->product_price)}}<span>₫</span></h2>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection