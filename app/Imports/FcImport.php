<?php

namespace App\Imports;

use App\FcApplication;
use App\Notice;
use App\PremiseDetail;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class FcImport implements ToModel, WithStartRow
{
    use Importable, SkipsErrors;

    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Model[]|void|null
     */
    public function model(array $row)
    {
        if (!isset($row[0])) {
            return null;
        }

        $now = Carbon::now()->timezone('Asia/Kuala_Lumpur')->toDateTimeString();
        $expired_date = Carbon::parse(Date::excelToDateTimeObject($row[2]));

        $premise = PremiseDetail::where('no_fail', $row[0])->first();

        if (is_null($premise)) {
            throw ValidationException::withMessages(['premise' => 'No fail '.$row[0].' tidak wujud. Sila pastikan premis telah didaftarkan.']);
        }

        $fc_application = FcApplication::create([
            'type' => 2,
            'approved_date' => $expired_date->copy()->subYear(),
            'expiry_date' => $expired_date,
            'status' => 1,
            'no_siri' => uniqid('', true),
            'premise_detail_id' => $premise->id
        ]);

        $threeMonthBefore = $expired_date->copy()->subMonths('3');
        $oneMonthBefore = $expired_date->copy()->subMonths('1');

//        Notice::where('fc_application_id', $fc_application->id)->delete();

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
            '0' => 'required|string|exists:premise_details,name',
            '1' => 'required|unique:fc_applications,expired_date',
        ];
    }
}
