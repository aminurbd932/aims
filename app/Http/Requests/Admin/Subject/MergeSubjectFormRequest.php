<?php

namespace App\Http\Requests\Admin\Subject;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


class MergeSubjectFormRequest extends FormRequest
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
                'program_offer_id' => 'required|integer',
                'name' => 'required|string',
                'subject_id.*' => 'required|integer'
            ];
        } else {
            return [
                'program_offer_id' => 'required|integer',
                'name' => 'required|string',
                'subject_id.*' => 'required|integer'
            ];
        }
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field can not be blank.',
            'string' => 'The :attribute musts be character.',
            'integer' => 'The :attribute musts be number.'
        ];
    }
}
