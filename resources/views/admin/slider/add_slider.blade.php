@extends('admin_layout')
@section('admin_content')
<form role="form" action="{{URL::to('/insert-slider')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="header-top">
        <div class="row">
            <div class="col-md-3">
                <h3 class="title-content"><i class="fa-solid fa-square-plus"></i> Thêm Banner</h3>
            </div>
            <div class="col-md-9 btn-header">
                <a href="{{URL::to('/manage-slider')}}"><button type="button" class="btn-back" data-mdb-ripple-init><i class="fa-solid fa-arrow-left"></i> Trở về</button></a>
                <a href=""><button type="submit" class="btn-add" data-mdb-ripple-init name="add_slider"><i class="fa-solid fa-plus"></i> Thêm</button></a>
                <a href="javascript:location.reload(true)"> <button type="button" class="btn-ref refesh-page" data-mdb-ripple-init><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
            </div>
        </div>
    </div>

    <div class="table-agile-info-content">
        <?php

        use Illuminate\Support\Facades\Session;

        if (Session::get('message_success')) {
            echo "<p class='text-success'>", Session::get('message_success'), "</p>";
            Session::put('message_success', null);
        }
        ?>
        <div class="panel panel-default">
            <div class="row">
                <div class="col-md-4 title-left">
                    <h4>Thông tin cơ bản</h4>
                    <p>Nhập vào thông tin cơ bản để thêm Banner</p>
                    <p><img src="{{URL::to('/public/backend/images/size-img.png')}}" alt="">Kích thước ảnh nên là 480 x 1280px </p>
                </div>
                <div class="col-md-6 contend-right">
                    <div class="form-group">
                        <label>Tên Banner</label>
                        <input type="text" name="slider_name" required class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Hình ảnh</label>
                        <input type="file" name="slider_image" required class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Mô tả</label>
                        <textarea style="resize:none" rows="4" name="slider_desc" class="form-control" ></textarea>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select class="form-select" name="slider_status">
                            <option value="1" selected>Hiển thị</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form><br>
@endsection