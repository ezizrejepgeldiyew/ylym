<?php

namespace App\Http\Controllers\Admin;

use App\Exports\TalypLoginExport;
use App\Http\Controllers\Controller;
use App\Imports\QuestionsImport;
use App\Imports\TalypLoginsImport;
use App\Models\TalypLogin;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TalypLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TalypLogin=User::get();
        return view('Admin.TalypLogin',compact('TalypLogin'));
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

        Excel::import(new TalypLoginsImport, $request->file('file')->store('temp'));
        return redirect()->route('TalypLogin.index')->with([
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
        $TalypLogin=User::find($id);
        return view('Admin.TalypLoginUpdate',compact('TalypLogin'));
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        User::where('id',$id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return redirect()->route('TalypLogin.index')->with([
            'success' => "Maglumat üstünlikli üýtgedildi"
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

        User::destroy($id);
        return back()->with([
            'success' => "Maglumat üstünlikli pozuldy"
        ]);
    }

    public function TalypLoginExport()
    {
        return Excel::download(new TalypLoginExport(request('id')),'TalypLogin___'.now().'___.xlsx');
    }
}
