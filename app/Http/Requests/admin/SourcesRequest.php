<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class SourcesRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules =  [
            'name' => 'required|string|min:3',
            'description'=>'sometimes|nullable|string',
            'created_by'=>'required'
        ];

     

        return $rules;
    }

    protected function prepareForValidation()
    {
        return $this->merge([
            'created_by' => auth()->user()->name
        ]);

    }//end of prepare for validation
}
