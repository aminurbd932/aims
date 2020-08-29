<?php

namespace App\Models\Subject;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubjectOffer extends Model
{
    use SoftDeletes;

    public function programOffer()
    {
    	return $this->belongsTo('App\Models\Program\ProgramOffer','program_offer_id','id');
    }

    public function subject()
    {
    	return $this->belongsTo('App\Models\Setup\Subject','subject_id','id');
    }

    public function teacher()
    {
    	return $this->belongsTo('App\Models\Teacher\Teacher','teacher_id','id');
    }

    public function distributeMarks()
    {
        return $this->hasMany('App\Models\Subject\DistributeMark','id','subject_offer_id');
    }
    public function mergeSubjects()
    {
        return $this->hasMany('App\Models\Subject\MergeSubject','id','subject_offer_id');
    }

    public function studentSubjectOffers()
    {
        return $this->hasMany('App\Models\Student\SubjectOffer','id','subject_offer_id');
    }
}
