<?php

namespace App\Imports;

use App\PremiseDetail;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PremiseImport implements ToModel, WithStartRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new PremiseDetail([
            'name' => $row[1],
            'address' => $row[2],
            'phone_number' => $row[8],
            'fax_number' =>$row[9],
            'ert' => ($row[5] == '' ? 0 : 1),
            'pic_name' => $row[10],
            'pic_phone' => $row[11],
            'fc_name' => $row[12],
            'fc_phone' => $row[13],
            'premise_type_id' => ($row[4] === 'Swasta' ? 1 : 2 ),
            'premise_category_id' => $row[0],
            'office_id' => 1
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
