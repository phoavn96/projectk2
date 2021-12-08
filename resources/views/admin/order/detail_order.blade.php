@extends('layouts.layout_admin_master')

@section('title', 'Chi tiết đơn hàng')

@section('page-style')
        {{-- Page Css files --}}
        <link rel="stylesheet" href="{{ asset(mix('css/pages/app-user.css')) }}">
@endsection

@section('content')
<!-- page users view start -->
<section class="page-users-view">
  <div class="row">
    <!-- account start -->
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="card-title">Thông tin người nhận</div>
          <div class="row">
            <div class="col-2 users-view-image">
              <img src="{{ asset('images/portrait/small/avatar-s-12.jpg') }}" class="w-100 rounded mb-2"
                alt="avatar">
              <!-- height="150" width="150" -->
            </div>
            <div class="col-sm-4 col-12">
              <table>
                  <tr>
                      <td class="font-weight-bold">Mã khách hàng</td>
                      <td>{{$obj->account_id}}</td>
                  </tr>
                  <tr>
                  <td class="font-weight-bold">Tên người nhận</td>
                  <td>{{$obj->shipping_name}}</td>
                </tr>

                <tr>
                  <td class="font-weight-bold">Email</td>
                  <td>{{$obj->shipping_email}}</td>
                </tr>
              </table>
            </div>
            <div class="col-md-6 col-12 ">
              <table class="ml-0 ml-sm-0 ml-lg-0">
                <tr>
                  <td class="font-weight-bold">Điện thoại</td>
                  <td>{{$obj->shipping_phone}}</td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Địa chỉ</td>
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
    <div class="col-md-7 col-12 ">
      <div class="card">
        <div class="card-body">
          <div class="card-title mb-2">Thông tin sản phẩm</div>
          <table class="table-responsive">
              <thead>
              <tr>
                  <th scope="col">Mã sản phẩm</th>
                  <th scope="col">Tên sản phẩm</th>
                  <th scope="col">Kích cỡ</th>
                  <th scope="col">Số lượng</th>
                  <th scope="col">Ngày đặt hàng</th>
              </tr>
              </thead>
              <tbody>
              <tr>
                  <td>@foreach($obj->order_detail as $detail)
                          <div style="padding-bottom: 30px">{{$detail ->product_id}}</div>
                      @endforeach
                  </td>
                  <td>@foreach($obj->products_total as $detail)
                          <div style="padding-bottom: 30px">{{$detail ->product_name}}</div>
                      @endforeach
                  </td>
                  <td >@foreach($obj->order_detail as $detail)
                          @if($detail ->size == null)
                              <div style="padding-bottom: 30px"></div>
                          @else
                              <div style="padding-bottom: 30px">{{$detail ->size}}</div>
                          @endif
                      @endforeach
                  </td>
                  <td >@foreach($obj->order_detail as $detail)
                          <div style="padding-bottom: 30px">{{$detail ->quantity}}</div>
                      @endforeach
                  </td>

                  <td>{{$obj -> updated_at}}</td>
              </tr>
              @php $total =0; @endphp
              <tr>
                  <td class="font-weight-bold">Tạm tính</td>
                  @foreach($obj->order_detail as $detail)
                      @php
                          $total+=$detail->unit_price * $detail->quantity;
                      @endphp
                  @endforeach
                  <td>{{number_format($total).' VNĐ'}}
                  </td>
              </tr>
              <tr>
                  <td class="font-weight-bold">Mã giảm giá</td>
                  @if($obj->code)
                      <td>{{number_format($total * $obj->reducemoney /100).' VNĐ'}}</td>
                      @else <td>0 VNĐ</td>
                      @endif

              </tr>
            <tr>
              <td class="font-weight-bold">Tổng tiền</td>
              <td>{{number_format($obj-> total_money).' VNĐ'}}
              </td>
            </tr>
              <tr>
                  <td class="font-weight-bold">Ghi chú</td>
                  <td>{{$obj -> shipping_notes}}
                  </td>
              </tr>
              <tr>
                  <td class="font-weight-bold">Cho xem hàng trước</td>
                  <td>Có
                  </td>
              </tr>
              @if($obj->shipping_status==3)
              <tr>
                  <td style="color: blue"><a href="{{url('/print-order/'.$obj->id)}}" target="_blank"><i class="feather icon-file"></i>In Đơn Hàng</a></td>
              </tr>
              @endif
          </table>
        </div>
      </div>
    </div>
    <!-- information start -->
    <!-- social links end -->
    <div class="col-md-5 col-12 ">
      <div class="card">
        <div class="card-body">
          <div class="card-title mb-2">Thông tin cửa hàng</div>
          <table>
            <tr>
              <td class="font-weight-bold">Tên cửa hàng</td>
              <td>ShopAz
              </td>
            </tr>
            <tr>
              <td class="font-weight-bold">Website</td>
              <td>https://shopaz.com.vn
              </td>
            </tr>
            <tr>
              <td class="font-weight-bold">Địa chỉ</td>
              <td>Số 8 Tôn Thất Thuyết, Cầu giấy, Hà Nội
              </td>
            </tr>
            <tr>
              <td class="font-weight-bold">Địa thoại</td>
              <td>0988.888.888
              </td>
            </tr>
          </table>
        </div>
          <div class="card-body">
              <div class="card-title mb-2">Trạng thái đơn hàng</div>
              <form action={{URL::to('/change-status/'.$obj->id)}} method="get" id="changestatus" style="width: 170px">
                  @csrf
                  <select  name="ship_status" class="form-control" id="status">
                      @if($obj->shipping_status ==3)
                          <option>Hoàn thành</option>
                      @elseif($obj->shipping_status ==4)
                          <option>Hủy đơn
                          </option>
                      @elseif($obj->shipping_status ==2)
                          <option value="2" {{$obj->shipping_status ==2 ? 'selected':''}}>Đang vận
                              chuyển
                          </option>
                          <option value="3" {{$obj->shipping_status ==3 ? 'selected':''}}>Hoàn thành
                          </option>
                          <option value="4" {{$obj->shipping_status ==4 ? 'selected':''}}>Hủy đơn
                          </option>
                      @else
                          <option  value="1" {{$obj->shipping_status ==1 ? 'selected':''}}>Chờ xác
                              nhận
                          </option>
                          <option value="2" {{$obj->shipping_status ==2 ? 'selected':''}}>Đang vận
                              chuyển
                          </option>
                          <option value="3" {{$obj->shipping_status ==3 ? 'selected':''}}>Hoàn thành
                          </option>
                          <option value="4" {{$obj->shipping_status ==4 ? 'selected':''}}>Hủy đơn
                          </option>
                      @endif
                  </select>
              </form>
          </div>
      </div>
    </div>
    <!-- social links end -->
  </div>
</section>
<!-- page users view end -->
@endsection
@section('page-script')
  {{-- Page js files --}}
  <script src="{{ asset(mix('js/scripts/pages/app-user.js')) }}"></script>
    <script>
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
    </script>
@endsection
