<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
	protected $table ="category";
    protected $primaryKey = "id";
    public $timestamps = true;
    protected $fillable=['name'];
    use SoftDeletes;
}
