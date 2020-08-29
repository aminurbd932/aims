<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shift extends Model
{
    protected $table ="shifts";
    public $timestamps = true;
    use SoftDeletes;

    public function admissionOffers()
    {
        return $this->hasMany('App\Models\Admission\AdmissionOffer','id','shift_id');
    }

    public function programOffers()
    {
        return $this->hasMany('App\Models\Program\ProgramOffer','id','shift_id');
    }
}
