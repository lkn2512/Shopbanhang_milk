@extends('layout')
@section('content')
<div class="col-sm-8">
    <h2 class="title text-center">Liên hệ với chúng tôi</h2>
    <p>Chúng tôi mong muốn lắng nghe từ bạn. Hãy liên hệ với chúng tôi và một thành viên của chúng tôi sẽ
        liên lạc với bạn trong thời gian sớm nhất. Chúng tôi yêu thích việc nhận được email của bạn
        <em>mỗi ngày</em>.
    </p>
    <div class="card">
        <div class="card-body">
            <form>
                <div class="form-group row">
                    <label class="col-form-lable col-sm-3 font-weight-bold" style="text-align: left;">Tên
                        của bạn:</label>
                    <div class="col-sm-7">
                        <input class="form-control" placeholder="Nhập tên của bạn"></input>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-lable col-sm-3 font-weight-bold" style="text-align: left;">Email
                        của bạn:</label>
                    <div class="col-sm-7">
                        <input class="form-control" placeholder="Nhập email của bạn"></input>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-lable col-sm-3 font-weight-bold" style="text-align: left;">Nội
                        dung:</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" placeholder="Nội dung" rows="5"></textarea>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-success" type="submit">Gửi</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="col-sm-4">
    <h3>Bản đồ</h3>
    <p>
        <a href="#">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15729855.42909206!2d96.7382165931671!3d15.735434000981483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31157a4d736a1e5f%3A0xb03bb0c9e2fe62be!2zVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1445179448264" width="250" height="220" frameborder="0" style="border:0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
            <br />
        </a>
        <br>
        <a href="#">Xem bản đồ</a>
    </p>
    <p>
        Đại chỉ 1.
        <br /> Địa chỉ 2.
    </p>
</div>

@endsection