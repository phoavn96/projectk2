@extends('pages.layout')
@section('content')
    @if($shoppingCart !=null)
    <section id="cart_items" class="container" style="min-height: 550px">
        <div class="container col-sm-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                </ol>
            </nav>
             <div class="table-responsive cart_info col-sm-9">
                    @php
                        $totalMoney = 0;
                    @endphp
                    <table class="table table-responsive">
                        <thead>
                        <tr class="cart_menu">
                            <td class="image" >Sản phẩm</td>
                            <td></td>
                            <td >Kích cỡ</td>
                            <td class="price">Số lượng</td>
                            <td class="total">Thành tiền</td>
                            <td>Lựa chọn</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($shoppingCart as $key => $cartItem)
                            <tr>
                                <td class="cart_product">
                                    <a href="/chi-tiet-san-pham/{{$cartItem['id']}}"><img src="{{$cartItem['thumbnail']}}"></a>
                                </td>
                                <td class="cart_description">
                                    <a href="/chi-tiet-san-pham/{{$cartItem['id']}}"> {{$cartItem['product_name']}}</a>
                                    <p>{{number_format($cartItem['product_price']).' VNĐ'}}</p>
                                </td>
                                <td >
                                    <?php
                                    $product = \App\Product::find($cartItem['id']);
                                    ?>
                                    <select class="ps-select selectpicker" id="size_select{{$cartItem['id']}}" name="size" onchange="submit_size({{$cartItem['id']}})" >
                                        @foreach($product->preview_sizes as $preview)
                                            <option value="{{$preview}}"  {{$preview == $cartItem['size'] ? 'selected':''}}>{{$preview}}</option>
                                        @endforeach
                                    </select>
                                </td>

                                <td class="cart_quantity">
                                    <div style="display: inline">
                                        <a class="fa fa-minus "
                                           onclick="tru({{$cartItem['id']}})"  href="javascript:"></a>&nbsp;
                                        <span
                                            style="font-size: 1.5em">{{$cartItem['quantity']}}</span>&nbsp;
                                        <a class="fa fa-plus"
                                           onclick="cong({{$cartItem['id']}})"  href="javascript:"></a>
                                    </div>
                                </td>
                                <td class="cart_total" style="font-size: 1.2em">
                                    {{number_format($cartItem['quantity'] * $cartItem['product_price']).' VNĐ'}}
                                    @php
                                        $totalMoney += $cartItem['quantity'] * $cartItem['product_price'];
                                    @endphp
                                </td>
                                {{--                            nút xóa--}}
                                <td style="text-align: center">
                                    <a onclick="delete_show_car({{$cartItem['id']}})" href="javascript:"><span
                                            class="fa fa-trash-o"></span></a>&nbsp;
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class=" col-sm-3" >
                    <div class="row">
                        <div class="card-content" >
                            <div class="card-body" >
                                <form class="form-inline" action="{{URL::to('/get-discount')}}" method="post">
                                    {{csrf_field()}}
                                    <?php
                                    $message = Session::get('message');
                                    if ($message) {
                                        echo '<span style="color:#1b6d85;font-size:17px;width: 100%;text-align: center;font-weight: bold;">' . $message . '</span>';
                                        Session::put('message', null);
                                    }
                                    ?>
                                    <div class="form-group mx-sm-2 mb-2">
                                        <label  class="sr-only">Mã giảm giá</label>
                                        <input type="text" class="form-control" name="discount_name" placeholder="Nhập mã giảm giá">
                                    </div>
                                    <button class="btn btn-primary mb-2">Áp dụng</button>
                                </form>
                                <hr>
                                <div class="price-details">
                                    <p>Chi tiết thanh toán</p>
                                </div>
                                <div class="detail" style="margin-bottom: 20px">
                                    @if(\Illuminate\Support\Facades\Session::has('coupon'))
                                        <h4 class="detail-title">Tạm tính</h4>
                                        <div class="detail-amt">
                                            {{number_format($totalMoney).' VNĐ'}}
                                        </div>
                                        @foreach(\Illuminate\Support\Facades\Session::get('coupon') as $key =>$cou)
                                            <h4>Giảm:</h4> {{$cou['coupon_value'].' %'}}
                                            <h4>Tiền giảm:</h4> {{number_format(($cou['coupon_value']*$totalMoney)/100).' VNĐ'}}
                                            @php
                                            $total_coupon = $totalMoney - ($cou['coupon_value']*$totalMoney)/100;
                                            Session::put('total',$total_coupon);
                                            @endphp
                                            <div><h4>Tổng sau giảm:</h4> {{number_format($total_coupon).' VNĐ'}}</div>
                                        @endforeach
                                    @else
                                        <h4 class="detail-title">Tạm tính</h4>
                                        <div class="detail-amt">
                                            {{number_format($totalMoney).' VNĐ'}}
                                        </div>
                                        <h4 class="detail-title">Giảm giá</h4>
                                        <div class="detail-amt">
                                            0
                                        </div>
                                        <h4 class="detail-title">Thành tiền</h4>
                                        <div class="detail-amt">
                                            {{number_format($totalMoney).' VNĐ'}}
                                        </div>
                                    @endif
                                </div>
                                @if(Session::has('customer_id') != null)
                                    <div class="btn btn-primary btn-block">
                                       <a href="{{URL::to('checkout')}}">Địa chỉ nhận hàng</a>
                                    </div>
                                @else
                                    <div class="btn btn-primary btn-block">
                                        <a href="{{URL::to('login-user')}}">Địa chỉ nhận hàng</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        <div class="text-center" style="margin-bottom: 20px"><a href="/san-pham"><button class="btn btn-success">Thêm sản phẩm</button></a></div>

    </section> <!--/#cart_items-->
    @else
        <div style="min-height: 450px" class="container">Bạn chưa chọn mua sản phẩm nào. <a href="/">Quay lại</a></div>
        {{\Illuminate\Support\Facades\Session::remove('coupon')}}
    @endif
@endsection
