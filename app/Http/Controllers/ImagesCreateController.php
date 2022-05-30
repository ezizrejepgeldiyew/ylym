<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

trait ImagesCreateController
{
    public function move_photo($photo){
        $data=date('Y-m-d');
        return $photo->store($data.'public');
    }

}
