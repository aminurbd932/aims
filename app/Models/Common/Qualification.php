<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $table ="qualifications";

    public function applicant()
    {
        return $this->belongsTo('App\Models\Admission\ApplicantRegistration','source_id','id');
    }

    public function teacher()
    {
        return $this->haseOne('App\Models\Teacher\Teacher');
    }

    public function board()
    {
    	return $this->belongsTo('App\Models\Setup\Board','board_id','id');
    }
}
