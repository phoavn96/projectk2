<?php

namespace App\Http\Controllers;

use App\Account;
use App\Brand;
use App\Category;
use App\Order;
use App\OrderDetai;
use App\Product;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\ExcelExports;
use Excel;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function print_order($id)
    {

        $total = 0;
        $obj = Order::find($id);
        $pdf = App::make('dompdf.wrapper');

        $output = '';
        foreach ($obj->order_detail as $detail) {
            $total += $detail->unit_price * $detail->quantity;
        }


        $output .= '<style>body{
			font-family: DejaVu Sans;
		}
		h2,h3{
		padding: -6px;
		}
		.table-styling{
			border:1px solid #000;
		}
		th{
		color: #0d7091;
		}
		.table-styling{
			border:1px solid #000;
		}
		td,th{
		padding: 10px;
		}
		th,tr,td{
		border:1px solid #000;
		}
		.table-styling td{
		text-align: center;
		}
		</style>
		<h3 style="color: red"><center>Công ty TNHH một thành viên ShopAz</center></h3>
		<h3><center>Cộng hòa xã hội chủ nghĩa Việt Nam</center></h3>
		<h3><center>Độc lập - Tự do - Hạnh phúc</center></h3>
		<h2 style="color: red"><center>Phiếu Mua Hàng</center></h2>
		<div style="text-align: right;font-style: italic">Hà Nội,ngày...,tháng...,năm.....</div>';

        $output .= '

						<div><span style="font-weight: bold">Tên Khách Hàng</span>:  ' . $obj->shipping_name . '</div>
						<div><span style="font-weight: bold">Số Điện Thoại</span>:  ' . $obj->shipping_phone . '</div>
						<div><span style="font-weight: bold">Địa chỉ email</span>:  ' . $obj->shipping_email . '</div>
						<div><span style="font-weight: bold">Ngày Đặt Hàng</span>:  ' . $obj->updated_at . '</div>

					</tr>';


        $output .= '


		<p>NGƯỜI NHẬN</p>
			<table class="table-styling">
				<thead>
					<tr>
						<th>Người Nhận</th>
						<th>Địa Chỉ</th>
						<th>SĐT</th>
						<th>Email</th>
						<th>Ghi Chú</th>
					</tr>
				</thead>
				<tbody>';

        $output .= '
					<tr>
						<td>' . $obj->shipping_name . '</td>
						<td>' . $obj->shipping_address . '</td>
						<td>' . $obj->shipping_phone . '</td>
						<td>' . $obj->shipping_email . '</td>
						<td>' . $obj->shipping_notes . '</td>

					</tr>';


        $output .= '
				</tbody>

		</table>

		<p>ĐƠN HÀNG</p>
			<table class="table-styling">
              <thead>
              <tr>
                  <th>Mã đơn hàng</th>
                  <th>Tên sản phẩm</th>
                  <th>Kích cỡ</th>
                  <th>Số lượng</th>
                  <th>Đơn giá</th>

              </tr>
              </thead>
              <tbody>
              <tr>';
        $output .= '<td>' . $obj->id . '</td><td>';
        foreach ($obj->products_total as $detail) {
            $output .= '<div style = "padding-bottom: 30px" >' . $detail->product_name . '</div >';
        }
        $output .= '</td ><td >';
        foreach ($obj->order_detail as $detail) {
            $output .= '<div style = "padding-bottom: 30px" >' . $detail->size . '</div >';
        }
        $output .= '</td ><td>';
        foreach ($obj->order_detail as $detail) {
            $output .= '<div style = "padding-bottom: 30px" >' . $detail->quantity . '</div >';
        }
        $output .= '</td ><td>';
        foreach ($obj->products_total as $detail) {
            $output .= '<div style = "padding-bottom: 30px" >' . number_format($detail->product_price) . 'VNĐ' . '</div >';
        }
        $output .= '</td></tr >
              <tr >
              <td class="font-weight-bold" > Tạm tính </td >

              <td colspan="3" style="text-align: right">' .
            number_format($total) . ' VNĐ' . '
              </td>
            </tr>

            <tr >
              <td class="font-weight-bold" > Mã giảm giá </td >';
        if ($obj->code) {
            $output .= '<td colspan="3" style="text-align: right">' .
                number_format($total * $obj->reducemoney / 100) . ' VNĐ' . '
              </td>';
        } else {
            $output .= '<td colspan="3" style="text-align: right">' .
                0 . ' VNĐ' . '
              </td>';
        }

        $output .= '
            </tr>

            <tr >
              <td class="font-weight-bold" > Tổng tiền </td >

              <td colspan="3" style="text-align: right">' .
            number_format($obj->total_money) . ' VNĐ' . '
              </td>
            </tr>



          </table>

              ';
        $output .= '


		<br>
			<table>
				<thead>
					<tr>
						<th style="border: none" width="200px">Người lập phiếu</th>
						<th style="border: none" width="800px">Khách Hàng</th>

					</tr>
				</thead>
				<tbody>';

        $output .= '
				</tbody>

		</table>

		';

        $pdf->loadHTML($output);
        return $pdf->stream();
//        $data['obj'] = Order::where('id','=',9);
//        $pdf = PDF::loadView('admin.order.detail_order',compact($data) );
//        return $pdf->download('invoice.pdf');

//
    }
//
//    public function print_order_convert($checkout_code)
//    {
//        return $checkout_code;
//    }

    public function change_status(Request $request, $id)
    {
        $order = Order::find($id);
        $order->shipping_status = $request->ship_status;
        $order->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $order->save();

        $user = Order::findOrFail($id);
        $data = array(
            'username' => $order->shipping_name,
            'namegift' => $order->shipping_status,
            'transaction' => $user->id);
        Mail::send('admin.email.send_order_status', $data, function ($message) use ($order) {
            $message->to($order->shipping_email, $order->shipping_name)->subject('Chào '.$order->shipping_name.'. ShopAz thông báo tình trạng đơn hàng mã #'.$order->id.' của bạn!');
            $message->from('locnxth1907005@fpt.edu.vn', 'ShopAz');
        });
        return back()->withInput();;
    }

    public function export_excel()
    {
        return Excel::download(new ExcelExports(), 'Order .xlsx');
    }
//     public function export($id)
//    {
//        $query=DB::table('Orders')
//            ->where('id',$id)
//            ->get();
//        return Excel::download( $query, 'order.xlsx');
//    }

    public
    function index(Request $request)
    {
        // tạo biến data là một mảng chứa dữ liệu trả về.
        $data = array();
        $data['shipping_status'] = 0;
        $data['orderInMonth'] = [];
        $data['amountInMonth'] = [];
        $order_list = Order::query()->orderby('created_at', 'desc');
        if ($request->has('shipping_status') && $request->get('shipping_status') > 0) {
            $data['shipping_status'] = $request->get('shipping_status');
            $order_list = $order_list->where('shipping_status', '=', $request->get('shipping_status'));
        }
        if ($request->has('shipping_status') && $request->get('shipping_status') == 0) {
            $data['shipping_status'] = $request->get('shipping_status');
        }
        if ($request->has('shipping_status') && $request->get('shipping_status') == 3) {
            $data['shipping_status'] = $request->get('shipping_status');
            //Order in 30 days
            $totalsInMonth = Order::selectRaw('DATE_FORMAT(updated_at, "%m-%d") AS md,
        SUM(total_money) AS total_amount, count(id) AS total_order')
                ->where('updated_at','>=',Carbon::now()->subMonths(1)->format('Y-m-d H:i:s'))
                ->where('shipping_status',3)
                ->groupBy('md')
                ->get()
                ->keyBy('md')
                ->toArray();
            $rangDays = new \DatePeriod(
                new \DateTime('-1 month'),
                new \DateInterval('P1D'),
                new \DateTime('+1 day')
            );
            $orderInMonth  = [];
            $amountInMonth  = [];
            foreach ($rangDays as $i => $day) {
                $date = $day->format('m-d');
                $orderInMonth[$date] = $totalsInMonth[$date]['total_order'] ?? '';
                $amountInMonth[$date] = ($totalsInMonth[$date]['total_amount'] ?? 0);
            }
            $data['orderInMonth'] = $orderInMonth;
            $data['amountInMonth'] = $amountInMonth;
        }
        if ($request->has('start') && strlen($request->get('start')) > 0 && $request->has('end') && strlen($request->get('end')) > 0) {
            $data['start'] = $request->get('start');
            $data['end'] = $request->get('end');
            $from = date($request->get('start') . ' 00:00:00');
            $to = date($request->get('end') . ' 23:59:00');
            $order_list = $order_list->whereBetween('updated_at', [$from, $to]);

        }
        if ($request->has('start') && strlen($request->get('start')) > 0 && $request->has('end') && strlen($request->get('end')) > 0 && $request->has('shipping_status') && $request->get('shipping_status') == 3) {
            $data['start'] = $request->get('start');
            $data['end'] = $request->get('end');
            $from = date($request->get('start') . ' 00:00:00');
            $to = date($request->get('end') . ' 23:59:00');
            $order_list = $order_list->whereBetween('updated_at', [$from, $to]);
            $totalsInMonth = Order::selectRaw('DATE_FORMAT(updated_at, "%m-%d") AS md,
        SUM(total_money) AS total_amount, count(id) AS total_order')
                ->where('updated_at','>=',Carbon::now()->subMonths(1)->format('Y-m-d H:i:s'))
                ->where('shipping_status',3)
                ->groupBy('md')
                ->get()
                ->keyBy('md')
                ->toArray();
            $rangDays = new \DatePeriod(
                new \DateTime($from),
                new \DateInterval('P1D'),
                new \DateTime($to)
            );
            $orderInMonth  = [];
            $amountInMonth  = [];
            foreach ($rangDays as $i => $day) {
                $date = $day->format('m-d');
                $orderInMonth[$date] = $totalsInMonth[$date]['total_order'] ?? '';
                $amountInMonth[$date] = ($totalsInMonth[$date]['total_amount'] ?? 0);
            }
            $data['orderInMonth'] = $orderInMonth;
            $data['amountInMonth'] = $amountInMonth;
        }
        $orders = Order::all();
        $data['list'] = $order_list->get();
        //End order in 30 days

        return view('admin.order.manage_order')->with($data)->with(compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        $obj = Order::find($id);
        return view('Admin.Order.detail_order')->with(compact('obj'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }


//    public function destroyAll(Request $request)
//    {
//        $ids = $request->get('ids');
//        // delete mềm -> chuyển trạng thái.
//        foreach (Order::whereIn('id', $ids)->get() as $value){
//            $value->product_status = -1;
//            $value->save();
//        }
//        return $request->get('ids');
//    }
}
