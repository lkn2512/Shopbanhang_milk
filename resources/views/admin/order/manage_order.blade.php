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
    <div class="col-md-4 offset-md-2">
        <h3 class="title-content">Danh sách đơn hàng</h3>
    </div>
    <div class="col-md-3">

        <a href="javascript:location.reload(true)"> <button type="button" class="btn btn-secondary refesh-page" data-mdb-ripple-init style="float: right;"><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
    </div>
</div>
<div class="panel panel-default">
    <table class="table table-hover">
        <thead>
            <tr>
                <th>STT</th>
                <th>Mã đơn hàng</th>
                <th>Tình trạng</th>
                <th>Thời gian đặt hàng</th>
                <th>Tác vụ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i = 1;
            ?>
            @foreach($order as $key =>$orders)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$orders->order_code}}</td>
                <td >
                    @if($orders->order_status==1)
                    <a><i class="fa-solid fa-clock-rotate-left"></i>&ensp;Đang chờ xử lý...</a>
                    @elseif($orders->order_status==2)
                    <a style="color: green;"><i class="fa-solid fa-check"></i>&ensp;Đã xử lý</a>
                    @else
                    <a style="color: red;"><i class="fa-solid fa-xmark"></i>&ensp;Đã huỷ</a>
                    @endif
                </td>
                <td>{{$orders->created_at}}</td>
                <td>
                    <a href="{{URL::to('view-order/'.$orders->order_code)}}" class="btn-detail-view"><i class="fa-solid fa-eye"></i></a>
                    <a onclick="return confirm('Bạn có chắc là muốn xoá đơn hàng này?')" href="{{URL::to('delete-order/'.$orders->order_code)}}" class="btn-remove"><i class="fa-solid fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
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
@endsection