<?php

namespace App\Models\Teacher;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
	use SoftDeletes;
    public function programOffers()
    {
        return $this->hasMany('App\Models\Program\ProgramOffer','id','teacher_id');
    }

    public function subjectOffers()
    {
        return $this->hasMany('App\Models\Subject\SubjectOffer','id','teacher_id');
    }

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
}
