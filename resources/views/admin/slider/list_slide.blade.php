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
        <h3 class="title-content">Quản lý Banner</h3>
    </div>
    <div class="col-md-4">
        <a href="{{URL::to('/add-slider')}}"><button type="button" class="btn btn-success add-products" data-mdb-ripple-init style="float: right;"><i class="fa-solid fa-plus"></i> Thêm Banner</button></a>
        <a href="javascript:location.reload(true)"> <button type="button" class="btn btn-secondary refesh-page" data-mdb-ripple-init style="float: right;"><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
    </div>
</div>
<div class="panel panel-default">
    <div class="table-responsive">
        <?php

        use Illuminate\Support\Facades\Session;

        if (Session::get('message_success')) {
            echo "<p class='text-success'>", Session::get('message_success'), "</p>";
            Session::put('message_success', null);
        }
        $i = 1;
        ?>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Hình ảnh</th>
                    <th>Tên Banner</th>
                    <th>Mô tả</th>
                    <th>Trạng thái</th>
                    <th>Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($all_slide as $key =>$slide)
                <tr>
                    <td>{{$i++}}</td>
                    <td><img src="public/uploads/slider/{{$slide->slider_image}}" style="height: 100px; width: 300px;"></td>
                    <td>{{$slide->slider_name}}</td>
                    <td>{{$slide->slider_desc}}</td>
                    <td><span class="text-ellipsis">
                            <?php
                            if ($slide->slider_status == 0) {
                            ?>
                                <a class="link-danger styling-eye" href="{{URL::to('/unactive-slide/'.$slide->slider_id)}}"><i class="fa-solid fa-eye-slash"></i> Ẩn</a>
                            <?php
                            } else {
                            ?>
                                <a class="link-primary styling-eye" href="{{URL::to('/active-slide/'.$slide->slider_id)}}"><i class="fa-solid fa-eye"></i> Hiển thị</a>
                            <?php
                            }
                            ?>
                        </span>
                    </td>
                    <td>
                        <a href="{{URL::to('/edit-slide/'.$slide->slider_id)}}" class="btn-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-active"></i></a>
                        <a onclick="return confirm('Bạn có chắc là muốn xoá banner này?')" href="{{URL::to('/delete-slide/'.$slide->slider_id)}}" class=" btn-remove" ui-toggle-class=""><i class="fa-solid fa-trash"></i></a>
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
</div>


@endsection