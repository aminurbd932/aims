<?php

namespace App\Models\Setup;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Session extends Model
{
    use SoftDeletes;

    public function admissionOffers()
    {
        return $this->hasMany('App\Models\Admission\AdmissionOffer','id','session_id');
    }

    public function programOffers()
    {
        return $this->hasMany('App\Models\Program\ProgramOffer','id','session_id');
    }

    public static function getCurrentSessionId($url = '/admin/dashboard')
    {
    	$query = Session::all()->where('is_current', 1)->first();
       // $query = [];
        if (!$query) {
            return redirect()->to($url)->with('sweet-permission', 'Not Found Current Session!')->send(); 
        }
        return $query->id;
    }
}
