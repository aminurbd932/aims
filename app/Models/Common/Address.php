<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table ="addresses";

    public function applicant()
    {
        return $this->haseOne('App\Models\Admission\ApplicantRegistration');
    }

    public function teacher()
    {
        return $this->haseOne('App\Models\Teacher\Teacher');
    }

    public function presentThana()
    {
    	return $this->belongsTo('App\Models\Setup\Thana','present_thana_id','id');
    }
    public function permanentThana()
    {
    	return $this->belongsTo('App\Models\Setup\Thana','permanent_thana_id','id');
    }
}
