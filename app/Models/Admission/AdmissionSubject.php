<?php

namespace App\Models\Admission;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdmissionSubject extends Model
{
    use SoftDeletes;

    public function admissionExams()
    {
    	return $this->belongsToMany('App\Models\Admission\AdmissionExam','admission_exam_subjects','admission_subject_id','admission_exam_id');
    }

    public function admissionResultMarks()
    {
    	return $this->belongsToMany('App\Models\Admission\AdmissionResultMark','admission_subject_marks_dtls','admission_subject_id','admission_subject_mark_id');
    }
}
