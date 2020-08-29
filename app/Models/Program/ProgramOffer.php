<?php

namespace App\Models\Program;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProgramOffer extends Model
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

    public function section()
    {
    	return $this->belongsTo('App\Models\Setup\Section','section_id','id');
    }

    public function teacher()
    {
    	return $this->belongsTo('App\Models\Teacher\Teacher','teacher_id','id');
    }

    public function subjectOffers()
    {
        return $this->hasMany('App\Models\Subject\SubjectOffer','id','program_offer_id');
    }

    public function studentPromotions()
    {
        return $this->hasMany('App\Models\Student\Promotion','id','program_offer_id');
    }
}
