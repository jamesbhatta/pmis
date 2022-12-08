<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Auth;

class OrganizationRequest extends FormRequest
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
            // 'name' => 'required|unique:App\Organization,name,' . $this->id,
            'name' => 'required',
            'type' => 'required',
            'province_id' => 'required|exists:provinces,id',
            'district_id' => 'required',
            'address' => 'nullable',
            'email' => 'nullable|email',
            'phone' => 'nullable',
            'office_id' => 'nullable',
        ];
    }
}
