<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationStoreRequest extends FormRequest
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
            'apply_date' => 'required',
            'type' => 'required',
            'expiry_date' => 'required',
            'no_siri' => 'required',
            'premise_detail_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'apply_date.required' => 'Ruangan ini perlu di isi',
            'type.required' => 'Pilihan perlu di tanda',
            'expiry_date.required' => 'Ruangan ini perlu di isi',
            'no_siri.required' => 'Ruangan ini perlu di isi',
            'premise_detail_id.required' => 'Ruangan ini perlu di isi'
        ];
    }
}
