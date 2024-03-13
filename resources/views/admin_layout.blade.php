<!DOCTYPE html>

<head>
    <title>Quản trị viên</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript">
        addEventListener("load", function() {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet" />
    <link href="{{asset('public/backend/css/font.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet" rel="stylesheet">
    <link href="css/monthly.css" rel="stylesheet">
    <link href="{{asset('public/backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/backend/css/sweetalert.css')}}" rel="stylesheet">

    <style>
        .menu {
            height: 100%;
            background-color: white;
            background-size: cover;
            opacity: 0.9;
        }
    </style>

</head>

<body>
    <div class="menu">
        <section id="container">
            <header class="header fixed-top clearfix ">
                <div class="brand">
                    <img src="{{URL::to('/public/backend/images/admin.png')}}" alt="">
                    <a href="{{URL::to('/dashboard')}}" class="logo">
                        Quản trị viên
                    </a>
                    <div class="sidebar-toggle-box">
                        <div class="fa fa-bars"></div>
                    </div>
                </div>
                <div class="top-nav clearfix">
                    <div class="icon-header">
                        <a href=""><i class="fa-regular fa-envelope icon1"></i></a>
                        <a href=""><i class="fa-regular fa-bell icon1"></i></a>
                        <a href=""><i class="fa-regular fa-newspaper icon1"></i></a>
                    </div>
                    <ul class="nav pull-right top-menu">
                        <li class="dropdown">
                            <button class="btn btn-light dropdown-toggle user-admin" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-circle-user"></i>
                                <span class="username">
                                    <?php

                                    use Illuminate\Support\Facades\Session;

                                    $name = Session::get('admin_name');
                                    if ($name) {
                                        echo  $name;
                                    }
                                    ?>
                                </span>
                            </button>
                            <ul class="dropdown-menu extended logout">
                                <li><a class="dropdown-item" href="#"><i class="fa-solid fa-user"></i> Cá nhân</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fa fa-cog"></i> Cài đặt</a></li>
                                <li><a class="dropdown-item" href="{{URL::to('/logout')}}"><i class="fa-solid fa-right-from-bracket"></i> Đăng xuất</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </header>
            <aside>
                <div id="sidebar" class="nav-collapse">
                    <div class="leftside-navigation">
                        <ul class="sidebar-menu" id="nav-accordion">
                            <li class="sub-menu">
                                <a class="active" href="{{URL::to('dashboard')}}">
                                    <i class="fa-solid fa-house"></i>
                                    <span>Tổng quan</span>
                                </a>
                            </li>
                            <div class="sidebar-heading">
                                Quản lý
                            </div>
                            <li class="sub-menu">
                                <a href="{{URL::to('/manage-slider')}}">
                                    <i class="fa-solid fa-flag"></i>
                                    <span>Banner</span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="{{URL::to('/all-category-product')}}">
                                    <i class="fa-solid fa-layer-group"></i>
                                    <span>Danh mục</span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="{{URL::to('/all-brand-product')}}">
                                    <i class="fa-solid fa-copyright"></i>
                                    <span>Thương hiệu</span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="{{URL::to('/all-product')}}">
                                    <i class="fa-brands fa-product-hunt"></i>
                                    <span>Sản phẩm</span>
                                </a>
                            </li>
                            <div class="sidebar-heading">
                                Chi phí
                            </div>
                            <li class="sub-menu">
                                <a href="{{URL::to('/list-coupon')}}">
                                    <i class="fa-solid fa-ticket"></i>
                                    <span>Mã giảm giá</span>
                                </a>
                            </li>
                            <li class="sub-menu">
                                <a href="{{URL::to('/show-delivery')}}">
                                    <i class="fa-solid fa-dollar-sign"></i>
                                    <span>Phí vận chuyển</span>
                                </a>
                            </li>
                            <div class="sidebar-heading">
                                Khách hàng
                            </div>
                            <li class="sub-menu">
                                <a href="{{URL::to('/manage-order')}}">
                                    <i class="fa-solid fa-cart-flatbed"></i>
                                    <span>Đơn đặt hàng</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
            <section id="main-content">
                <section class="wrapper">
                    @yield('admin_content')
                </section>
                <div class="footer">
                    <div class="wthree-copyright">
                        <p>© 2024 Lê Kim Ngọc - CK22V7K516 <a></a></p>
                    </div>
                </div>
            </section>
        </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/backend/js/raphael-min.js')}}"></script>
    <script type="text/javascript" src="{{asset('public/backend/js/morris.js')}}"></script>
    <script src="{{asset('public/backend/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{asset('public/backend/js/scripts.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery.validate.js')}}"></script>
    <script src="{{asset('public/backend/js/jquery-1.11.1.js')}}"></script>
    <script src="{{asset('public/backend/js/sweetalert.min.js')}}"></script>

    <script src="{{asset('public/backend/ckeditor5/ckeditor.js')}}"></script>
    <script type="text/javascript">
        ClassicEditor
            .create(document.querySelector('#ckeditor_add_product'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            })
        ClassicEditor
            .create(document.querySelector('#ckeditor_edit_product'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            })
    </script>



    <script type="text/javascript">
        $('.update_quantity_order').click(function() {
            var order_product_id = $(this).data('product_id');
            var order_qty = $('.order_qty_' + order_product_id).val();
            var order_code = $('.order_code').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{url('/update-qty')}}",
                method: 'POST',
                data: {
                    order_product_id: order_product_id,
                    order_qty: order_qty,
                    order_code: order_code,
                    _token: _token,
                },
                success: function(data) {
                    swal("Thông báo!", "Đã cập nhật lại số lượng sản phẩm!")
                    init_reload();

                    function init_reload() {
                        setInterval(function() {
                            window.location.reload();
                        }, 1500);
                    }
                }
            });
        });
    </script>
    <script type="text/javascript">
        $('.order_details').change(function() {
            var order_status = $(this).val();
            var order_id = $(this).children(":selected").attr("id");
            var _token = $('input[name="_token"]').val();
            //lay so luong
            quantity = [];
            $("input[name='product_sales_quantity']").each(function() {
                quantity.push($(this).val());
            });
            //lay product_id
            order_product_id = [];
            $("input[name='order_product_id']").each(function() {
                order_product_id.push($(this).val());
            });
            j = 0;
            for (i = 0; i < order_product_id.length; i++) {
                var order_qty = $('.order_qty_' + order_product_id[i]).val();
                var order_qty_storage = $('.order_qty_storage_' + order_product_id[i]).val();
                if (parseInt(order_qty) > parseInt(order_qty_storage)) {
                    j = j + 1;
                    if (j == 1) {
                        alert("Số lượng sản phẩm trong kho không đủ");
                    }
                    $('.color_qty_' + order_product_id[i]).css('background-color', 'orange');
                }
            }
            if (j == 0) {
                if (order_status == 3) {
                    swal({
                            title: "Thông báo xác nhận!",
                            text: "Sau khi huỷ, sẽ không thể chỉnh sửa đơn hàng này. Bạn có chắc là muốn tiếp tục?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Xác nhận",
                            cancelButtonText: "Suy nghĩ lại",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                $.ajax({
                                    url: "{{url('/update-order-quantity')}}",
                                    method: 'POST',
                                    data: {
                                        order_status: order_status,
                                        order_id: order_id,
                                        _token: _token,
                                        quantity: quantity,
                                        order_product_id: order_product_id
                                    },
                                    success: function(data) {
                                        swal("Thông báo!", "Huỷ đơn hành thành công!")
                                        init_reload();
                                    }
                                });
                            } else {
                                swal("Thông báo!", "Thao tác đã bị huỷ", "error");
                                init_reload()
                            }
                        });
                } else {
                    $.ajax({
                        url: "{{url('/update-order-quantity')}}",
                        method: 'POST',
                        data: {
                            order_status: order_status,
                            order_id: order_id,
                            _token: _token,
                            quantity: quantity,
                            order_product_id: order_product_id
                        },
                        success: function(data) {
                            if (order_status == 1) {
                                swal("Thông báo!", "Đã chuyển đơn hàng về trạng thái chưa xử lý!")
                                init_reload();
                            } else {
                                swal("Thông báo!", "Đơn hàng đã được xử lý!")
                                init_reload();
                            }
                        }
                    });
                }
            }

            function init_reload() {
                setInterval(function() {
                    window.location.reload();
                }, 1500);
            }
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            fetch_delivery();

            function fetch_delivery() {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{url('/select-feeship')}}",
                    method: 'POST',
                    data: {
                        _token: _token
                    },
                    success: function(data) {
                        $('#load_delivery').html(data);
                    }
                });
            }
            $(document).on('blur', '.fee_feeship_edit', function() {
                var feeship_id = $(this).data('feeship_id');
                var fee_value = $(this).text();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{url('/update-delivery')}}",
                    method: 'POST',
                    data: {
                        feeship_id: feeship_id,
                        fee_value: fee_value,
                        _token: _token
                    },
                    success: function(data) {
                        swal("Lưu thành công!", "Phí vận chuyển đã được cập nhật", "success");
                        fetch_delivery();
                    }
                });
            });
            $('.add_delivery').click(function() {
                var city = $('.city').val();
                var province = $('.province').val();
                var wards = $('.wards').val();
                var feeship = $('.fee_ship').val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{url('/insert-delivery')}}",
                    method: 'POST',
                    data: {
                        city: city,
                        province: province,
                        wards: wards,
                        feeship: feeship,
                        _token: _token
                    },
                    success: function(data) {
                        swal("Thêm thành công", "", "success");
                        init_reload();

                        function init_reload() {
                            setInterval(function() {
                                window.location.reload();
                            }, 2000);
                        }
                    }
                });
            });
            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = "";
                // alert(action);
                // alert(matp);
                // alert(_token);
                if (action == 'city') {
                    result = 'province';
                } else {
                    result = 'wards';
                }
                $.ajax({
                    url: "{{url('/select-delivery')}}",
                    method: 'POST',
                    data: {
                        action: action,
                        ma_id: ma_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });
        })
    </script>
    <script type="text/javascript">
        $.validator.setDefaults({
            submitHandler: function() {
                alert("submitted!");
            }
        });

        $(document).ready(function() {
            $("#signupForm").validate({
                rules: {
                    firstname: "required",
                    lastname: "required",
                    username: {
                        required: true,
                        minlength: 2
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password"
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    agree: "required"
                },
                messages: {
                    firstname: "Please enter your firstname",
                    lastname: "Please enter your lastname",
                    username: {
                        required: "Please enter a username",
                        minlength: "Your username must consist of at least 2 characters"
                    },
                    password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    confirm_password: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "Please enter the same password as above"
                    },
                    email: "Please enter a valid email address",
                    agree: "Please accept our policy"
                },
                errorElement: "em",
                errorPlacement: function(error, element) {
                    // Add the `help-block` class to the error element
                    error.addClass("help-block");

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else {
                        error.insertAfter(element);
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
                }
            });

            $("#signupForm1").validate({
                rules: {
                    firstname1: "required",
                    lastname1: "required",
                    username1: {
                        required: true,
                        minlength: 2
                    },
                    password1: {
                        required: true,
                        minlength: 5
                    },
                    confirm_password1: {
                        required: true,
                        minlength: 5,
                        equalTo: "#password1"
                    },
                    email1: {
                        required: true,
                        email: true
                    },
                    agree1: "required"
                },
                messages: {
                    firstname1: "Please enter your firstname",
                    lastname1: "Please enter your lastname",
                    username1: {
                        required: "Please enter a username",
                        minlength: "Your username must consist of at least 2 characters"
                    },
                    password1: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long"
                    },
                    confirm_password1: {
                        required: "Please provide a password",
                        minlength: "Your password must be at least 5 characters long",
                        equalTo: "Please enter the same password as above"
                    },
                    email1: "Please enter a valid email address",
                    agree1: "Please accept our policy"
                },
                errorElement: "em",
                errorPlacement: function(error, element) {
                    // Add the `help-block` class to the error element
                    error.addClass("help-block");

                    // Add `has-feedback` class to the parent div.form-group
                    // in order to add icons to inputs
                    element.parents(".col-sm-5").addClass("has-feedback");

                    if (element.prop("type") === "checkbox") {
                        error.insertAfter(element.parent("label"));
                    } else {
                        error.insertAfter(element);
                    }

                    // Add the span element, if doesn't exists, and apply the icon classes to it.
                    if (!element.next("span")[0]) {
                        $("<span class='glyphicon glyphicon-remove form-control-feedback'></span>").insertAfter(element);
                    }
                },
                success: function(label, element) {
                    // Add the span element, if doesn't exists, and apply the icon classes to it.
                    if (!$(element).next("span")[0]) {
                        $("<span class='glyphicon glyphicon-ok form-control-feedback'></span>").insertAfter($(element));
                    }
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-error").removeClass("has-success");
                    $(element).next("span").addClass("glyphicon-remove").removeClass("glyphicon-ok");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).parents(".col-sm-5").addClass("has-success").removeClass("has-error");
                    $(element).next("span").addClass("glyphicon-ok").removeClass("glyphicon-remove");
                }
            });
        });
    </script>
    <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
    <script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
    <!-- morris JavaScript -->
    <script>
        $(document).ready(function() {
            //BOX BUTTON SHOW AND CLOSE
            jQuery('.small-graph-box').hover(function() {
                jQuery(this).find('.box-button').fadeIn('fast');
            }, function() {
                jQuery(this).find('.box-button').fadeOut('fast');
            });
            jQuery('.small-graph-box .box-close').click(function() {
                jQuery(this).closest('.small-graph-box').fadeOut(200);
                return false;
            });

            //CHARTS
            function gd(year, day, month) {
                return new Date(year, month - 1, day).getTime();
            }

            graphArea2 = Morris.Area({
                element: 'hero-area',
                padding: 10,
                behaveLikeLine: true,
                gridEnabled: false,
                gridLineColor: '#dddddd',
                axes: true,
                resize: true,
                smooth: true,
                pointSize: 0,
                lineWidth: 0,
                fillOpacity: 0.85,
                data: [{
                        period: '2015 Q1',
                        iphone: 2668,
                        ipad: null,
                        itouch: 2649
                    },
                    {
                        period: '2015 Q2',
                        iphone: 15780,
                        ipad: 13799,
                        itouch: 12051
                    },
                    {
                        period: '2015 Q3',
                        iphone: 12920,
                        ipad: 10975,
                        itouch: 9910
                    },
                    {
                        period: '2015 Q4',
                        iphone: 8770,
                        ipad: 6600,
                        itouch: 6695
                    },
                    {
                        period: '2016 Q1',
                        iphone: 10820,
                        ipad: 10924,
                        itouch: 12300
                    },
                    {
                        period: '2016 Q2',
                        iphone: 9680,
                        ipad: 9010,
                        itouch: 7891
                    },
                    {
                        period: '2016 Q3',
                        iphone: 4830,
                        ipad: 3805,
                        itouch: 1598
                    },
                    {
                        period: '2016 Q4',
                        iphone: 15083,
                        ipad: 8977,
                        itouch: 5185
                    },
                    {
                        period: '2017 Q1',
                        iphone: 10697,
                        ipad: 4470,
                        itouch: 2038
                    },

                ],
                lineColors: ['#eb6f6f', '#926383', '#eb6f6f'],
                xkey: 'period',
                redraw: true,
                ykeys: ['iphone', 'ipad', 'itouch'],
                labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
                pointSize: 2,
                hideHover: 'auto',
                resize: true
            });


        });
    </script>
    <!-- calendar -->
    <script type="{{asset('public/backend/text/javascript')}}" src="js/monthly.js"></script>
    <script type="text/javascript">
        $(window).load(function() {
            $('#mycalendar').monthly({
                mode: 'event',
            });
            $('#mycalendar2').monthly({
                mode: 'picker',
                target: '#mytarget',
                setWidth: '250px',
                startHidden: true,
                showTrigger: '#mytarget',
                stylePast: true,
                disablePast: true
            });
            switch (window.location.protocol) {
                case 'http:':
                case 'https:':
                    // running on a server, should be good.
                    break;
                case 'file:':
                    alert('Just a heads-up, events will not work when run locally.');
            }

        });
    </script>
    <!-- //calendar -->
</body>

</html>