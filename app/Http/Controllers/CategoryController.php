<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoriesRequest;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $list = Category::where('name','like','%')->whereBetween('status',[0,1])->orderby('created_at', 'desc')->paginate(10)
            ->appends($request->only('id'))
            ->appends($request->only('keyword'));
        return view('Admin.categories.list')  ->with('list', $list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        $request->validated();
        $obj = new Category();
        $obj->name = $request->get('name');
        $obj->description = $request->get('description');
        $obj->status = 1;
        $obj->save();
        $request->session()->flash('message', 'Thêm loại sản phẩm thành công!');
        return redirect('/admin/categories/');
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
        $categories = Category::where('id','=',$id)->first();
        return view('Admin.categories.edit')->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
        $request->validated();
        $categories = Category::where('id','=',$id)->first();
        $categories->name = $request->name;
        $categories->description = $request->description;
        $categories->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $categories->save();
        $request->session()->flash('message', 'Sửa loại sản phẩm thành công!');
        return Redirect::to('/admin/categories');
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
    public function Unactive_categories($id)
    {
        $obj = Category::where('id','=',$id)->first();
        $obj->status = 0;
        $obj->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $obj->save();
        session()->flash('message', 'Ẩn loại sản phẩm thành công!');
        return Redirect::to('/admin/categories/');
    }
    public function Active_categories($id)
    {
        $obj = Category::where('id','=',$id)->first();
        $obj->status = 1;
        $obj->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $obj->save();
        session()->flash('message', 'Hiện loại sản phẩm thành công!');
        return Redirect::to('/admin/categories/');
    }
    public function destroyAll(Request $request)
    {
        $ids = $request->get('ids');
        // delete mềm -> chuyển trạng thái.
        foreach (Category::whereIn('id', $ids)->get() as  $value){
            $value->status = -1;
            $value->save();
        }
        return $request->get('ids');
    }
    public function delete_categories($id)
    {
        $obj = Category::where('id', '=', $id)->first();
        $obj->status = -1;
        $obj->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $obj->save();
    }
}
