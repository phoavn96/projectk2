<?php

namespace App\Http\Controllers;


use App\Category;
use App\Http\Requests\QuestionRequest;
use App\Question;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_admin(Request $request){
        $list = Question::where('name','like','%')->orderby('created_at', 'desc')->paginate(100)
            ->appends($request->only('id'))
            ->appends($request->only('keyword'));
        return view('admin.qa.list')->with('list',$list);
    }
    public function index(Request $request)
    {
        $list = Question::where('name','like','%')->where('status','=',1)->orderby('created_at', 'desc')->paginate(100)
            ->appends($request->only('id'))
            ->appends($request->only('keyword'));
        return view('pages.q&a.list')->with('list',$list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return view('pages.q&a.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new Question();
        $obj->name = $request->get('name');
        $obj->question = $request->get('question');
        $obj->answer = $request->get('answer');
        $obj->status = $request->get('status');
        $obj->email = $request->get('email');
        $obj->save();
        return redirect('/qa/');
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
        $question = Question::where('id','=',$id)->first();

        return view('admin.qa.edit')->with('question',$question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionRequest $request, $id)
    {
        $request->validated();
        $question = Question::where('id','=',$id)->first();
        $question->name = $request->name;
        $question->question = $request->question;
        $question->answer = $request->answer;
        $question->status = $request->status;
        $question->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $question->save();
        $request->session()->flash('message', 'Sửa câu hỏi thành công!');
        return Redirect::to('admin/qa/list');
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
    public function Unactive_question($id)
    {
        $obj = Question::where('id','=',$id)->first();
        $obj->status = 0;
        $obj->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $obj->save();
        session()->flash('message', 'Ẩn câu hỏi thành công!');
        return Redirect::to('/admin/qa/list');
    }
    public function Active_question($id)
    {
        $obj = Question::where('id','=',$id)->first();
        $obj->status = 1;
        $obj->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $obj->save();
        session()->flash('message', 'Hiện câu hỏi thành công!');
        return Redirect::to('/admin/qa/list');
    }
    public function destroyAll(Request $request)
    {
        $ids = $request->get('ids');
        // delete mềm -> chuyển trạng thái.
        foreach (Question::whereIn('id', $ids)->get() as  $value){
            $value->status = -1;
            $value->save();
        }
        return $request->get('ids');
    }
    public function delete_question($id)
    {
        $obj = Question::where('id', '=', $id)->first();
        $obj->status = -1;
        $obj->updated_at = Carbon::now()->format('Y-m-d H:i:s');
        $obj->save();
    }
}
