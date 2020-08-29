<?php

namespace App\Http\Controllers\Admin\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admission\AdmissionOffer;
use App\Models\Admission\AdmissionExam;
use App\Models\Admission\AdmissionSubject;
use App\Models\Admission\AdmissionExamSubject;
use App\Http\Requests\Admin\Admission\AdmissionExamFormRequest as AEFormRequest;
use Illuminate\Support\Facades\DB;

class AdmissionExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('admission-exam-view');
        $data = [];        
        $data['page_scripts'] = array('admin/custom/js/admission/admission_exam.js');
        $data['bc_title'] = "List";
        $data['records'] = AdmissionExam::all();
        
        //echo 'gg';
        //echo '<pre>';print_r($data);exit;
        return view('admin.admission.admission_exam.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('admission-exam-create');
        $data = [];
        $data['bc_title'] = "Add";
        $data['page_scripts'] = array('admin/custom/js/admission/admission_exam.js');
        $data['admission_offer_list'] = $this->getAdmissionOfferList();
        $data['admission_offer_list']->prepend('Select');
        $data['admission_subject_list'] = AdmissionSubject::all()->where('status', 1);
        $data['admission_subject_list']->prepend('Select');
        return view('admin.admission.admission_exam.add')->with($data);
    }

    private function getAdmissionOfferList($id = 0)
    {
        if ($id) {
            $records = AdmissionExam::rightJoin('admission_offers', function($join) {
            $join->on('admission_exams.admission_offer_id', '=', 'admission_offers.id');
        })
            ->where('admission_offers.id', $id)
           // ->whereNull('admission_exams.admission_offer_id')
            ->where('admission_offers.status', 1)
            ->where('admission_offers.is_exam', 1)
            ->get([
                'admission_offers.id',
                'admission_offers.name'
                ]);
        return $records;

        } else {
            $records = AdmissionExam::rightJoin('admission_offers', function($join) {
            $join->on('admission_exams.admission_offer_id', '=', 'admission_offers.id');
        })
            ->whereNull('admission_exams.admission_offer_id')
            ->where('admission_offers.status', 1)
            ->where('admission_offers.is_exam', 1)
            ->get([
                'admission_offers.id',
                'admission_offers.name'
                ]);
        return $records;
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AEFormRequest $request)
    {
       // echo '<pre>';print_r($_POST);exit;
        $this->restriction('admission-exam-create');
        $user = request()->user();
        $exam = new AdmissionExam();
        $this->duplicateCheck($exam->admission_offer_id);
        $exam->admission_offer_id = $request->admission_offer_id;
        $exam->exam_date = custom_date_format($request->exam_date,'Y-m-d');
        $exam->exam_start_time = custom_time_format($request->exam_start_time);
        $exam->exam_end_time = custom_time_format($request->exam_end_time);
        $exam->created_by = $user->id;

        DB::beginTransaction();
        try{
            if ($exam->save()) :
                if ($request->admission_subject_id) :
                    $count = count($request->admission_subject_id);
                    for($i = 0; $i < $count; $i++) :
                        $exam_sub = new AdmissionExamSubject();
                        $exam_sub->admission_exam_id = $exam->id;
                        $exam_sub->admission_subject_id = $request->admission_subject_id[$i];
                        $exam_sub->subject_mark = $request->subject_mark[$i];
                        $exam_sub->save();
                    endfor;
                endif;
                $sucess = 1;
                DB::commit();
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
            DB::rollback();
        }
       // exit;

        if ($sucess == 1) :
            return redirect('/admin/admission-exam')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/admission-exam')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/add-admission-exam')->with('sweet-error', 'Error!');
        endif;
    }

    private function duplicateCheck($admission_offer_id = 0) 
    {
        $records = DB::table('admission_exams')
                    ->where('admission_offer_id', $admission_offer_id)
                    ->get();
        if (!$records->isEmpty()) {
            return redirect('/admin/admission-exam')->with('sweet-unsuccess', 'Duplicate Found!');
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
        $this->restriction('admission-exam-view');
        $data = [];
        $data['record'] = AdmissionExam::where('id', $id)->first();
        $data['exam_subj_list'] = $this->getAdmissionExamSubjectList($id);
        //echo '<pre>';print_r($data);exit;

        return view('admin.admission.admission_exam.view')->with($data);
    }

    private function getAdmissionExamSubjectList($id = 0)
    {
        $records = AdmissionExamSubject::join('admission_subjects', function($join) {
            $join->on('admission_exam_subjects.admission_subject_id', '=', 'admission_subjects.id');
        })
            ->where('admission_exam_subjects.admission_exam_id', $id)
            ->get([
                'admission_subjects.id',
                'admission_subjects.name',
                'admission_exam_subjects.subject_mark'
                ]);
        return $records;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->restriction('admission-exam-edit');
        $data = [];
        $data['page_scripts'] = array('admin/custom/js/admission/admission_exam.js');
        $data['bc_title'] = "Edit";
        $data['record'] = AdmissionExam::find($id);
        $admission_offer_id = (isset($data['record']->admission_offer_id) ? $data['record']->admission_offer_id : 0);
        $data['admission_offer_list'] = $this->getAdmissionOfferList($admission_offer_id);
        $data['admission_offer_list']->prepend('Select');
        $data['exam_subj_list'] = $this->getAdmissionExamSubjectList($id);
        $data['admission_subject_list'] = AdmissionSubject::all()->where('status', 1);
        $data['admission_subject_list']->prepend('Select');
        return view('admin.admission.admission_exam.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AEFormRequest $request, $id)
    {
        $this->restriction('admission-exam-edit');
        $user = request()->user();
        $exam = AdmissionExam::find($id);
       // $this->duplicateCheck($exam->admission_offer_id);
        $exam->admission_offer_id = $request->admission_offer_id;
        $exam->exam_date = custom_date_format($request->exam_date,'Y-m-d');
        $exam->exam_start_time = custom_time_format($request->exam_start_time);
        $exam->exam_end_time = custom_time_format($request->exam_end_time);
        $exam->updated_by = $user->id;
        DB::beginTransaction();
        try{
            if ($exam->save()) :
                if ($request->admission_subject_id) :
                    $count = count($request->admission_subject_id);
                    if ($this->admissionSubjectDelete($id)) :
                        for($i = 0; $i < $count; $i++) :
                            $exam_sub = new AdmissionExamSubject();
                            $exam_sub->admission_exam_id = $exam->id;
                            $exam_sub->admission_subject_id = $request->admission_subject_id[$i];
                            $exam_sub->subject_mark = $request->subject_mark[$i];
                            $exam_sub->save();
                        endfor;
                    endif;
                endif;
                DB::commit();
               return redirect('/admin/admission-exam')->with('sweet-success', 'Successfully updated!');
            else :
                return redirect('/admin/admission-exam')->with('sweet-unsuccess', 'UnSuccessfully updated!');
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            DB::rollback();
           return redirect('/admin/add-admission-exam')->with('sweet-error', 'Error!');
        }
    }

    private function admissionSubjectDelete($id) {
        $record = DB::table('admission_exam_subjects')
                        ->where('admission_exam_id', $id)
                        ->delete();
        return ($record) ? true : false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->restriction('admission-exam-delete');
        $exam = AdmissionExam::find($id);
        try{
            if ($exam->delete()) :
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
        $this->restriction('admission-exam-status');
        $exam = AdmissionExam::find($id);
        $exam->status = 2;

        try{
            if ($exam->save()) :
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
        $this->restriction('admission-exam-status');
        $exam = AdmissionExam::find($id);
        $exam->status = 1;

        try{
            if ($exam->save()) :
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
