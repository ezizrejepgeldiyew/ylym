<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TalypLogin extends Model
{
    use HasFactory;

    protected $fillable =['user_id', 'sapak_id', 'dogry_j', 'yalnys_j','bal'];

    public function LessonName(){
        return $this->belongsTo(LessonName::class,'sapak_id','id');
    }

    public function User(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
