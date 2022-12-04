<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules =  [
            'workspace' => 'required|string|min:5',
            'states' => 'sometimes|nullable|string',
            'kind' => 'sometimes|nullable|string',
            'address' => 'sometimes|nullable|string',
            'cr' => 'sometimes|nullable|numeric',
            'site' => 'sometimes|nullable',
            'iban' => 'sometimes|nullable|numeric',
            'ap_mobile' => 'sometimes|nullable|numeric|unique:clients',
            'ap_email' => 'sometimes|nullable|email|unique:clients',
            'ap_name' => 'sometimes|nullable|string',
            'user_id' => 'sometimes|nullable|numeric',
            'source_id' => 'sometimes|nullable|numeric',
            'city' => 'sometimes|nullable|string',
            'notes' => 'sometimes|nullable|string|min:3',
          
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $client = $this->route()->parameter('client');

            $rules['ap_email'] = 'required|email|unique:clients,id,' . $client->id;
            $rules['ap_mobile'] = 'sometimes|nullable|numeric|unique:clients,id,' . $client->id;
            $rules['iban'] = 'sometimes|nullable|numeric|unique:clients,id,' . $client->id;

        }//end of if

        return $rules;
    }

    protected function prepareForValidation()
    {
        return $this->merge([
            'created_by' => auth()->user()->name
        ]);

    }//end of prepare for validation
}
