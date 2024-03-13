@extends('admin_layout')
@section('admin_content')
<form style="margin-bottom: 114px;">
    @csrf
    <div class="header-top">
        <div class="row">
            <div class="col-md-3">
                <h3 class="title-content"><i class="fa-solid fa-square-plus"></i> Thêm phí vận chuyển</h3>
            </div>
            <div class="col-md-9 btn-header">
                <a href="{{URL::to('/show-delivery')}}"><button type="button" class="btn-back" data-mdb-ripple-init><i class="fa-solid fa-arrow-left"></i> Trở về</button></a>
                <a> <button type="button" class="btn-add add_delivery" name="add_delivery"><i class="fa-solid fa-plus"></i> Thêm</button></a>
                <a href="javascript:location.reload(true)"> <button type="button" class="btn-ref refesh-page" data-mdb-ripple-init><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
            </div>
        </div>
    </div>
    <div class="table-agile-info-content">
        <div class="panel panel-default">
            <div class="row">
                <div class="col-md-4 title-left">
                    <h4>Thông tin cơ bản</h4>
                    <p>Lựa chọn địa chỉ để thêm phí vận chuyển</p>
                </div>
                <div class="col-md-6 contend-right">
                    <div class="form-group">
                        <label>Tỉnh thành phố</label>
                        <select class="form-select choose city" name="city" id="city">
                            <option value="" selected>--Chọn tỉnh thành phố--</option>
                            @foreach($city as $key=>$ci)
                            <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Quận huyện</label>
                        <select class="form-select province choose" name="province" id="province">
                            <option value="" selected>--Chọn quận huyện--</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Xã phường</label>
                        <select class="form-select wards" name="wards" id="wards">
                            <option value="" selected>--Chọn xã phường--</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Phí vận chuyển</label>
                        <input class="form-control fee_ship" type="number" name="fee_ship" required>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection