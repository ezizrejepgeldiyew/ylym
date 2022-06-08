<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LessonName;
use App\Models\TalypLogin;
use App\Models\usertime;
use Illuminate\Support\Facades\Auth;
use Livewire\WithPagination;

class IndexController extends Controller
{


    public function index(){
        $LessonName=LessonName::all();
        return view('index',compact('LessonName'));
    }

    public function login1(){
        return view('User.login');
    }

    public function statistika(){
        if (Auth::user()->is_admin == 0) {
            $TalypLogin=TalypLogin::where('user_id',Auth::user()->id)->with('LessonName','User','UserTime')->get();

        }
        else {
            $TalypLogin=TalypLogin::with('LessonName','User','UserTime')->paginate(10);
        }

        $usertime=usertime::where('talyp_login_id',Auth::user()->id)->first();



        $time= strtotime($usertime->created_at) + 4050;
        $k = date('Y-m-d H:i:s', $time);

        usertime::where('talyp_login_id',Auth::user()->id)->update([
            'status' => 'end'
        ]);

        return view('admin.statistika',compact('TalypLogin','time'));
    }

}
