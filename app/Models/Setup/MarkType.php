<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarkType extends Model
{
	protected $table ="mark_types";
    use SoftDeletes;

    public function DistributeMarks()
    {
        return $this->hasMany('App\Models\Subject\DistributeMark','id','mark_type_id');
    }
}
