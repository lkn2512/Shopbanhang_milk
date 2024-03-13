@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-md-3">
        <div class="input-group">
            <button type="button" class="btn btn-dark" data-mdb-ripple-init>
                <i class="fas fa-search"></i>
            </button>
            <div class="form-outline" data-mdb-input-init>
                <input type="search" id="form1" class="form-control" placeholder="search" />
            </div>
        </div>
    </div>
    <div class="col-md-3 offset-2">
        <h3 class="title-content">Quản lý mã giảm giá</h3>
    </div>
    <div class="col-md-4">
        <a href="{{URL::to('/insert-coupon')}}"><button type="button" class="btn btn-success add-products" data-mdb-ripple-init style="float: right;"><i class="fa-solid fa-plus"></i> Thêm mã giảm giá</button></a>
        <a href="javascript:location.reload(true)"> <button type="button" class="btn btn-secondary refesh-page" data-mdb-ripple-init style="float: right;"><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
    </div>
</div>

<div class="panel panel-default">
    <?php

    use Illuminate\Support\Facades\Session;

    if (Session::get('message_success')) {
        echo "<p class='text-success'>", Session::get('message_success'), "</p>";
        Session::put('message_success', null);
    }
    $i = 1;
    ?>
    <table class="table table-hover align-middle mb-0">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên phiếu giảm giá</th>
                <th>Mã giảm giá</th>
                <th>Điều kiện</th>
                <th>Giá trị giảm</th>
                <th>Số lượng mã</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($coupon as $key =>$cou)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$cou->coupon_name}}</td>
                <td>{{$cou->coupon_code}}</td>
                <td><span class="text-ellipsis">
                        <?php
                        if ($cou->coupon_condition == 1) {
                        ?>
                            Giảm theo phần trăm
                        <?php
                        } else {
                        ?>
                            Giảm theo tiền
                        <?php
                        }
                        ?>
                    </span>
                </td>
                <td><span class="text-ellipsis">
                        <?php
                        if ($cou->coupon_condition == 1) {
                        ?>
                            {{$cou->coupon_number}}%
                        <?php
                        } else {
                        ?>
                            {{number_format($cou->coupon_number,0,',','.')}}đ
                        <?php
                        }
                        ?>
                    </span>
                </td>
                <td>{{$cou->coupon_time}}</td>
                <td>
                    <a href="{{URL::to('/edit-coupon/'.$cou->coupon_id)}}" class="btn-edit"><i class="fa fa-pencil-square-o text-active"></i></a>
                    <a onclick="return confirm('Bạn có chắc là muốn xoá mã giảm giá này?')" href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="btn-remove"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table><br>
    <footer class="panel-footer">
        <div class="row">
            <div class="col-sm-3 offset-sm-5">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </footer>
</div>
@endsection