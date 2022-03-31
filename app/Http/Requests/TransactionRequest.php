<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'intitule' => 'bail|required|min:1|max:300|string',
            'description' => 'bail|required|min:1|max:300|string',
            'montant' => 'bail|required|numeric|between:-10000,10000',
            'date' => 'bail|required|date',
            'sens_transaction' => 'bail|required|min:1|max:20|string'
        ];
    }
}
