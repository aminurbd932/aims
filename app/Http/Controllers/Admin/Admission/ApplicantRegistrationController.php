<?php

namespace App\Http\Controllers\Admin\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admission\ApplicantRegistration;
use App\Models\Common\Address;
use App\Models\Common\GuardianInfo;
use App\Models\Common\Qualification;
use App\Models\Admission\AdmissionOffer;
use App\Models\Setup\Board;
use App\Models\Setup\Thana;
use App\Http\Requests\Admin\Admission\ApplicantRegistrationFormRequest as AppFormRequest;
use Illuminate\Support\Facades\DB;


class ApplicantRegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('admission-applicant_reg-view');
        $data = [];        
        $data['page_scripts'] = array('admin/custom/js/admission/admission_registration.js');
        $data['bc_title'] = "List";
        $data['records'] = ApplicantRegistration::selectRaw('
                applicants.id,
                applicants.full_name,
                applicants.applicant_code,
                applicants.created_at,
                admission_offers.name as admission_offer_name,
                guardians_info.guardian_name,
                guardians_info.guardian_phone
                ')
            ->join('admission_offers', 'admission_offers.id', '=', 'applicants.admission_offer_id')
            ->join('guardians_info', function($join)
                {
                    $join->on('applicants.id', '=', 'guardians_info.source_id')
                         ->where('guardians_info.source_type', 1);
                })
            ->get();
           // echo '<pre>';print_r($data);exit;
        return view('admin.admission.applicant_registration.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('admission-applicant_reg-create');
        $data = [];
        $data['bc_title'] = "Add";
        $data['page_scripts'] = array('admin/custom/js/admission/admission_registration.js');
        $data['admission_offer_list'] = AdmissionOffer::all()
                                                //->where('is_exam', 1)
                                                ->where('status', 1);
        $data['admission_offer_list']->prepend('Select');
        $data['board_list'] = Board::all()->where('status', 1);
        $data['board_list']->prepend('Select');
        $data['thana_list'] = Thana::all()->where('status', 1);
        $data['thana_list']->prepend('Select');
        return view('admin.admission.applicant_registration.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppFormRequest $request)
    {
        $this->restriction('admission-applicant_reg-create');
        $user = request()->user();
                /*       applicant   */
        DB::beginTransaction();
        try{
        $applicant = new ApplicantRegistration();
        $applicant->admission_offer_id = $request->admission_offer_id;
        $applicant->applicant_code = date('His');
        $applicant->full_name = $request->full_name;
        $applicant->dob = custom_date_format($request->dob, 'Y-m-d');
        $applicant->birth_reg_no = $request->birth_reg_no;
        $applicant->national_id_no = $request->national_id_no;
        $applicant->blood_group_id = $request->blood_group_id;
        $applicant->religion_id = $request->religion_id;
        $applicant->sex = $request->sex;
        $applicant->phone = $request->phone;
        $applicant->email = $request->email;
        $applicant->created_by = $user->id;
        $applicant->save();

        /*       address   */
        $address = new Address();
        $address->source_id = $applicant->id;
        $address->source_type = 1;
        $address->present_address = $request->present_address;
        $address->present_thana_id = $request->present_thana_id;
        $address->present_post_code = $request->present_post_code;
        $address->permanent_address = $request->permanent_address;
        $address->permanent_thana_id = $request->permanent_thana_id;
        $address->permanent_post_code = $request->permanent_post_code;
        $address->save();

        /*     guardian info      */
        $guardian_info = new GuardianInfo();
        $guardian_info->source_id = $applicant->id;
        $guardian_info->source_type = 1;
        $guardian_info->father_name = $request->father_name;
        $guardian_info->father_phone = $request->father_phone;
        $guardian_info->father_national_id = $request->father_national_id;
        $guardian_info->father_profession = $request->father_profession;
        $guardian_info->mother_name = $request->mother_name;
        $guardian_info->mother_phone = $request->mother_phone;
        $guardian_info->mother_national_id = $request->mother_national_id;
        $guardian_info->mother_profession = $request->mother_profession;
        $guardian_info->guardian_name = $request->guardian_name;
        $guardian_info->guardian_phone = $request->guardian_phone;
        $guardian_info->guardian_national_id = $request->guardian_national_id;
        $guardian_info->guardian_profession = $request->guardian_profession;
        $guardian_info->save();

        /*       Qualification   */
        $count = count($request->exam_id);
        if ($request->exam_id && $count > 0) :
            for($i = 0; $i < $count; $i++) :
                if ($request->exam_id[$i]) :
                    $qualification = new Qualification();
                    $qualification->source_id = $applicant->id;
                    $qualification->source_type = 1;
                    $qualification->exam_id = $request->exam_id[$i];
                    $qualification->roll_no = $request->roll_no[$i];
                    $qualification->reg_no = $request->reg_no[$i];
                    $qualification->board_id = $request->board_id[$i];
                    $qualification->gpa = $request->gpa[$i];
                    $qualification->total_mark = $request->total_mark[$i];
                    $qualification->passing_year = $request->passing_year[$i];
                    $qualification->save();
                endif;
            endfor;
        endif;
        $sucess = 1;
        DB::commit();
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 2;
            DB::rollback();
        }

        if ($sucess == 1) :
            return redirect('/admin/applicant-registration')->with('sweet-success', 'Successfully saved!');
        else :
            return redirect('/admin/add-applicant-registration')->with('sweet-error', 'Error!');
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
        exit;
        $this->restriction('admission-applicant_reg-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['page_scripts'] = array('admin/custom/js/admission/admission_registration.js');
        $data['record'] = [];
        $data['applicant'] = ApplicantRegistration::find($id);
        $data['admission_offer_list'] = AdmissionOffer::all()->where('status', 1);
        $data['admission_offer_list']->prepend('Select');
        $data['board_list'] = Board::all()->where('status', 1);
        $data['board_list']->prepend('Select');
        $data['thana_list'] = Thana::all()->where('status', 1);
        $data['thana_list']->prepend('Select');
        return view('admin.admission.applicant_registration.edit')->with($data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->restriction('admission-applicant_reg-delete');
        $applicant = ApplicantRegistration::find($id);
        try{
            if ($applicant->delete()) :
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
