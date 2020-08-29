<?php

namespace App\Models\Subject;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DistributeMark extends Model
{
    use SoftDeletes;

    public function subjectOffer()
    {
    	return $this->belongsTo('App\Models\Subject\SubjectOffer','subject_offer_id','id');
    }

    public function markType()
    {
    	return $this->belongsTo('App\Models\Setup\MarkType','mark_type_id','id');
    }
}
