
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ShopAz - Đăng ký tài khoản</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Tạo tài khoản!</h1>
                            <?php
                            $message = Session::get('message1');
                            if ($message) {
                                echo '<span style="color:#ff0000;font-size:17px;width: 100%;text-align: center;font-weight: bold;">' . $message . '</span>';
                                Session::put('message1', null);
                            }
                            ?>
                        </div>
                        <form class="user" action="{{URL::to('/add-customer')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="name" type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Họ và tên">
                                    @if($errors -> has('name'))
                                        <span style="color: red">
                                {{$errors -> first('name')}}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="phone" type="text" class="form-control form-control-user" id="exampleFirstName" placeholder="Số điện thoại">
                                    @if($errors -> has('phone'))
                                        <span style="color: red">
                                {{$errors -> first('phone')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email">
                                @if($errors -> has('email'))
                                    <span style="color: red">
                                {{$errors -> first('email')}}
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Mật khẩu">
                                    @if($errors -> has('password'))
                                        <span style="color: red">
                                {{$errors -> first('password')}}
                                    </span>
                                    @endif
                                </div>
                                <div class="col-sm-6">
                                    <input name="confirm_password" type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Nhập lại mật khẩu">
                                    @if($errors -> has('confirm_password'))
                                        <span style="color: red">
                                {{$errors -> first('confirm_password')}}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">Đăng ký</button>
                            <hr>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="forgot-password.html">Quên mật khẩu?</a>
                        </div>
                        <div class="text-center">
                            <a class="small" href="{{URL::to('login-user')}}">Bạn đã có tài khoản? Đăng nhập!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>
