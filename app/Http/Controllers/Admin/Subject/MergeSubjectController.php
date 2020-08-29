<?php

namespace App\Http\Controllers\Admin\Subject;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject\MergeSubject;
use App\Models\Program\ProgramOffer;
use App\Models\Subject\SubjectOffer;
use App\Models\Setup\Subject;
use App\Http\Requests\Admin\Subject\MergeSubjectFormRequest as MSFormRequest;

class MergeSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('merge-subject-view');
        $data = [];

         $data['page_scripts'] = array('admin/custom/js/subject/merge_subject.js');
         $data['bc_title'] = "List";
         $data['records'] = MergeSubject::all();
        return view('admin.subject.merge_subject.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('merge-subject-create');
        $data = [];
        $data['bc_title'] = "Add";
        $data['page_scripts'] = array('admin/custom/js/subject/merge_subject.js');
        $data['program_offer_list'] = ProgramOffer::all()
                                                ->where('status', 1);
        $data['program_offer_list']->prepend('Select');
        
        return view('admin.subject.merge_subject.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MSFormRequest $request)
    {
         $this->restriction('merge-subject-create');
         try{
                if ($this->mergeSubjectCheck($request))
                {
                    return redirect('/admin/merge-subject')->with('sweet-error', 'Already Exist!');
                }
                $user = request()->user();
                $count = count($request->subject_offer_id);
            for($i = 0; $i < $count; $i++) :
                    $merge_sub = new MergeSubject();
                    $merge_sub->name = trim($request->name);
                    $merge_sub->subject_offer_id = $request->subject_offer_id[$i];
                    $merge_sub->created_by = $user->id;
                    $merge_sub->save();
            endfor;
                $sucess = 1;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 2;
        }
        if ($sucess == 1) :
            return redirect('/admin/merge-subject')->with('sweet-success', 'Successfully saved!');
        else :
            return redirect('/admin/add-merge-subject')->with('sweet-error', 'Error!');
        endif;
    }

    private function mergeSubjectCheck($request)
    {
        $program_offer_id = $request->program_offer_id;
        
         $records = SubjectOffer::selectRaw('
                subject_offers.*
                ')
            ->join('merge_subjects', 'merge_subjects.subject_offer_id', '=', 'subject_offers.id')
            ->where('subject_offers.program_offer_id', $program_offer_id)
            ->where('merge_subjects.name', trim($request->name))
            ->whereIn('merge_subjects.subject_offer_id',$request->subject_offer_id)
            ->first();
            //echo '<pre>';print_r($records);exit;
            return $records;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->restriction('merge-subject-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['page_scripts'] = array('admin/custom/js/subject/merge_subject.js');
        $data['record'] = MergeSubject::find($id);
        $data['records'] = $this->getSubjectOfferIds($data['record']);
       
        $data['program_offer_list'] = ProgramOffer::all()
                                                ->where('status', 1);
        $data['program_offer_list']->prepend('Select');
         //echo '<pre>';print_r($data['records']['active_sub']);exit;
        
        return view('admin.subject.merge_subject.edit')->with($data);
    }

    private function getSubjectOfferIds($data = []) 
    {
        $records = $this->getSubjectOfferList($data, 1);
        $active = $this->getSubjectOfferList($data, 2);
       
        $arr = [];
        if (!$active->isEmpty()) {
            foreach ($active as $key => $val) {
                $arr[$key]= $val->subject_offer_id;
            }
        }
        return ['active_sub' => $arr, 'records' =>  $records];
    }

    private function getSubjectOfferList($data = [], $type)
    {
        $program_offer_id = $data->subjectOffer->program_offer_id;
        $name = trim($data->name);
        
            if ($type == 1) {
                $table = SubjectOffer::selectRaw('
                subject_offers.id,
                CONCAT(subjects.name,"(",subjects.code,")") AS name
                ')
            ->join('subjects', 'subjects.id', '=', 'subject_offers.subject_id')
            ->where('subject_offers.program_offer_id', $program_offer_id);
                $records = $table->get();
            } else {
                $table = SubjectOffer::selectRaw('
                merge_subjects.*,
                subjects.name
                ')
            ->join('merge_subjects', 'subject_offers.id', '=', 'merge_subjects.subject_offer_id')
            ->join('subjects', 'subjects.id', '=', 'subject_offers.subject_id')
            ->where('subject_offers.program_offer_id', $program_offer_id);
                $records = $table->where('merge_subjects.name', $name)->get();
            }
            return $records;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo '<pre>';print_r($_POST);exit;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->restriction('merge-subject-delete');
        $merge_sub = MergeSubject::find($id);
        try{
            if ($merge_sub->delete()) :
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
        $this->restriction('merge-subject-status');
        $merge_sub = MergeSubject::find($id);
        $merge_sub->status = 2;

        try{
            if ($merge_sub->save()) :
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
        $this->restriction('merge-subject-status');
        $merge_sub = MergeSubject::find($id);
        $merge_sub->status = 1;

        try{
            if ($merge_sub->save()) :
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
