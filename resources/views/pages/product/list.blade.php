<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <title>ShopAz</title>
    <!-- Fonts-->
    <link
        href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900"
        rel="stylesheet">
    <link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/ps-icon/style.css')}}">
    <!-- CSS Library-->
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins//owl-carousel/assets/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/slick/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap-select/dist/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/Magnific-Popup/dist/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/jquery-ui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/revolution/css/settings.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/revolution/css/layers.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/revolution/css/navigation.css')}}">
    <link rel="stylesheet" href="{{asset('resources\sass\elements\_shoe.scss')}}">
    <!-- Custom-->
    <link rel="stylesheet" href="{{asset('plugins/css/style.css')}}">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->

    <link href="{{asset('css/jquery.toast.css')}}" rel="stylesheet">

</head>
<body class="ps-loading">
<div class="header--sidebar"></div>
<header class="header">
    <div class="header__top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                    <p>8 Tôn Thất Thuyết, Mỹ Đình, Từ Liêm, Hà Nội - Hotline: 039-980-7181</p>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                    @if(Session::has('customer_id'))
                        <div class="header__actions">
                            <div class="btn-group ps-dropdown">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true"
                                   aria-expanded="false">{{Session::get('customer_username')}}
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Thông tin tài khoản</a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('/order-management')}}">Thông tin đơn hàng</a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('/logout-checkout')}}">Đăng xuất</a>
                                    </li>
                                </ul>
                            </div>
                            @else
                            <div class="header__actions"><a href="{{URL::to('/login-user')}}">Đăng nhập & Đăng ký</a>
                            @endif
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navigation">
        <div class="container-fluid">
            <div class="navigation__column left">
                <div class="header__logo"><a class="ps-logo" href="/"><img src="{{asset('images/logo.png')}}"
                                                                                    alt=""></a></div>
            </div>
            <div class="navigation__column center">
                <ul class="main-menu menu">
                    <li class="menu-item menu-item-has-children dropdown"><a href="/">Trang chủ</a>
                    </li>
                    <li class="menu-item menu-item-has-children dropdown"><a href="/san-pham">Sản Phẩm</a>
                    </li>
                    <li class="menu-item menu-item-has-children dropdown"><a href="blog">Tin Tức</a>
                        <ul class="sub-menu">
                            <li class="menu-item menu-item-has-children dropdown"><a href="/blog">Blog</a>
                            </li>
                            <li class="menu-item menu-item-has-children dropdown"><a href="/aboutus">Về chúng tôi</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu-item menu-item-has-children dropdown"><a href="/qa">Q&A</a>
                    </li>
                    </li>
                    <li class="menu-item menu-item-has-children dropdown"><a href="/contactus">Liên hệ</a>
                    </li>
                </ul>
            </div>
            <div class="navigation__column right">
                <div class="row">
                    <div class="col-md-6">
                        <form class="ps-search--widget" action="/san-pham" method="get" id="product_form"
                              style="margin-top: 25px">
                            <input class="form-control" @if(isset($keyword)) value="{{$keyword}} @endif" type="text"
                                   name="keyword" placeholder="Tìm kiếm sản phẩm…">
                            <button><i class="ps-icon-search"></i></button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        @if(!\Illuminate\Support\Facades\Session::has('customer_id'))
                            <a class="ps-cart__toggle" href="{{URL::to('/login-user')}}">
                                <span><i>0</i></span>
                                <i class="ps-icon-heart"></i>
                            </a>
                        @endif
                        @if(\Illuminate\Support\Facades\Session::has('customer_id'))
                            <?php
                            $whishs = \App\Whish::all()->where('user_id', '=', Session::get('customer_id'));
                            $count = count($whishs);
                            ?>
                            <a class="ps-cart__toggle" href="{{URL::to('/whishlist')}}">
                            <span><i id="count-whishlist">{{$count}}</i>
                            </span><i class="ps-icon-heart"></i>
                            </a>
                        @endif
                            @if(!\Illuminate\Support\Facades\Session::has('customer_id'))
                                <?php
                                $compares = \App\compare_free::all()->where('status', '=', 1);
                                $count = count($compares);
                                ?>
                                <a class="ps-cart__toggle" href="{{URL::to('/comparelistFree')}}"><span><i
                                            id="count-comparelist">{{$count}}</i></span><i
                                        class="">#</i></a>
                            @endif
                            @if(\Illuminate\Support\Facades\Session::has('customer_id'))
                                <?php
                                $compares = \App\Compare::all()->where('user_id', '=', Session::get('customer_id'));
                                $count = count($compares);
                                ?>
                                <a class="ps-cart__toggle" href="{{URL::to('/comparelist')}}"><span><i
                                            id="count-comparelist">{{$count}}</i></span><i
                                        class="">#</i></a>
                            @endif
                        <div class="ps-cart" id="themcart">
                            @php
                                $totalMoney = 0;
                                    $count_quantity = 0;
                            $shoppingCart = Session::get('shoppingCart');
                            @endphp
                            <a class="ps-cart__toggle">
                            <span>
                                <i>
                                    @if($shoppingCart != null)
                                        {{sizeof($shoppingCart)}}
                                    @else
                                        0
                                    @endif
                                </i>
                            </span>
                                <i class="ps-icon-shopping-cart"></i>
                            </a>
                            <div class="ps-cart__listing">
                                @if(Session::has('shoppingCart')!=null)
                                    @foreach($shoppingCart as $key => $cartItem)
                                        <div class="ps-cart__content">
                                            <div class="ps-cart-item">
                                                <div class="ps-cart-item__thumbnail">
                                                    <a href="/chi-tiet-san-pham/{{$cartItem['id']}}"></a>
                                                    <img src="{{$cartItem['thumbnail']}}" alt="">
                                                </div>
                                                <div class="ps-cart-item__content">
                                                    <a class="ps-cart-item__title"
                                                       href="/chi-tiet-san-pham/{{$cartItem['id']}}">{{$cartItem['product_name']}}</a>
                                                    <p>
                                                    <span>Số lượng:
                                                        <i>{{$cartItem['quantity']}}</i>
                                                    </span> &nbsp;
                                                        <span>Tạm tính:<i>{{number_format($cartItem['quantity'] * $cartItem['product_price']).' VNĐ'}}
                                                                @php
                                                                    $totalMoney += $cartItem['quantity'] * $cartItem['product_price'];
                                                                    $count_quantity += $cartItem['quantity'];
                                                                @endphp</i></span></p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="ps-cart__total">
                                        <p>Tổng số sản phẩm:<span>{{$count_quantity}}</span></p>
                                        <p>Tổng tiền:<span>{{number_format($totalMoney).' VNĐ'}}</span></p>
                                    </div>
                                    <div class="ps-cart__footer">
                                        <a class="ps-btn" href="{{URL::to('shopping-cart/show')}}">Thanh toán<i
                                                class="ps-icon-arrow-left"></i></a>
                                    </div>
                                @else
                                    <div style="text-align: center">Bạn chưa chọn mua sản phẩm nào</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="menu-toggle"><span></span></div>
                </div>
            </div>
        </div>
    </nav>
</header>
<main class="ps-main">
    <form action="/san-pham" method="get" id="product_form">
        <div class="form-body">

            <div class="ps-products-wrap pt-80 pb-80">

                <div class="ps-products" data-mh="product-listing">
                    <div class="ps-product-action">
                        <div class="ps-product__filter">
                            <div style="margin-top: 20px">
                                <input class="form-control ps-select selectpicker"
                                       @if(isset($keyword)) value="{{$keyword}}" @endif type="text"
                                       name="keyword" placeholder="Tìm kiếm sản phẩm" id="search-1">
                            </div>
                            <div style="margin-top: 20px;">
                                <select class="ps-select selectpicker" onchange="this.form.submit()" id="sort_by"
                                        name="sort_by">
                                    <option value="0">Sắp xếp theo</option>
                                    <option value="1" {{$sort_by== 1 ? 'selected':''}}>Tên (A-Z)</option>
                                    <option value="2" {{$sort_by== 2 ? 'selected':''}}>Tên (Z-A)</option>
                                    <option value="3" {{$sort_by== 3 ? 'selected':''}}>Giá (Thấp đến cao)</option>
                                    <option value="4" {{$sort_by== 4 ? 'selected':''}}>Giá (Cao đến thấp)</option>
                                </select>
                            </div>


                        </div>
                    </div>


                    <div class="ps-product__columns">

                        @foreach($all_product as $key =>$product)
                            <div class="ps-product__column">
                                <div class="ps-shoe mb-30">
                                    <div class="ps-shoe__thumbnail">

{{--                                        <div class="ps-badge"><span>New</span></div>--}}
{{--                                        <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-35%</span></div>--}}
                                        @if(\Illuminate\Support\Facades\Session::has('customer_id'))
                                            <a class="ps-shoe__favorite " style="margin-top: 70px!important;" href="javascript:"  onclick="addComparelist({{\Illuminate\Support\Facades\Session::get('customer_id')}},{{$product->id}})"  style="xmargin-top: 30px">
                                                <i class="fas fa-compress-alt">#</i>
                                            </a>
                                        @endif
                                        @if(!\Illuminate\Support\Facades\Session::has('customer_id'))
                                            <a class="ps-shoe__favorite " style="margin-top: 70px!important;" href="javascript:" onclick="addComparelistFree({{$product->id}})"  style="xmargin-top: 30px">
                                                <i class="fas fa-compress-alt">#</i>
                                            </a>
                                        @endif
                                        @if(!\Illuminate\Support\Facades\Session::has('customer_id'))
                                            <a class="ps-shoe__favorite" href="/login-user"><i
                                                    class="ps-icon-heart"></i></a>
                                        @endif
                                        @if(\Illuminate\Support\Facades\Session::has('customer_id'))
                                            <a class="ps-shoe__favorite whishlist-icon" href="javascript:" onclick="addwhishlist({{\Illuminate\Support\Facades\Session::get('customer_id')}},{{$product->id}})"  ><i class="ps-icon-heart"></i></a>

                                        @endif

                                        <a class="ps-shoe__favorite add-to-cart" style="margin-top: 35px!important;"
                                           onclick="add({{$product->id}})" href="javascript:"><i
                                                class="ps-icon-shopping-cart"></i></a><img
                                            src={{$product->large_photo}} height="300px" alt=""><a
                                            class="ps-shoe__overlay"
                                            href="{{URL::to('/chi-tiet-san-pham/'.$product->id)}}"></a>
                                    </div>
                                    <div class="ps-shoe__content">
                                        <div class="ps-shoe__variants">
                                            <div class="ps-shoe__variant normal">
                                                @foreach($product ->large_photos as $p)
                                                    <img src="{{$p}}" alt="" style="height: 60px;">
                                                @endforeach
                                            </div>
                                            <select class="ps-rating ps-shoe__rating">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select>
                                        </div>
                                        <div class="ps-shoe__detail"><a class="ps-shoe__name"
                                                                        href="{{URL::to('/chi-tiet-san-pham/'.$product->id)}}">{{$product->product_name}}</a>
                                            <p class="ps-shoe__categories"><a
                                                    href="#">{{$product->category->name}}</a>,<a href="#">
                                                    {{$product->brand->brand_name}}</a></p><span
                                                class="ps-shoe__price">
                      <del>{{number_format($product->product_price *1.35).' VNĐ'}}</del> {{number_format($product->product_price).' VNĐ'}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <span class="text-center"> {{$all_product->links()}}</span>

                </div>

                <div class="ps-sidebar" data-mh="product-listing">
                    <aside class="ps-widget--sidebar ps-widget--category">
                        <div class="ps-widget__header">
                            <h3>Thể loại</h3>
                        </div>
                        <div class="ps-widget__content">


                            <select onchange="this.form.submit()" name="category_id" class="ps-select selectpicker"
                                    id="categorySelect">
                                <option value="0">All</option>
                                @foreach($all_category as $key => $category)
                                    <option
                                        value="{{$category->id}}" {{$category->id == $category_id ? 'selected':''}}>{{$category->name}}
                                        ({{$category->product->count()}})
                                    </option>
                                @endforeach
                            </select>


                        </div>
                    </aside>
                    <aside class="ps-widget--sidebar ps-widget--filter">
                        <div class="ps-widget__header">
                            <h3>Giá</h3>
                        </div>
                        <div class="ps-widget__content">
                            <div class="ac-slider"
                                 @if(asset($price_min)&& $price_min!='')data-default-min="{{$price_min}}"
                                 @else data-default-min="0" @endif
                                 @if(asset($price_max)&& $price_max!='')data-default-max="{{$price_max}}"
                                 @else data-default-max="50000000" @endif
                                 data-max="50000000"
                                 data-step="100000" data-unit="VNĐ"></div>
                            <p class="ac-slider__meta">Price:
                                <span
                                    class="ac-slider__value ac-slider__min">
                                </span>-
                                <span
                                    class="ac-slider__value ac-slider__max">
                                </span>
                            </p>
                            <input  type="hidden" name="price_min" id="price_min">
                            <input type="hidden" name="price_max" id="price_max">
                            <button class="ac-slider__filter ps-btn">Filter</button>
                        </div>
                    </aside>
                    <aside class="ps-widget--sidebar ps-widget--category">
                        <div class="ps-widget__header">
                            <h3>Hãng sản xuất</h3>
                        </div>
                        <div class="ps-widget__content">
                            <select onchange="this.form.submit()" name="brand_id" class="ps-select selectpicker"
                                    id="brandSelect">
                                <option value="0">All</option>
                                @foreach($all_brand as $key => $brand)
                                    <option
                                        value="{{$brand->id}}" {{$brand->id == $brand_id ? 'selected':''}}>{{$brand->brand_name}}
                                        ({{$brand->product->count()}})
                                    </option>
                                @endforeach
                            </select>

                        </div>
                    </aside>

                    <div class="ps-sticky desktop">
                        <aside class="ps-widget--sidebar">


                        </aside>

                    </div>
                    <!--aside.ps-widget--sidebar-->
                    <!--    .ps-widget__header: h3 Ads Banner-->
                    <!--    .ps-widget__content-->
                    <!--        a(href='product-listing'): img(src="images/offer/sidebar.jpg" alt="")-->
                    <!---->
                    <!--aside.ps-widget--sidebar-->
                    <!--    .ps-widget__header: h3 Best Seller-->
                    <!--    .ps-widget__content-->
                    <!--        - for (var i = 0; i < 3; i ++)-->
                    <!--            .ps-shoe--sidebar-->
                    <!--                .ps-shoe__thumbnail-->
                    <!--                    a(href='#')-->
                    <!--                    img(src="images/shoe/sidebar/"+(i+1)+".jpg" alt="")-->
                    <!--                .ps-shoe__content-->
                    <!--                    if i == 1-->
                    <!--                        a(href='#').ps-shoe__title Nike Flight Bonafide-->
                    <!--                    else if i == 2-->
                    <!--                        a(href='#').ps-shoe__title Nike Sock Dart QS-->
                    <!--                    else-->
                    <!--                        a(href='#').ps-shoe__title Men's Sky-->
                    <!--                    p <del> £253.00</del> £152.00-->
                    <!--                    a(href='#').ps-btn PURCHASE-->
                </div>
            </div>


        </div>
    </form>
</main>


<div class="ps-subscribe">
    <div class="ps-container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 ">
                <h3><i class="fa fa-envelope"></i>Subscribe</h3>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12 ">
                <form class="ps-subscribe__form" action="do_action" method="post">
                    <input class="form-control" type="text" placeholder="">
                    <button>Đăng ký ngay</button>
                </form>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 ">
                <p>...và nhận coupon <span>  200.000 VNĐ  </span> cho lần mua đầu tiên.</p>
            </div>
        </div>
    </div>
</div>
<div class="ps-footer bg--cover" data-background="{{asset('images/background/parallax.jpg')}}">
    <div class="ps-footer__content">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--info">
                        <header>
                            <h3 class="ps-widget__title">Địa chỉ số 1</h3>
                        </header>
                        <footer>
                            <p><strong>8 Tôn Thất Thuyết, Mỹ Đình, Từ Liêm, Hà Nội</strong></p>
                            <p>Email: <a href='mailto:phoavn96@gmail.com'>Shopaz@store.com</a></p>
                            <p>Phone: +843 9980 7181</p>
                            <p>Fax: ++888 8668 9999</p>
                        </footer>
                    </aside>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--info second">
                        <header>
                            <h3 class="ps-widget__title">Địa chỉ số 2</h3>
                        </header>
                        <footer>
                            <p><strong>8A Tôn Thất Thuyết, Mỹ Đình, Từ Liêm, Hà Nội</strong></p>
                            <p>Email: <a href='mailto:phoavn96@gmail.com'>Shopaz@store.com</a></p>
                            <p>Phone: +843 9980 7181</p>
                            <p>Fax: ++888 8668 9999</p>
                        </footer>
                    </aside>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <aside class="ps-widget--footer ps-widget--link">
                        <header>
                            <h3 class="ps-widget__title">Hỗ trợ</h3>
                        </header>
                        <footer>
                            <ul class="ps-list--line">
                                <li><a href="#">Dịch vụ vận chuyển</a></li>
                                <li><a href="#">Trả hàng</a></li>
                                <li><a href="#">Về chúng tôi</a></li>
                                <li><a href="#">Liên hệ chúng tôi</a></li>
                            </ul>
                        </footer>
                    </aside>
                </div>

            </div>
        </div>
    </div>
    <div class="ps-footer__copyright">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <p>&copy; <a href="#">ShopAz</a>, Inc. All rights Resevered. Design by <a href="#"> Nhóm 5</a></p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <ul class="ps-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/5f3fc466cc6a6a5947adabf5/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->
</main>
<!-- JS Library-->

<script type="text/javascript" src="{{asset('plugins/jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/jquery-bar-rating/dist/jquery.barrating.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/owl-carousel/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/gmap3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/imagesloaded.pkgd.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/isotope.pkgd.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/jquery.matchHeight-min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/slick/slick/slick.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/elevatezoom/jquery.elevatezoom.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script>
<script type="text/javascript" src="{{asset('plugins/revolution/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/revolution/js/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('plugins/revolution/js/extensions/revolution.extension.video.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('plugins/revolution/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('plugins/revolution/js/extensions/revolution.extension.navigation.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('plugins/revolution/js/extensions/revolution.extension.parallax.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('plugins/revolution/js/extensions/revolution.extension.actions.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('plugins/revolution/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
<script type="text/javascript"
        src="{{asset('plugins/revolution/js/extensions/revolution.extension.migration.min.js')}}"></script>
<!-- Custom scripts-->
<script src="{{asset('js/jquery.toast.js')}}"></script>

<script type="text/javascript" src="{{asset('plugins/js/main.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('.claimedRight').each(function (f) {

            var newstr = $(this).text().substring(0, 100) + '...';
            $(this).text(newstr);

        });
    })
</script>
<script>
    function addComparelistFree(productid) {
        $.ajax({
            'url': '/compareaddFree',
            'method': 'GET',
            'data': {
                'product_id': productid,
            }, 'error': function () {
                $.toast({
                    text: "Sản phẩm đã tồn tại trong danh sách so sánh!", // Text that is to be shown in the toast
                    heading: 'Lỗi', // Optional heading to be shown on the toast
                    icon: 'error', // Type of toast icon
                    showHideTransition: 'plain', // fade, slide or plain
                    allowToastClose: true, // Boolean value true or false
                    hideAfter: 2000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                    stack: 1, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                    position: 'bottom-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                    textAlign: 'left',  // Text alignment i.e. left, right or center
                    loader: true,  // Whether to show loader or not. True by default
                    loaderBg: '#9EC600',  // Background color of the toast loader
                });
            }
        }).done(function (thanhcong) {
            $count = Number($('#count-comparelist').text()) + 1;
            $('#count-comparelist').text($count);
            $.toast({
                text: "Thêm sản phẩm vào so sánh thành công!", // Text that is to be shown in the toast
                heading: 'Chúc mừng', // Optional heading to be shown on the toast
                icon: 'success', // Type of toast icon
                showHideTransition: 'plain', // fade, slide or plain
                allowToastClose: true, // Boolean value true or false
                hideAfter: 2000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                stack: 1, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                position: 'bottom-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                textAlign: 'left',  // Text alignment i.e. left, right or center
                loader: true,  // Whether to show loader or not. True by default
                loaderBg: '#9EC600',  // Background color of the toast loader
            })
        });
    }
    function addwhishlist(userid, productid) {
        $.ajax({
            'url': '/whishlist-add',
            'method': 'GET',
            'data': {
                'user_id': userid,
                'product_id': productid,
            }, 'error': function () {
                $.toast({
                    text: "Sản phẩm đã tồn tại trong danh sách yêu thích!", // Text that is to be shown in the toast
                    heading: 'Lỗi', // Optional heading to be shown on the toast
                    icon: 'error', // Type of toast icon
                    showHideTransition: 'plain', // fade, slide or plain
                    allowToastClose: true, // Boolean value true or false
                    hideAfter: 2000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                    stack: 1, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                    position: 'bottom-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                    textAlign: 'left',  // Text alignment i.e. left, right or center
                    loader: true,  // Whether to show loader or not. True by default
                    loaderBg: '#9EC600',  // Background color of the toast loader
                });
            }
        }).done(function (thanhcong) {
            $count = Number($('#count-whishlist').text()) + 1;
            $('#count-whishlist').text($count);
            $.toast({
                text: "Thêm sản phẩm vào yêu thích thành công!", // Text that is to be shown in the toast
                heading: 'Chúc mừng', // Optional heading to be shown on the toast
                icon: 'success', // Type of toast icon
                showHideTransition: 'plain', // fade, slide or plain
                allowToastClose: true, // Boolean value true or false
                hideAfter: 2000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                stack: 1, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                position: 'bottom-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                textAlign: 'left',  // Text alignment i.e. left, right or center
                loader: true,  // Whether to show loader or not. True by default
                loaderBg: '#9EC600',  // Background color of the toast loader
            })
        });
    }


    function add(id) {
        $.ajax({
            url: 'shopping-cart/add?id=' + id + '&quantity=1' + '&size=3',
            type: 'GET',
        }).done(function (thanhcong) {
            $("#themcart").empty();
            $("#themcart").html(thanhcong);
            $.toast({
                text: "Thêm sản phẩm vào giỏ hàng thành công!", // Text that is to be shown in the toast
                heading: 'Chúc mừng', // Optional heading to be shown on the toast
                icon: 'success', // Type of toast icon
                showHideTransition: 'plain', // fade, slide or plain
                allowToastClose: true, // Boolean value true or false
                hideAfter: 2000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                stack: 1, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                position: 'bottom-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                textAlign: 'left',  // Text alignment i.e. left, right or center
                loader: true,  // Whether to show loader or not. True by default
                loaderBg: '#9EC600',  // Background color of the toast loader
            });

        });
    }
    function addComparelist(userid,productid) {
        $.ajax({
            'url': '/compareadd',
            'method': 'GET',
            'data': {
                'user_id':userid,
                'product_id': productid,
            }, 'error': function () {
                $.toast({
                    text: "Sản phẩm đã tồn tại trong danh sách so sánh!", // Text that is to be shown in the toast
                    heading: 'Lỗi', // Optional heading to be shown on the toast
                    icon: 'error', // Type of toast icon
                    showHideTransition: 'plain', // fade, slide or plain
                    allowToastClose: true, // Boolean value true or false
                    hideAfter: 2000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                    stack: 1, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                    position: 'bottom-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                    textAlign: 'left',  // Text alignment i.e. left, right or center
                    loader: true,  // Whether to show loader or not. True by default
                    loaderBg: '#9EC600',  // Background color of the toast loader
                });
            }
        }).done(function (thanhcong) {
            $count = Number($('#count-comparelist').text()) + 1;
            $('#count-comparelist').text($count);
            $.toast({
                text: "Thêm sản phẩm vào so sánh thành công!", // Text that is to be shown in the toast
                heading: 'Chúc mừng', // Optional heading to be shown on the toast
                icon: 'success', // Type of toast icon
                showHideTransition: 'plain', // fade, slide or plain
                allowToastClose: true, // Boolean value true or false
                hideAfter: 2000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                stack: 1, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                position: 'bottom-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                textAlign: 'left',  // Text alignment i.e. left, right or center
                loader: true,  // Whether to show loader or not. True by default
                loaderBg: '#9EC600',  // Background color of the toast loader
            })
        });
    }

    function xoa(id) {
        $.ajax({
            url: 'shopping-cart/remove?id=' + id,
            type: 'GET',
        }).done(function (xoasanphan) {
            $("#themcart").empty();
            $("#themcart").html(xoasanphan);
            $.toast({
                text: "Đã xóa sản phẩm!", // Text that is to be shown in the toast
                heading: 'Thông báo', // Optional heading to be shown on the toast
                icon: 'success', // Type of toast icon
                showHideTransition: 'plain', // fade, slide or plain
                allowToastClose: true, // Boolean value true or false
                hideAfter: 2000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                stack: 1, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                position: 'bottom-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                textAlign: 'left',  // Text alignment i.e. left, right or center
                loader: true,  // Whether to show loader or not. True by default
                loaderBg: '#9EC600',  // Background color of the toast loader
                // afterHidden: function (e) {
                //     location.reload();
                // },
            });
        });
    }
</script>
</body>
</html>
