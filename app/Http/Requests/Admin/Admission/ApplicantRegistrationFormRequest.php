<?php

namespace App\Http\Requests\Admin\Admission;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ApplicantRegistrationFormRequest extends FormRequest
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
                    'max:50',
                    'min:2',
                    Rule::unique('admission_subjects')->ignore($id),
                ]
            ];
        } else {
            return [
                'admission_offer_id' => 'required|integer',
                'applicant_code' => 'unique:applicants',
                'full_name' => 'required|string|max:50',
                'dob' => 'required|date',
                'birth_reg_no' => 'required|max:25',
                'national_id_no' => 'nullable|max:25',
                'blood_group_id' => 'nullable|integer',
                'sex' => 'required|integer',
                'phone' => 'nullable|string|min:11|max:11',
                'email' => 'nullable|email|string|max:25',
                'present_thana_id' => 'required|integer',
                'present_post_code' => 'required|string|max:10',
                'present_address' => 'required|string|max:250',
                'permanent_thana_id' => 'nullable|integer',
                'permanent_post_code' => 'nullable|string|max:10',
                'permanent_address' => 'nullable|string|max:250',
                'father_name' => 'required|string|max:50',
                'father_phone' => 'nullable|string|min:11|max:11',
                'father_national_id' => 'required|max:25',
                'father_profession' => 'required|integer',
                'mother_name' => 'required|string|max:50',
                'mother_phone' => 'nullable|string|min:11|max:11',
                'mother_national_id' => 'required|max:25',
                'mother_profession' => 'required|integer',
                'guardian_name' => 'required|string|max:50',
                'guardian_phone' => 'required|string|min:11|max:11',
                'guardian_national_id' => 'required|max:25',
                'guardian_profession' => 'required|integer',
                'exam_id[]' => 'nullable|integer',
                'roll_no[]' => 'nullable|string|max:25',
                'reg_no[]' => 'nullable|string|max:25',
                'board_id[]' => 'nullable|integer',
                'gpa[]' => 'nullable|regex:/^\d*(\.\d{1,2})?$/|max:11',
                'total_mark[]' => 'nullable|regex:/^\d*(\.\d{1,2})?$/',
                'passing_year[]' => 'nullable|string'
            ];
        }
    }

    public function messages()
    {
        return [
            'required' => 'The :attribute field can not be blank.',
            'full_name.max' => 'The :attribute musts be at least 50 characters.',
            'father_name.max' => 'The :attribute musts be at least 50 characters.',
            'mother_name.max' => 'The :attribute musts be at least 50 characters.',
            'guardian_name.max' => 'The :attribute musts be at least 50 characters.',
            'father_name.max' => 'The :attribute musts be at least 50 characters.',
            'max' => 'The :attribute musts be at least 25 characters.',
            'phone.max' => 'The :attribute musts be at least 11 characters.',
            'father_phone.max' => 'The :attribute musts be at least 11 characters.',
            'father_name.max' => 'The :attribute musts be at least 11 characters.',
            'mother_phone.max' => 'The :attribute musts be at least 11 characters.',
            'guardian_phone.max' => 'The :attribute musts be at least 11 characters.',
            'phone.min' => 'The :attribute musts be at least 11 characters.',
            'father_phone.min' => 'The :attribute musts be at least 11 characters.',
            'father_name.min' => 'The :attribute musts be at least 11 characters.',
            'mother_phone.min' => 'The :attribute musts be at least 11 characters.',
            'guardian_phone.min' => 'The :attribute musts be at least 11 characters.',
            'gpa[].max' => 'The :attribute musts be at least 5 characters.',
            'min' => 'The :attribute musts be at least 2 characters.',
            'unique' => 'The :attribute already exist',
            'string' => 'The :attribute musts be character.',
            'integer' => 'The :attribute musts be number.',
            'date' => 'The ::attribute musts be date.'
        ];
    }
}
