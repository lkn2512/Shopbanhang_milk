@extends('admin_layout')
@section('admin_content')
@foreach($edit_coupon_code as $key =>$cou_val)
<form role="form" action="{{URL::to('/update-coupon/'.$cou_val->coupon_id)}}" method="post" enctype="multipart/form-data" style="margin-bottom: 32px;">
    @csrf
    <div class="header-top">
        <div class="row">
            <div class="col-md-3">
                <h3 class="title-content"><i class="fa-solid fa-square-plus"></i> Chỉnh sửa giảm giá</h3>
            </div>
            <div class="col-md-9 btn-header">
                <a href="{{URL::to('/list-coupon')}}"><button type="button" class="btn-back" data-mdb-ripple-init><i class="fa-solid fa-arrow-left"></i> Trở về</button></a>
                <a href=""><button type="submit" class="btn-add" data-mdb-ripple-init name="add_coupon"><i class="fa-solid fa-check"></i> Lưu</button></a>
                <a href="javascript:location.reload(true)"> <button type="button" class="btn-ref refesh-page" data-mdb-ripple-init><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
            </div>
        </div>
    </div>
    <div class="table-agile-info-content">
        <div class="panel panel-default">
            <div class="row">
                <div class="col-md-4 title-left">
                    <h4>Chi tiết thay đổi</h4>
                    <p>Chỉnh sửa các thông tin cần thay đổi</p>
                </div>
                <div class="col-md-6 contend-right">
                    <div class="form-group">
                        <label>Tên phiếu giảm giá</label>
                        <input type="text" name="coupon_name" required class="form-control" id="" value="{{$cou_val->coupon_name}}">
                    </div>
                    <div class="form-group">
                        <label>Mã giảm giá</label>
                        <input type="text" name="coupon_code" required class="form-control" id="" value="{{$cou_val->coupon_code}}">
                    </div>
                    <div class="form-group">
                        <label>Số lượng mã</label>
                        <input type="number" name="coupon_times" required class="form-control" id="" value="{{$cou_val->coupon_time}}">
                    </div>
                    <div class="form-group">
                        <label>Điều kiện</label>
                        <select class="form-select" name="coupon_condition">
                            @if($cou_val->coupon_condition=="1")
                            <option value="1" selected>Giảm theo phần trăm</option>
                            <option value="2">Giảm theo tiền</option>
                            @else
                            <option value="2" selected>Giảm theo tiền</option>
                            <option value="1">Giảm theo phần trăm</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Giá trị giảm (% hoặc đ)</label>
                        <input type="number" name="coupon_number" required class="form-control" id="" value="{{$cou_val->coupon_number}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
@endsection