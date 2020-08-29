<?php

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class GuardianInfo extends Model
{
    protected $table ="guardians_info";

    public function applicant()
    {
        return $this->haseOne('App\Models\Admission\ApplicantRegistration');
    }

    public function teacher()
    {
        return $this->haseOne('App\Models\Teacher\Teacher');
    }
}
