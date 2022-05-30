<?php

namespace App\Imports;


use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TalypLoginsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $q=Hash::make($row['password']) ;
        // dd($q);
        return new User([
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => $q,
        ]);
    }
}
