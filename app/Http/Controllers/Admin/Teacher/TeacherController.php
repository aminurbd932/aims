<?php

namespace App\Http\Controllers\Admin\Teacher;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Teacher\Teacher;
use App\Models\Setup\Board;
use App\Models\Setup\Thana;
use App\Models\Common\Address;
use App\Models\Common\GuardianInfo;
use App\Models\Common\Qualification;
use App\Http\Requests\Admin\Teacher\TeacherFormRequest as TFormRequest;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('teacher-teacher-view');
        $data = [];        
        $data['page_scripts'] = array('admin/custom/js/teacher/teacher.js');
        $data['bc_title'] = "List";
        $data['records'] = Teacher::all();
           // echo '<pre>';print_r($data);exit;
        return view('admin.teacher.teacher.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('teacher-teacher-create');
        $data = [];
        $data['bc_title'] = "Add";
        $data['page_scripts'] = array('admin/custom/js/teacher/teacher.js');
        $data['board_list'] = Board::all()->where('status', 1);
        $data['board_list']->prepend('Select');
        $data['thana_list'] = Thana::all()->where('status', 1);
        $data['thana_list']->prepend('Select');
        return view('admin.teacher.teacher.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TFormRequest $request)
    {
       // echo '<pre>';print_r($_POST);exit;
        $this->restriction('teacher-teacher-create');
        $user = request()->user();
                /*       applicant   */
        DB::beginTransaction();
        try{
        $teacher = new Teacher();
        $teacher->employment_status = $request->employment_status;
        $teacher->teacher_code = date('His');
        $teacher->full_name = $request->full_name;
        $teacher->designation_id = $request->designation_id;
        $teacher->department_id = $request->department_id;
        $teacher->joining_date = custom_date_format($request->joining_date, 'Y-m-d');
        $teacher->dob = custom_date_format($request->dob, 'Y-m-d');
        $teacher->position = $request->position;
        $teacher->birth_reg_no = $request->birth_reg_no;
        $teacher->national_id_no = $request->national_id_no;
        $teacher->blood_group_id = $request->blood_group_id;
        $teacher->religion_id = $request->religion_id;
        $teacher->sex = $request->sex;
        $teacher->phone = $request->phone;
        $teacher->email = $request->email;
        $teacher->created_by = $user->id;
        $teacher->save();

        /*       address   */
        $address = new Address();
        $address->source_id = $teacher->id;
        $address->source_type = 2;
        $address->present_address = $request->present_address;
        $address->present_thana_id = $request->present_thana_id;
        $address->present_post_code = $request->present_post_code;
        $address->permanent_address = $request->permanent_address;
        $address->permanent_thana_id = $request->permanent_thana_id;
        $address->permanent_post_code = $request->permanent_post_code;
        $address->save();

        /*     guardian info      */
        $guardian_info = new GuardianInfo();
        $guardian_info->source_id = $teacher->id;
        $guardian_info->source_type = 2;
        $guardian_info->father_name = $request->father_name;
        $guardian_info->father_phone = $request->father_phone;
        $guardian_info->father_national_id = $request->father_national_id;
        $guardian_info->father_profession = $request->father_profession;
        $guardian_info->mother_name = $request->mother_name;
        $guardian_info->mother_phone = $request->mother_phone;
        $guardian_info->mother_national_id = $request->mother_national_id;
        $guardian_info->mother_profession = $request->mother_profession;
        $guardian_info->save();

        /*       Qualification   */
        $count = count($request->exam_id);
        if ($request->exam_id && $count > 0) :
            for($i = 0; $i < $count; $i++) :
                if ($request->exam_id[$i]) :
                    $qualification = new Qualification();
                    $qualification->source_id = $teacher->id;
                    $qualification->source_type = 2;
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
            return redirect('/admin/teacher')->with('sweet-success', 'Successfully saved!');
        else :
            return redirect('/admin/add-teacher')->with('sweet-error', 'Error!');
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
