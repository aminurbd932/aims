<?php

namespace App\Http\Controllers\Admin\Subject;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Subject\SubjectOffer;
use App\Models\Setup\Subject;
use App\Models\Program\ProgramOffer;
use App\Models\Teacher\Teacher;
use App\Models\Setup\MarkType;
use App\Models\Subject\DistributeMark;
use App\Http\Requests\Admin\Subject\SubjectOfferFormRequest as SOFormRequest;

class SubjectOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('subject-offer-view');
        $data = [];

         $data['page_scripts'] = array('admin/custom/js/subject/subject_offer.js');
         $data['bc_title'] = "List";
         //$data['records'] = SubjectOffer::all();
         $data['records'] = SubjectOffer::selectRaw('
                subject_offers.*,
                distribute_marks.subject_offer_id
                ')
            ->Leftjoin('distribute_marks', 'subject_offers.id', '=', 'distribute_marks.subject_offer_id')
            ->groupBy('subject_offers.id')
            ->get();
        return view('admin.subject.subject_offer.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('subject-offer-create');
        $data = [];
        $data['bc_title'] = "Add";
        $data['page_scripts'] = array('admin/custom/js/subject/subject_offer.js');
        $data['program_offer_list'] = ProgramOffer::all()
                                                ->where('status', 1);
        $data['program_offer_list']->prepend('Select');
        
        return view('admin.subject.subject_offer.add')->with($data);
    }

    public function search(Request $request)
    {
        $program_offer_id = $request->program_offer_id;
        if(!$program_offer_id) {
            return json_encode(array('success' => false, 'message' => 'No Found Program Offer Id!'));
        }
        $program_offer_info = ProgramOffer::find($program_offer_id);
        $class_level_id = 0;
        if ($program_offer_info->class_level_id) {
             $class_level_id = $program_offer_info->class_level_id;
        }
        $data['records'] = Subject::selectRaw('
                            subjects.*
                        ')
                        ->leftJoin('subject_offers as so', function($join) use ($program_offer_id)
                            {
                                $join->on('subjects.id', '=', 'so.subject_id')
                                    ->where('so.program_offer_id', $program_offer_id)
                                    ->whereNull('so.deleted_at');
                            })
                        ->whereNull('so.subject_id')
                        ->where('subjects.class_level_id', $class_level_id)
                        ->where('subjects.status', 1)
                        ->get();
        $data['teacher_list'] = Teacher::all();
        $data['teacher_list']->prepend('Select');
        $data['program_offer_id'] = $program_offer_id;
       if ($data['records']->isEmpty()) {
                return json_encode(array('success' => 2, 'message' => 'Data Not Found!'));
                exit;
            }
        if ($request->ajax()) {
            return response()->json(view('admin.subject.subject_offer.add_list')->with($data)->render());
            exit;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SOFormRequest $request)
    {
        //echo '<pre>';print_r($_POST);exit;
        $this->restriction('subject-offer-create');
        try{
            $user = request()->user();
            $count = count($request->subject_id);
            for($i = 0; $i < $count; $i++) :
                $sub_offer = new SubjectOffer();
                $sub_offer->program_offer_id = $request->program_offer_id;
                $sub_offer->subject_id = $request->subject_id[$i];
                $sub_offer->teacher_id = $request->teacher_id[$i];
                $sub_offer->subject_mark = $request->subject_mark[$i];
                $sub_offer->created_by = $user->id;
                $sub_offer->save();
            endfor;
            $sucess = 1;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 2;
        }
        if ($sucess == 1) :
            return redirect('/admin/subject-offer')->with('sweet-success', 'Successfully saved!');
        else :
            return redirect('/admin/add-subject-offer')->with('sweet-error', 'Error!');
        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->restriction('subject-offer-view');
        $data = [];
        $data['record'] = SubjectOffer::find($id);
        $data['records'] = DistributeMark::where('subject_offer_id', $id)->get();
        return view('admin.subject.subject_offer.view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->restriction('subject-offer-edit');
        $data = [];
        $data['page_scripts'] = array('admin/custom/js/subject/subject_offer.js');
        $data['bc_title'] = "Edit";
        $data['record'] = SubjectOffer::find($id);
        $subject_id = 0;
        if ($data['record']->subject_id) {
            $subject_id = $data['record']->subject_id;
        }
        $data['subject'] = Subject::find($subject_id);
        $data['distribute_mark'] = $this->_getDistributeMark($id);
        $data['teacher_list'] = Teacher::all();
        $data['teacher_list']->prepend('Select');
        $data['mark_type'] = MarkType::all()
                                ->where('status', 1);

        return view('admin.subject.subject_offer.edit')->with($data);
    }

    private function _getDistributeMark($id = 0) 
    {
       $records = DistributeMark::all()->where('subject_offer_id', $id);
       $arr = [];
       if ($records && !$records->isEmpty()) {
            foreach($records as $key => $val) :
                $arr[$val->mark_type_id]['id'] = $val->id;
                $arr[$val->mark_type_id]['orginal_mark'] = $val->orginal_mark;
                $arr[$val->mark_type_id]['percent_mark'] = $val->percent_mark;
                $arr[$val->mark_type_id]['divided_mark'] = $val->divided_mark;
            endforeach;
       }
       return $arr;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SOFormRequest $request, $id)
    {
       // echo '<pre>';print_r($_POST);exit;
        $this->restriction('subject-offer-edit');
        try{
            $user = request()->user();
            $sub_offer = SubjectOffer::find($id);
            $sub_offer->teacher_id = $request->teacher_id;
            $sub_offer->subject_mark = $request->subject_mark;
            $sub_offer->updated_by = $user->id;
            if ($request->subject_mark != $request->total_divided_mark) {
                return redirect('/admin/subject-offer')->with('sweet-unsuccess', 'Total distribute mark not same');
            }
            DB::beginTransaction();
            if ($sub_offer->save()) :
                if ($request->mark_type_id) :
                    $count = count($request->mark_type_id);
                    for($i = 0; $i < $count; $i++) :
                        $this->_checkDistributeMark($request, $i);
                        if($request->divided_mark[$i] && $request->divided_mark[$i] > 0) :
                            if (!$request->distribute_id[$i]) {
                                $mark_di = new DistributeMark();
                                $mark_di->created_by = $user->id;
                                $mark_di->subject_offer_id = $id;
                            } else {
                                $mark_di = DistributeMark::find($request->distribute_id[$i]);
                                $mark_di->updated_by = $user->id;
                            }
                            $mark_di->mark_type_id = $request->mark_type_id[$i];
                            $mark_di->orginal_mark = $request->orginal_mark[$i];
                            $mark_di->percent_mark = $request->percent_mark[$i];
                            $mark_di->divided_mark = $request->divided_mark[$i];
                            $mark_di->save();
                        endif;
                    endfor;
                endif;
                $sucess = 1;
                DB::commit();
            else : 
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 2;
            DB::rollback();
        }
        if ($sucess == 1) :
            return redirect('/admin/subject-offer')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/subject-offer')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/subject-offer')->with('sweet-error', 'Error!');
        endif;
    }

    private function _checkDistributeMark($request, $i) {
        if ($request->distribute_id[$i] && (!$request->divided_mark[$i] || $request->divided_mark[$i] < 0.9))
        {
            DB::table('distribute_marks')
                ->where('id', $request->distribute_id[$i])
                ->delete();
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
        $this->restriction('subject-offer-delete');
        $sub_offer = SubjectOffer::find($id);
        try{
            if ($sub_offer->delete()) :
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
        $this->restriction('subject-offer-status');
        $sub_offer = SubjectOffer::find($id);
        $sub_offer->status = 2;

        try{
            if ($sub_offer->save()) :
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
        $this->restriction('subject-offer-status');
        $sub_offer = SubjectOffer::find($id);
        $sub_offer->status = 1;

        try{
            if ($sub_offer->save()) :
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
