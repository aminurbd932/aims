<?php

namespace App\Http\Requests\Admin\Admission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdmissionResultMarkFormRequest extends FormRequest
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
                'subject_mark.*' => 'required|numeric',
                'subject_id.*' => 'required|integer',
                'sub_total_mark.*' => 'required|numeric'
            ];
        } else {
            return [
                'admission_offer_id' => 'required|integer',
                'applicant_id.*' => 'required|integer',
                'subject_mark.*' => 'required|numeric',
                'subject_id.*' => 'required|integer',
                'sub_total_mark.*' => 'required|numeric'
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
