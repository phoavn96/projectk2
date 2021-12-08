@extends('pages.layout')
@section('content')
    <section class="container">
        <div class="col-md-12">
            <div class="row">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Đơn hàng chi tiết</li>
                    </ol>
                </nav>
                <!-- account start -->
                @if($obj != null)
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="title"><h2>Thông tin người nhận</h2></div>
                            <div class="row">
                                <div class="col-sm-6 col-12">
                                    <table class="table">
                                        <tr>
                                            <td class="h4">Tên người nhận</td>
                                            <td>{{$obj->shipping_name}}</td>
                                        </tr>
                                        <tr>
                                            <td class="h4">Email</td>
                                            <td>{{$obj->shipping_email}}</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6 col-12 ">
                                    <table class="table">
                                        <tr>
                                            <td class="h4">Điện thoại</td>
                                            <td>{{$obj->shipping_phone}}</td>
                                        </tr>
                                        <tr>
                                            <td class="h4">Địa chỉ nhận hàng</td>
                                            <td>{{$obj->shipping_address}}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- account end -->
                <!-- information start -->
                <div class="col-12 ">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mb-2"><h2>Thông tin sản phẩm<h4 style="padding: 20px">Mã đơn hàng #{{$obj->id}} - @if($obj->shipping_status == 1)
                                            <span style="color: dodgerblue">Đang xử lý</span>
                                        @elseif($obj->shipping_status == 2)
                                            <span style="color: dodgerblue"> Đang vận chuyển</span>
                                        @elseif($obj->shipping_status == 3)
                                            <span style="color: orange ">Đã hoàn thành</span>&nbsp&nbsp&nbsp<span style="color: blue"><a href="{{url('/print-order/'.$obj->id)}}" target="_blank"><i class="feather icon-file"></i>In Đơn Hàng</a></span>
                                        @elseif($obj->shipping_status == 4)
                                            <span style="color: red ">Đã hủy</span>
                                        @endif</h4></h2></div>
                            <table class="table ">
                                <thead>
                                <tr>

                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Kích cỡ</th>
                                    <th scope="col">Số lượng</th>
                                    {{--                            <th scope="col">Ngày đặt hàng</th>--}}
                                    {{--                            <th scope="col">Trạng thái</th>--}}
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($obj->order_detail as $detail)
                                    <tr>
                                        <td>
                                            <div style="padding-bottom: 30px"><img
                                                    src="{{\App\Product::find($detail ->product_id)->small_photo}}">
                                            </div>

                                        </td>
                                        <td>
                                            <div
                                                style="padding-bottom: 30px">{{\App\Product::find($detail ->product_id)->product_name}}</div>

                                        </td>
                                        <td>
                                            @if($detail ->size == null)
                                                <div style="padding-bottom: 30px"></div>
                                            @else
                                                <div style="padding-bottom: 30px">{{$detail ->size}}</div>
                                            @endif

                                        </td>
                                        <td>
                                            <div style="padding-bottom: 30px">{{$detail ->quantity}}</div>

                                        </td>
                                        </tr>
                                @endforeach
                                </tbody>

                                @php $total =0; @endphp
                                <tr>
                                    <td class="h4">Tạm tính</td>
                                    @foreach($obj->order_detail as $detail)
                                        @php
                                            $total+=$detail->unit_price * $detail->quantity;
                                        @endphp
                                    @endforeach
                                    <td>{{number_format($total).' VNĐ'}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="h4">Mã giảm giá</td>
                                    @if($obj->code)
                                        <td>{{number_format($total * $obj->reducemoney /100).' VNĐ'}}</td>
                                    @else
                                        <td>0 VNĐ</td>
                                    @endif

                                </tr>
                                <tr>
                                    <td class="h4">Tổng tiền</td>
                                    <td>{{number_format($obj-> total_money).' VNĐ'}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="h4">Ghi chú</td>
                                    <td>{{$obj -> shipping_notes}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="h4">Cho xem hàng trước</td>
                                    <td>Có
                                    </td>
                                </tr>
                                @if($obj->shipping_status==3)
                                    <tr>
                                        <td style="color: blue"><a href="{{url('/print-order/'.$obj->id)}}"
                                                                   target="_blank"><i class="feather icon-file"></i>In
                                                Đơn Hàng</a></td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
                @else
                <div>
                    <h3>Xin lỗi, đây không phải đơn hàng của bạn, vui lòng kiểm tra lại. Cám ơn!</h3>
                </div>
                    @endif
            </div>
        </div>
    </section>
@endsection
