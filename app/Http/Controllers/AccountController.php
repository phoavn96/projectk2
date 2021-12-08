<?php

namespace App\Http\Controllers;

use App\Account;
use App\Category;
use App\Http\Requests\AccountRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $account = Account::query();
        $account1 =Account::all();
        if ($request->has('email') && strlen($request->get('email')) > 0) {
            $data['email'] = $request->get('email');
            $account = $account->where('email', 'like', '%' . $request->get('email') . '%');
        }
        if ($request->has('start') && strlen($request->get('start')) > 0 && $request->has('end') && strlen($request->get('end')) > 0) {
            $data['start'] = $request->get('start');
            $data['end'] = $request->get('end');
            $from = date($request->get('start') . ' 00:00:00');
            $to = date($request->get('end') . ' 23:59:00');
            $account = $account->whereBetween('created_at', [$from, $to]);
        }
        $data['list'] = $account->orderBy('updated_at','desc')->get();
        return view('Admin.Account.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Account.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountRequest $request)
    {
        $request->validated();
        $obj = new Account();
        $obj->email = $request->email;
        $obj->name = $request->name;
        $obj->phone = $request->phone;

        $salt = $this->generateRandomString(5);
        $password = $request->password;
        $passwordHash = md5( $password . $salt);

        $obj->salt = $salt;
        $obj->password = $passwordHash;
        $obj->type = $request->type;

        $obj->role = $request->role;
        $obj->status = 1;
        $obj->created_at = Carbon::now()->format('Y-m-d H:i:s');
        $obj->updated_at = Carbon::now()->format('Y-m-d H:i:s');

        if (Account::where('email', '=', $obj->email)->first() === null) {
            $obj->save();
            session::put('message', 'Tạo tài khoản thành công');
            return Redirect::to('/admin/accounts');
        } else {
            session::put('message', 'Tài khoản không hợp lệ hoặc đã tồn tại!');
            return Redirect::to('/admin/accounts');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = Account::where('id','=',$id)->first();
        return view('Admin.Account.edit')->with('account',$account);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $account = Account::where('id','=',$id)->first();
        $account->name = $request->name;
        $account->phone = $request->phone;
        $account->role = $request->role;
        $account->type = $request->type;
        $account->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $account->save();

//        dd((Account::where('id',Session::get('admin_id'))->first())->role);
        if(Session::has('admin_id') &&  (Account::where('id',Session::get('admin_id'))->first()->id == $account->id)  && (Account::where('id',Session::get('admin_id'))->first())->role !=1) {
            Session::remove('admin_id');
            Session::remove('admin_role');
            Session::remove('admin_name');
            Session::put('message','Cập nhật thông tin thành công mời đăng nhập lại!');
           return Redirect::to('/login');
        }
        session::put('message1', 'Cập nhập tài khoản thành công');
        return Redirect::to('/admin/accounts');
    }
    public function edit_password($id){
        $account = Account::where('id','=',$id)->first();
        return view('Admin.account.password')->with('account',$account);
    }
    public function save_edit_password(Request $request, $id){
        $account = Account::where('id','=',$id)->first();
        $salt = $account->salt;
        $passwordHash = $account->password;
        if (md5($request->old_password .$salt ) != $passwordHash){
            Session::put('message','Sai mật khẩu hiện tại!');
            return Redirect('/admin/accounts/'.$id.'/edit-password');
        }
        else{
            if ($request->new_password != $request->confirm_password){
                Session::put('message','Mật khẩu mới không trùng khớp!');
                return Redirect('/admin/accounts/'.$id.'/edit-password');
            }
            $account->password = md5($request->new_password.$salt);
            $account->save();
            if(Session::has('admin_id') &&  (Account::where('id',Session::get('admin_id'))->first()->id == $account->id)  && (Account::where('id',Session::get('admin_id'))->first())->password != $passwordHash) {
                Session::remove('admin_id');
                Session::remove('admin_role');
                Session::remove('admin_name');
                Session::put('message','Cập nhật thông tin thành công mời đăng nhập lại!');
                return Redirect::to('/login');
            }
        }
        return Redirect::to('/admin/accounts');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
    public function Unactive_account($account_id){
        $account = Account::where('id','=',$account_id)->first();
        $account->status = 0;
        $account->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $account->save();
        Session::put('message', 'Khóa tài khoản thành công');

        if (Session::has('customer_id') && Session::get('customer_id')==$account->id){
            Session::remove('customer_id');
            Session::remove('customer_username');
        }
        if (Session::get('admin_id')==$account->id){
            Session::remove('admin_name');
            Session::remove('admin_id');
            Session::remove('admin_role');
            return Redirect::to('/login');
        }
        return Redirect::to('admin/accounts');
    }

    public function Active_account($account_id){
        $account = Account::where('id','=',$account_id)->first();
        $account->status = 1;
        $account->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $account->save();
        session::put('message', 'Kích hoạt tài khoản thành công');
        return Redirect::to('/admin/accounts');
    }
    public function destroyAll(Request $request)
    {
        $ids = $request->get('ids');
        // delete mềm -> chuyển trạng thái.
        foreach (Account::whereIn('id', $ids)->get() as  $value){
            $value->status = -1;
            $value->save();
        }
        return $request->get('ids');
    }
    public function delete_account($id)
    {
        $obj = Account::where('id', '=', $id)->first();
        $obj->status = -1;
        $obj->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $obj->save();
    }


}
