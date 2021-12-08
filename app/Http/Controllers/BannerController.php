<?php

namespace App\Http\Controllers;

use App\Banner;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['keyword'] = '';
        $banner = Banner::all();
        $banner1 = Banner::query();
        if (($request->has('id') && $request->has('status')) && (strlen($request->get('id')) && strlen($request->get('status'))) > 0) {
            $status = Banner::where('id', '=', $request->get('id'))->first();
            if ($request->get('status') == 1) {
                $status->status = 0;
                session::put('message', 'Khóa banner sản phẩm thành công');
                $status->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            }
            if ($request->get('status') == 0) {
                $status->status = 1;
                session::put('message', 'kích hoạt banner sản phẩm thành công');
                $status->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            }
            $status->save();
        }
        if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
            $data['keyword'] = $request->get('keyword');
            $banner1 = $banner1->where('banner_name', 'like', '%' . $request->get('keyword') . '%');
        }
        if ($request->has('start') && strlen($request->get('start')) > 0 && $request->has('end') && strlen($request->get('end')) > 0) {
            $data['start'] = $request->get('start');
            $data['end'] = $request->get('end');
            $from = date($request->get('start') . ' 00:00:00');
            $to = date($request->get('end') . ' 23:59:00');
            $banner1 = $banner1->whereBetween('created_at', [$from, $to]);
        }
        $data['link'] = $banner1->whereBetween('status',[0,1])->orderBy('updated_at', 'desc')->paginate(10);
        $data['list'] = $banner1->get();
        return view('admin.banner.list')->with($data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view("admin.banner.add");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\Banner $request)
    {
        $request->validated();
        $obj = new Banner();
        $obj->name = $request->get('banner_name');
        $obj->description = $request->get('banner_desc');
        $obj->images = $request->get('images');
        $obj->status = $request->get('banner_status');
        if ((Banner::where('name', '=', $obj->name)->first() === null)&& (Banner::where('images', '=', $obj->images)->first() === null)) {
            $obj->save();
            \Illuminate\Support\Facades\Session::put('message', 'Thêm banner thành công!');
        } else {
            session::put('message', ' Hình hoặc tên banner đã tồn tại !');
            return Redirect::to('admin/banner/create');
        }
        return Redirect::to('admin/banner');
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
        $banner = Banner::where('id','=',$id)->first();
        return view('Admin.banner.edit')->with('banner',$banner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(\App\Http\Requests\Banner $request, $id)
    {
        $request->validated();
        $Banner = Banner::where('id','=',$id)->first();
        $Banner->name = $request->banner_name;
        $Banner->description = $request->banner_desc;
        $Banner->images = $request->images;
        $Banner->status = $request->banner_status;
        $Banner->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $Banner->save();
        $request->session()->flash('message', 'sửa banner sản phẩm thành công!');
        return Redirect::to('admin/banner');
    }
    public function destroyAll(Request $request)
    {
        $ids = $request->get('ids');
        // delete mềm -> chuyển trạng thái.
        foreach (Banner::whereIn('id', $ids)->get() as $value){
            $value->status = -1;
            $value->save();
        }
        return $request->get('ids');
    }
    public function delete_banner($id)
    {
        $obj = Banner::where('id', '=', $id)->first();
        $obj->status = -1;
        $obj->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $obj->save();
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
}
