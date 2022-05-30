<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class TalypLoginExport implements FromCollection
{
    public $id;
    /**
    * @return \Illuminate\Support\Collection
    */

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function collection()
    {
        return User::where('id',$this->id)->get();
    }
}
