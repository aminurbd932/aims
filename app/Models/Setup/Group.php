<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    protected $table ="groups";
    public $timestamps = true;
    protected $fillable=['name'];
    use SoftDeletes;

    public function admissionOffers()
    {
        return $this->hasMany('App\Models\Admission\AdmissionOffer','id','group_id');
    }

    public function programOffers()
    {
        return $this->hasMany('App\Models\Program\ProgramOffer','id','group_id');
    }
}
