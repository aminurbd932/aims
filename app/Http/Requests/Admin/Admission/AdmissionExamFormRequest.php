<?php

namespace App\Http\Requests\Admin\Admission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdmissionExamFormRequest extends FormRequest
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
                'admission_offer_id' => 'required|integer',
                'exam_date' => 'required|date',
                'exam_start_time' => 'required',
                'exam_end_time' => 'required',
                'admission_subject_id.*' => 'required|integer',
                'subject_mark.*' => 'required|numeric'
            ];
        } else {
            return [
                'admission_offer_id' => 'required|integer',
                'exam_date' => 'required|date',
                'exam_start_time' => 'required',
                'exam_end_time' => 'required',
                'admission_subject_id.*' => 'required|integer',
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
