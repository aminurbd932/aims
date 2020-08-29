<?php

namespace App\Models;

use Zizaco\Entrust\EntrustPermission;
use Illuminate\Database\Eloquent\Model;

class Permission extends EntrustPermission
{
		public $timestamps = true;
        protected $fillable=['name','description','display_name'];
}
