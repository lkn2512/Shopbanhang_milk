@extends('admin_layout')
@section('admin_content')
<form role="form" action="{{URL::to('/save-category-product')}}" method="post" style="padding-bottom: 107px;">
    {{csrf_field()}}
    <div class="header-top">
        <div class="row">
            <div class="col-md-3">
                <h3 class="title-content"><i class="fa-solid fa-square-plus"></i> Thêm danh mục</h3>
            </div>
            <div class="col-md-9 btn-header">
                <a href="{{URL::to('/all-category-product')}}"><button type="button" class="btn-back" data-mdb-ripple-init><i class="fa-solid fa-arrow-left"></i> Trở về</button></a>
                <a href=""><button type="submit" class="btn-add" data-mdb-ripple-init name="add_category_product"><i class="fa-solid fa-plus"></i> Thêm</button></a>
                <a href="javascript:location.reload(true)"> <button type="button" class="btn-ref refesh-page" data-mdb-ripple-init><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
            </div>
        </div>
    </div>

    <div class="table-agile-info-content">
        <?php

        use Illuminate\Support\Facades\Session;

        if (Session::get('message_success')) {
            echo "<p class='text-success'>",Session::get('message_success'), "</p>";
            Session::put('message_success', null);
        }
        ?>
        <div class="panel panel-default">
            <div class="row">
                <div class="col-md-4 title-left">
                    <h4>Thông tin cơ bản</h4>
                    <p>Nhập vào thông tin cơ bản để thêm danh mục</p>
                </div>
                <div class="col-md-6 contend-right">
                    <div class="form-group">
                        <label>Tên danh mục</label>
                        <input type="text" name="category_product_name" required class="form-control" id="name_category">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea style="resize:none" rows="4" name="category_product_desc" class="form-control" id="desc_category"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="form-select" name="category_product_status">
                            <option value="1" selected>Hiển thị</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection