<?php

namespace App\Http\Requests\Admin\Setup;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubjectFormRequest extends FormRequest
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
                    'max:25',
                    'min:2'
                    //Rule::unique('subjects')->ignore($id),
                ],
                'class_level_id' => 'required|integer',
                 'code' => [
                    'required',
                    'max:25'
                   // Rule::unique('subjects')->ignore($id),
                ],
            ];
        } else {
            return [
              //  'name' => 'required|max:25|string|min:2|unique:subjects',
               // 'code' => 'required|max:25|unique:subjects',
                'name' => 'required|max:25|string|min:2',
                'code' => 'required|max:25',
                'class_level_id' => 'required|integer'
            ];
        }
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field can not be blank.',
            'max' => 'The :attribute musts be at least 50 characters.',
            'min' => 'The :attribute musts be at least 2 characters.',
            'unique' => 'The :attribute already exist',
            'string' => 'The :attribute musts be character.',
            'integer' => 'The :attribute musts be number.'
        ];
    }
}
