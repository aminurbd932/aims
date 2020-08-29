<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subject extends Model
{
    use SoftDeletes;

    public function classLevel()
    {
    	return $this->belongsTo('App\Models\Setup\ClassLevel','class_level_id','id');
    }

    public function subjectOffers()
    {
        return $this->hasMany('App\Models\Subject\SubjectOffer','id','subject_id');
    }
}
