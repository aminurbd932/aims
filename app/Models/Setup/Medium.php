<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medium extends Model
{
    protected $table ="mediums";
    use SoftDeletes;

    public function admissionOffers()
    {
        return $this->hasMany('App\Models\Admission\AdmissionOffer','id','medium_id');
    }

    public function programOffers()
    {
        return $this->hasMany('App\Models\Program\ProgramOffer','id','medium_id');
    }
}
