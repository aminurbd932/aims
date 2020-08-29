<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject\SubjectOffer;
use App\Models\Setup\Program;

class CommonController extends Controller
{
    /*     get subject offer list by program offer id  */

    public function getSubjectOfferListByProgramOfferId(Request $request)
    {
    	$records = SubjectOffer::where('program_offer_id', $request->program_offer_id)
                            ->where('status', 1)
    						->get();
    	$re = '';
    	if (!$records->isEmpty()) {
    	 $re .= '<option value="">Select</option>';
    	 foreach($records as $val) :
    	 	$re .= '<option value="'.$val->id.'">'.$val->subject->name."(".$val->subject->code.")".'</option>';
    	 endforeach;
    	}
    	echo $re;
    	exit;
    }

    /*     get program list by program level id     */

    public function getProgramListByProgramLevelId(Request $request)
    {
        $records = Program::where('class_level_id', $request->class_level_id)
                            ->where('status', 1)
                            ->get();
        $re = '';
        if (!$records->isEmpty()) {
         $re .= '<option value="">Select</option>';
         foreach($records as $val) :
            $re .= '<option value="'.$val->id.'">'.$val->name.'</option>';
         endforeach;
        }
        echo $re;
        exit;
    }
}
