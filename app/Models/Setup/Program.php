<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
	protected $table ="programs";
    public $timestamps = true;
    protected $fillable=['name'];
    use SoftDeletes;

    public function classLevel()
    {
    	return $this->belongsTo('App\Models\Setup\ClassLevel','class_level_id','id');
    }

    public function admissionOffers()
    {
        return $this->hasMany('App\Models\Admission\AdmissionOffer','id','program_id');
    }

    public function programOffers()
    {
        return $this->hasMany('App\Models\Program\ProgramOffer','id','program_id');
    }
}
