<?php

namespace App\Http\Controllers\Admin\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admission\AdmissionOffer;
use App\Models\Setup\ClassLevel;
use App\Models\Setup\Program;
use App\Models\Setup\Group;
use App\Models\Setup\Shift;
use App\Models\Setup\Medium;
use App\Models\Setup\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Admin\Admission\AdmissionOfferFormRequest as AOFormRequest;

class AdmissionOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('admission-offer-view');
        $data = [];
        $data['bc_title'] = "List";
        $data['records'] = AdmissionOffer::all();
        return view('admin.admission.admission_offer.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('admission-offer-create');
        $data = [];
        $data = $this->getAdmissionOfferAllList();
        $data['page_scripts'] = array('admin/custom/js/admission/admission_offer.js');
        $data['bc_title'] = "Add";
        //echo '<pre>';print_r($data);exit;
        return view('admin.admission.admission_offer.add')->with($data);
    }

    private function getAdmissionOfferAllList()
    {
        $data['class_level_list'] = ClassLevel::all()->where('status', 1);
        $data['class_level_list']->prepend('Select');
        $data['program_list'] = Program::all()->where('status', 1);
        $data['program_list']->prepend('Select');
        $data['group_list'] = Group::all()->where('status', 1);
        $data['group_list']->prepend('Select');
        $data['medium_list'] = Medium::all()->where('status', 1);
        $data['medium_list']->prepend('Select');
        $data['shift_list'] = Shift::all()->where('status', 1);
        $data['shift_list']->prepend('Select');
        return $data;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AOFormRequest $request)
    {
        //echo '<pre>';print_r($_POST);exit;
        $this->restriction('admission-offer-create');
        try{
        $session_id = Session::getCurrentSessionId('/admin/admission-offer');
        $this->duplicateCheck($request, $session_id);
        $user = request()->user();
        $offer = new AdmissionOffer();
        $offer->name = $request->name;
        $offer->session_id = $session_id;
        $offer->class_level_id = $request->class_level_id;
        $offer->program_id = $request->program_id;
        $offer->group_id = $request->group_id;
        $offer->medium_id = $request->medium_id;
        $offer->shift_id = $request->shift_id;
        $offer->seat_number = $request->seat_number;
        if (isset($request->is_exam)) :
            $offer->is_exam = $request->is_exam;
        endif;
        $offer->created_by = $user->id;
        
            if ($offer->save()) :
                $sucess = 1;
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
        }

        if ($sucess == 1) :
            return redirect('/admin/admission-offer')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/admission-offer')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/add-admission-offer')->with('sweet-error', 'Error!');
        endif;
    }

    private function duplicateCheck($request, $session_id = 0, $id = 0)
    {
        if ($id) {
            $records = DB::table('admission_offers')
                        ->where('id', '<>', $id)
                        ->where('session_id', $session_id)
                        ->where('class_level_id', $request->class_level_id)
                        ->where('program_id', $request->program_id)
                        ->where('group_id', $request->group_id)
                        ->where('medium_id', $request->medium_id)
                        ->where('shift_id', $request->shift_id)
                        ->get();
            if (!$records->isEmpty()) {
                return redirect('/admin/admission-offer')->with('sweet-unsuccess', 'Duplicate Found!');
            }
        } else {
            $records = DB::table('admission_offers')
                        ->where('session_id', $session_id)
                        ->where('class_level_id', $request->class_level_id)
                        ->where('program_id', $request->program_id)
                        ->where('group_id', $request->group_id)
                        ->where('medium_id', $request->medium_id)
                        ->where('shift_id', $request->shift_id)
                        ->get();
            if (!$records->isEmpty()) {
                return redirect('/admin/admission-offer')->with('sweet-unsuccess', 'Duplicate Found!');
            }
        }
        
        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->restriction('admission-offer-view');
        $data = [];
        $data['record'] = AdmissionOffer::where('id', $id)->first();

        return view('admin.admission.admission_offer.view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->restriction('admission-offer-edit');
        $data = [];

        $data = $this->getAdmissionOfferAllList();
        $data['page_scripts'] = array('admin/custom/js/admission/admission_offer.js');
        $data['bc_title'] = "Edit";
        $data['record'] = AdmissionOffer::find($id);
        return view('admin.admission.admission_offer.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AOFormRequest $request, $id)
    {
        $this->restriction('admission-offer-edit');
        $session_id = Session::getCurrentSessionId('/admin/admission-offer');
        $this->duplicateCheck($request, $session_id, $id);
        $user = request()->user();
        $offer = AdmissionOffer::find($id);
        $offer->name = $request->name;
        $offer->class_level_id = $request->class_level_id;
        $offer->program_id = $request->program_id;
        $offer->group_id = $request->group_id;
        $offer->medium_id = $request->medium_id;
        $offer->shift_id = $request->shift_id;
        $offer->seat_number = $request->seat_number;
        if (!isset($request->is_exam)) :
            $offer->is_exam = 0;
        else :
            $offer->is_exam = 1;
        endif;
        $offer->updated_by = $user->id;

        try{
            if ($offer->save()) :
               return redirect('/admin/admission-offer')->with('sweet-success', 'Successfully updated!');
            else :
                return redirect('/admin/admission-offer')->with('sweet-unsuccess', 'UnSuccessfully updated!');
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){

           return redirect('/admin/add-admission-offer')->with('sweet-error', 'Error!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->restriction('admission-offer-delete');
        $offer = AdmissionOffer::find($id);
        try{
            if ($offer->delete()) :
               return json_encode(array('success' => true, 'message' => 'Successfully deleted!'));
            else :
                return json_encode(array('success' => false, 'message' => 'Unsuccessfully deleted!'));
            endif;
            exit;
        }Catch(\Illuminate\Database\QueryException $ex){

           return json_encode(array('success' => false, 'message' => 'Error!'));
           exit;
        }
    }

    public function inactiveStatus($id)
    {
        $this->restriction('admission-offer-status');
        $offer = AdmissionOffer::find($id);
        $offer->status = 2;

        try{
            if ($offer->save()) :
               return json_encode(array('success' => true, 'message' => 'Successfully inactive!'));
            else :
                return json_encode(array('success' => false, 'message' => 'Unsuccessfully inactive!'));
            endif;
            exit;
        }Catch(\Illuminate\Database\QueryException $ex){

           return json_encode(array('success' => false, 'message' => 'Error!'));
           exit;
        }
    }

    public function activeStatus($id)
    {
        $this->restriction('admission-offer-status');
        $offer = AdmissionOffer::find($id);
        $offer->status = 1;

        try{
            if ($offer->save()) :
               return json_encode(array('success' => true, 'message' => 'Successfully active!'));
            else :
                return json_encode(array('success' => false, 'message' => 'Unsuccessfully active!'));
            endif;
            exit;
        }Catch(\Illuminate\Database\QueryException $ex){

           return json_encode(array('success' => false, 'message' => 'Error!'));
           exit;
        }
    }
}
