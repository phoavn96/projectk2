@extends('pages.layout')
@section('content')
    <section id="cart_items" style="min-height: 400px">
        <div class="container col-sm-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{URL::to('/')}}">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Quản lý đơn hàng</li>
                </ol>
            </nav>
        </div>
        <div class="container">
        <table class="table table-striped">
            <thead>
            <tr style="font-size: 1.3em">
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Ngày mua</th>
                <th scope="col">Sản phẩm</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Trạng thái đơn hàng</th>
                <th scope="col">Chi tiết đơn hàng</th>
            </tr>
            </thead>
            @foreach($obj as $item)
            <tbody>
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->created_at}}</td>
                <td>@foreach($item->products_total as $detail)
                        <div>{{$detail ->product_name}}</div>
                    @endforeach
                </td>
                <td>{{number_format($item->total_money). " VNĐ"}}</td>
                <td>
                    @if($item->shipping_status == 1)
                        <span style="color: dodgerblue">Đang xử lý</span>
                    @elseif($item->shipping_status == 2)
                        <span style="color: dodgerblue"> Đang vận chuyển</span>
                    @elseif($item->shipping_status == 3)
                        <span style="color: orange ">Đã hoàn thành</span>&nbsp&nbsp&nbsp<span style="color: blue"><a href="{{url('/print-order/'.$item->id)}}" target="_blank"><i class="feather icon-file"></i>In Đơn Hàng</a></span>
                    @elseif($item->shipping_status == 4)
                        <span style="color: red ">Đã hủy</span>
                    @endif

                </td>
                <td><a href="{{URL::to('order-management/'.$item->id)}}"
                       class="active styling-edit" >
                        <i class="fa fa-pencil-square-o text-success text-active"></i>
                    </a></td>
            </tr>
            </tbody>
            @endforeach
        </table>
        <span style="text-align: center">{{$obj->links()}}</span>
        </div>
    </section> <!--/#cart_items-->
@endsection
