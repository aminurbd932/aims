<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function restriction($permission)
    {
    	return true;
    	// if (!request()->user()->can(trim($permission))) {
     //        return redirect()->to('/admin/dashboard')->with('sweet-permission', 'This page not permission!')->send(); 
     //    }
    }
}
