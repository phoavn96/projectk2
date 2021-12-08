<!DOCTYPE html>
<html lang="en"
      data-textdirection="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}"/>
    <title>@yield('title')</title>

    <link rel="shortcut icon" type="image/x-icon" href="images/logo/favicon.ico">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600">
    <link rel="stylesheet" href="{{asset('vendors/css/vendors.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/css/ui/prism.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>

    {{--    xu ly anh--}}
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    {{--    editor--}}

    <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>

    <!-- vendor css files -->
    @yield('vendor-style')
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-extended.css')}}">
    <link rel="stylesheet" href="{{asset('css/colors.css')}}">
    <link rel="stylesheet" href="{{asset('css/components.css')}}">
    <link rel="stylesheet" href="{{asset('css/themes/dark-layout.css')}}">
    <link rel="stylesheet" href="{{asset('css/themes/semi-dark-layout.css')}}">

    <link rel="stylesheet" href="{{asset('css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" href="{{asset('css/core/colors/palette-gradient.css')}}">

    <!-- Page css files -->
    @yield('page-style');

    <link rel="stylesheet" href="{{asset('css/custom-laravel.css')}}">
    <link href="{{asset('css/jquery.toast.css')}}" rel="stylesheet">

{{--    xac nhan thao tac yes no--}}
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">--}}
{{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</head>

<body
    class="vertical-layout vertical-menu-modern 2-columns     navbar-floating menu-expanded footer-static"
    data-menu="vertical-menu-modern" data-col="2-columns" data-layout="light">

<div
    class="main-menu menu-fixed menu-light menu-accordion menu-shadow"
    data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="{{URL::to('/dashboard')}}">
                    <div class="brand-logo"></div>
                    <h2 class="brand-text mb-0">Admin</h2>
                </a>
            </li>
            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="feather icon-x d-block d-xl-none font-medium-4 primary toggle-icon"></i>
                    <i class="toggle-icon feather icon-disc font-medium-4 d-none d-xl-block primary collapse-toggle-icon"
                       data-ticon="icon-disc">
                    </i>
                </a>
            </li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="nav-item  ">
                <a href="">
                    <i class="feather icon-home"></i>
                    <span class="menu-title" data-i18n="">Bảng điều khiển</span>
                </a>
                <ul class="menu-content">
                    <li class="nav-item">
                        <a href="{{URL::to('dashboard')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-title" data-i18n="">Phân tích</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="navigation-header">
                <span>Quản lý</span>
            </li>
            <li class="nav-item">
                <a href="">
                    <i class="feather icon-shopping-cart"></i>
                    <span class="menu-title" data-i18n="">Đơn hàng</span>
                </a>
                <ul class="menu-content">
                    <li class="">
                        <a href="{{URL::to('order-admin')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-title" data-i18n="">Danh sách đơn hàng</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  ">
                <a href="">
                    <i class="feather icon-archive"></i>
                    <span class="menu-title" data-i18n="">Sản phẩm</span>
                </a>
                <ul class="menu-content">
                    <li class="">
                        <a href="{{URL::to('/admin/product')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-title" data-i18n="">Danh sách sản phẩm</span>
                        </a>
                    </li>
                </ul>
                <ul class="menu-content">
                    <li class="">
                        <a href="{{URL::to('/admin/product/create')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-title" data-i18n="">Thêm sản phẩm</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <a href="">
                    <i class="feather icon-package"></i>
                    <span class="menu-title" data-i18n="">Danh mục</span>
                </a>
                <ul class="menu-content">
                    <li class="">
                        <a href="{{URL::to('/admin/categories')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-title" data-i18n="">Danh mục sản phẩm</span>
                        </a>
                    </li>
                </ul>
                <ul class="menu-content">
                    <li class="">
                        <a href="{{URL::to('/admin/categories/create')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-title" data-i18n="">Thêm Danh mục</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="">
                    <i class="feather icon-box"></i>
                    <span class="menu-title" data-i18n="">Thương hiệu</span>
                </a>
                <ul class="menu-content">
                    <li class="">
                        <a href="{{URL::to('/admin/brand')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-title" data-i18n="">Danh mục thương hiệu</span>
                        </a>
                    </li>
                </ul>
                <ul class="menu-content">
                    <li class="">
                        <a href="{{URL::to('/admin/brand/create')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-title" data-i18n="">Thêm Thương hiệu</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="">
                    <i class="feather icon-list"></i>
                    <span class="menu-title" data-i18n="">Mã giảm giá</span>
                </a>
                <ul class="menu-content">
                    <li class="">
                        <a href="{{URL::to('/admin/discount')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-title" data-i18n="">Danh sách mã giảm giá</span>
                        </a>
                    </li>
                </ul>
                <ul class="menu-content">
                    <li class="">
                        <a href="{{URL::to('/admin/discount/create')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-title" data-i18n="">Thêm mã giảm giá</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="">
                    <i class="feather icon-list"></i>
                    <span class="menu-title" data-i18n="">Câu hỏi người dùng</span>
                </a>
                <ul class="menu-content">
                    <li class="">
                        <a href="{{URL::to('admin/qa/list')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-title" data-i18n="">Danh sách câu hỏi</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="">
                    <i class="feather icon-list"></i>
                    <span class="menu-title" data-i18n="">Quản lý banner</span>
                </a>
                <ul class="menu-content">
                    <li class="">
                        <a href="{{URL::to('/admin/banner')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-title" data-i18n="">Danh sánh banner</span>
                        </a>
                    </li>
                </ul>
                <ul class="menu-content">
                    <li class="">
                        <a href="{{URL::to('/admin/banner/create')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-title" data-i18n="">Tạo banner</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="/admin/ads">
                    <i class="feather icon-mail"></i>
                    <span class="menu-title" data-i18n="">Quảng cáo</span>
                </a>
            </li>

            <li class="navigation-header">
                <span>Tài Khoản</span>
            </li>
            <li class="nav-item">
                <a href="">
                    <i class="feather icon-unlock"></i>
                    <span class="menu-title" data-i18n="">Người dùng</span>
                </a>
                <ul class="menu-content">
                    <li class="">
                        <a href="{{URL::to('/admin/accounts')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-title" data-i18n="">Danh sách tài khoản</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{URL::to('/admin/accounts/create')}}">
                            <i class="feather icon-circle"></i>
                            <span class="menu-title" data-i18n="">Tạo tài khoản</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div class="app-content content">
    <!-- BEGIN: Header-->
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <nav
        class="header-navbar navbar-expand-lg navbar navbar-with-menu floating-nav navbar-light navbar-shadow ">
        <div class="navbar-wrapper">
            <div class="navbar-container content">
                <div class="navbar-collapse" id="navbar-mobile">
                    <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
                        <ul class="nav navbar-nav">
                            <li class="nav-item mobile-menu d-xl-none mr-auto"><a
                                    class="nav-link nav-menu-main menu-toggle hidden-xs"
                                    href="#"><i class="ficon feather icon-menu"></i></a></li>
                        </ul>

                    </div>
                    <ul class="nav navbar-nav float-right">
                        {{--icon full màn hình--}}
                        <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i
                                    class="ficon feather icon-maximize"></i></a></li>

                        <li class="dropdown dropdown-user nav-item"><a
                                class="dropdown-toggle nav-link dropdown-user-link" href="#"
                                data-toggle="dropdown">
                                <div class="user-nav d-sm-flex d-none"><span class="user-name text-bold-600">
                                        {{\Illuminate\Support\Facades\Session::get('admin_name')}}
                                    </span><span class="user-status">Hoạt động</span></div>
                                <span><img class="round"
                                           src="https://img2.thuthuatphanmem.vn/uploads/2019/01/04/beautiful-girl_025102199.jpg"
                                           alt="avatar" height="40"
                                           width="40"/></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="{{URL::to('/logout-adm')}}">
                                    <i class="feather icon-power"></i> Đăng xuất
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <!-- END: Header-->
    <div class="content-wrapper">
        <div class="content-body">

        {{-- Dashboard Analytics Start --}}

        @yield('content')

        <!-- Dashboard Analytics end -->


        </div>
    </div>
</div>
<!-- End: Content-->


<!-- BEGIN: Footer-->
<footer
    class="footer footer-static  footer-light">
    <p class="clearfix blue-grey lighten-2 mb-0">
        {{--nút đẩy lên phía trên--}}
        <button class="btn btn-primary btn-icon scroll-top" type="button"><i
                class="feather icon-arrow-up"></i></button>
    </p>
</footer>
<!-- END: Footer-->

<script src="{{asset('vendors/js/vendors.min.js')}}"></script>
<script src="{{asset('vendors/js/ui/prism.min.js')}}"></script>

<!-- vendor files -->
@yield('vendor-script')
{{--<script type="text/javascript" src="{{asset('plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>--}}
<script src="{{asset('js/core/app-menu.js')}}"></script>
<script src="{{asset('js/core/app.js')}}"></script>
<script src="{{asset('js/scripts/components.js')}}"></script>
<script src="{{asset('js/scripts/customizer.js')}}"></script>
<script src="{{asset('js/scripts/footer.js')}}"></script>
<script src="{{asset('js/jquery.toast.js')}}"></script>



<!-- Page js files -->
@yield('page-script')


</body>
</html>
