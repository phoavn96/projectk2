@extends('pages.layout')
@section('content')
    <main class="ps-main">
        <div class="test">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-product--detail pt-60">
            <div class="ps-container">
                <div class="row">
                    <div class="col-lg-10 col-md-12 col-lg-offset-1">
                        <div class="ps-product__thumbnail">
                            <div class="ps-product__preview">
                                <div class="ps-product__variants">
                                    @foreach($product ->large_photos as $p)
                                        <div class="item"><img src="{{$p}}" alt=""></div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="ps-product__image">
                                @foreach($product ->large_photos as $p)
                                    <div class="item"><img class="zoom" height="550px" src="{{$p}}" alt=""
                                                           data-zoom-image="{{$p}}"></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="ps-product__thumbnail--mobile">
                            <div id="carousel-simple" class="carousel slide col-md-6 col-md-offset-3"
                                 data-ride="carousel">
                                <!-- Indicators -->
                                <ol class="carousel-indicators">
                                    <li data-target="#carousel-simple" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-simple" data-slide-to="1"></li>
                                    <li data-target="#carousel-simple" data-slide-to="2"></li>
                                </ol>

                                <!-- Wrapper for slides -->
                                <div class="carousel-inner" role="listbox">
                                    <div class="item active">
                                        <img src="{{$product ->large_photo}}" alt="">
                                    </div>
                                    @foreach($product ->larges_photos as $p)
                                        <div class="item">
                                            <img src="{{$p}}" alt="">
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-simple" role="button"
                                   data-slide="prev">
                                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                                </a>
                                <a class="right carousel-control" href="#carousel-simple" role="button"
                                   data-slide="next">
                                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ps-product__info">
                            <div class="ps-product__rating">
                                <select class="ps-rating">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="2">5</option>
                                </select><a href="#">(Read all 8 reviews)</a>
                            </div>
                            <h1>{{$product->product_name}}</h1>
                            <p class="ps-product__category"><a href="#">{{$product->category->name}}</a>,<a href="#">
                                    {{$product->brand->brand_name}}</a></p>
                            <h3 class="ps-product__price">{{number_format($product->product_price).' VNĐ'}}
                                <del>{{number_format($product->product_price *1.35).' VNĐ'}}</del>
                            </h3>
                            <div class="ps-product__block ps-product__quickview">
                                <h4>Đánh giá nhanh</h4>
                                <span class="claimedRight" maxlength="100">{{$product->product_desc}}</span>
                            </div>
                                <div class="ps-product__block ps-product__size">
                                    <h4>Chọn Size</h4>
                                    <select class="ps-select selectpicker" id="choose_size">
                                        <option value="0">Size</option>
                                        @foreach($product->preview_sizes as $preview)
                                            <option value="{{$preview}}" selected>{{$preview}}</option>
                                        @endforeach
                                    </select>
                                    <div class="form-group">
                                        <input id="quantity_valum" class="form-control" type="number" value="1" name="quantity" min="1">
                                        <input type="hidden" name="id" value="{{$product->id}}"/>
                                    </div>
                                </div>
                                <div class="ps-product__shopping">
                                    <button type="submit">
                                        <a class="ps-btn mb-10" onclick="add_detail({{$product->id}})" href="javascript:">
                                            Thêm vào giỏ hàng
                                        </a>
                                    </button>

                                    <div class="ps-product__actions">
                                        <a class="mr-10" href="whishlist.html">
                                            <i class="ps-icon-heart"></i>
                                        </a>
                                    </div>
                                    <div>
                                        <p></p>
                                    </div>
                                    <div class="fb-like" data-href="http://127.0.0.1:8000/chi-tiet-san-pham/3" data-width="" data-layout="button_count" data-action="like" data-size="large" data-share="true"></div>
                                </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="ps-product__content mt-50">
                            <ul class="tab-list" role="tablist">
                                <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab"
                                                      data-toggle="tab">Thông tin chi tiết</a></li>
                                <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Gửi đánh
                                        giá</a></li>
                            </ul>
                        </div>
                        <div class="tab-content mb-60">
                            <div class="tab-pane active" role="tabpanel" id="tab_01">
                                <p>{{$product->product_desc}}</p>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab_02">
                                <div class="fb-comments" data-href="http://127.0.0.1:8000/chi-tiet-san-pham/3" data-numposts="20" data-width="100%"></div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab_04">
                                <div class="form-group">
                                    <textarea class="form-control" rows="6"
                                              placeholder="Enter your addition here..."></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="ps-btn" type="button">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
            <div class="ps-container">
                <div class="ps-section__header mb-50">
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                            <h3 class="ps-section__title" data-mask="Related item">Sản Phẩm Tương Tự</h3>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                            <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a
                                    class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a></div>
                        </div>
                    </div>
                </div>
                <div class="ps-section__content">
                    <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true"
                         data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false"
                         data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3"
                         data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">

                        @foreach($product->category->product as $key => $product_related)
                            <div class="ps-shoes--carousel">
                                <div class="ps-shoe">
                                    <div class="ps-shoe__thumbnail">
{{--                                        <div class="ps-badge"><span>New</span></div>--}}
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
                                        <a class="ps-shoe__favorite add-to-cart"  onclick="add({{$product_related->id}})" href="javascript:" style="margin-top: 35px">
                                            <i class="ps-icon-shopping-cart"></i>
                                        </a>
                                        <img src="{{$product_related->large_photo}}" height="320px" alt="">
                                        <a class="ps-shoe__overlay"
                                           href="{{URL::to('/chi-tiet-san-pham/'.$product_related->id)}}"></a>
                                    </div>
                                    <div class="ps-shoe__content">
                                        <div class="ps-shoe__variants">
                                            <div class="ps-shoe__variant normal">
                                                @foreach($product_related->large_photos as $p)
                                                    <img src="{{$p}}" alt="" height="60px">
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
                                                                        href="{{URL::to('/chi-tiet-san-pham/'.$product_related->id)}}">{{$product_related->product_name}}</a>
                                            <p class="ps-shoe__categories"><a
                                                    href="#">{{$product_related->category->name}}</a>,<a href="#">
                                                    {{$product_related->brand->brand_name}}</a></p><span
                                                class="ps-shoe__price"> {{number_format($product_related->product_price).' VNĐ'}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
