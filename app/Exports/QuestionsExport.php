<?php
namespace App\Exports;

use App\Models\Question;

use Maatwebsite\Excel\Concerns\FromCollection;
class QuestionsExport implements FromCollection
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
        return Question::where('id',$this->id)->get();
    }
}
