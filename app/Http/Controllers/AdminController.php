<?php

namespace App\Http\Controllers;

use App\Account;
use App\Http\Requests\AccountRequest;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function Index()
    {
        return view('admin.login');
    }

    public function ShowDashbord(Request $request)
    {
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

        //End order in 30 days
        $totalsMonth = Order::selectRaw('DATE_FORMAT(updated_at, "%Y-%m") AS ym, SUM(total_money) AS total_amount')
            ->where('updated_at','>=',Carbon::now()->subMonths(12)->format('Y-m'))
            ->where('shipping_status',3)
            ->groupBy('ym')
            ->get()
            ->pluck('total_amount', 'ym')
            ->toArray();
        $dataInYear = [];
        for ($i = 12; $i >= 0; $i--) {
            $date = date("Y-m", strtotime(date('Y-m-01') . " -$i months"));
            $dataInYear[$date] = $totalsMonth[$date] ?? 0;
        }
        $data['dataInYear'] = $dataInYear;
        //End order in 12 months

        $list = Order::whereBetween('shipping_status',[1,2])->orderby('updated_at', 'desc')->paginate(4);
        $account_admin_name = Session::get('admin_name');
        $order_now = Order::whereDate('created_at',Carbon::today())->count();
        $total_account = Account::all()->count();;
        $total_order = Order::all()->count();
        $total_order_finish = Order::where('shipping_status',3)->count();
        $total_order_cancel = Order::where('shipping_status',4)->count();
        $total_order_load = Order::whereBetween('shipping_status',[1,2])->count();

        return view('admin.dashboard',$data)->with(compact('account_admin_name','order_now'
            ,'total_account','total_order','total_order_finish','total_order_cancel','total_order_load','list'));
    }

    public function DoLogout(){
        if (\Illuminate\Support\Facades\Session::has('admin_name')){
            Session::remove('admin_name');
        }
        if (\Illuminate\Support\Facades\Session::has('admin_id')){
            Session::remove('admin_id');
        }
        if (\Illuminate\Support\Facades\Session::has('admin_role')){
            Session::remove('admin_role');
        }
        return Redirect::to('/login');
    }

    public function DoLogin(Request $request)
    {
        $email = $request->get('email');
        $account = Account::where('email', '=', $email)->where('status', '=', '1')->first();
//        echo "<pre>";
//        print_r($account->password);
//        print_r('|||||');
//
//        print_r(md5($account->salt . '123'));
//
//        echo "</pre>";
        if ($account) {
            $passwordHash = $account->password;
            $salt = $account->salt;
            $role = $account->role;
            $password = $request->get('password');
            $md5Password = md5($password . $salt);
            if ($passwordHash == $md5Password && $role == 1) {
                Session::put('admin_name', $account->name);
                Session::put('admin_id', $account->id);
                Session::put('admin_role', $account->role);
                return Redirect::to('/dashboard');
            } else {
                Session::put('message', 'Mật khẩu không đúng');
                return Redirect::to('/login');
            }
        } else {
            Session::put('message', 'Tài khoản không tồn tại hoặc đã bị khóa!');
            return Redirect::to('/login');
        }
    }

    public function SignUp()
    {
        $msgcheck = '';
        return view('Admin.register')->with('msgcheck', $msgcheck);
    }

    public function DoSignUp(AccountRequest $request)
    {
        $request->validated();
        $obj = new Account();
        $obj->email = $request->email;
        $obj->name = $request->name;
        $obj->phone = $request->phone;

        $salt = $this->generateRandomString(5);
        $password = $request->password;
        $passwordHash = md5($password . $salt);

        $obj->salt = $salt;
        $obj->password = $passwordHash;
        $obj->role = 1;
        $obj->status = 1;
        $obj->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $obj->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        if (Account::where('email', '=', $obj->email)->first() === null) {
            $obj->save();
            return view('admin.login');
        } else {
            $msgcheck = 'Tài khoản đã tồn tại!';
            return view('admin.register')->with('msgcheck', $msgcheck);
        }
    }

    public function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
