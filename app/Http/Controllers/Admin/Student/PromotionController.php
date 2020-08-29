<?php

namespace App\Http\Controllers\Admin\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student\Student;
use App\Models\Student\Promotion;
use App\Models\Admission\AdmissionOffer;
use App\Models\Program\ProgramOffer;
use App\Models\Admission\ApplicantRegistration;
use App\Models\Subject\SubjectOffer;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('student-promotion-view');
        $data = [];

         $data['page_scripts'] = array('admin/custom/js/student/promotion.js');
         $data['bc_title'] = "List";
         $data['records'] = Student::all();
        return view('admin.student.promotion.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('student-promotion-create');
        $data = [];
        $data['bc_title'] = "Add";
        $data['page_scripts'] = array('admin/custom/js/student/promotion.js');
        $data['admission_offer_list'] = AdmissionOffer::all()
                                                ->where('status', 1);
        $data['admission_offer_list']->prepend('Select');
        $data['program_offer_list'] = ProgramOffer::all()
                                                ->where('status', 1);
        $data['program_offer_list']->prepend('Select');
        
        return view('admin.student.promotion.add')->with($data);
    }

    public function search(request $request)
    {
        $data = [];
        $promotion_type = $request->promotion_type;
        if ($promotion_type == 1) {
            $admission_offer_id = $request->admission_offer_id;
            $data['records'] = ApplicantRegistration::where('admission_offer_id',$admission_offer_id)
                                ->where('is_student', 1)
                                ->get();
            $data['program_offer_list'] = ProgramOffer::all()
                                                ->where('status', 1);
            $data['program_offer_list']->prepend('Select');
        } else {
            $program_offer_id = $request->program_offer_id;
        }
        // echo '<pre>';print_r($data);exit;
        if ($data['records']->isEmpty()) {
                return json_encode(array('success' => 2, 'message' => 'Data Not Found!'));
                exit;
            }
        if ($request->ajax()) {
            return response()->json(view('admin.student.promotion.add_list')->with($data)->render());
            exit;
        }
    }

    public function getSubjectOfferList(request $request)
    {
        $data['records'] = SubjectOffer::where('program_offer_id', $request->program_offer_id)
                            ->where('status', 1)
                            ->get();
        if ($data['records']->isEmpty()) {
                return json_encode(array('success' => 2, 'message' => 'Data Not Found!'));
                exit;
            }
        if ($request->ajax()) {
            return response()->json(view('admin.student.promotion.subject_offer_list')->with($data)->render());
            exit;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo '<pre>';print_r($_POST);exit;
        $user = request()->user();

        $std_count = count($request->applicant_id);
        for($i = 0; $i < $std_count; $i++) {
            $student = new Student();

            $student->student_code = time();
            $student->applicant_id = $request->applicant_id[$i];
            $student->created_by = $user->id;
            if($student->save()) {
                $promotion = new Promotion();

                $promotion->student_id = $student->id;
                $promotion->program_offer_id = $request->program_offer_id;
                $promotion->roll_no = $request->roll_no[$i];
                $promotion->created_by = $user->id;
                if($promotion->save()) {
                    $su_count = count($request->subject_offer_id);
                    for($j = 0; $j < $su_count; $j++) {

                        $student_subj_offer = new Nai();
                        $student_subj_offer->student_promotion_id = $promotion->id;
                        $student_subj_offer->subject_offer_id = $request->subject_offer_id[$i][$j];
                        $student_subj_offer->subject_type = $request->subject_type[$i][$j];
                        $student_subj_offer->save();
                    }
                }
            }
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
        //
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
        //
    }
}
