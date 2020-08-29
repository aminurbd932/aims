<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    public function applicant()
    {
    	return $this->belongsTo('App\Models\Admission\ApplicantRegistration','applicant_id','id');
    }

    public function studentPromotions()
    {
        return $this->hasMany('App\Models\Student\Promotion','id','student_id');
    }
}
