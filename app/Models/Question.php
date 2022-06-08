<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    // protected $perPage = 1;

    protected $fillable = ['lesson_id','question','answers','right_answer','bal'];

    public function Question(){
        return $this->belongsTo(Question::class);
    }

    public function LessonName(){
        return $this->belongsTo(LessonName::class,'lesson_id','id');
    }
}
