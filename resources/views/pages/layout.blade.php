<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link href="{{asset('css/jquery.toast.css')}}" rel="stylesheet">
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <!-- Custom-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('plugins/css/style.css')}}">

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <![endif]-->
</head>
<body class="ps-loading">
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0"
        nonce="gtYhTy5y"></script>
<div class="header--sidebar"></div>
<header class="header">
    <div class="header__top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                    <p>8 T??n Th???t Thuy???t, M??? ????nh, T??? Li??m, H?? N???i - Hotline: 039-980-7181</p>
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
                                        <a href="#">Th??ng tin ta??i khoa??n</a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('/order-management')}}">Th??ng tin ????n ha??ng</a>
                                    </li>
                                    <li>
                                        <a href="{{URL::to('/logout-checkout')}}">????ng xu????t</a>
                                    </li>
                                </ul>
                            </div>
                            @else
                            <div class="header__actions"><a href="{{URL::to('/login-user')}}">????ng nh????p & ????ng ky??</a>
                            @endif
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <nav class="navigation">
            <div class="container-fluid">
                <div class="navigation__column left">
                    <div class="header__logo"><a class="ps-logo" href="{{URL::to('/')}}"><img
                                src="{{asset('images/logo.png')}}" alt=""></a></div>
                </div>
                <div class="navigation__column center">
                    <ul class="main-menu menu">
                        <li class="menu-item menu-item-has-children dropdown"><a href="/">Trang ch???</a>
                        </li>
                        <li class="menu-item menu-item-has-children dropdown"><a href="/san-pham">S???n Ph???m</a>

                        </li>
                        <li class="menu-item menu-item-has-children dropdown"><a href="/blog">Tin T???c</a>
                            <ul class="sub-menu">
                                <li class="menu-item menu-item-has-children dropdown"><a href="/blog">Blog</a>
                                </li>
                                <li class="menu-item menu-item-has-children dropdown"><a href="/aboutus">V??? ch??ng
                                        t??i</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item menu-item-has-children dropdown"><a href="/qa">Q&A</a>
                            <ul class="sub-menu">
                                <li class="menu-item menu-item-has-children dropdown"><a href="/qa">Danh s??ch c??u
                                        h???i</a>
                                </li>
                                <li class="menu-item menu-item-has-children dropdown"><a href="/qa/create">?????t c??u
                                        h???i</a>
                                </li>
                            </ul>
                        </li>
                        </li>
                        <li class="menu-item menu-item-has-children dropdown"><a href="/contactus">Li??n h???</a>
                        </li>
                    </ul>
                </div>
                <div class="navigation__column right">
                    <div class="row">
                        <div class="col-md-6">
                            <form class="ps-search--widget" action="/san-pham" method="get" id="product_form"
                                  style="margin-top: 25px">
                                <input class="form-control" @if(isset($keyword)) value="{{$keyword}} @endif" type="text"
                                       name="keyword" placeholder="T??m ki???m s???n ph???m???">
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
                                <a class="ps-cart__toggle"  >
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
                                                    <span>S???? l??????ng:
                                                        <i>{{$cartItem['quantity']}}</i>
                                                    </span> &nbsp;
                                                            <span>Ta??m ti??nh:<i>{{number_format($cartItem['quantity'] * $cartItem['product_price']).' VN??'}}
                                                                    @php
                                                                        $totalMoney += $cartItem['quantity'] * $cartItem['product_price'];
                                                                        $count_quantity += $cartItem['quantity'];
                                                                    @endphp</i></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        <div class="ps-cart__total">
                                            <p>T????ng s???? sa??n ph????m:<span>{{$count_quantity}}</span></p>
                                            <p>T????ng ti????n:<span>{{number_format($totalMoney).' VN??'}}</span></p>
                                        </div>
                                        <div class="ps-cart__footer">
                                            <a class="ps-btn" href="{{URL::to('shopping-cart/show')}}">Thanh toa??n<i
                                                    class="ps-icon-arrow-left"></i></a>
                                        </div>
                                    @else
                                        <div style="text-align: center">Ba??n ch??a cho??n mua sa??n ph????m na??o</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="menu-toggle"><span></span></div>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</header>
<div>
    @yield('content')
</div>
<div class="ps-subscribe">
    <div class="ps-container">
        <div class="row">
            <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 ">
                <h3><i class="fa fa-envelope"></i>????ng ky?? nh????n tin t????c</h3>
            </div>
            <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12 ">
                <form class="ps-subscribe__form" action="do_action" method="post">
                    <input class="form-control" type="text" placeholder="Email">
                    <button>????ng k?? ngay</button>
                </form>
            </div>
            <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 ">
                <p>...v?? nh???n coupon <span>  200.000 VN??  </span> cho l???n mua ?????u ti??n.</p>
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
                            <h3 class="ps-widget__title">?????a ch??? s??? 1</h3>
                        </header>
                        <footer>
                            <p><strong>8 T??n Th???t Thuy???t, M??? ????nh, T??? Li??m, H?? N???i</strong></p>
                            <p>Email: <a href='mailto:phoavn96@gmail.com'>Shopaz@store.com</a></p>
                            <p>Phone: +843 9980 7181</p>
                            <p>Fax: ++888 8668 9999</p>
                        </footer>
                    </aside>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--info second">
                        <header>
                            <h3 class="ps-widget__title">?????a ch??? s??? 2</h3>
                        </header>
                        <footer>
                            <p><strong>8A T??n Th???t Thuy???t, M??? ????nh, T??? Li??m, H?? N???i</strong></p>
                            <p>Email: <a href='mailto:phoavn96@gmail.com'>Shopaz@store.com</a></p>
                            <p>Phone: +843 9980 7181</p>
                            <p>Fax: ++888 8668 9999</p>
                        </footer>
                    </aside>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <aside class="ps-widget--footer ps-widget--link">
                        <header>
                            <h3 class="ps-widget__title">H??? tr???</h3>
                        </header>
                        <footer>
                            <ul class="ps-list--line">
                                <li><a href="#" class="add-to-cart">D???ch v??? v???n chuy???n</a></li>
                                <li><a href="#">Tr??? h??ng</a></li>
                                <li><a href="#">V??? ch??ng t??i</a></li>
                                <li><a href="#">Li??n h??? ch??ng t??i</a></li>
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
                    <p>&copy; <a href="#">ShopAz</a>, Inc. All rights Resevered. Design by <a href="#"> Nh??m 5</a></p>
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
<script type="text/javascript" src="{{asset('js/scripts/pages/app-ecommerce-shop.js')}}"></script>
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
<script src="{{asset('js/jquery.toast.js')}}"></script>

<!-- Custom scripts-->
<script type="text/javascript" src="{{asset('plugins/js/main.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $('.claimedRight').each(function (f) {

            var newstr = $(this).text().substring(0, 100) + '...';
            $(this).text(newstr);

        });
    })
</script>
<script type="text/javascript">
    var myWidget = cloudinary.createUploadWidget(
        {
            cloudName: 'hoadaica',
            uploadPreset: 'hoadaica',
            multiple: true,
            form: '#product_form',
            fieldName: 'thumbnails[]',
            thumbnails: '.thumbnails'
        }, function (error, result) {
            if (!error && result && result.event === "success") {
                console.log('Done! Here is the image info: ', result.info.url);
                var arrayThumnailInputs = document.querySelectorAll('input[name="thumbnails[]"]');
                for (let i = 0; i < arrayThumnailInputs.length; i++) {
                    arrayThumnailInputs[i].value = arrayThumnailInputs[i].getAttribute('data-cloudinary-public-id');
                }
            }
        }
    );
    $('#upload_widget').click(function () {
        myWidget.open();
    })
    // x??? l?? js tr??n dynamic content.
    $('body').on('click', '.cloudinary-delete', function () {
        var splittedImg = $(this).parent().find('img').attr('src').split('/');
        var imgName = splittedImg[splittedImg.length - 1];
        imgName = imgName.replace('.jpg', '');
        $('input[data-cloudinary-public-id="' + imgName + '"]').remove();
    });
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
                    text: "S???n ph???m ???? t???n t???i trong danh s??ch so s??nh!", // Text that is to be shown in the toast
                    heading: 'L???i', // Optional heading to be shown on the toast
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
                text: "Th??m sa??n ph????m va??o so s??nh tha??nh c??ng!", // Text that is to be shown in the toast
                heading: 'Chu??c m????ng', // Optional heading to be shown on the toast
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
    function delcpFree() {
        $.ajax({
            url: '/delete-compare-free',
            type: 'GET',
        }).done(function (xoasanphan) {
            $.toast({
                text: "??a?? xo??a so s??nh!", // Text that is to be shown in the toast
                heading: 'Th??ng ba??o', // Optional heading to be shown on the toast
                icon: 'success', // Type of toast icon
                showHideTransition: 'plain', // fade, slide or plain
                allowToastClose: true, // Boolean value true or false
                hideAfter: 1000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                stack: 1, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                position: 'bottom-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                textAlign: 'left',  // Text alignment i.e. left, right or center
                loader: true,  // Whether to show loader or not. True by default
                loaderBg: '#9EC600',  // Background color of the toast loader
                afterHidden: function (e) {
                    window.location.href = "/";
                },
            });
        });
    }
    function addComparelist(userid, productid) {
        $.ajax({
            'url': '/compareadd',
            'method': 'GET',
            'data': {
                'user_id': userid,
                'product_id': productid,
            }, 'error': function () {
                $.toast({
                    text: "S???n ph???m ???? t???n t???i trong danh s??ch so s??nh!", // Text that is to be shown in the toast
                    heading: 'L???i', // Optional heading to be shown on the toast
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
                text: "Th??m sa??n ph????m va??o so s??nh tha??nh c??ng!", // Text that is to be shown in the toast
                heading: 'Chu??c m????ng', // Optional heading to be shown on the toast
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
                    text: "S???n ph???m ???? t???n t???i trong danh s??ch y??u th??ch!", // Text that is to be shown in the toast
                    heading: 'L???i', // Optional heading to be shown on the toast
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
                text: "Th??m sa??n ph????m va??o y??u th??ch tha??nh c??ng!", // Text that is to be shown in the toast
                heading: 'Chu??c m????ng', // Optional heading to be shown on the toast
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
            url: '../shopping-cart/add?id=' + id + '&quantity=1' + '&size=3',
            type: 'GET',
        }).done(function (thanhcong) {
            $("#themcart").empty();
            $("#themcart").html(thanhcong);
            $.toast({
                text: "Th??m sa??n ph????m va??o gio?? ha??ng tha??nh c??ng!", // Text that is to be shown in the toast
                heading: 'Chu??c m????ng', // Optional heading to be shown on the toast
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

    function delcp() {
        $.ajax({
            url: '/delete-compare',
            type: 'GET',
        }).done(function (xoasanphan) {
            $.toast({
                text: "??a?? xo??a so s??nh!", // Text that is to be shown in the toast
                heading: 'Th??ng ba??o', // Optional heading to be shown on the toast
                icon: 'success', // Type of toast icon
                showHideTransition: 'plain', // fade, slide or plain
                allowToastClose: true, // Boolean value true or false
                hideAfter: 1000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                stack: 1, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                position: 'bottom-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                textAlign: 'left',  // Text alignment i.e. left, right or center
                loader: true,  // Whether to show loader or not. True by default
                loaderBg: '#9EC600',  // Background color of the toast loader
                afterHidden: function (e) {
                    window.location.href = "/";
                },
            });
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
                text: "??a?? xo??a sa??n ph????m!", // Text that is to be shown in the toast
                heading: 'Th??ng ba??o', // Optional heading to be shown on the toast
                icon: 'success', // Type of toast icon
                showHideTransition: 'plain', // fade, slide or plain
                allowToastClose: true, // Boolean value true or false
                hideAfter: 1000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
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

    function add_detail(id) {
        var quantity = $("input[id='quantity_valum']").val();
        var choose_size = $("select[id='choose_size']").val();
        $.ajax({
            url: '../shopping-cart/add?id=' + id + '&quantity=' + quantity + '&size=' + choose_size,
            type: 'GET',
        }).done(function (thanhcong) {
            $("#themcart").empty();
            $("#themcart").html(thanhcong);
            $.toast({
                text: "Th??m sa??n ph????m va??o gio?? ha??ng tha??nh c??ng!", // Text that is to be shown in the toast
                heading: 'Chu??c m????ng', // Optional heading to be shown on the toast
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
</script>
<script>
    // ca??ch 1: ?????? link shopping-cart/remove-list?id= va??o th????ng the?? <a>
    // ca??ch 2 du??ng ajax, tuy nhi??n l????i layout n??n ch??a th???? du??ng ajax ?????? tra?? v???? view
    function delete_show_car(id) {
        Swal.fire({
            title: 'Xo??a sa??n ph????m na??y ???',
            text: "Ba??n co?? ch????c mu????n xo??a sa??n ph????m na??y kho??i gio?? ha??ng?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Th????c hi????n!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../shopping-cart/remove-list?id=' + id,
                    type: 'GET',
                }).done(function (xoasanphan) {
                    $.toast({
                        text: "??a?? xo??a sa??n ph????m!", // Text that is to be shown in the toast
                        heading: 'Th??ng ba??o', // Optional heading to be shown on the toast
                        icon: 'success', // Type of toast icon
                        showHideTransition: 'plain', // fade, slide or plain
                        allowToastClose: true, // Boolean value true or false
                        hideAfter: 1000, // false to make it sticky or number representing the miliseconds as time after which toast needs to be hidden
                        stack: 1, // false if there should be only one toast at a time or a number representing the maximum number of toasts to be shown at a time
                        position: 'bottom-right', // bottom-left or bottom-right or bottom-center or top-left or top-right or top-center or mid-center or an object representing the left, right, top, bottom values
                        textAlign: 'left',  // Text alignment i.e. left, right or center
                        loader: true,  // Whether to show loader or not. True by default
                        loaderBg: '#9EC600',  // Background color of the toast loader
                        afterHidden: function (e) {
                            location.reload();
                        },
                    });
                });
            }
        })

    }

    function tru(id) {
        var size = document.getElementById("size_select"+id).value;
        $.ajax({
            url: '../shopping-cart/add-list?id=' + id + '&quantity=-1'+ '&size='+size,
            type: 'GET',
        }).done(function (trusanpham) {
            location.reload();
        });
    }

    function cong(id) {
        var size = document.getElementById("size_select"+id).value;
        $.ajax({
            url: '../shopping-cart/add-list?id=' + id + '&quantity=1' + '&size='+size,
            type: 'GET',
        }).done(function (congsanpham) {
            location.reload();
        });
    }
</script>
<script>
    function submit_size(id) {
        var size = document.getElementById("size_select"+id).value;
        $.ajax({
            url: '../shopping-cart/add-list?id=' + id + '&size='+ size,
            type: 'GET',
        }).done(function (thaydoisize) {
            location.reload();
        });
    }
</script>
<script>
    $('#submit-order').click(function () {
if($('#checkout-name').val().length >0 && $('#checkout-number').val().length >0 && $('#checkout-apt-email').val().length >0 && $('#checkout-city').val().length >0 ){
    $('#form-order').submit();
    $('#inner-submit-order').prop('disabled',true);
}
    })
</script>
</body>
</html>
