@extends('layout')
@section('content')
@foreach($category_name as $key =>$name)
<div class="title-content">
    <h2 class="title-left">{{$name->category_name}}</h2>
</div>
@endforeach
@foreach($category_by_id as $key =>$product)
<div class="col-sm-2">
    <div class="mb-5">
        <div class="single-products">
            <div class="productinfo">
                <form>
                    @csrf
                    <input type="hidden" class="cart_product_id_{{$product->product_id}}" value="{{$product->product_id}}">
                    <input type="hidden" class="cart_product_name_{{$product->product_id}}" value="{{$product->product_name}}">
                    <input type="hidden" class="cart_product_image_{{$product->product_id}}" value="{{$product->product_image}}">
                    <input type="hidden" class="cart_product_price_{{$product->product_id}}" value="{{$product->product_price}}">
                    <input type="hidden" class="cart_product_qty_{{$product->product_id}}" value="1">
                    <input type="hidden" class="cart_category_product_{{$product->product_id}}" value="{{$product->category_name}}">
                    <input type="hidden" class="cart_brand_product_{{$product->product_id}}" value="{{$product->brand_name}}">

                    <a class="img-center" href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}"><img class="img-products" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" /></a>
                    <a href="{{URL::to('/chi-tiet-san-pham/'.$product->product_id)}}">
                        <p class="underline">{{$product->product_name}}</p>
                    </a>
                    <h2>{{number_format($product->product_price)}}<span>₫</span></h2>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection