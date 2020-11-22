<?php

namespace App\Imports;

use App\FcApplication;
use App\Notice;
use App\Office;
use App\PremiseDetail;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class PremiseImport implements ToModel, WithStartRow
{
    use Importable, SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }

        $office = Office::where('name', $row[5])->pluck('id')->first();

        if(is_null($office)){
                throw ValidationException::withMessages(['office' => 'Balai '.$row[5].' tidak wujud. Sila pastikan nama yang telah didaftarkan.']);
        }

        $premise = PremiseDetail::firstOrCreate(
            ['name' => $row[1]],
            [
                'no_fail' => 'null',
                'name' => $row[1],
                'address' => $row[2],
                'phone_number' => $row[6],
                'fax_number' => $row[7],
                'ert' => ($row[4] == '' ? 0 : 1),
                'pic_name' => $row[8],
                'pic_phone' => $row[9],
                'fc_name' => $row[10],
                'fc_phone' => $row[11],
                'premise_type_id' => ($row[3] === 'Swasta' ? 1 : 2 ),
                'premise_category_id' => $row[0],
                'office_id' => Office::where('name', $row[5])->pluck('id')->first()
            ]
        );

        $premise->no_fail = sprintf("A%04d", $premise->id);
        $premise->save();
    }

    public function startRow(): int
    {
        return 2;
    }

    public function rules(): array
    {
        return [
            '0' => 'required|string',
            '1' => 'required|string|unique:premise_details,name',
            '2' => 'required|string',
            '3' => 'required|string',
            '5' => 'required|string',
            '6' => 'required|string',
            '7' => 'required|string',
            '8' => 'required|string',
            '9' => 'required|string',
            '10' => 'required|string',
            '11' => 'required|string',
            '12' => 'required',
        ];
    }
}
