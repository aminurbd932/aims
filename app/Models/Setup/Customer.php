<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Customer extends Model
{
    public $timestamps = true;
    protected $fillable=['name','type','company_id','address','mobile','phone'];
    use SoftDeletes;

    public function company()
    {
    	return $this->belongsTo('App\Models\Setup\Company','company_id','id');//id=company primary key, company_id=customers foregin key
    }

}
