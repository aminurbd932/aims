<?php

namespace App\Models\Admission;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdmissionExam extends Model
{
	use SoftDeletes;
	
    public function admissionSubjects()
    {
        return $this->belongsToMany('App\Models\Admission\AdmissionSubject','admission_exam_subjects','admission_exam_id','admission_subject_id');
    }

    public function admissionOffer()
    {
    	return $this->belongsTo('App\Models\Admission\AdmissionOffer','admission_offer_id','id');
    }
}
