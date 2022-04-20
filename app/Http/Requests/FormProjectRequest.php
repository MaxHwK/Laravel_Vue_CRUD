<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class FormProjectRequest.
 */
class FormProjectRequest extends FormRequest
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
            'numero' => 'required|integer',
            'nom' => 'required|string',
            'description' => 'nullable|string',
            'technologies' => 'nullable|string',
            'client_id' => 'nullable|integer',
            'type_id' => 'nullable|integer',
            'responsable' => 'nullable|string',
            'date_debut' => 'required|date',
            'date_fin_estimee' => 'required|date',
            'date_fin_reelle' => 'nullable|date',
        ];
    }
}
