<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class FormClientRequest.
 */
class FormClientRequest extends FormRequest
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
            'nom' => 'required|string',
            'adresse' => 'nullable|string',
            'cp' => 'nullable|string',
            'ville' => 'nullable|string',
            'pays_id' => 'nullable|integer',
        ];
    }
}
