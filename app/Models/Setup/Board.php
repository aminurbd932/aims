<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
	use SoftDeletes;
    public $timestamps = true;
    protected $fillable=['name'];

    public function qualifications()
    {
        return $this->hasMany('App\Models\Common\Qualification','id','board_id');
    }
}
