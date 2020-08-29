<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
	use SoftDeletes;
	public function companies()
    {
    	return $this->belongsToMany('App\Models\Setup\Company','supplier_companies','supplier_id','company_id');
    }
}
