<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="{{asset('public/frontend/login/fonts/icomoon/style.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/login/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/login/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/login/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-3 contents card shadow p-5 mb-5 bg-body-tertiary rounded">
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <div class="mb-4 text-center">
                                <a href="{{URL::to('/')}}"><img class="img-login" src="{{URL::to('public/frontend/images/home/logoKN_blue.png')}}" alt="" /></a>
                                <h3 class="fw-bold">Đăng nhập</h3>
                            </div>
                            <form method="POST" action="{{URL::to('/login-customer')}}" class="signin-form">
                                {{csrf_field()}}
                                <div class="form-group first">
                                    <input type="email" class="form-control" id="username" placeholder="Email" name="email_account" required>
                                </div>
                                <div class="form-group last mb-4">
                                    <input type="password" class="form-control" id="password" placeholder="Mật khẩu" name="pass_account" required>
                                </div>
                                <div class="d-flex mb-5 align-items-center">
                                    <label class="control control--checkbox mb-0"><span class="caption">Ghi nhớ</span>
                                        <input type="checkbox" checked="checked" />
                                        <div class="control__indicator"></div>
                                    </label>
                                    <span class="ml-auto"><a href="#" class="forgot-pass">Quên mật khẩu?</a></span>
                                </div>
                                <div class="d-grid gap-2">
                                    <?php

                                    use Illuminate\Support\Facades\Session;

                                    $message = Session::get('message');
                                    if ($message) {
                                        echo '<p class="text-danger text-center">';
                                        echo $message;
                                        echo ' </p>';
                                        Session::put('message', null);
                                    }
                                    ?>
                                    <button class="btn btn-primary" type="submit" name="createUser">Đăng nhập</button>
                                </div>
                                <span class="d-block text-center my-4 text-muted">&mdash; Đăng nhập với &mdash;</span>
                                <div class="social-login text-center">
                                    <a href="#" class="facebook">
                                        <span class="icon-facebook mr-3"></span>
                                    </a>
                                    <a href="#" class="twitter">
                                        <span class="icon-twitter mr-3"></span>
                                    </a>
                                    <a href="#" class="google">
                                        <span class="icon-google mr-3"></span>
                                    </a>
                                </div>
                                <div class="">
                                    <a href="{{URL::to('/')}}" class=""><i class="fa-solid fa-arrow-left"></i> Trở về</a>
                                    <a style="padding-left: 25%;">Bạn chưa có tài khoản?<a href="{{URL::to('/')}}" class=""> Đăng ký</a></a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('public/frontend/login/js/main.js')}}"></script>
    <script src="{{asset('public/frontend/login/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/login/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('public/frontend/login/js/popper.min.js')}}"></script>
</body>

</html>