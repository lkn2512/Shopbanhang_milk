@extends('admin_layout')
@section('admin_content')
<form role="form" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data" style="margin-bottom: -82px;">
    {{csrf_field()}}
    <div class="header-top">
        <div class="row">
            <div class="col-md-3">
                <h3 class="title-content"><i class="fa-solid fa-square-plus"></i> Thêm sản phẩm</h3>
            </div>
            <div class="col-md-9 btn-header">
                <a href="{{URL::to('/all-product')}}"><button type="button" class="btn-back" data-mdb-ripple-init><i class="fa-solid fa-arrow-left"></i> Trở về</button></a>
                <a href=""> <button type="submit" class="btn-add" data-mdb-ripple-init><i class="fa-solid fa-plus"></i> Thêm</button></a>
                <a href="{{URL::to('/add-product')}}"> <button type="button" class="btn-ref refesh-page" data-mdb-ripple-init><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
            </div>
        </div>
    </div>
    <div class="table-agile-info-content">
        <div class="panel panel-default">
            <div class="row">
                <div class="col-md-4 title-left">
                    <h4>Thông tin cơ bản</h4>
                    <p>Nhập vào thông tin cơ bản để thêm sản phẩm</p>
                    <p><img src="{{URL::to('/public/backend/images/size-img.png')}}" alt="">Kích thước ảnh nên là 680 x 760px </p>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 content-right">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="product_name" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="product_image" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Giá</label>
                                <input type="number" name="product_price" required class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6 content-right">
                            <div class="form-group">
                                <label>Số lượng</label>
                                <input type="number" name="product_quantity" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Mã sản phẩm</label>
                                <input type="text" name="product_code" required class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row content-right">
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea style="resize:none" rows="8" name="product_content" class="form-control" id="ckeditor_add_product"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 content-right">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                <div class="input-group mb-3">
                                    <select class="form-select" name="product_cate" id="inputGroupSelect02">
                                        @foreach($cate_product as $key =>$cate)
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Thương hiệu</label>
                                <div class="input-group mb-3">
                                    <select class="form-select" name="product_brand" id="inputGroupSelect02">
                                        @foreach($brand_product as $key =>$brand)
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 content-right">
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select class="form-select" name="product_status">
                                    <option value="1" selected>Hiển thị</option>
                                    <option value="0">Ẩn</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tình trạng</label>
                                <select class="form-select" name="product_condition">
                                    <option value="1" selected>Còn hàng</option>
                                    <option value="0">Hết hàng</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection