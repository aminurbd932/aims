<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use SoftDeletes;

    public function student()
    {
    	return $this->belongsTo('App\Models\Student\Student','student_id','id');
    }

    public function programOffer()
    {
    	return $this->belongsTo('App\Models\Program\ProgramOffer','program_offer_id','id');
    }

    public function studentSubjectOffers()
    {
        return $this->hasMany('App\Models\Student\SubjectOffer','id','student_promotion_id');
    }
}
