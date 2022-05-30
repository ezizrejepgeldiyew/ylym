<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LessonName;
use App\Models\TalypLogin;
use App\Models\User;
use Illuminate\Http\Request;

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
        $TalypLogin=TalypLogin::with('LessonName','User')->paginate(2);
        $time=TalypLogin::find(9)->bal;

        return view('admin.statistika',compact('TalypLogin','time'));
    }

}
