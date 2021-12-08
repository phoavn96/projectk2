@extends('pages.layout')
@section('content')
    <main class="ps-main">
        <div class="ps-content pt-80 pb-80">
            <div class="ps-container">
                <div class="ps-cart-listing ps-table--whishlist">
                    <table class="table ps-cart__table">
                        <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th>Giá</th>
                            <th>Hiển thị</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($whishlist as $key =>  $product)
                            @if($product->product)
                            <tr>
                                <td><a class="ps-product__preview"
                                       href="{{URL::to('/chi-tiet-san-pham/'.$product->product->id)}}"><img
                                            class="mr-15" width="100px" src="{{$product->product->large_photo}}"
                                            alt="">{{$product->product->product_name}}</a></td>
                                <td>{{number_format($product->product->product_price).' VNĐ'}}</td>
                                <td><a class="ps-product-link"
                                       href="{{URL::to('/chi-tiet-san-pham/'.$product->product->id)}}">Chi tiết</a></td>
                                <td>

                                    <form method="POST" action="/delete-whish/{{$product->id}}" >
                                        @method('DELETE')
                                        @csrf
                                        <button style="border: none;background: none" > <div class="ps-remove"></div></button>
                                    </form>


                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
