<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInventoryRequest extends FormRequest
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
            'company' => 'required',
            'itcode' => 'required',
            'rpcode' => 'required',
            'ctype' => 'required',
            'count' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ];
    }
}
