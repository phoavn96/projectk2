<?php

namespace App\Http\Controllers;

use App\Category;
use App\Discount;
use App\Http\Requests\CategoriesRequest;
use App\Http\Requests\DiscountRequest;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = Discount::where('name','like','%')->whereBetween('status',[0,1])->orderby('created_at', 'desc')->paginate(10)
            ->appends($request->only('id'))
            ->appends($request->only('keyword'));
        return view('Admin.discount.list')  ->with('list', $list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discount.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountRequest $request)
    {
        $request->validated();
        $obj = new Discount();
        $obj->name = $request->get('name');
        $obj->description = $request->get('description');
        $obj->value = $request->get('value');
        $obj->end_time = $request->get('end_time');
        $obj->status = 1;
        $obj->save();
        $request->session()->flash('message', 'Thêm mã giảm giá thành công!');
        return redirect('/admin/discount/');
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
        $discount = Discount::where('id','=',$id)->first();
        return view('Admin.discount.edit')->with('discount',$discount);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DiscountRequest $request, $id)
    {
        $request->validated();
        $discount = Discount::where('id','=',$id)->first();
        $discount->name = $request->name;
        $discount->description = $request->description;
        $discount->value = $request->value;
        $discount->end_time = $request->end_time;
        $discount->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $discount->save();
        $request->session()->flash('message', 'Sửa mã giảm giá thành công!');
        return Redirect::to('/admin/discount');
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
    public function Unactive_discount($categories_id){
        $obj = Discount::where('id','=',$categories_id)->first();
        $obj->status = 0;
        $obj->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $obj->save();
        session()->flash('message', 'Ẩn mã giảm giá thành công!');
        return Redirect::to('/admin/discount/');
    }
    public function Active_discount($categories_id){
        $obj = Discount::where('id','=',$categories_id)->first();
        $obj->status = 1;
        $obj->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $obj->save();
        session()->flash('message', 'Hiện mã giảm giá thành công!');
        return Redirect::to('/admin/discount/');
    }
    public function destroyAll(Request $request)
    {
        $ids = $request->get('ids');
        // delete mềm -> chuyển trạng thái.
        foreach (Discount::whereIn('id', $ids)->get() as $value){
            $value->status = -1;
            $value->save();
        }
        return $request->get('ids');
    }

    public function delete_discount($id)
    {
        $obj = Discount::where('id', '=', $id)->first();
        $obj->status = -1;
        $obj->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $obj->save();
    }

}
