<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thana extends Model
{
    use SoftDeletes;

    public function presentThanas()
    {
        return $this->hasMany('App\Models\Common\Address','id','present_thana_id');
    }

    public function permanentThanas()
    {
        return $this->hasMany('App\Models\Common\Address','id','permanent_thana_id');
    }
}
