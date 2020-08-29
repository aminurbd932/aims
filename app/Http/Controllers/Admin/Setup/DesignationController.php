<?php

namespace App\Http\Controllers\Admin\setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Designation;
use App\Http\Requests\Admin\Setup\DesignationFormRequest;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('setup-designation-view');
        $data = [];

        $data['page_scripts'] = array('admin/custom/js/setup/designation.js');
        $data['bc_title'] = "List";
        $data['records'] = Designation::all();
        return view('admin.setup.designation.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('setup-designation-create');
        $data = [];
        $data['bc_title'] = "Add";
        return view('admin.setup.designation.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DesignationFormRequest $request)
    {
        
        //echo '<pre>';print_r($_POST);exit();
        $this->restriction('setup-designation-create');
        $user = request()->user();
        $designation = new Designation();
        $designation->name = $request->name;
        $designation->created_by = $user->id;
        try{
            if ($designation->save()) :
                $sucess = 1;
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
        }

        if ($sucess == 1) :
           return redirect('/admin/designation')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/designation')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/designation')->with('sweet-error', 'Error!');;
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
        $this->restriction('setup-designation-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['record'] = Designation::find($id);

        return view('admin.setup.designation.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      public function update(DesignationFormRequest $request, $id)
    {
        $this->restriction('setup-designation-edit');
        $user = request()->user();
        $designation = Designation::find($id);
        $designation->name = $request->name;
        
        //echo '<pre>';print_r($_POST);exit;
        try{
            if ($designation->save()) :
               return redirect('/admin/designation')->with('sweet-success', 'Successfully saved!');
            else :
                return redirect('/admin/designation')->with('sweet-unsuccess', 'UnSuccessfully saved!');
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){

           return redirect('/admin/add-designation')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-designation-delete');
        $designation = Designation::find($id);
        try{
            if ($designation->delete()) :
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
        $this->restriction('setup-designation-status');
        $designation = Designation::find($id);
        $designation->status = 2;

        try{
            if ($designation->save()) :
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
        $this->restriction('setup-designation-status');
        $designation = Designation::find($id);
        $designation->status = 1;

        try{
            if ($designation->save()) :
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
