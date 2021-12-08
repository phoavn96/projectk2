<?php

namespace App\Http\Controllers;

use App\Account;
use App\Compare;
use App\compare_free;
use App\Discount;
use App\Http\Requests\AccountRequest;
use App\Http\Requests\CheckoutValidate;
use App\Order;
use App\OrderDetai;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Telegram\Bot\Laravel\Facades\Telegram;

class CheckoutController extends Controller
{


    public function show_edit(){
        $all_product = Product::where('product_status','=',1)->orderby('updated_at', 'desc')->paginate(9);
        if (Session::has('customer_id')){
            $account=Account::where('id','=',Session::get('customer_id'))->where('status','=','1')->first();
            return view('pages.checkout.edit-information')->with('all_product', $all_product)->with('account',$account);
        }

        return view('pages.account.login')->with('all_product', $all_product);
    }
    public function edit_information(Request $request){
        $validatedData = $request->validate([
            'phone' => 'numeric',
        ]);
        $all_product = Product::where('product_status','=',1)->orderby('updated_at', 'desc')->paginate(9);
        if (Session::has('customer_id')){
        $account=Account::where('id','=',Session::get('customer_id'))->where('status','=','1')->first();
        $account->name = $request->name;
        $account->phone = $request->phone;
        $salt = $account->salt;
        $passwordHash = $account->password;
        $account->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        if (md5($request->old_password .$salt ) != $passwordHash){
            Session::put('message','Sai mật khẩu hiện tại!');
            return Redirect('/edit-information');
        }
        else{
            if ($request->new_password != $request->confirm_password){
                Session::put('message','Mật khẩu mới không trùng khớp!');
                return Redirect('/edit-information');
            }
            $account->password = md5($request->new_password.$salt);
            $account->save();
        }
            Session::put('message','Thay đổi thông tin thành công!');
        return view('pages.checkout.information')->with('all_product', $all_product)->with('account',$account);
    }
    return Redirect::to('/login-user')->with('all_product', $all_product);
    }
    public function show_information(){
        if (Session::has('customer_id')){
            $account=Account::where('id','=',Session::get('customer_id'))->where('status','=','1')->first();
        return view('pages.checkout.information')->with('account',$account);
    }

        return Redirect::to('/login-user');
    }

    // xử lý lưu thông tin gửi hàng của người dùng đã đăng nhập thành công
    public function save_checkout_customer(CheckoutValidate $request)
    {
        if (Session::has('customer_id') != null &&Session::has('shoppingCart') != null){
            $shoppingCart = Session::get('shoppingCart');
            // nếu session ko có thông tin giỏ hàng
            if ($shoppingCart == null) {
                // thì tạo mới giỏ hàng là một mảng các key và value
                $shoppingCart = array(); // key và value
            }
            $request->validated();
            $obj = new Order();
            if (Session::has('coupon')){
                foreach (Session::get('coupon') as $value)
                $obj->reducemoney = $value['coupon_value'];
                $obj->code = $value['coupon_name'];
            }
            $obj->shipping_email = $request ->get('shipping_email');
            $obj->shipping_name = $request ->get('shipping_name');
            $obj->shipping_address = $request ->get('shipping_address');
            $obj->shipping_phone = $request ->get('shipping_phone');
            $notes = $request->get('shipping_notes');
            if ($notes == null || $notes == '') {
                $obj->shipping_notes = '';
            } else {
                $obj->shipping_notes = $notes;
            }
            $obj->order_status = $request ->get('order_status');
            $obj->shipping_status = 1;
            $obj->account_id = session::get('customer_id');
            $orderDetails = array();
            foreach ($shoppingCart as $key => $cartItem){
                $id = $cartItem['id'];
                $product = Product::find($id);
                if($product == null){
                    continue;
                }
                $quantity = $cartItem['quantity'];
                $size = $cartItem['size'];
                $orderDetail = new OrderDetai();
                $orderDetail->product_id = $id;
                $orderDetail->quantity = $quantity;
                $orderDetail->unit_price = $product->product_price;
                $orderDetail->size = $size;
                $obj -> total_money += $orderDetail->unit_price * $orderDetail->quantity;
                array_push($orderDetails, $orderDetail);
            }

            DB::transaction(function() use ($obj, $orderDetails) {
                if (Session::has('total')){
                    $obj -> total_money = (Session::get('total'));
                }
                $obj->save(); // có id của order.
                Session::put('order_id',$obj->id);
                foreach ($orderDetails as $orderDetail){
                    $orderDetail->order_id = $obj->id;
                    $orderDetail->save();
                }
            });
            $user = Order::findOrFail(Session::get('order_id'));
            $data = array('username' => $user->shipping_name, 'namegift' => $user->shipping_status, 'transaction' =>  $user->id);
            Mail::send('admin.email.send_order_user', $data, function ($message) use ($user) {
                $message->to($user -> shipping_email, $user->shipping_name) -> subject('ShopAz - Chúc mừng '.$user->shipping_name.' Bạn đã đặt hàng thành công. Mã đơn hàng của bạn là '.$user->id);
                $message->from('locnxth1907005@fpt.edu.vn', 'ShopAz');
            });
            $datas = array('username' => "ADMIN", 'transaction' =>  $user->id);
            Mail::send('admin.email.send_admin', $datas, function ($message) use ($user) {
                 $message->to('locnxth1907005@fpt.edu.vn', "ADMIN") -> subject('ShopAz - Chúc mừng bạn vừa có thêm 1 đơn hàng mới, mã đơn hàng là '.$user->id);
                 $message->from('locnxth1907005@fpt.edu.vn', 'ShopAz');
             });
            $text = "Thông báo từ ShopAz\n"
                . "<b>Chúc mừng: </b>\n"
                . "Chúc mừng bạn đã có thêm 1 đơn hàng mới\n"
                . "<b>Vui lòng kiểm tra để xác nhận đơn hàng nào!</b>\n";
            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001477715102'),
                'parse_mode' => 'HTML',
                'text' => $text
            ]);
            Session::remove('shoppingCart');
            Session::remove('total');
            Session::remove('coupon');
            return \redirect('end-cart');
        }
        Session::put('message', 'Bạn chưa đăng nhập, vui lòng đăng nhập để tiếp tục đặt hàng');
        return view('pages.account.login');

    }
    public function save_checkout_custcomer_paypal(Request $request)
    {
        if (Session::has('customer_id') != null){
            $shoppingCart = Session::get('shoppingCart');
            // nếu session ko có thông tin giỏ hàng
            if ($shoppingCart == null) {
                // thì tạo mới giỏ hàng là một mảng các key và value
                $shoppingCart = array(); // key và value
            }
            $obj = new Order();
            if (Session::has('coupon')){
                foreach (Session::get('coupon') as $value)
                    $obj->reducemoney = $value['coupon_value'];
                $obj->code = $value['coupon_name'];
            }
            $obj->shipping_email = $request ->get('shipping_email');
            $obj->shipping_name = $request ->get('shipping_name');
            $obj->shipping_address = $request ->get('shipping_address');
            $obj->shipping_phone = $request ->get('shipping_phone');
            $notes = $request->get('shipping_notes');
            if ($notes == null || $notes == '') {
                $obj->shipping_notes = '';
            } else {
                $obj->shipping_notes = $notes;
            }
            $obj->order_status = $request ->get('order_status');
            $obj->shipping_status = 1;
            $obj->account_id = session::get('customer_id');
            $orderDetails = array();
            foreach ($shoppingCart as $key => $cartItem){
                $id = $cartItem['id'];
                $product = Product::find($id);
                if($product == null){
                    continue;
                }
                $quantity = $cartItem['quantity'];
                $size = $cartItem['size'];
                $orderDetail = new OrderDetai();
                $orderDetail->product_id = $id;
                $orderDetail->quantity = $quantity;
                $orderDetail->unit_price = $product->product_price;
                $orderDetail->size = $size;
                $obj -> total_money += $orderDetail->unit_price * $orderDetail->quantity;
                array_push($orderDetails, $orderDetail);
            }

            DB::transaction(function() use ($obj, $orderDetails) {
                if (Session::has('total')){
                    $obj -> total_money = (Session::get('total'));
                }
                $obj->save(); // có id của order.
                Session::put('order_id',$obj->id);
                foreach ($orderDetails as $orderDetail){
                    $orderDetail->order_id = $obj->id;
                    $orderDetail->save();
                }
            });
            $user = Order::findOrFail(Session::get('order_id'));
            $data = array('username' => $user->shipping_name, 'namegift' => $user->shipping_status, 'transaction' =>  $user->id);
            Mail::send('admin.email.send_order_user', $data, function ($message) use ($user) {
                $message->to($user -> shipping_email, $user->shipping_name) -> subject('ShopAz - Chúc mừng '.$user->shipping_name.' Bạn đã đặt hàng thành công. Mã đơn hàng của bạn là '.$user->id);
                $message->from('locnxth1907005@fpt.edu.vn', 'ShopAz');
            });
            $datas = array('username' => "ADMIN", 'transaction' =>  $user->id);
            Mail::send('admin.email.send_admin', $datas, function ($message) use ($user) {
                $message->to('locnxth1907005@fpt.edu.vn', "ADMIN") -> subject('ShopAz - Chúc mừng bạn vừa có thêm 1 đơn hàng mới, mã đơn hàng là '.$user->id);
                $message->from('locnxth1907005@fpt.edu.vn', 'ShopAz');
            });
            $text = "Thông báo từ ShopAz\n"
                . "<b>Chúc mừng: </b>\n"
                . "Chúc mừng bạn đã có thêm 1 đơn hàng mới\n"
                . "<b>Vui lòng kiểm tra để xác nhận đơn hàng nào!</b>\n";
            Telegram::sendMessage([
                'chat_id' => env('TELEGRAM_CHANNEL_ID', '-1001477715102'),
                'parse_mode' => 'HTML',
                'text' => $text
            ]);

            Session::remove('shoppingCart');
            Session::remove('total');
            Session::remove('coupon');
            return \redirect('end-cart');
        }
        Session::put('message', 'Bạn chưa đăng nhập, vui lòng đăng nhập để tiếp tục đặt hàng');
        return view('pages.account.login');

    }
    public function change_shipping(){
        $obj = Order::find(Session::get('order_id'));
        Session::remove('shoppingCart');
        return redirect('order-management');
    }
    // view đăng nhập người dùng
    public function login_user()
    {
        if (Session::has('customer_id') == null){
            return view('pages.account.login');
        }
        return \redirect('/');
    }
    // view đăng kí người dùng
    public function register_user()
    {
        return view('pages.account.register');
    }

    //xử lý đăng nhập user
    public function login_customer(Request $request)
    {
        $email = $request->login_email;
        $result = Account::where('email','=',$email)->where('status','=',1)->first();
        if ($result) {
            $salt = $result->salt;
        } else {
            Session::put('message', 'Không tồn tại email này');
            return Redirect('/login-user');
        }
        $password = ($request->login_password) . $salt;
        $passwordHash = md5($password);
        $account= Account::where('email','=',$email)->where('password','=',$passwordHash)->first();
        if ($account) {
            Session::put('customer_id', $account->id);
            Session::put('customer_username',$account->name);
            $obj = compare_free::where('status','=',1);
            $obj->delete();
            if (Session::has('shoppingCart')!=null){
                return redirect('/shopping-cart/show');
            }
            return Redirect('/');
        } else {
            Session::put('message', 'Sai email hoặc mật khẩu');
            return Redirect('/login-user');
        }
    }

    // xử lý tạo mới tài khoản người dùng
    public function add_customer(AccountRequest $request)
    {
        $request->validated();
        $obj = new Account();
        $obj->name = $request->name;
        $obj->phone = $request->phone;
        $obj->email= $request->email;
        $salt = $this->generateRandomString();
        $obj->salt = $salt;
        $password = ($request->password) . $salt;
        $md5_password = md5($password);
        $obj->password = $md5_password;
        $obj->type = 1;
        $obj->status = 1;
        $obj->role =0;
        $obj->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $obj->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        if (Account::where('email','=',$obj->email)->first()===null){
            Session::put('customer_name', $request->sign_up_name);
            Session::put('message1', 'Tạo tài khoản thành công');
            Session::put('email_register', $request->email);
            Session::put('name_register', $request->name);
            $email_register = Session::get('email_register', $request->email);
            $name_register = Session::get('name_register', $request->name);
            $obj->save();
            $data = array('username' => Session::get('name_register', $name_register));
            Mail::send('admin.email.send_register', $data, function ($message) use ($email_register,$name_register) {
                $message->to( $email_register,$name_register) -> subject('Cảm ơn bạn '  .$name_register .' đã đăng kí tài khoản');
                $message->from('locnxth1907005@fpt.edu.vn', 'ShopAz');
            });
            return Redirect('/');
        }
        else{
            Session::put('message1', 'Tài khoản đã tồn tại! Vui lòng Đăng nhập hoặc Quên mật khẩu');
            return Redirect('/register-user');
        }
    }

    // hiện thị view đặt hàng thành công
    public function end_cart()
    {

        if (Session::has('customer_id') && Session::has('order_id')) {

            return view('pages.checkout.end_cart');
            Session::remove('order_id');
            Session::remove('shoppingCart');
        }
        return Redirect::to('/');
    }
    public function end_paypal_cart(){
        if (Session::has('customer_id') && Session::has('order_id')) {

            return view('pages.checkout.end_cart');
            Session::remove('order_id');
            Session::remove('shoppingCart');
        }
        return Redirect::to('/');
    }

// thoát đăng nhập người dùng
    public function logout_checkout()
    {
        if (Session::has('customer_id')){
            Session::remove('customer_id');
            Session::remove('customer_username');
            Session::remove('shoppingCart');
            $obj = Compare::where('status','=',1);
            $obj->delete();
            Session::put('message', 'Tạm biệt, bạn đã đăng xuất thành công');
            return Redirect('/login-user');
        }
        Session::put('message', 'Bạn chưa đăng nhập, vui lòng đăng nhập để tiếp tục');
        return Redirect('/login-user');
    }

    public function checkout()
    {
        return view('pages.checkout.checkout');
    }
    public function checkout_paypal()
    {
        return view('pages.checkout.checkout-paypal');
    }

    function generateRandomString()
    {
        $length = 5;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function order_management(){

        if (Session::has('customer_id')) {
            $obj = Order::where('account_id', '=', Session::get('customer_id'))->orderby('updated_at', 'desc')->paginate(4);
            return view('pages.user.order_management')->with('obj', $obj);
        }
        return Redirect::to('/login-user');
    }
    public function order_detail($id){
        if (Session::has('customer_id')) {
            $obj = Order::where('account_id', '=', Session::get('customer_id'))->where('id', '=', $id)->first();
        return view('pages.user.order_detail')->with('obj', $obj);
        }
        return Redirect::to('/login-user');
    }

}
