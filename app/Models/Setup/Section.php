<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;
    public $timestamps = true;
    protected $fillable=['name'];

    public function programOffers()
    {
        return $this->hasMany('App\Models\Program\ProgramOffer','id','section_id');
    }
}
