<?php

namespace App\Imports;

use App\FcApplication;
use App\Notice;
use App\Office;
use App\PremiseDetail;
use Carbon\Carbon;
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

        $premise = PremiseDetail::firstOrCreate(
            ['name' => $row[1]],
            [
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

        $now = Carbon::now()->timezone('Asia/Kuala_Lumpur')->toDateTimeString();
        $expired_date = Carbon::parse(Date::excelToDateTimeObject($row[12]));

        $fc_application = FcApplication::create([
            'type' => 2,
            'approved_date' => $expired_date->copy()->subYear(),
            'expiry_date' => $expired_date,
            'status' => 1,
            'no_siri' => uniqid(),
            'premise_detail_id' => $premise->id
        ]);

        $threeMonthBefore = $expired_date->copy()->subMonths('3');
        $oneMonthBefore = $expired_date->copy()->subMonths('1');

        Notice::where('fc_application_id', $fc_application->id)->delete();

        Notice::insert([
            [
                'notice_date' => $threeMonthBefore,
                'fc_application_id' => $fc_application->id,
                'total_payment' => '0',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'notice_date' => $oneMonthBefore,
                'fc_application_id' => $fc_application->id,
                'total_payment' => '0',
                'created_at' => $now,
                'updated_at' => $now
            ],
            [
                'notice_date' => $expired_date,
                'fc_application_id' => $fc_application->id,
                'total_payment' => '0',
                'created_at' => $now,
                'updated_at' => $now
            ],
        ]);

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
