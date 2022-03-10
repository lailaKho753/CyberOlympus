<?php

namespace App\Imports;

use App\Karyawan;
use Maatwebsite\Excel\Concerns\ToModel;

class KaryawanImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Karyawan([
            'nama' => $row[1],
            'email_k' => $row[2], 
            'company_id' => $row[3], 
        ]);
    }
}
