<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LessonName extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'file'];

    public function LessonName(){
        return $this->hasOne(LessonName::class);
    }

}
