<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProvinceRequest extends FormRequest
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

    public function prepareForValidation() {
        if($this->isMethod('put') && $this->routeIs('edit.province') || $this->isMethod('delete') && $this->routeIs('delete.province')) {
            $this->merge([
                'id' => $this->route()->parameters['id'],
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        // validation for deleting data
        if($this->isMethod('delete') && $this->routeIs('delete.province')) {
            return [
                'id' => [
                    'required',
                    'numeric',
                    Rule::exists('provinces', 'id')
                ],
            ];
        }

        // validation for editting data
        if($this->isMethod('put') && $this->routeIs('edit.province')) {
            return [
                'id' => [
                    'required',
                    'numeric',
                    Rule::exists('provinces', 'id')
                ],
                'name' => [
                    'required',
                    'min:2',
                    'max:30',
                    Rule::unique('provinces', 'name')
                    ->ignore($this->id)
                ]
            ];
        }

        // validation for save
        return [
            'name' => [
                'required',
                'min:2',
                'max:10',
                Rule::unique('provinces', 'name')
            ]
        ];
    }

    public function messages() {
        return [
            'name.required' => 'ກະລຸນາປ່ອນກ່ອນ....',
            'name.unique' => 'ມີຢູ່ໃນລະບົບແລ້ວ....',
            'name.min' => 'At least 2....',
            'name.max' => 'Maximize 30....',
        ];
    }
}
