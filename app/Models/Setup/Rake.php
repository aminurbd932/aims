<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rake extends Model
{
	use SoftDeletes;
    public $timestamps = true;
    protected $fillable=['name'];
}
