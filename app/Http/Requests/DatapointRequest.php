<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DatapointRequest extends FormRequest
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
        $rules = [
            'name' => 'required|alpha|unique:datapoints',
            'question' => 'required|unique:datapoints',
        ];
        if ($this->getMethod() == "PUT") {
            $rules['name'] = 'required|alpha|unique:datapoints,name,' . $this->datapoint->id;
            $rules['question'] = 'required|unique:datapoints,question,' . $this->datapoint->id;
        }
        return $rules;
    }
}
