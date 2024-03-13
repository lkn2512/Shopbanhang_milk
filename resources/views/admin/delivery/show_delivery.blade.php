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
        <h3 class="title-content">Chi phí vận chuyển</h3>
    </div>
    <div class="col-md-4">
        <a href="{{URL::to('/delivery')}}"><button type="button" class="btn btn-success add-products" data-mdb-ripple-init style="float: right;"><i class="fa-solid fa-plus"></i> Thêm phí vận chuyển</button></a>
        <a href="javascript:location.reload(true)"> <button type="button" class="btn btn-secondary refesh-page" data-mdb-ripple-init style="float: right;"><i class="fa-solid fa-arrows-rotate"></i> Tải lại trang</button></a>
    </div>
</div>
<form>
    @csrf
    <div class="panel panel-default">
        <div class="" id="load_delivery">
        </div>
    </div>
</form><br>
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