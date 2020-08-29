<?php

namespace App\Models\Admission;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdmissionResultMark extends Model
{
    use SoftDeletes;
    protected $table ="admission_subject_marks_mst";

    public function admissionSubjects()
    {
        return $this->belongsToMany('App\Models\Admission\AdmissionSubject','admission_subject_marks_dtls','admission_subject_mark_id','admission_subject_id');
    }

    public function admissionOffer()
    {
    	return $this->belongsTo('App\Models\Admission\AdmissionOffer','admission_offer_id','id');
    }

    public function applicant()
    {
    	return $this->belongsTo('App\Models\Admission\ApplicantRegistration','applicant_id','id');
    }
}
