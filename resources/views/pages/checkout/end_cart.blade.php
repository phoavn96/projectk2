@extends('pages.layout')
@section('content')
    @if(\Illuminate\Support\Facades\Session::has('customer_id')!=null && \Illuminate\Support\Facades\Session::has('order_id') !=null)
        <nav aria-label="breadcrumb" class="container" >
            <ol class="breadcrumb" style="padding: 20px; font-size: 1.3em">
                <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ol>
        </nav>
        <div class="container" style="height: 400px">
        <div class="card text-center">
            <h2 class="card-header" style="color: #ee2200">
                Chúc mừng bạn đã đặt hàng thành công
            </h2>
            <div class="card-body"style="padding-top: 15px">
                <h5 class="card-title" style="padding-bottom: 15px">Bạn sẽ nhận được email và tin nhắn xác nhận đơn hàng của chúng tôi</h5>
                <h5 class="card-text" style="padding-bottom: 15px">Cám ơn bạn vì đã luôn đồng hành và ủng hộ.</h5>
                <a href="{{URL::to('/order-management')}}" class="btn btn-primary" style="padding-bottom: 10px">Mã đơn hàng của bạn là {{Session::get('order_id')}}</a>
            </div>
        </div>
        </div>

    @else
        <div>Không có sản phẩm nào được chọn, <a href="/">Quay lại</a></div>
    @endif
@endsection
