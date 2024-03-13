@extends('admin_layout')
@section('admin_content')
<form role="form" action="{{URL::to('/insert-coupon-code')}}" method="post" style="margin-bottom: 8px;">
    @csrf
    <div class="header-top">
        <div class="row">
            <div class="col-md-3">
                <h3 class="title-content"><i class="fa-solid fa-square-plus"></i> Thêm mã giảm giá</h3>
            </div>
            <div class="col-md-9 btn-header">
                <a href="{{URL::to('/list-coupon')}}"><button type="button" class="btn-back" data-mdb-ripple-init><i class="fa-solid fa-arrow-left"></i> Trở về</button></a>
                <a href=""><button type="submit" class="btn-add" data-mdb-ripple-init name="add_coupon"><i class="fa-solid fa-plus"></i> Thêm</button></a>
                <a href="{{URL::to('/insert-coupon')}}"> <button type="button" class="btn-ref refesh-page" data-mdb-ripple-init><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
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
                    <p>Nhập vào thông tin cơ bản để thêm mã giảm giá</p>
                </div>
                <div class="col-md-6 contend-right">
                    <div class="form-group">
                        <label>Tên phiếu giảm giá</label>
                        <input type="text" name="coupon_name" required class="form-control" id="name_category">
                    </div>
                    <div class="form-group">
                        <label>Mã giảm giá</label>
                        <input type="text" name="coupon_code" required class="form-control" id="name_category">
                    </div>
                    <div class="form-group">
                        <label>Số lượng mã</label>
                        <input type="number" name="coupon_times" required class="form-control" id="name_category">
                    </div>
                    <div class="form-group">
                        <label>Điều kiện</label>
                        <select class="form-select" name="coupon_condition">
                            <option value="1" selected>Giảm theo phần trăm</option>
                            <option value="2">Giảm theo tiền</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Giá trị giảm (% hoặc đ)</label>
                        <input type="number" name="coupon_number" required class="form-control" id="name_category" >
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection