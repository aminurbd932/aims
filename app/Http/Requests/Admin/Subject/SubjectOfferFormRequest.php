<?php

namespace App\Http\Requests\Admin\Subject;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubjectOfferFormRequest extends FormRequest
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
                'teacher_id' => 'required|integer',
                'subject_mark' => 'required|numeric',
                'mark_type_id.*' => 'required|integer',
                'distribute_id.*' => 'required|integer',
                'total_divided_mark' => 'required|numeric'
            ];
        } else {
            return [
                'program_offer_id' => 'required|integer',
                'subject_id.*' => 'required|integer',
                'teacher_id.*' => 'required|integer',
                'subject_mark.*' => 'required|numeric'
            ];
        }
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field can not be blank.',
            'numeric' => 'The :attribute musts be numeric.',
            'integer' => 'The :attribute musts be number.'
        ];
    }
}
