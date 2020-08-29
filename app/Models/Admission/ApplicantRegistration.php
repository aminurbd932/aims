<?php

namespace App\Models\Admission;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicantRegistration extends Model
{
    use SoftDeletes;
    protected $table ="applicants";

    public function address()
    {
        return $this->belongsTo('App\Models\Common\Address');
    }

    public function guardianInfo()
    {
        return $this->belongsTo('App\Models\Common\GuardianInfo');
    }

    public function qualifications()
    {
        return $this->hasMany('App\Models\Common\Qualification','id','source_id');
    }

    public function admissionOffer()
    {
        return $this->belongsTo('App\Models\Admission\AdmissionOffer','admission_offer_id','id');
    }

    public function admissionResultMarks()
    {
        return $this->hasMany('App\Models\Admission\AdmissionResultMark','id','applicant_id');
    }
    public function students()
    {
        return $this->hasMany('App\Models\Student\Student','id','applicant_id');
    }
}
