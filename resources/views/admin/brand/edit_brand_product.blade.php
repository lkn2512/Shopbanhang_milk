@extends('admin_layout')
@section('admin_content')
@foreach($edit_brand_product as $key =>$edit_value)
<form role="form" action="{{URL::to('/update-brand-product/'.$edit_value->brand_id)}}" method="post"style="padding-bottom: 124px;">
    {{csrf_field()}}
    <div class="header-top">
        <div class="row">
            <div class="col-md-3">
                <h3 class="title-content"><i class="fa-solid fa-pen-to-square"></i> Chỉnh sửa thương hiệu</h3>
            </div>
            <div class="col-md-9 btn-header">
                <a href="{{URL::to('/all-brand-product')}}"><button type="button" class="btn-back" data-mdb-ripple-init><i class="fa-solid fa-arrow-left"></i> Trở về</button></a>
                <a href=""> <button type="submit" class="btn-add" data-mdb-ripple-init><i class="fa-solid fa-check"></i> Lưu</button></a>
                <a href="javascript:location.reload(true)"> <button type="button" class="btn-ref refesh-page" data-mdb-ripple-init><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
            </div>
        </div>
    </div>
    <div class="table-agile-info-content">
        <div class="row">
            <div class="col-md-4 title-left">
                <h4>Chi tiết thay đổi</h4>
                <p>Chỉnh sửa các thông tin cần thay đổi</p>
            </div>
            <div class="col-md-6 contend-right">
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                    <input type="text" value="{{$edit_value->brand_name}}" name="brand_product_name" required class="form-control" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Mô tả</label>
                    <textarea style="resize:none" rows="4" type="password" name="brand_product_desc" class="form-control" id="exampleInputPassword1">{{$edit_value->brand_desc}}</textarea>
                </div>
                <div class="form-group">
                    <label>Trạng thái</label>
                    <select class="form-select" name="brand_product_status">
                        @if($edit_value->brand_status=="1")
                        <option value="1" selected>Hiển thị</option>
                        <option value="0">Ẩn</option>
                        @else
                        <option value="0" selected>Ẩn</option>
                        <option value="1">Hiển thị</option>
                        @endif
                    </select>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
@endsection