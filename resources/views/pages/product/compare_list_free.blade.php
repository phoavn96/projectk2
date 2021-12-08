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
                                <button style="border: none;background: none" onclick="delcpFree()" > <div class="ps-remove"></div></button>
                                <td>Sản Phẩm</td>
                                @foreach($comparelist as $key =>  $product)
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
