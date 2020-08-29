<?php

namespace App\Http\Requests\Admin\Admission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ApplicantResultFormRequest extends FormRequest
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
                'serial' => 'required|numeric',
                'assign_status' => 'required|integer'
            ];
        } else {
            return [
                'applicant_id.*' => 'required|integer',
                'serial.*' => 'required|numeric',
                'assign_status.*' => 'required|integer'
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
