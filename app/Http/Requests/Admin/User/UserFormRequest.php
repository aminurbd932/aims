<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserFormRequest extends FormRequest
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
                'name' => 'required|string|max:20|min:2',
                'email' => [
                    'required',
                    'string',
                    'max:25',
                    'min:2',
                    Rule::unique('users')->ignore($id),
                ],
                'role_id' => 'required|integer'
            ];
        } else {
            return [
                'name' => 'required|string|max:25|min:2',
                'email' => 'required|email|string|max:25|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'role_id' => 'required|integer'
            ];
        }
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field can not be blank.',
            'max' => 'The :attribute musts be at least 25 characters.',
            'password.min' => 'The :attribute musts be at least 6 characters.',
            'min' => 'The :attribute musts be at least 2 characters.',
            'unique' => 'The :attribute already exist',
            'string' => 'The :attribute musts be character.',
            'integer' => 'The :attribute musts be number.'
        ];
    }
}
