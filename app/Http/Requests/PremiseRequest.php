<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PremiseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'fax_number' => 'required',
            'ert' => 'required',
            'premise_type_id' => 'required',
            'premise_category_id' => 'required',
            'office_id' => 'required'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Ruangan ini perlu di isi',
            'address.required' => 'Ruangan ini perlu di isi',
            'phone_number.required' => 'Ruangan ini perlu di isi dengan nombor sahaja. cth:01XXXXXXXX',
            'fax_number.required' => 'Ruangan ini perlu di isi dengan nombor sahaja. cth:06XXXXXXX',
            'ert.required' => 'Ruangan ini perlu di tanda',
            'pic_name.required' => 'Ruangan ini perlu di isi',
            'pic_phone.required.integer' => 'Ruangan ini perlu di isi dengan nombor sahaja. cth:01XXXXXXXX\'',
            'fc_name.required' => 'Ruangan ini perlu di isi',
            'fc_phone.required' => 'Ruangan ini perlu di isi dengan nombor sahaja. cth:01XXXXXXXX\'',
            'premise_type_id.required' => 'Pilihan perlu di tanda',
            'premise_category_id.required' => 'Pilihan perlu di tanda',
            'office_id.required' => 'Pilihan perlu di isi'

        ];
    }
}
