@extends('pages.layout')
@section('content')
    <main class="ps-main">
        <div class="ps-content pt-80 pb-80">
            @if($comparelist != null )
            <div class="ps-container">
                <div class="ps-cart-listing ps-table--compare">
                    <table class="table ps-cart__table">
                        <tbody>
                        <tr>
                            <button style="border: none;background: none" onclick="delcp()" > <div class="ps-remove"></div></button>
                            <td>Sản Phẩm</td>
                            @foreach($comparelist as $key =>  $product )
                            <td>
                                <a class="ps-product__preview text-uppercase" href="/chi-tiet-san-pham/{{$product['product_id']}}"><img class="mr-15" width="100px" src="{{$product->product->large_photo}}"><h3 style="text-align: justify">{{$product->product->product_name}} </h3></a></td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Giá </td>
                            @foreach($comparelist as $key =>  $product)
                            <td><span class="price"> {{number_format($product->product->product_price).' VNĐ'}}
                                   </span></td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Mô tả</td>
                            @foreach($comparelist as $key => $product )
                            <td>
                                {{$product->product->product_desc}}
                            </td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Hãng</td>
                            @foreach($comparelist as $key => $product )
                                <td> <a href="{{URL::to('/san-pham?keyword=&brand_id='.$product->product->brand->id)}}"><span class="status in-stock">
                                            {{$product->product->brand->brand_name}}</span></a></td>
                            @endforeach

                        </tr>
                        <tr>
                            <td>Size</td>
                            @foreach($comparelist as $key => $product )
                            <td>1 -> 15</td>
                            @endforeach
                        </tr>
                        <tr>
                            <td>Thể loại</td>
                            @foreach($comparelist as $key => $product )
                            <td>  {{$product->product->category->name}}</td>
                            @endforeach
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            @else
                <div>Bạn chưa chọn chọn sản phẩm nào để so sánh vui lòng add vào cart để so sánh. <a href="/">Quay lại</a></div>
            @endif
        </div>
        <div class="ps-subscribe">
            <div class="ps-container">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 ">
                        <h3><i class="fa fa-envelope"></i>Sign up to Newsletter</h3>
                    </div>
                    <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12 ">
                        <form class="ps-subscribe__form" action="do_action" method="post">
                            <input class="form-control" type="text" placeholder="">
                            <button>Sign up now</button>
                        </form>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 ">
                        <p>...and receive  <span>$20</span>  coupon for first shopping.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-footer bg--cover" data-background="images/background/parallax.jpg">
            <div class="ps-footer__content">
                <div class="ps-container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--info">
                                <header><a class="ps-logo" href="index.html"><img src="images/logo-white.png" alt=""></a>
                                    <h3 class="ps-widget__title">Address Office 1</h3>
                                </header>
                                <footer>
                                    <p><strong>460 West 34th Street, 15th floor, New York</strong></p>
                                    <p>Email: <a href='mailto:support@store.com'>support@store.com</a></p>
                                    <p>Phone: +323 32434 5334</p>
                                    <p>Fax: ++323 32434 5333</p>
                                </footer>
                            </aside>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--info second">
                                <header>
                                    <h3 class="ps-widget__title">Address Office 2</h3>
                                </header>
                                <footer>
                                    <p><strong>PO Box 16122 Collins  Victoria 3000 Australia</strong></p>
                                    <p>Email: <a href='mailto:support@store.com'>support@store.com</a></p>
                                    <p>Phone: +323 32434 5334</p>
                                    <p>Fax: ++323 32434 5333</p>
                                </footer>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--link">
                                <header>
                                    <h3 class="ps-widget__title">Find Our store</h3>
                                </header>
                                <footer>
                                    <ul class="ps-list--link">
                                        <li><a href="#">Coupon Code</a></li>
                                        <li><a href="#">SignUp For Email</a></li>
                                        <li><a href="#">Site Feedback</a></li>
                                        <li><a href="#">Careers</a></li>
                                    </ul>
                                </footer>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--link">
                                <header>
                                    <h3 class="ps-widget__title">Get Help</h3>
                                </header>
                                <footer>
                                    <ul class="ps-list--line">
                                        <li><a href="#">Order Status</a></li>
                                        <li><a href="#">Shipping and Delivery</a></li>
                                        <li><a href="#">Returns</a></li>
                                        <li><a href="#">Payment Options</a></li>
                                        <li><a href="#">Contact Us</a></li>
                                    </ul>
                                </footer>
                            </aside>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                            <aside class="ps-widget--footer ps-widget--link">
                                <header>
                                    <h3 class="ps-widget__title">Products</h3>
                                </header>
                                <footer>
                                    <ul class="ps-list--line">
                                        <li><a href="#">Shoes</a></li>
                                        <li><a href="#">Clothing</a></li>
                                        <li><a href="#">Accessries</a></li>
                                        <li><a href="#">Football Boots</a></li>
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
                            <p>&copy; <a href="#">SKYTHEMES</a>, Inc. All rights Resevered. Design by <a href="#"> Alena Studio</a></p>
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
            var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
            (function(){
                var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
                s1.async=true;
                s1.src='https://embed.tawk.to/5f3fc466cc6a6a5947adabf5/default';
                s1.charset='UTF-8';
                s1.setAttribute('crossorigin','*');
                s0.parentNode.insertBefore(s1,s0);
            })();
        </script>
        <!--End of Tawk.to Script-->
        <script>

        </script>
    </main>
    @endsection
