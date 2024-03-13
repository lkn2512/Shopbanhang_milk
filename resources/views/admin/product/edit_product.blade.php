@extends('admin_layout')
@section('admin_content')
@foreach($edit_product as $key=>$pro)
<form role="form" action="{{URL::to('/update-product/'.$pro->product_id)}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="header-top">
        <div class="row">
            <div class="col-md-3">
                <h3 class="title-content"><i class="fa-solid fa-pen-to-square"></i> Chỉnh sửa sản phẩm</h3>
            </div>
            <div class="col-md-9 btn-header">
                <a href="{{URL::to('/all-product')}}"><button type="button" class="btn-back" data-mdb-ripple-init><i class="fa-solid fa-arrow-left"></i> Trở về</button></a>
                <a href=""> <button type="submit" class="btn-add" data-mdb-ripple-init><i class="fa-solid fa-check"></i> Lưu</button></a>
                <a href="{{URL::to('/edit-product/'.$pro->product_id)}}"> <button type="button" class="btn-ref refesh-page" data-mdb-ripple-init><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
            </div>
        </div>
    </div>
    <div class="table-agile-info-content">
        <div class="panel panel-default">
            <div class="row">
                <div class="col-md-4 title-left">
                    <h4>Chi tiết thay đổi</h4>
                    <p>Chỉnh sửa các thông tin cần thay đổi</p>
                    <p><img src="{{URL::to('/public/backend/images/size-img.png')}}" alt="">Kích thước ảnh nên là 680 x 760px </p>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 content-right">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="product_name" required class="form-control" value="{{$pro->product_name}}">
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="product_image" class="form-control">
                                <img class="img-edit-product" src="{{URL::to('public/uploads/product/'.$pro->product_image)}}">
                            </div>
                        </div>
                        <div class="col-md-6 content-right">
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input type="number" name="product_quantity" required class="form-control" value="{{$pro->product_quantity}}">
                            </div>
                            <div class="form-group">
                                <label>Mã sản phẩm</label>
                                <input type="text" name="product_code" required class="form-control" value="{{$pro->product_code}}">
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="text" name="product_price" required class="form-control" value="{{$pro->product_price}}">
                            </div>
                        </div>
                    </div>
                    <div class="row content-right">
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea style="resize:none" rows="7" name="product_content" class="form-control" id="ckeditor_edit_product">{{$pro->product_content}}</textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 content-right">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                <div class="input-group mb-3">
                                    <select class="form-select" name="product_cate">
                                        @foreach($cate_product as $key =>$cate)
                                        @if($cate->category_id==$pro->category_id)
                                        <option value="{{$cate->category_id}}" selected>{{$cate->category_name}}</option>
                                        @else
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu</label>
                                <div class="input-group mb-3">
                                    <select class="form-select" name="product_brand">
                                        @foreach($brand_product as $key =>$brand)
                                        @if($brand->brand_id==$pro->brand_id)
                                        <option value="{{$brand->brand_id}}" selected>{{$brand->brand_name}}</option>
                                        @else
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 content-right">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="form-select" name="product_status">
                                    @if($pro->product_status=="1")
                                    <option value="1" selected>Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                    @else
                                    <option value="0" selected>Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <select class="form-select" name="product_condition">
                                    @if($pro->product_condition=="1")
                                    <option value="1" selected>Còn hàng</option>
                                    <option value="0">Hết hàng</option>
                                    @else
                                    <option value="0" selected>Hết hàng</option>
                                    <option value="1">Còn Hàng</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
@endsection