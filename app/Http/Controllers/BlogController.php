<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Brand;
use App\Category;
use App\Product;
use App\Question;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail_blog($id){
        $blog = Blog::all()->where('id', '=', $id)->first();
        return view('pages.blog.details')->with('blog', $blog);
    }
    public function index(Request $request)
    {
        $list = Blog::where('email','like','%')->orderby('created_at', 'desc')->paginate(5)
            ->appends($request->only('id'))
            ->appends($request->only('keyword'));
        return view('pages.blog.list')->with('list',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('pages.blog.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new Blog();
        $obj->title = $request->get('title');
        $obj->description = $request->get('description');
        $obj->email = $request->get('email');
        $obj->thumbnail = '';
        $thumbnails = $request->get('thumbnails');
        foreach ((array)$thumbnails as $thumbnail) {
            $obj->thumbnail .= $thumbnail . ',';
        }
        $obj->save();
        return redirect('/blog/');
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
        //
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
        //
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
