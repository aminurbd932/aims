<?php

namespace App\Models\Student;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubjectOffer extends Model
{
    use SoftDeletes;

    public function studentPromotion()
    {
    	return $this->belongsTo('App\Models\Student\Promotion','student_promotion_id','id');
    }

    public function subjectOffer()
    {
    	return $this->belongsTo('App\Models\Subject\SubjectOffer','subject_offer_id','id');
    }
}
