<?php

namespace App\Models\Admission;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdmissionOffer extends Model
{
    use SoftDeletes;

    public function session()
    {
    	return $this->belongsTo('App\Models\Setup\Session','session_id','id');
    }

    public function classLevel()
    {
    	return $this->belongsTo('App\Models\Setup\ClassLevel','class_level_id','id');
    }

    public function program()
    {
    	return $this->belongsTo('App\Models\Setup\Program','program_id','id');
    }

    public function group()
    {
        return $this->belongsTo('App\Models\Setup\Group','group_id','id');
    }

    public function medium()
    {
    	return $this->belongsTo('App\Models\Setup\Medium','medium_id','id');
    }

    public function shift()
    {
    	return $this->belongsTo('App\Models\Setup\Shift','shift_id','id');
    }

    public function admissionExam()
    {
        return $this->hasMany('App\Models\Admission\AdmissionExam','id','admission_offer_id');
    }

    public function admissionResultMarks()
    {
        return $this->hasMany('App\Models\Admission\AdmissionResultMark','id','admission_offer_id');
    }

    public function applicants()
    {
        return $this->hasMany('App\Models\Admission\ApplicantRegistration','id','admission_offer_id');
    }
}
