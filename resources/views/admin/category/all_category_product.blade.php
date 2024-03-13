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
        <h3 class="title-content">Danh mục sản phẩm</h3>
    </div>
    <div class="col-md-4">
        <a href="{{URL::to('/add-category-product')}}"><button type="button" class="btn btn-success add-products" data-mdb-ripple-init style="float: right;"><i class="fa-solid fa-plus"></i> Thêm danh mục</button></a>
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
        <table class="table table-hover align-middle mb-0">
            <thead class="bg-light">
                <tr>
                    <th>STT</th>
                    <th>Tên danh mục</th>
                    <th>Mô tả chi tiết</th>
                    <th>Trạng thái</th>
                    <th>Tác vụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($all_category_product as $key =>$cate_pro)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$cate_pro->category_name}}</td>
                    <td class="desction-format">{{$cate_pro->category_desc}}</td>
                    <td><span class="text-ellipsis">
                            <?php
                            if ($cate_pro->category_status == 0) {
                            ?>
                                <a class="link-danger styling-eye" href="{{URL::to('/unactive-category-product/'.$cate_pro->category_id)}}"><i class="fa-solid fa-eye-slash"></i> Ẩn</a>
                            <?php
                            } else {
                            ?>
                                <a class="link-primary styling-eye" href="{{URL::to('/active-category-product/'.$cate_pro->category_id)}}"><i class="fa-solid fa-eye"></i> Hiển thị</a>
                            <?php
                            }
                            ?>
                        </span></td>
                    <td>
                        <a href="{{URL::to('/edit-category-product/'.$cate_pro->category_id)}}" class="btn-edit" ui-toggle-class=""><i class="fa fa-pencil-square-o text-active"></i></a>
                        <a onclick="return confirm('Bạn có chắc là muốn xoá danh mục này?')" href="{{URL::to('/delete-category-product/'.$cate_pro->category_id)}}" class="btn-remove" ui-toggle-class="">
                            <i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div><br><br>

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