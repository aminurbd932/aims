<?php

namespace App\Http\Controllers\Admin\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admission\AdmissionResultMark;
use App\Models\Admission\AdmissionOffer;
use App\Models\Admission\AdmissionExam;
use App\Models\Admission\ApplicantRegistration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Http\Requests\Admin\Admission\AdmissionResultMarkFormRequest as ArmFormRequest;

class AdmissionResultMarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('admission-result_mark-view');
        $data = [];        
        $data['page_scripts'] = array('admin/custom/js/admission/result_mark.js');
        $data['bc_title'] = "List";
        $data['records'] = AdmissionResultMark::selectRaw('
                        admission_subject_marks_mst.*,
                        SUM(asmd.result_mark) AS total_mark
                    ')
                    ->join('admission_subject_marks_dtls as asmd', 'admission_subject_marks_mst.id', '=', 'asmd.admission_subject_mark_id')
                    ->groupBy('asmd.admission_subject_mark_id')
                    ->get();
        return view('admin.admission.result_mark.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('admission-result_mark-create');
        $data = [];
        $data['bc_title'] = "Add";
        $data['page_scripts'] = array('admin/custom/js/admission/result_mark.js');
        $data['admission_offer_list'] = AdmissionOffer::all()
                                                ->where('is_exam', 1)
                                                ->where('status', 1);
        $data['admission_offer_list']->prepend('Select');
        
        return view('admin.admission.result_mark.add')->with($data);
    }

    public function search(Request $request) 
    {
        try{
            $admission_offer_id = $request->admission_offer_id;
            if(!$admission_offer_id) {
                return json_encode(array('success' => false, 'message' => 'No Found Admission Offer Id!'));
            }
            $data['exam_list'] = AdmissionExam::selectRaw('
                            admission_exams.admission_offer_id,
                            ao.name as admission_offer_name,
                            aes.admission_subject_id,
                            ROUND(aes.subject_mark) as subject_mark,
                            asub.name as subject_name
                        ')
                        ->join('admission_offers as ao', 'ao.id', '=', 'admission_exams.admission_offer_id')
                        ->join('admission_exam_subjects as aes', 'admission_exams.id', '=', 'aes.admission_exam_id')
                        ->join('admission_subjects as asub', 'asub.id', '=', 'aes.admission_subject_id')
                        ->where('admission_exams.admission_offer_id', $admission_offer_id)
                        ->get();
            $data['records'] = ApplicantRegistration::selectRaw('
                            applicants.*
                        ')
                        ->leftJoin('admission_subject_marks_mst as asmm', function($join)
                            {
                                $join->on('applicants.id', '=', 'asmm.applicant_id')
                                     ->whereNull('asmm.deleted_at');
                            })
                        ->whereNull('asmm.applicant_id')
                        ->where('applicants.admission_offer_id', $admission_offer_id)
                        ->get();
            $data['sub_row'] = 0;
            if (!$data['exam_list']->isEmpty()) {
                 $data['sub_row'] = $data['exam_list']->count();
            }
            
            if ($data['sub_row'] == 0 || $data['records']->isEmpty()) {
                return json_encode(array('success' => 2, 'message' => 'Data Not Found!'));
                exit;
            }
            
            if ($request->ajax()) {
                return response()->json(view('admin.admission.result_mark.add_list')->with($data)->render());
                exit;
            }
        }Catch(\Illuminate\Database\QueryException $ex){

           return json_encode(array('success' => false, 'message' => 'Error!'));
           exit;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArmFormRequest $request)
    {
        $this->restriction('admission-result_mark-create');
        DB::beginTransaction();
        try{
            $user = request()->user();
            $mst_count = count($request->applicant_id);
            for($i = 0; $i < $mst_count; $i++) :
                $mark_mst = new AdmissionResultMark();
                $mark_mst->admission_offer_id = $request->admission_offer_id;
                $mark_mst->applicant_id = $request->applicant_id[$i];
                $mark_mst->created_by = $user->id;
                $mark_mst->save();
                $dtls_count = count($request->subject_id);
                $dtls_count = ($dtls_count / $mst_count);
                //$jindex = 0;
                $len_index = ($dtls_count * $i);
                for ($j = 0; $j < $dtls_count; $j++) :
                   /// $jindex = $j;
                    $mark_dtls['admission_subject_mark_id'] = $mark_mst->id;
                    $mark_dtls['admission_subject_id'] = $request->subject_id[$len_index];
                    $mark_dtls['result_mark'] = $request->subject_mark[$len_index];
                    DB::table('admission_subject_marks_dtls')->insert($mark_dtls);
                    $len_index++;
                endfor;
            endfor;
            $sucess = 1;
            DB::commit();
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 2;
            DB::rollback();
        }
        if ($sucess == 1) :
            return redirect('/admin/admission-mark')->with('sweet-success', 'Successfully saved!');
        else :
            return redirect('/admin/add-admission-mark')->with('sweet-error', 'Error!');
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
        $this->restriction('admission-result_mark-view');
        $data = [];
        $data['record'] = AdmissionResultMark::selectRaw('
                            admission_subject_marks_mst.*,
                            asmd.result_mark,
                            asmd.admission_subject_id
                        ')
                        ->join('admission_subject_marks_dtls as asmd', 'admission_subject_marks_mst.id', '=', 'asmd.admission_subject_mark_id')
                        ->where('admission_subject_marks_mst.id', $id)
                        ->get();

        return view('admin.admission.result_mark.view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->restriction('admission-result_mark-edit');
        $data = [];
        $data['page_scripts'] = array('admin/custom/js/admission/result_mark.js');
        $data['bc_title'] = "Edit";
        //$data['record'] = AdmissionResultMark::find($id);
        $data['record'] = AdmissionResultMark::selectRaw('
                            admission_subject_marks_mst.*,
                            asmd.result_mark,
                            asmd.admission_subject_id
                        ')
                        ->join('admission_subject_marks_dtls as asmd', 'admission_subject_marks_mst.id', '=', 'asmd.admission_subject_mark_id')
                        ->where('admission_subject_marks_mst.id', $id)
                        ->get();
         $admission_offer_id = 0;
         if (!$data['record']->isEmpty()) {
            $admission_offer_id = isset($data['record'][0]->admission_offer_id) ? $data['record'][0]->admission_offer_id : 0;
         }
        $data['exam_sub_mark'] = $this->getSubjectMark($admission_offer_id);
       // echo '<pre>';print_r($data);exit;
        return view('admin.admission.result_mark.edit')->with($data);
    }

    private function getSubjectMark($admission_offer_id = 0)
    {
        $records = AdmissionExam::selectRaw('
                            aes.admission_subject_id,
                            ROUND(aes.subject_mark) as subject_mark
                        ')
                        ->join('admission_exam_subjects as aes', 'admission_exams.id', '=', 'aes.admission_exam_id')
                        ->where('admission_exams.admission_offer_id', $admission_offer_id)
                        ->get();
        $arr = [];
        if(!$records->isEmpty()) {
            foreach($records as $key => $row) :
                $arr[$row->admission_subject_id] = $row->subject_mark;
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
    public function update(ArmFormRequest $request, $id)
    {
       // echo '<pre>';print_r($_POST);exit;
        $this->restriction('admission-result_mark-edit');
        $user = request()->user();
        $result_mark = AdmissionResultMark::find($id);
        $result_mark->updated_by = $user->id;
        DB::beginTransaction();
        try{
            if ($request->sub_total_mark) :
            $count = count($request->subject_id);
                for($i = 0; $i < $count; $i++) :
                    DB::table('admission_subject_marks_dtls')
                        ->where('admission_subject_mark_id', $id)
                        ->where('admission_subject_id', $request->subject_id[$i])
                        ->update(['result_mark' => $request->subject_mark[$i]]);;
                endfor;
            endif;
            $sucess = 1;
            DB::commit();
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 2;
        }
        if ($sucess == 1) :
            return redirect('/admin/admission-mark')->with('sweet-success', 'Successfully saved!');
        else :
            return redirect('/admin/admission-mark')->with('sweet-error', 'Error!');
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->restriction('admission-result_mark-delete');
        $mark = AdmissionResultMark::find($id);
        try{
            if ($mark->delete()) :
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
}
