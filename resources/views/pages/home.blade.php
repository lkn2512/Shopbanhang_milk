@extends('layout')

@section('category-home')
<div class="title-category">
    <h2><img src="{{URL::to('public/frontend/images/home/category.png')}}">Danh mục sản phẩm</h2>
    <div class="panel-group category-products scroll-category" id="accordian">
        @foreach($category as $key =>$cate)
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-title"><a href="{{URL::to('/danh-muc-san-pham/'.$cate->category_id)}}">{{$cate->category_name}}</div></a>
            </div>
        </div>
        @endforeach
    </div>
    <!-- <h2>Thương hiệu</h2> -->
    <!-- <div class="panel-group category-products scroll-brand" id="accordian">
        @foreach($brand as $key =>$brand)
        <div class="panel panel-default ">
            <div class="panel-heading">
                <h4 class="panel-title"><a href="{{URL::to('/thuong-hieu-san-pham/'.$brand->brand_id)}}">{{$brand->brand_name}}</a></h4>
            </div>
        </div>
        @endforeach
    </div> -->
</div>
@endsection
@section('slider')
<div id="carouselExampleCaptions" class="carousel carousel-dark slide">
    <div class="carousel-inner">
        <?php
        $i = 0;
        foreach ($slider as $key => $slide) {
            $i++;
        ?>
            <div class="carousel-item {{$i==1?'active':''}}">
                <img src="public/uploads/slider/{{$slide->slider_image}}" class="d-block w-100 img-slider">
            </div>
        <?php
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endsection

@section('slider2')
<div class="row">
    <img src="{{URL::to('public/frontend/images/home/ut.jpg')}}">
</div>
<div class="row">
    <img src="{{URL::to('public/frontend/images/home/ghtq.jpg')}}" style="padding-top: 8px;">
</div>
@endsection

@section('content')
<div class="title-content">
    <h2 class="title-left">Mới nhất</h2>
    <img class="new-img" src="{{URL::to('public/frontend/images/home/new2.png')}}" alt="">
</div>
@foreach($all_product as $key =>$all_pro)
<div class="col-sm-2">
    <div class="mb-5">
        <div class="single-products">
            <div class="productinfo">
                <form>
                    @csrf
                    <input type="hidden" class="cart_product_id_{{$all_pro->product_id}}" value="{{$all_pro->product_id}}">
                    <input type="hidden" class="cart_product_name_{{$all_pro->product_id}}" value="{{$all_pro->product_name}}">
                    <input type="hidden" class="cart_product_image_{{$all_pro->product_id}}" value="{{$all_pro->product_image}}">
                    <input type="hidden" class="cart_product_price_{{$all_pro->product_id}}" value="{{$all_pro->product_price}}">
                    <input type="hidden" class="cart_product_qty_{{$all_pro->product_id}}" value="1">
                    <input type="hidden" class="cart_category_product_{{$all_pro->product_id}}" value="{{$all_pro->category_name}}">
                    <input type="hidden" class="cart_brand_product_{{$all_pro->product_id}}" value="{{$all_pro->brand_name}}">

                    <a class="img-center" href="{{URL::to('/chi-tiet-san-pham/'.$all_pro->product_id)}}">
                        <img class="img-products" src="{{URL::to('public/uploads/product/'.$all_pro->product_image)}}" alt="" />
                    </a>
                    <a href="{{URL::to('/chi-tiet-san-pham/'.$all_pro->product_id)}}">
                        <p class="underline">{{$all_pro->product_name}}</p>
                    </a>
                    <h2>{{number_format($all_pro->product_price)}}<span>₫</span></h2>
                    <!-- <div class="btn-show">
                            <button type="button" class="btn add-to-cart" name="add-to-cart" data-id="{{$all_pro->product_id}}"><i class="fa-solid fa-cart-plus"></i>Đặt hàng</button>
                        </div> -->
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection

@section('content-popular')
<div class="container-md about-shop">
    <h2 class="text">Về Chúng tôi</h2>
    <img class="img" src="{{URL::to('/public/frontend/images/home/gc.png')}}" alt="Image">
</div>
<div class="site-section bg-left-half mb-5">
    <div class="container-md owl-2-style">
        <div class="owl-carousel owl-2">
            <div class="media-29101">
                <img src="{{URL::to('/public/frontend/images/home/taste.png')}}" alt="Image" class="img-fluid">
                <h3>KN-MILK Hương vị tuyệt hảo</h3>
                <p>Niềm đam mê của chúng tôi là mang lại cho bạn một sản phẩm với hương vị hoàn hảo nhất</p>
            </div>
            <div class="media-29101">
                <img src="{{URL::to('/public/frontend/images/home/pro.png')}}" alt="Image" class="img-fluid">
                <h3>An toàn là trên hết</h3>
                <p>KN-MILK sử dụng những nguyên liệu không chỉ ngon, an toàn, mà còn tốt cho sức khoẻ cho bạn</p>
            </div>
            <div class="media-29101">
                <img src="{{URL::to('/public/frontend/images/home/dd.jpg')}}" alt="Image" class="img-fluid">
                <h3>Sản phẩm đa dạng</h3>
                <p> Chúng tôi cung cấp cho bạn nhiều loại sữa khác nhau, đa dạng, đủ thể loại cho bạn lựa chọn</p>
            </div>
        </div>
    </div>
</div>
@endsection