<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'last_name'     => 'required|string',
            'first_name'    => 'required|string',
            'phone_number'  => 'sometimes|nullable|string',
            'mail'          => 'sometimes|nullable|email',
            'company'       => 'sometimes|nullable|string',
            'career'        => 'sometimes|nullable|string',
            'contact'       => 'sometimes|nullable|date',
            'experience'    => 'sometimes|nullable|integer',
            'price'         => 'sometimes|nullable|regex:/^\d*(\.\d{1,2})?$/',
            'comment'       => 'sometimes|nullable',
            'value'         => 'sometimes|nullable|integer',
            'start_date'    => 'sometimes|date',
        ];
    }
}
