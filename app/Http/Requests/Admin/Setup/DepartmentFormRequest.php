<?php

namespace App\Http\Requests\Admin\setup;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DepartmentFormRequest extends FormRequest
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
                    'max:20',
                    'min:1',
                    Rule::unique('departments')->ignore($id),
                ]
            ];
        } else {
            return [
                'name' => 'required|max:20|min:1|unique:departments',
            ];
        }
    }

     public function messages()
    {
        return [
            'required' => 'The :attribute field can not be blank.',
            'max' => 'The :attribute musts be at least 20 characters.',
            'min' => 'The :attribute musts be at least 1 characters.',
            'unique' => 'The :attribute already exist'
        ];
    }
}
