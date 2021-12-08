@extends('layouts.layout_admin_master')

@section('title', 'Danh sách đơn hàng')

@section('vendor-style')
    {{-- vendor files --}}
    <link rel="stylesheet" href="{{asset('vendors/css/file-uploaders/dropzone.min.css') }}">
    <link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{asset('vendors/css/tables/datatable/extensions/dataTables.checkboxes.css') }}">
@endsection
@section('page-style')
    {{-- Page css files --}}
    <link rel="stylesheet" href="{{ asset('css/plugins/file-uploaders/dropzone.css') }}">
    <link rel="stylesheet" href="{{ asset('css/pages/data-list-view.css') }}">
@endsection
@section('content')
    {{-- Data list view starts --}}
    <section id="data-thumb-view" class="data-thumb-view-header">
        <div class="action-btns d-none">
            <div class="btn-dropdown mr-1 mb-1">
                <div class="btn-group dropdown actions-dropodown">
                    <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Hành động
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="javascript:void(0)" id="export"><i class="feather icon-file"></i>In</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <form action="/order-admin" method="get" id="order_form" class="col-md-10">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Chọn theo trạng thái đơn
                                                hàng</label>
                                            <select name="shipping_status" class="form-control" id="order">
                                                <option value="0">Tất cả</option>
                                                <option value="1" {{$shipping_status == 1 ? 'selected':''}}>Chờ xác
                                                    nhận
                                                </option>
                                                <option value="2" {{$shipping_status == 2 ? 'selected':''}}>Đang vận
                                                    chuyển
                                                </option>
                                                <option value="3" {{$shipping_status == 3 ? 'selected':''}}>Hoàn thành
                                                </option>
                                                <option value="4" {{$shipping_status == 4 ? 'selected':''}}>Đã hủy
                                                </option>

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="exampleFormControlSelect1">Tìm kiếm theo thời gian</label>
                                            <input type="text" name="dates" class="form-control">
                                            <input type="hidden" name="start">
                                            <input type="hidden" name="end">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <form action="{{url('/export-excel')}}" method="POST" class="col-md-2" style="margin-top: 20px">
                                @csrf
                                <input type="submit" value="Export File Excel" name="export_csv" id="export_excel"class="btn btn-success">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if($orderInMonth !=null)
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Thông kê doanh thu đơn hàng</h5>

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
        @endif

        <?php
        $message = Session::get('message');
        if ($message) {
            echo '<span style="color:#1b6d85;font-size:17px;width: 100%;text-align: center;font-weight: bold;">' . $message . '</span>';
            Session::put('message', null);
        }
        ?>

        {{-- dataTable starts --}}
        <div class="table-responsive">

            <table class="table data-thumb-view">
                <thead>
                <tr>
                    <th class="border-0 font-14 font-weight-medium text-muted">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkAll" value="0">
                            <label class="custom-control-label" for="checkAll"></label>
                        </div>
                    </th>
                    <th>Mã đơn hàng</th>
                    <th>Mã khách hàng</th>
                    <th>Tên khách hàng</th>
                    <th>Số điện thoại</th>
{{--                    <th>Tên sản phẩm</th>--}}
                    <th>Ngày đặt</th>
                    <th>Thành tiền</th>
                    <th>Trạng thái</th>
                    <th>Chi Tiết</th>
                </tr>
                </thead>
                <tbody>
                    @foreach( $list as $item)
                    <tr>
                        <td class="border-top-0 px-2 py-4">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input order-checkbox"
                                       value="{{$item->id}}" id="checkbox_{{$item->id}}">
                                <label class="custom-control-label"
                                       for="checkbox_{{$item->id}}"></label>
                            </div>
                        </td>
                    <td>{{$item -> id}}</td>
                    <td>{{$item -> account_id}}</td>
                    <td>{{$item -> shipping_name}}</td>
                        <td>{{$item -> shipping_phone}}</td>
                        <td>{{$item -> created_at}}</td>


{{--                        <td>@foreach($item->order_detail as $detail)--}}
{{--                            <div>{{$detail ->product_name}}</div>--}}
{{--                        @endforeach</td>--}}
                    <td>{{number_format($item-> total_money).' VNĐ'}}</td>
                    <td>
                        <form action={{URL::to('/change-status/'.$item->id)}} method="get" id="changestatus" style="width: 170px">
                            @csrf
                            <select  name="ship_status" class="form-control" id="status">
                                @if($item->shipping_status ==3)
                                    <option>Hoàn thành</option>
                                @elseif($item->shipping_status ==4)
                                    <option>Hủy đơn
                                    </option>
                                @elseif($item->shipping_status ==2)
                                    <option value="2" {{$item->shipping_status ==2 ? 'selected':''}}>Đang vận
                                        chuyển
                                    </option>
                                    <option value="3" {{$item->shipping_status ==3 ? 'selected':''}}>Hoàn thành
                                    </option>
                                    <option value="4" {{$item->shipping_status ==4 ? 'selected':''}}>Hủy đơn
                                    </option>
                                @else
                                <option  value="1" {{$item->shipping_status ==1 ? 'selected':''}}>Chờ xác
                                    nhận
                                </option>
                                <option value="2" {{$item->shipping_status ==2 ? 'selected':''}}>Đang vận
                                    chuyển
                                </option>
                                <option value="3" {{$item->shipping_status ==3 ? 'selected':''}}>Hoàn thành
                                </option>
                                <option value="4" {{$item->shipping_status ==4 ? 'selected':''}}>Hủy đơn
                                </option>
                                    @endif
                            </select>
                        </form>
                    </td>
                    <td>
                        <a href="{{URL::to('/order-admin/'.$item->id)}}"
                           class="active styling-edit" ui-toggle-class=""><i
                           class="fa fa-info-circle text-success text-active"></i>
                        </a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- dataTable ends --}}

    </section>
    {{-- Data list view end --}}
@endsection
@section('vendor-script')
    {{-- vendor js files --}}
    <script src="{{ asset('vendors/js/extensions/dropzone.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="{{ asset('chartjs/highcharts.js') }}"></script>
    <script src="{{ asset('chartjs/highcharts-3d.js') }}"></script>
@endsection
@section('page-script')
    <script src="{{ asset('js/scripts/ui/data-list-order.js') }}"></script>

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
    </script>


    <script>
        // bắt sự kiện vào checkbox check all.
        $('#checkAll').click(function () {
            // chuyển trạng thái check của tất cả checkbox có class 'order-checkbox'
            // theo trạng thái của checkbox checkall.
            $('.order-checkbox').prop('checked', $(this).prop('checked'));
        });

    </script>
    <script>
        $('input[name="dates"]').daterangepicker(
            {
                locale: {
                    format: 'DD/MM/YYYY'
                },
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                }
            }
        );
        $('#order').change(function () {
            $('#order_form').submit();
        })


        $('#status').change(function () {
            Swal.fire({
                title: 'Bạn muốn thay đổi trạng thái của đơn hàng này?',
                text: "Thao tác của bạn không thể hoàn nguyên!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Đúng, Thực hiện nó!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#changestatus').submit();
                    Swal.fire(
                        'Chúc mừng!',
                        'Thao tác của bạn đã được thực hiện.',
                        'success'
                    )
                }
            })

        })

        $('input[name="dates"]').on('apply.daterangepicker', function (ev, picker) {
            $('input[name="start"]').val(picker.startDate.format('YYYY-MM-DD'));
            $('input[name="end"]').val(picker.endDate.format('YYYY-MM-DD'));
            $('#order_form').submit();
            $('input[name="dates"]').val(setValue(picker.endDate.format('YYYY-MM-DD')));

        });
    </script>

@endsection
