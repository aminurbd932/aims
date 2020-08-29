<?php

namespace App\Models\Subject;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MergeSubject extends Model
{
    use SoftDeletes;
    public function subjectOffer()
    {
    	return $this->belongsTo('App\Models\Subject\SubjectOffer','subject_offer_id','id');
    }
}
