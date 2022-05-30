<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\LessonName;
use App\Models\Question;
use App\Models\right_answer;
use App\Models\TalypLogin;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function usertest(){
        $LessonName=LessonName::get();
        $TalypLogin=TalypLogin::pluck('jogap_s');
        $Question=Question::where('lesson_id',request('id'))->with('LessonName')->paginate();

        return view('User.usertest',compact('Question','TalypLogin'));
    }

    public function answertest(Request $request){

        $user_id=Auth::user()->id;
        $TalypLogin=TalypLogin::where('user_id',$user_id)->first();
$date=TalypLogin::whereDate('created_at',Carbon::today())->get();
dd($date);
        $to_date = strtotime(date('Y-m-d'));
        $from_date = strtotime($TalypLogin->created_at);
        $day_diff = $from_date-$to_date;
        dd($TalypLogin->created_at->diffForFormat);
        dd(floor($day_diff/(60)));


        $d=Question::find($request->id);

        $bal=100 / count(Question::where('lesson_id',$d->lesson_id)->get());



        $q=$request->jogap == Question::find($request->id)->right_answer ? true : false;



        if(!empty($TalypLogin)){
            $a=$TalypLogin->jogap_s;
            foreach (json_decode($a) as $value) {
                if ( $value == $request->id ){
                    return back()->with([
                        'warning' => "On jogap berlen",
                    ]);
                }
            }
        }






        if(empty($TalypLogin)){
            if( $q == true ){
                $a[]=$request->id;
            }
            $b[]=$request->id;
            $add=new TalypLogin();
            $add->user_id=$user_id;
            $add->sapak_id=$d->lesson_id;
            $add->dogry_j=$q == true ? json_encode($a) : null;
            $add->jogap_s=json_encode($b);
            $add->bal=$bal;
            $add->save();

            return back();

        }
        if( $q == true ){
            $a=json_decode($TalypLogin->dogry_j);
            $a[]=$request->id;
            $TalypLogin->dogry_j=$a;
            $TalypLogin->bal += $bal;
        }

        $a=json_decode($TalypLogin->jogap_s);
        $a[]=$request->id;
        $TalypLogin->jogap_s=$a;

        $TalypLogin->save();





        $request->jogap == $d->right_answer ? $arr = [  'success' => "Jogap dogry" ] : $arr = ['error' => "Jogap nadogry"];

        return back()->with($arr);

    }
}
