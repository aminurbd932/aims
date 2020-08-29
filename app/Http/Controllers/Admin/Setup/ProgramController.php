<?php

namespace App\Http\Controllers\Admin\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Program;
use App\Models\Setup\ClassLevel;
use App\Http\Requests\Admin\Setup\ProgramFormRequest;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('setup-program-view');
        $data = [];

        $data['bc_title'] = "List";
        $data['records'] = Program::all();
        return view('admin.setup.program.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('setup-program-create');
        $data = [];
        $data['bc_title'] = "Add";
        $data['class_level_list'] = ClassLevel::all()->where('status', 1);
        return view('admin.setup.program.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramFormRequest $request)
    {
        //echo '<pre>';print_r($_POST);exit();
        $this->restriction('setup-program-create');
        $user = request()->user();
        $program = new Program();
        $program->name = $request->name;
        $program->class_level_id = $request->class_level_id;
        $program->created_by = $user->id;
        try{
            if ($program->save()) :
                $sucess = 1;
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
        }

        if ($sucess == 1) :
           return redirect('/admin/program')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/program')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/program')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-program-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['record'] = Program::find($id);
        $data['class_level_list'] = ClassLevel::all()->where('status', 1);

        return view('admin.setup.program.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProgramFormRequest $request, $id)
    {
        $this->restriction('setup-program-edit');
        $user = request()->user();
        $program = Program::find($id);
        $program->name = $request->name;
        $program->class_level_id = $request->class_level_id;
        $program->updated_by = $user->id;
        //echo '<pre>';print_r($_POST);exit;
        try{
            if ($program->save()) :
               return redirect('/admin/program')->with('sweet-success', 'Successfully saved!');
            else :
                return redirect('/admin/program')->with('sweet-unsuccess', 'UnSuccessfully saved!');
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){

           return redirect('/admin/add-program')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-program-delete');
        $program = Program::find($id);
        try{
            if ($program->delete()) :
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
        $this->restriction('setup-program-status');
        $program = Program::find($id);
        $program->status = 2;

        try{
            if ($program->save()) :
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
        $this->restriction('setup-program-status');
        $program = Program::find($id);
        $program->status = 1;

        try{
            if ($program->save()) :
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
