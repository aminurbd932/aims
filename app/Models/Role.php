<?php

namespace App\Models;

use Zizaco\Entrust\EntrustRole;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends EntrustRole
{
	public $timestamps = true;
    protected $fillable=['name','description','display_name']; 
    use SoftDeletes;
}
