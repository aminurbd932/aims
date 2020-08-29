<?php

namespace App\Http\Controllers\Admin\setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Group;
use App\Http\Requests\Admin\Setup\GroupFormRequest;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('setup-group-view');
        $data = [];

        $data['page_scripts'] = array('admin/custom/js/setup/group.js');
        $data['bc_title'] = "List";
        $data['records'] = group::all();
        return view('admin.setup.group.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('setup-group-create');
        $data = [];
        $data['bc_title'] = "Add";
        return view('admin.setup.group.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(groupFormRequest $request)
    {
        
        //echo '<pre>';print_r($_POST);exit();
        $this->restriction('setup-group-create');
        $user = request()->user();
        $program = new group();
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
           return redirect('/admin/group')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/group')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/group')->with('sweet-error', 'Error!');;
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
        $this->restriction('setup-group-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['record'] = group::find($id);

        return view('admin.setup.group.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(groupFormRequest $request, $id)
    {
        $this->restriction('setup-group-edit');
        $user = request()->user();
        $group = group::find($id);
        $group->name = $request->name;
        
        //echo '<pre>';print_r($_POST);exit;
        try{
            if ($group->save()) :
               return redirect('/admin/group')->with('sweet-success', 'Successfully saved!');
            else :
                return redirect('/admin/group')->with('sweet-unsuccess', 'UnSuccessfully saved!');
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){

           return redirect('/admin/add-group')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-group-delete');
        $group = group::find($id);
        try{
            if ($group->delete()) :
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
        $this->restriction('setup-group-status');
        $group = group::find($id);
        $group->status = 2;

        try{
            if ($group->save()) :
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
        $this->restriction('setup-group-status');
        $group = group::find($id);
        $group->status = 1;

        try{
            if ($group->save()) :
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
