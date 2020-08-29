<?php

namespace App\Http\Controllers\Admin\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Subject;
use App\Models\Setup\ClassLevel;
use App\Http\Requests\Admin\Setup\SubjectFormRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('setup-subject-view');
        $data = [];

        $data['bc_title'] = "List";
        $data['records'] = Subject::all();
        return view('admin.setup.subject.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('setup-subject-create');
        $data = [];
        $data['bc_title'] = "Add";
        $data['class_level_list'] = ClassLevel::all()->where('status', 1);
        return view('admin.setup.subject.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubjectFormRequest $request)
    {
        $this->restriction('setup-subject-create');
        $user = request()->user();
        $subject = new Subject();
        $subject->name = $request->name;
        $subject->code = $request->code;
        $subject->class_level_id = $request->class_level_id;
        $subject->created_by = $user->id;
        try{
            if ($subject->save()) :
                $sucess = 1;
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
        }

        if ($sucess == 1) :
           return redirect('/admin/subject')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/subject')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/subject')->with('sweet-error', 'Error!');
        endif;
       // exit;
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
        $this->restriction('setup-subject-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['record'] = Subject::find($id);
        $data['class_level_list'] = ClassLevel::all()->where('status', 1);

        return view('admin.setup.subject.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SubjectFormRequest $request, $id)
    {
        $this->restriction('setup-subject-edit');
        $user = request()->user();
        $subject = Subject::find($id);
        $subject->name = $request->name;
        $subject->code = $request->code;
        $subject->class_level_id = $request->class_level_id;
        $subject->updated_by = $user->id;
        //echo '<pre>';print_r($_POST);exit;
        try{
            if ($subject->save()) :
               return redirect('/admin/subject')->with('sweet-success', 'Successfully saved!');
            else :
                return redirect('/admin/subject')->with('sweet-unsuccess', 'UnSuccessfully saved!');
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){

           return redirect('/admin/add-subject')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-subject-delete');
        $subject = Subject::find($id);
        try{
            if ($subject->delete()) :
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
        $this->restriction('setup-subject-status');
        $subject = Subject::find($id);
        $subject->status = 2;

        try{
            if ($subject->save()) :
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
        $this->restriction('setup-subject-status');
        $subject = Subject::find($id);
        $subject->status = 1;

        try{
            if ($subject->save()) :
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
