<?php

namespace App\Http\Requests\Admin\Program;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProgramOfferFormRequest extends FormRequest
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
                    'min:2',
                    Rule::unique('program_offers')->ignore($id),
                ],
                'class_level_id' => 'required|integer',
                'program_id' => 'required|integer',
                'group_id' => 'required|integer',
                'section_id' => 'required|integer',
                'medium_id' => 'required|integer',
                'shift_id' => 'required|integer',
                'class_level_id' => 'required|integer',
                'teacher_id' => 'required|integer',
                'seat_number' => 'required|integer',
            ];
        } else {
            return [
                'name' => 'required|string|max:25|min:2|unique:program_offers',
                'class_level_id' => 'required|integer',
                'program_id' => 'required|integer',
                'group_id' => 'required|integer',
                'section_id' => 'required|integer',
                'medium_id' => 'required|integer',
                'shift_id' => 'required|integer',
                'class_level_id' => 'required|integer',
                'seat_number' => 'required|integer',
                'teacher_id' => 'required|integer',
            ];
        }
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field can not be blank.',
            'max' => 'The :attribute musts be at least 25 characters.',
            'min' => 'The :attribute musts be at least 2 characters.',
            'unique' => 'The :attribute already exist',
            'string' => 'The :attribute musts be character.',
            'integer' => 'The :attribute musts be number.'
        ];
    }
}
