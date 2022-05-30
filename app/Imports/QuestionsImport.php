<?php

namespace App\Imports;

use App\Models\LessonName;
use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
class QuestionsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {


$lesson_id=LessonName::where('name',$row['lesson_id'])->first('id');
$d=$lesson_id['id'];



        $a[0]=$row['a'];
        $a[1]=$row['b'];
        $a[2]=$row['c'];
        $a[3]=$row['d'];


        $question= json_encode($a);
// dd($a,$question);


        return new Question([

                'lesson_id'     => $d,
                'question'    => $row['question'],
                'answers' => $question,
                'right_answer' => $row['right_answer'],
                'bal'=> $row['bal'],
        ]);
    }
}
