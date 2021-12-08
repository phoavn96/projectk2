<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>ShopAz - Đăng nhập</title>
    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Chào mừng bạn quay trở lại!</h1>
                                    <?php
                                    $message = Session::get('message');
                                    if ($message) {
                                        echo '<span style="color:#ff0000;font-size:17px;width: 100%;text-align: center;font-weight: bold;">' . $message . '</span>';
                                        Session::put('message', null);
                                    }
                                    ?>
                                </div>
                                <form class="user" action="{{URL::to('/login-customer')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="login_email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Email đăng kí...">
{{--                                        @if($errors -> has('email'))--}}
{{--                                            <span style="color: red">--}}
{{--                                {{$errors -> first('email')}}--}}
{{--                                    </span>--}}
{{--                                        @endif--}}
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="login_password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mật khẩu">
{{--                                        @if($errors -> has('login_password'))--}}
{{--                                            <span style="color: red">--}}
{{--                                {{$errors -> first('login_password')}}--}}
{{--                                    </span>--}}
{{--                                        @endif--}}
                                    </div>
{{--                                    <div class="form-group">--}}
{{--                                        <div class="custom-control custom-checkbox small">--}}
{{--                                            <input type="checkbox" class="custom-control-input" id="customCheck">--}}
{{--                                            <label class="custom-control-label" for="customCheck">Nhớ tôi</label>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Đăng nhập</button>
                                    <hr>
                                </form>
                                <hr>
                                <div class="text-center">
{{--                                    <a class="small" href="forgot-password.html">Quên mật khẩu?</a>--}}
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{URL::to('register-user')}}">Tạo mới tài khoản!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

<!-- Core plugin JavaScript-->
<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

<!-- Custom scripts for all pages-->
<script src="{{asset('js/sb-admin-2.min.js')}}"></script>

</body>

</html>
