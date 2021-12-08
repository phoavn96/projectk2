<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Http\Requests\BrandValidate;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['keyword'] = '';
        $brand = Brand::all();
        $brand1 = Brand::query();
        if (($request->has('brand_id') && $request->has('brand_status')) && (strlen($request->get('brand_id')) && strlen($request->get('brand_status'))) > 0) {
            $status = Brand::where('id', '=', $request->get('brand_id'))->first();
            if ($request->get('brand_status') == 1) {
                $status->brand_status = 0;
                session::put('message', 'Khóa thương hiệu sản phẩm thành công');
                $status->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            }
            if ($request->get('brand_status') == 0) {
                $status->brand_status = 1;
                session::put('message', 'kích hoạt thương hiệu sản phẩm thành công');
                $status->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            }
            $status->save();
        }
        if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
            $data['keyword'] = $request->get('keyword');
            $brand1 = $brand1->where('brand_name', 'like', '%' . $request->get('keyword') . '%');
        }
        if ($request->has('start') && strlen($request->get('start')) > 0 && $request->has('end') && strlen($request->get('end')) > 0) {
            $data['start'] = $request->get('start');
            $data['end'] = $request->get('end');
            $from = date($request->get('start') . ' 00:00:00');
            $to = date($request->get('end') . ' 23:59:00');
            $brand1 = $brand1->whereBetween('created_at', [$from, $to]);
        }
        $data['link'] = $brand1->whereBetween('brand_status',[0,1])->orderBy('updated_at', 'desc')->paginate(10);
        $data['list'] = $brand1->get();
        return view('admin.brand.list')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('admin/brand/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandValidate $request)
    {
        $request->validated();
        $obj = new Brand();
        $obj->brand_name = $request->get('brand_name');
        $obj->brand_desc = $request->get('brand_desc');
        $obj->brand_status = $request->get('brand_status');
        if (Brand::where('brand_name', '=', $obj->brand_name)->first() === null) {
            $obj->save();
            \Illuminate\Support\Facades\Session::put('message', 'Thêm thương hiệu thành công!');
        } else {
            session::put('message', 'Thương hiệu đã tồn tại!');
            return Redirect::to('admin/brand/create');
        }
        return Redirect::to('admin/brand');
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
        $brand = Brand::where('id','=',$id)->first();
        return view('Admin.brand.edit')->with('brand',$brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandValidate $request, $id)
    {
        $request->validated();
        $brand = Brand::where('id','=',$id)->first();
        $brand->brand_name = $request->brand_name;
        $brand->brand_desc = $request->brand_desc;
        $brand->brand_status = $request->brand_status;
        $brand->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $brand->save();
        $request->session()->flash('message', 'sửa thương hiệu sản phẩm thành công!');
        return Redirect::to('admin/brand');
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
    public function destroyAll(Request $request)
    {
        $ids = $request->get('ids');
        // delete mềm -> chuyển trạng thái.
        foreach (Brand::whereIn('id', $ids)->get() as $value){
            $value->brand_status = -1;
            $value->save();
        }
        return $request->get('ids');
    }
    public function delete_brand($id)
    {
        $obj = Brand::where('id', '=', $id)->first();
        $obj->brand_status = -1;
        $obj->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $obj->save();
    }
}
