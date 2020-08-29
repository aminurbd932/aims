<?php

namespace App\Http\Controllers\Admin\setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\department;
use App\Http\Requests\Admin\Setup\DepartmentFormRequest;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('setup-department-view');
        $data = [];

        $data['page_scripts'] = array('admin/custom/js/setup/department.js');
        $data['bc_title'] = "List";
        $data['records'] = department::all();
        return view('admin.setup.department.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('setup-department-create');
        $data = [];
        $data['bc_title'] = "Add";
        return view('admin.setup.department.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DepartmentFormRequest $request)
    {
        
        //echo '<pre>';print_r($_POST);exit();
        $this->restriction('setup-department-create');
        $user = request()->user();
        $program = new Department();
        $program->name = $request->name;
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
           return redirect('/admin/department')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/department')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/department')->with('sweet-error', 'Error!');;
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
        $this->restriction('setup-department-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['record'] = Department::find($id);

        return view('admin.setup.department.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DepartmentFormRequest $request, $id)
    {
        $this->restriction('setup-department-edit');
        $user = request()->user();
        $department = Department::find($id);
        $department->name = $request->name;
        
        //echo '<pre>';print_r($_POST);exit;
        try{
            if ($department->save()) :
               return redirect('/admin/department')->with('sweet-success', 'Successfully saved!');
            else :
                return redirect('/admin/department')->with('sweet-unsuccess', 'UnSuccessfully saved!');
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){

           return redirect('/admin/add-department')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-department-delete');
        $department = Department::find($id);
        try{
            if ($department->delete()) :
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
        $this->restriction('setup-department-status');
        $department = Department::find($id);
        $department->status = 2;

        try{
            if ($department->save()) :
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
        $this->restriction('setup-department-status');
        $department = Department::find($id);
        $department->status = 1;

        try{
            if ($department->save()) :
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
