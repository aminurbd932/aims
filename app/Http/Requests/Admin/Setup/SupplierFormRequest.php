<?php

namespace App\Http\Requests\Admin\Setup;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SupplierFormRequest extends FormRequest
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
        $id = $this->route('id');
        if ($id) {
            return [
                'name' => [
                    'required',
                    'string',
                    'max:50',
                    'min:2',
                    Rule::unique('suppliers')->ignore($id),
                ],
                'company_id' => 'required',
                'mobile' => 'nullable|string|max:50|min:2',
                'phone' => 'nullable|string|max:50|min:2',
                'email' => 'nullable|string|max:50|min:2',
                'address' => 'nullable|string|max:150|min:2',
                'balance' => 'nullable|numeric'
            ];
        } else {
            return [
                'name' => 'required|string|max:50|min:2|unique:suppliers',
                'company_id' => 'required',
                'mobile' => 'nullable|string|max:50|min:2',
                'phone' => 'nullable|string|max:50|min:2',
                'email' => 'nullable|string|max:50|min:2',
                'address' => 'nullable|string|max:150|min:2',
                'balance' => 'nullable|numeric'
            ];
        }
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field can not be blank.',
            'max' => 'The :attribute musts be at least 50 characters.',
            'address.max' => 'The :attribute musts be at least 150 characters.',
            'min' => 'The :attribute musts be at least 2 characters.',
            'unique' => 'The :attribute already exist',
            'string' => 'The :attribute musts be character.',
            'numeric' => 'The :attribute musts be number.'
        ];
    }
}
