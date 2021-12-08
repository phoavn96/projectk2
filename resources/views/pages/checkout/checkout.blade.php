@extends('pages.layout')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('customer_id')!=null && \Illuminate\Support\Facades\Session::has('shoppingCart') !=null)
        <nav aria-label="breadcrumb" class="container">
            <ol class="breadcrumb" style="padding: 20px; font-size: 1.3em">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
            </ol>
        </nav>
        <div class="container" style="min-height: 400px">
            <div class="table-responsive cart_info col-sm-5">
                @php
                    $totalMoney = 0;
                @endphp
                <table class="table table-responsive ">
                    <thead>
                    <tr class="cart_menu">
                        <td class="image">Sản phẩm</td>
                        <td class="description"></td>
                        <td>Kích cỡ</td>
                        <td class="price">Số lượng</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(\Illuminate\Support\Facades\Session::get('shoppingCart') as $key => $cartItem)
                        <tr>
                            <td class="cart_product">
                                <a href="/chi-tiet-san-pham/{{$cartItem['id']}}"><img src="{{$cartItem['thumbnail']}}"></a>
                            </td>
                            <td class="cart_description">
                                <a href="/chi-tiet-san-pham/{{$cartItem['id']}}"> {{$cartItem['product_name']}}</a>
                                <p>{{number_format($cartItem['product_price']).' VNĐ'}}</p>
                            </td>
                            <td style="font-size: 1.3em">{{$cartItem['size']}}</td>
                            <td class="cart_quantity">
                                <div style="display: inline">
                                    <span style="font-size: 1.5em">{{$cartItem['quantity']}}</span>&nbsp;
                                </div>
                            </td>
                        </tr>
                        @php
                            $totalMoney += $cartItem['quantity'] * $cartItem['product_price'];
                        @endphp
                    @endforeach
                    <tr style="font-size: 1.3em">
                        <td>Tổng tiền phải thanh toán</td>
                        <td>
                            @if( Session::has('total'))
                                {{number_format(Session::get('total')).' VNĐ'}}
                            @else
                                {{number_format($totalMoney).' VNĐ'}}
                            @endif
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="card text-center col-sm-7">
                <section id="checkout-address" class="list-view product-checkout">
                    <div class="card">
                        <div class="card-header flex-column align-items-start">
                            <h4 class="card-title">Địa chỉ gửi hàng</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="row">
                                    <form action="{{URL::to('save-checkout-customer')}}" id="form-order" method="post">
                                        {{csrf_field()}}
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-name">Họ và tên:</label>
                                                <input type="text" id="checkout-name"
                                                       class="form-control required" name="shipping_name"
                                                       value="{{old('shipping_name')}}" required autocomplete="name" autofocus>
                                                @if($errors -> has('shipping_name'))
                                                    <span class="error" style="color: red">
                                {{$errors -> first('shipping_name')}}
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-number">Điện thoại:</label>
                                                <input type="number" id="checkout-number"
                                                       class="form-control required" name="shipping_phone"
                                                       value="{{old('shipping_phone')}}" required autocomplete="number">
                                                @if($errors -> has('shipping_phone'))
                                                    <span class="error" style="color: red">
                                {{$errors -> first('shipping_phone')}}
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-apt-number">Email:</label>
                                                <input type="email" id="checkout-apt-email"
                                                       class="form-control required"
                                                       name="shipping_email" value="{{old('shipping_email')}}" required autocomplete="email">
                                                @if($errors -> has('shipping_email'))
                                                    <span class="error" style="color: red">
                                {{$errors -> first('shipping_email')}}
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-city">Địa chỉ:</label>
                                                <input type="text" id="checkout-city"
                                                       class="form-control required" name="shipping_address"
                                                       value="{{old('shipping_address')}}" required autocomplete="shipping_address">
                                                @if($errors -> has('shipping_address'))
                                                    <span class="error" style="color: red">
                                {{$errors -> first('shipping_address')}}
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <div class="form-group">
                                                <label for="checkout-pincode">Ghi chú:</label>
                                                <input type="text" id="checkout-pincode"
                                                       class="form-control required" name="shipping_notes"
                                                       value="{{old('shipping_notes')}}" autocomplete="shipping_notes">
                                                @if($errors -> has('shipping_notes'))
                                                    <span class="error" style="color: red">
                                {{$errors -> first('shipping_notes')}}
                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <h4 style="color: #428bca">Chọn hình thức thanh toán</h4>
                                            <span class="fa fa-money " style="font-size: 3em"></span>
                                            <label class="">
                                                <input name="order_status" value="1" type="checkbox"
                                                       checked="checked" required autocomplete="checkbox"> Thanh toán khi nhận hàng
                                            </label>

                                            @if($errors -> has('order_status'))
                                                <span class="error" style="color: red">
                                                {{$errors -> first('order_status')}}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="col-sm-6 offset-md-6" id="submit-order">
                                            @if(Session::has('customer_id') != null)
                                                <button type="submit"
                                                        class="btn btn-primary delivery-address float-right" id="inner-submit-order">
                                                    Gửi đến địa chỉ này
                                                </button>
                                            @else
                                                <a class="btn btn-primary btn-block waves-effect waves-light" id="inner-submit-order"
                                                   href="/login-user">Gửi đến địa chỉ này</a>
                                            @endif
                                        </div>
                                    </form>

{{--                                    form thanh toan bang paypal--}}
                                    <label class="">
                                        <input name="order_status" value="1" type="checkbox" style="margin-left: 370px"
                                        > Thanh toán bằng paypal
                                        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                            <input type="hidden" name="cmd" value="_xclick">
                                            <input type="hidden" name="business" value="sb-0buro3047371@business.example.com">
                                            <input type="hidden" name="item_name" value="Converse Classic Hightop">
                                            <input type="hidden" name="item_number" value="1">
                                            <input type="hidden" name="amount" value="1">
                                            <input type="hidden" name="tax" value="0">
                                            <input type="hidden" name="quantity" value="1">
                                            <input type="hidden" name="currency_code" value="USD">
                                            <input type="hidden" name="address_override" value="1">
                                            <input type="hidden" name="first_name" value="Loc">
                                            <input type="hidden" name="last_name" value="Nguyen">
                                            <input type="hidden" name="address1" value="1938  Gordon Street">
                                            <input type="hidden" name="city" value="Big Bear City">
                                            <input type="hidden" name="state" value="California">
                                            <input type="hidden" name="zip" value="92314">
                                            <input type="hidden" name="country" value="US">
                                            <input type="image" name="submit"
                                                   src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
                                                   alt="PayPal - The safer, easier way to pay online" style="margin-left: 290px">
                                        </form>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(document).ready(function(){


                $('[type="checkbox"]').change(function(){

                    if(this.checked){
                        $('[type="checkbox"]').not(this).prop('checked', false);
                    }
                });

            });
        </script>

    @else
        <div>Không có sản phẩm nào được chọn, <a href="/">Quay lại</a></div>
    @endif
@endsection
