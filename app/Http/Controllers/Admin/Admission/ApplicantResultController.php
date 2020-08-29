<?php

namespace App\Http\Controllers\Admin\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admission\AdmissionExamSubject;
use App\Models\Admission\AdmissionResultMark;
use App\Models\Admission\ApplicantRegistration;
use App\Models\Admission\AdmissionOffer;
use App\Http\Requests\Admin\Admission\ApplicantResultFormRequest as ArFormRequest;
use Illuminate\Support\Facades\DB;

class ApplicantResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('applicant-result-view');
        $data = [];        
        $data['page_scripts'] = array('admin/custom/js/admission/applicant_result.js');
        $data['bc_title'] = "List";
        $exam_applicant = AdmissionResultMark::selectRaw('
                        admission_subject_marks_mst.applicant_id,
                        admission_subject_marks_mst.admission_offer_id,
                        a.applicant_code,
                        a.full_name,
                        a.assign_status as status,
                        a.serial,
                        SUM(asmd.result_mark) AS total_mark,
                        2 as type
                    ')
                    ->join('applicants as a', 'a.id', '=', 'admission_subject_marks_mst.applicant_id')
                    ->join('admission_subject_marks_dtls as asmd', 'admission_subject_marks_mst.id', '=', 'asmd.admission_subject_mark_id')
                    ->groupBy('asmd.admission_subject_mark_id');
                    //->get();
        $data['records'] = ApplicantRegistration::selectRaw('
                            applicants.id as applicant_id,
                            applicants.admission_offer_id,
                            applicants.applicant_code,
                            applicants.full_name,
                            applicants.assign_status as status,
                            applicants.serial,
                            0 AS total_mark,
                            1 as type
                          ')
                            ->join('admission_offers as ao', 'ao.id', '=', 'applicants.admission_offer_id')
                            ->where('ao.is_exam', 0)
                            ->union($exam_applicant)
                            ->orderBy('serial','asc')
                            ->orderBy('total_mark','desc')
                         ->get();
       // echo '<pre>';print_r($data['records']);exit;
        return view('admin.admission.applicant_result.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('applicant-result-create');
        $data = [];
        $data['bc_title'] = "Add";
        $data['page_scripts'] = array('admin/custom/js/admission/applicant_result.js');
        $data['admission_offer_list'] = AdmissionOffer::all()
                                                ->where('status', 1);
        $data['admission_offer_list']->prepend('Select');
        
        return view('admin.admission.applicant_result.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ArFormRequest $request)
    {
            //echo '<pre>';print_r($_POST);exit;
        $this->restriction('applicant-result-create');
        $user = request()->user();
        DB::beginTransaction();
        try{
            if ($request->applicant_id) :
            $count = count($request->applicant_id);
                for($i = 0; $i < $count; $i++) :
                    $applicant_id = $request->applicant_id[$i];
                    $result = ApplicantRegistration::find($applicant_id);
                    $result->serial = $request->serial[$i];
                    $result->assign_status = $request->assign_status[$i];
                    $result->updated_by = $user->id;
                    $result->save();
                endfor;
            endif;
            $sucess = 1;
            DB::commit();
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 2;
        }
        if ($sucess == 1) :
            return redirect('/admin/applicant-result')->with('sweet-success', 'Successfully saved!');
        else :
            return redirect('/admin/applicant-result')->with('sweet-error', 'Error!');
        endif;
    }

   public function search(Request $request) 
   {
        $admission_offer_id = $request->admission_offer_id;
        if(!$admission_offer_id) {
            return json_encode(array('success' => false, 'message' => 'No Found Admission Offer Id!'));
        }
        $check = AdmissionOffer::find($admission_offer_id);
        if ($check->is_exam == 1) {
            $data['records'] = AdmissionResultMark::selectRaw('
                        admission_subject_marks_mst.applicant_id,
                        admission_subject_marks_mst.admission_offer_id,
                        a.applicant_code,
                        a.full_name,
                        a.assign_status as status,
                        SUM(asmd.result_mark) AS total_mark,
                        2 as type
                    ')
                    ->join('applicants as a', 'a.id', '=', 'admission_subject_marks_mst.applicant_id')
                    ->join('admission_subject_marks_dtls as asmd', 'admission_subject_marks_mst.id', '=', 'asmd.admission_subject_mark_id')
                    ->where('admission_subject_marks_mst.admission_offer_id', $admission_offer_id)
                    ->where('a.assign_status', 0)
                    ->orderBy('total_mark','desc')
                    ->groupBy('asmd.admission_subject_mark_id')
                    ->get();
        } else {
            $data['records'] = ApplicantRegistration::selectRaw('
                            applicants.id as applicant_id,
                            applicants.admission_offer_id,
                            applicants.applicant_code,
                            applicants.full_name,
                            applicants.middle_name,
                            applicants.last_name,
                            applicants.assign_status as status,
                            0 AS total_mark,
                            1 as type
                          ')
                            ->join('admission_offers as ao', 'ao.id', '=', 'applicants.admission_offer_id')
                            ->where('applicants.admission_offer_id', $admission_offer_id)
                            ->where('applicants.assign_status', 0)
                         ->get();
        }
        
        if ($request->ajax()) {
            return response()->json(view('admin.admission.applicant_result.add_list')->with($data)->render());
            exit;
        }
   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->restriction('applicant-result-view');
        $data = [];
        $data['applicant'] = ApplicantRegistration::find($id);
        if ($data['applicant']) {
             $data['record'] = AdmissionResultMark::selectRaw('
                            admission_subject_marks_mst.*,
                            asmd.result_mark,
                            asmd.admission_subject_id
                        ')
                        ->join('admission_subject_marks_dtls as asmd', 'admission_subject_marks_mst.id', '=', 'asmd.admission_subject_mark_id')
                        ->where('admission_subject_marks_mst.applicant_id', $id)
                        ->get();
        }

        return view('admin.admission.applicant_result.view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->restriction('applicant-result-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['record'] = ApplicantRegistration::find($id);
        return view('admin.admission.applicant_result.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ArFormRequest $request, $id)
    {
        // echo '<pre>';print_r($_POST);exit;
        $this->restriction('applicant-result-edit');
        try{
            $user = request()->user();
            $result = ApplicantRegistration::find($id);
            $result->serial = $request->serial;
            $result->assign_status = $request->assign_status;
            $result->updated_by = $user->id;
            $result->save();
            $sucess = 1;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 2;
        }
        if ($sucess == 1) :
            return redirect('/admin/applicant-result')->with('sweet-success', 'Successfully saved!');
        else :
            return redirect('/admin/applicant-result')->with('sweet-error', 'Error!');
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
        //
    }
}
