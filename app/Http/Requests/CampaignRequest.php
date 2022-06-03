<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CampaignRequest extends FormRequest
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
            'name' => 'required|alpha|unique:campaigns',
            'status' => 'required|numeric'
        ];

        if ($this->getMethod() == "PUT") {
            $rules['name'] = 'required|alpha|unique:campaigns,name,' . $this->campaign->id;
        }

        return $rules;
    }
}
