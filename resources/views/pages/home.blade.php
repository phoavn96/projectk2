@extends('pages.layout')
@section('content')
    <div class="ps-main">
        <div class="ps-banner">
            <div class="rev_slider fullscreenbanner" id="home-banner">
                <ul>
                    @foreach($all_banner as $item)
                    <li class="ps-banner ps-banner--white" data-index="rs-100" data-transition="random" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-rotate="0"><img class="rev-slidebg" src="{{$item -> images}}"  alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" data-no-retina>
                        <div class="tp-caption ps-banner__header" id="layer20" data-x="left" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['-150','-120','-150','-170']" data-width="['none','none','none','400']" data-type="text" data-responsive_offset="on" data-frames="[{&quot;delay&quot;:1000,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                            <p> {{$item->description}}</p>
                        </div>
                        <div class="tp-caption ps-banner__title" id="layer339" data-x="['left','left','left','left']" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['-60','-40','-50','-70']" data-type="text" data-responsive_offset="on" data-textAlign="['center','center','center','center']" data-frames="[{&quot;delay&quot;:1200,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                            <p class="text-uppercase">{{$item->name}}</p>
                        </div>
                        <div class="tp-caption ps-banner__description" id="layer2-14" data-x="['left','left','left','left']" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['30','50','50','50']" data-type="text" data-responsive_offset="on" data-textAlign="['center','center','center','center']" data-frames="[{&quot;delay&quot;:1200,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">
                            <p> {{$item->description}}  <br> Nhận mua ngay tại shop <br/></p>
                        </div><a class="tp-caption ps-btn" id="layer364" href="/san-pham" data-x="['left','left','left','left']" data-hoffset="['-60','15','15','15']" data-y="['middle','middle','middle','middle']" data-voffset="['120','140','200','200']" data-type="text" data-responsive_offset="on" data-textAlign="['center','center','center','center']" data-frames="[{&quot;delay&quot;:1500,&quot;speed&quot;:1500,&quot;frame&quot;:&quot;0&quot;,&quot;from&quot;:&quot;x:50px;opacity:0;&quot;,&quot;to&quot;:&quot;o:1;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;},{&quot;delay&quot;:&quot;wait&quot;,&quot;speed&quot;:300,&quot;frame&quot;:&quot;999&quot;,&quot;to&quot;:&quot;x:50px;opacity:0;&quot;,&quot;ease&quot;:&quot;Power3.easeInOut&quot;}]">Mua Ngay<i class="ps-icon-next"></i></a>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
    <div class="ps-section--features-product ps-section masonry-root pt-100 pb-100">
        <div class="ps-container">
            <div class="ps-section__header mb-50">
                <h3 class="ps-section__title">Sản phẩm mới</h3>
            </div>
            <div class="ps-section__content pb-50">
                <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
                    <div class="ps-masonry">
                        <div class="grid-sizer"></div>
                        @foreach($all_product as $key =>$product)
                        <div class="grid-item">
                            <div class="grid-item__content-wrapper" >
                                <div class="ps-shoe mb-30">
                                    <div class="ps-shoe__thumbnail">
                                        <div class="ps-badge"><span>Mới</span></div>
{{--                                           //so sánh//--}}
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
{{--                                        yêu thích--}}
                                        @if(!\Illuminate\Support\Facades\Session::has('customer_id'))
                                        <a class="ps-shoe__favorite"  href="/login-user" ><i class="ps-icon-heart"></i></a>
                                        @endif
                                        @if(\Illuminate\Support\Facades\Session::has('customer_id'))
                                            <a class="ps-shoe__favorite whishlist-icon" href="javascript:" onclick="addwhishlist({{\Illuminate\Support\Facades\Session::get('customer_id')}},{{$product->id}})"  ><i class="ps-icon-heart"></i></a>
                                        @endif
                                        <a class="ps-shoe__favorite add-to-cart" style="margin-top: 35px!important;"  onclick="add({{$product->id}})" href="javascript:" style="margin-top: 30px">
                                            <i class="ps-icon-shopping-cart"></i>
                                        </a>
                                        <img src="{{$product->large_photo}}" alt="" height="300px">
                                        <a class="ps-shoe__overlay" href="{{URL::to('/chi-tiet-san-pham/'.$product->id)}}"></a>
                                    </div>
                                    <div class="ps-shoe__content">
                                        <div class="ps-shoe__variants">
                                            <div class="ps-shoe__variant normal">
                                                @foreach($product ->large_photos as $p)
                                                <img src="{{$p}}" alt="" style="height: 60px;">
                                                @endforeach
                                            </div>
{{--                                            đánh giá--}}
                                            <select class="ps-rating ps-shoe__rating">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="2">5</option>
                                            </select>
                                        </div>
                                        <div class="ps-shoe__detail">
                                            <a class="ps-shoe__name" href="#" style="padding-bottom: 10px">{{$product->product_name}}</a>

                                            <p class="ps-shoe__categories">
                                                <a
                                                    href="#">{{$product->category->name}}</a>,<a href="#">
                                                    {{$product->brand->brand_name}}</a>
                                            </p>
                                            <span class="ps-shoe__price">
                                            <del>{{number_format($product->product_price *1.35).' VNĐ'}}
                                            </del>
                                                {{number_format($product->product_price).' VNĐ'}}
                                            </span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <span style="text-align: center">{{$all_product -> links()}}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-section--offer">
        <div class="ps-column"><a class="ps-offer" href="#"><img src="https://file.hstatic.net/1000230642/file/banner_hunter1__lp__f23ae981ad4c4098a6c6e2db3355bd32.jpg" alt=""></a></div>
        <div class="ps-column"><a class="ps-offer" href="#"><img src="https://file.hstatic.net/1000230642/file/banner_vietmax_0406_9675c8d4e6e340379434f671512c09d7_master.jpg" alt=""></a></div>
    </div>
    <div class="ps-section ps-section--top-sales ps-owl-root pt-80 pb-80">
        <div class="ps-container">
            <div class="ps-section__header mb-50">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                        <h3 class="ps-section__title">Siêu giảm giá</h3>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                        <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Trước đó</a><a class="ps-next" href="#">Kế tiếp<i class="ps-icon-arrow-left"></i></a></div>
                    </div>
                </div>
            </div>
            <div class="ps-section__content">
                <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
                    @foreach($all_product as $key =>$product)
                    <div class="ps-shoes--carousel">

                        <div class="ps-shoe">
                            <div class="ps-shoe__thumbnail">

                                <div class="ps-badge" style="background-color:#ff620c!important;"><span>Sale</span></div>
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

                                <a class="ps-shoe__favorite add-to-cart" style="margin-top: 35px!important;"  onclick="add({{$product->id}})" href="javascript:" >
                                    <i class="ps-icon-shopping-cart"></i>
                                </a>
                                @if(!\Illuminate\Support\Facades\Session::has('customer_id'))
                                    <a class="ps-shoe__favorite"  href="/login-user" ><i class="ps-icon-heart"></i></a>
                                @endif
                                @if(\Illuminate\Support\Facades\Session::has('customer_id'))
                                    <a class="ps-shoe__favorite whishlist-icon" href="javascript:" onclick="addwhishlist({{\Illuminate\Support\Facades\Session::get('customer_id')}},{{$product->id}})"  ><i class="ps-icon-heart"></i></a>
                                @endif
                                <img src="{{$product->large_photo}}" alt="{{URL::to('/chi-tiet-san-pham/'.$product->id)}}" height="300px">
                                <a class="ps-shoe__overlay" href="{{URL::to('/chi-tiet-san-pham/'.$product->id)}}">
                                </a>
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
                                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">{{$product->product_name}}</a>
                                    <p class="ps-shoe__categories"><a
                                            href="#">{{$product->category->name}}</a>,<a href="#">
                                            {{$product->brand->brand_name}}</a></p>
                                    <span class="ps-shoe__price">
                                        <del>{{number_format($product->product_price *1.45).' VNĐ'}}
                                            </del>
                                        {{number_format($product->product_price).' VNĐ'}}
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    @endforeach
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
@endsection
