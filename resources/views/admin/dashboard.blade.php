@extends('layouts.layout_admin_master')
{{-- Dashboard Analytics Start --}}

@section('title', 'Bảng điều khiển - Phân tích dữ liệu')
{{--title--}}

@section('vendor-style')
    <!-- vendor css files -->
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/charts/apexcharts.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/tether-theme-arrows.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/tether.min.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('vendors/css/extensions/shepherd-theme-default.css')) }}">
@endsection

@section('page-style')
    <!-- Page css files -->
    <link rel="stylesheet" href="{{ asset(mix('css/pages/dashboard-analytics.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/pages/card-analytics.css')) }}">
    <link rel="stylesheet" href="{{ asset(mix('css/plugins/tour/tour.css')) }}">
@endsection

@section('content')
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card bg-analytics text-white">
                    <div class="card-content">
                        <div class="card-body text-center">
                            <img src="http://127.0.0.1:8000/images/elements/decore-left.png" class="img-left"
                                 alt="card-img-left">
                            <img src="http://127.0.0.1:8000/images/elements/decore-right.png" class="img-right"
                                 alt="card-img-right">
                            <div class="avatar avatar-xl bg-primary shadow mt-0">
                                <div class="avatar-content">
                                    <i class="feather icon-award white font-large-1"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <h1 class="mb-2 text-white">Chào mừng {{$account_admin_name}},</h1>
                                <p class="m-auto w-75"><h2>Hôm nay bạn đã có được <strong>{{$order_now}}</strong> đơn hàng. Kiểm tra ngay <a href="{{URL::to('order-admin')}}" style="color:orangered">danh sách đơn hàng nhé.</a></h2></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="card" >
                        <div class="card-header d-flex flex-column align-items-start pb-0" >
                            <div class="avatar bg-rgba-primary p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-users text-primary font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1 mb-25">{{$total_account}}</h2>
                            <p class="mb-0"><h3>Tài khoản đã đăng kí</h3></p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header d-flex flex-column align-items-start pb-0">
                            <div class="avatar bg-rgba-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i class="feather icon-package text-warning font-medium-5"></i>
                                </div>
                            </div>
                            <h2 class="text-bold-700 mt-1 mb-25" id="total_order">{{$total_order}}</h2>
                            <p class="mb-0"><h3>Đơn đặt hàng đã nhận</h3></p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between pb-0">
                        <h4>Tổng đơn hàng </h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div id="product-order-chart"></div>
                            <div class="chart-info d-flex justify-content-between mb-1">
                                <div class="series-info d-flex align-items-center">
                                    <i class="fa fa-circle-o text-bold-700 text-primary"></i>
                                    <span class="text-bold-600 ml-50">Đã hoàn thành</span>
                                </div>
                                <div class="product-result">
                                    <span><h2 id="content_finish">{{$total_order_finish}}</h2></span>
                                </div>
                            </div>
                            <div class="chart-info d-flex justify-content-between mb-1">
                                <div class="series-info d-flex align-items-center">
                                    <i class="fa fa-circle-o text-bold-700 text-warning"></i>
                                    <span class="text-bold-600 ml-50">Đang xử lý</span>
                                </div>
                                <div class="product-result">
                                    <span ><h2 id="content_load">{{$total_order_load}}</h2></span>
                                </div>
                            </div>
                            <div class="chart-info d-flex justify-content-between mb-75">
                                <div class="series-info d-flex align-items-center">
                                    <i class="fa fa-circle-o text-bold-700 text-danger"></i>
                                    <span class="text-bold-600 ml-50">Đã hủy</span>
                                </div>
                                <div class="product-result">
                                    <span ><h2 id="content_cancel">{{$total_order_cancel}}</h2></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Đơn hàng trong 30 ngày</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="chart-days" style="width:100%; height:auto;"></div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                    <!-- /.card-footer -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Đơn hàng trong 12 tháng</h5>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="chart-month" style="width:100%; height:auto;"></div>
                            </div>
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- Scatter Chart -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Đơn đặt hàng chưa hoàn thành</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive mt-1">
                            <table class="table table-hover-animation mb-0">
                                <thead>
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Mã khách hàng</th>
                                    <th>Tên khách hàng</th>
                                    <th>Số điện thoại</th>
                                    {{--                    <th>Tên sản phẩm</th>--}}
                                    <th>Ngày đặt</th>
                                    <th>Thành tiền</th>
                                    <th>Trạng thái</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $list as $item)

                                    <tr >
                                    <td><i class="fa fa-circle font-small-3 text-success mr-50"></i>#{{$item->id}}</td>
                                    <td>{{$item -> account_id}}</td>
                                    <td>{{$item -> shipping_name}}</td>
                                    <td>{{$item -> shipping_phone}}</td>
                                    <td>{{$item -> created_at}}</td>
                                    <td>{{number_format($item-> total_money).' VNĐ'}}</td>
                                    <td>
                                        @if($item->shipping_status == 1)
                                            Chờ xác nhận
                                        @else
                                        Đang vận chuyển
                                        @endif</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div style="text-align: center" >
                            <span style="display: inline-block">{{ $list->links()}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Dashboard Analytics end -->


@endsection

@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset(mix('vendors/js/charts/apexcharts.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/tether.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/extensions/shepherd.min.js')) }}"></script>
    <script src="{{ asset(mix('vendors/js/charts/echarts/echarts.min.js')) }}"></script>
@endsection
@section('page-script')
    <!-- Page js files -->
    <script src="{{ asset(mix('js/scripts/pages/dashboard-analytics.js')) }}"></script>
    <script src="{{ asset('chartjs/highcharts.js') }}"></script>
    <script src="{{ asset('chartjs/highcharts-3d.js') }}"></script>
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            var myChart = Highcharts.chart('chart-days', {
                credits: {
                    enabled: false
                },
                title: {
                    text: 'Thống kê theo ngày'
                },
                xAxis: {
                    categories: {!! json_encode(array_keys($orderInMonth)) !!},
                    crosshair: false

                },

                yAxis: [{
                    min: 0,
                    title: {
                        text: 'Tổng đơn hàng'
                    },
                }, {
                    title: {
                        text: 'Tổng số tiền (VNĐ)'
                    },
                    opposite: true
                },
                ],

                legend: {
                    align: 'left',
                    verticalAlign: 'top',
                    borderWidth: 0
                },

                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.0f} </b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    },
                },

                series: [
                    {
                        type: 'column',
                        name: 'Tổng đơn hàng',
                        data: {!! json_encode(array_values($orderInMonth)) !!},
                        dataLabels: {
                            enabled: true,
                            format: '{point.y:.0f}'
                        }
                    },
                    {
                        type: 'spline',
                        name: 'Tổng số tiền',
                        color: '#32ca0c',
                        yAxis: 1,
                        data: {!! json_encode(array_values($amountInMonth)) !!},
                        borderWidth: 0,
                        dataLabels: {
                            enabled: true,
                            borderRadius: 3,
                            backgroundColor: 'rgba(252, 255, 197, 0.7)',
                            borderWidth: 0.5,
                            borderColor: '#AAA',
                            y: -6
                        }
                    },
                ]
            });
        });
        // Set up the chart
        var chart = new Highcharts.Chart({
            chart: {
                renderTo: 'chart-month',
                type: 'column',
                options3d: {
                    enabled: true,
                    alpha: 0,
                    beta: 10,
                    depth: 50,
                    viewDistance: 25
                }
            },
            title: {
                text: 'Thống kê trong 12 tháng'
            },
            subtitle: {
                text: 'Dữ liệu so sánh bằng tổng số tiền của đơn hàng, đơn vị VNĐ'
            },
            legend: {
                enabled: false,
            },
            credits: {
                enabled: false
            },
            xAxis: {
                categories: {!! json_encode(array_keys($dataInYear)) !!},
                crosshair: false,
            },
            yAxis: [
                {
                    min: 0,
                    title: {
                        text: 'Tổng số tiền'
                    },
                }
            ],
            plotOptions: {
                column: {
                    depth: 25
                },
                series: {
                    dataLabels: {
                        enabled: true,
                        borderRadius: 3,
                        backgroundColor: 'rgba(252, 255, 197, 0.7)',
                        borderWidth: 0.5,
                        borderColor: '#AAA',
                        y: -6
                    }
                }
            },
            series: [
                {
                    name : 'Tổng số tiền',
                    data: {!! json_encode(array_values($dataInYear)) !!},
                },
                {
                    type : 'spline',
                    color: '#d05135',
                    name : 'Tổng số tiền',
                    data: {!! json_encode(array_values($dataInYear)) !!}
                }
            ]
        });
    </script>
@endsection
