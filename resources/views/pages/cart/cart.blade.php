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

