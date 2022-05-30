<?php

namespace App\Http\Controllers\Admin;

use App\Exports\QuestionsExport;
use App\Http\Controllers\Controller;
use App\Imports\QuestionsImport;
use App\Models\LessonName;
use App\Models\Question;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;


class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LessonName=LessonName::get();

        $Question=Question::with('LessonName')->get();
        // dd($Question);
        return view('Admin.Questions',compact('LessonName','Question'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Excel::import(new QuestionsImport, $request->file('file')->store('temp'));
        return redirect()->route('Questions.index')->with([
            'success'=>"Maglumat üstünlikli goşuldy"
        ]);
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
        $LessonName=LessonName::get();
        $Question=Question::with('LessonName')->find($id);

        return view('Admin.QuestionUpdate',compact('LessonName','Question'));
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

        // return Excel::download(new QuestionsExport, 'users-collection.xlsx');

        $request->validate([
        'lesson_id'=>'required',
        'question'=>'required',
        'answers'=>'required',
        'right_answer'=>'required',
        'bal'=>'required',
    ]);

    
        $question1=json_encode($request->answers);

        Question::where('id',$id)->update([
            'lesson_id'=>$request->lesson_id,
            'question'=>$request->question,
            'answers'=>$question1,
            'right_answer'=>$request->right_answer,
            'bal'=>$request->bal
        ]);
        return redirect()->route('Questions.index')->with([
            'success'=>"Maglumat üstünlikli üýtgedildi"
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Question::destroy($id);
        return back()->with([
            'success'=>"Maglumat üstünlikli pozuldy"
        ]);
    }

    public function QuestionExport(){
        return Excel::download(new QuestionsExport(request('id')), 'ylym__'.now().'__.xlsx');
    }
}
