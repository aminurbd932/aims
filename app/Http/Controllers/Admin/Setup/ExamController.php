<?php

namespace App\Http\Controllers\Admin\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Exam;
use App\Http\Requests\Admin\Setup\ExamFormRequest;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('setup-exam-view');
        $data = [];

        $data['bc_title'] = "List";
        $data['records'] = Exam::all();
        return view('admin.setup.exam.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('setup-exam-create');
        $data = [];
        $data['bc_title'] = "Add";
        return view('admin.setup.exam.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExamFormRequest $request)
    {
        $this->restriction('setup-exam-create');
        $user = request()->user();
        $exam = new Exam();
        $exam->name = $request->name;
        $exam->created_by = $user->id;
        try{
            if ($exam->save()) :
                $sucess = 1;
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
        }

        if ($sucess == 1) :
            return redirect('/admin/exam')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/exam')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/add-exam')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-exam-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['record'] = Exam::find($id);

        return view('admin.setup.exam.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExamFormRequest $request, $id)
    {
        $this->restriction('setup-exam-edit');
        $user = request()->user();
        $exam = Exam::find($id);
        $exam->name = $request->name;
        $exam->updated_by = $user->id;

        try{
            if ($exam->save()) :
               return redirect('/admin/exam')->with('sweet-success', 'Successfully saved!');
            else :
                return redirect('/admin/exam')->with('sweet-unsuccess', 'UnSuccessfully saved!');
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){

           return redirect('/admin/add-exam')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-exam-delete');
        $exam = Exam::find($id);
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
        $this->restriction('setup-exam-status');
        $exam = Exam::find($id);
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
        $this->restriction('setup-exam-status');
        $exam = Exam::find($id);
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
