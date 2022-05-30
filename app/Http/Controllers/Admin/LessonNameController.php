<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImagesCreateController;
use App\Models\LessonName;
use Illuminate\Http\Request;


class LessonNameController extends Controller
{
    use ImagesCreateController;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LessonName=LessonName::get();
        return view('Admin.LessonName',compact('LessonName'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'photo'=>'required',
        ]);


        $photo=$request->file('photo');
        $photo_name=$photo->getClientOriginalName();
        $photo->move(public_path('surat'),$photo_name);

        $add=new LessonName();
        $add->name=$request->name;
        $add->photo=$photo_name;
        $add->save();
        return redirect()->route('LessonName.index')->with([
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
        $LessonName=LessonName::find($id);
        return view('Admin.LessonNameUpdate',compact('LessonName'));
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
        $request->validate([
            'name'=>'required'
        ]);
        $LessonName=LessonName::find($id);
        $LessonName->update($request->all());
        return redirect()->route('LessonName.index')->with([
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
        LessonName::destroy($id);
        return back()->with([
            'success'=>"Maglumat üstünlikli pozuldy"
        ]);
    }
}
