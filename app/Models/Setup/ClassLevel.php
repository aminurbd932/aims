<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassLevel extends Model
{
    protected $table ="class_levels";
    public $timestamps = true;
    protected $fillable=['name'];
    use SoftDeletes;

    public function programs()
    {
    	return $this->hasMany('App\Models\Setup\Program','id','class_level_id');
    }

    public function subjects()
    {
    	return $this->hasMany('App\Models\Setup\Subject','id','class_level_id');
    }

    public function admissionOffers()
    {
        return $this->hasMany('App\Models\Admission\AdmissionOffer','id','class_level_id');
    }

    public function programOffers()
    {
        return $this->hasMany('App\Models\Program\ProgramOffer','id','class_level_id');
    }
}
