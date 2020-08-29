<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
	protected $table ="company";
    public $timestamps = true;
    protected $fillable=['name','type','address','mobile','phone'];
    use SoftDeletes;

    public function customers()
    {
    	return $this->hasMany('App\Models\Setup\Customer','id','company_id');
    }

    public function suppliers()
    {
    	return $this->belongsToMany('App\Models\Setup\Supplier','supplier_companies','company_id','supplier_id');
    }
}

