<?php

namespace App\Http\Controllers\Admin\setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Shift;
use App\Http\Requests\Admin\Setup\ShiftFormRequest;

class ShiftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('setup-shift-view');
        $data = [];

        $data['page_scripts'] = array('admin/custom/js/setup/shift.js');
        $data['bc_title'] = "List";
        $data['records'] = shift::all();
        return view('admin.setup.shift.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('setup-shift-create');
        $data = [];
        $data['bc_title'] = "Add";
        return view('admin.setup.shift.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(shiftFormRequest $request)
    {
        
        //echo '<pre>';print_r($_POST);exit();
        $this->restriction('setup-shift-create');
        $user = request()->user();
        $shift = new shift();
        $shift->name = $request->name;
        $shift->created_by = $user->id;
        try{
            if ($shift->save()) :
                $sucess = 1;
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
        }

        if ($sucess == 1) :
           return redirect('/admin/shift')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/shift')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/shift')->with('sweet-error', 'Error!');;
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
        $this->restriction('setup-shift-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['record'] = shift::find($id);

        return view('admin.setup.shift.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(shiftFormRequest $request, $id)
    {
        $this->restriction('setup-shift-edit');
        $user = request()->user();
        $shift = shift::find($id);
        $shift->name = $request->name;
        
        //echo '<pre>';print_r($_POST);exit;
        try{
            if ($shift->save()) :
               return redirect('/admin/shift')->with('sweet-success', 'Successfully saved!');
            else :
                return redirect('/admin/shift')->with('sweet-unsuccess', 'UnSuccessfully saved!');
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){

           return redirect('/admin/add-shift')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-shift-delete');
        $shift = shift::find($id);
        try{
            if ($shift->delete()) :
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
        $this->restriction('setup-shift-status');
        $shift = shift::find($id);
        $shift->status = 2;

        try{
            if ($shift->save()) :
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
        $this->restriction('setup-shift-status');
        $shift = shift::find($id);
        $shift->status = 1;

        try{
            if ($shift->save()) :
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
