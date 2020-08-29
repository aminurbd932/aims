<?php

namespace App\Http\Controllers\Admin\setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Classlevel;
use App\Http\Requests\Admin\Setup\ClasslevelFormRequest;

class ClasslevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('setup-classlevel-view');
        $data = [];

        $data['page_scripts'] = array('admin/custom/js/setup/classlevel.js');
        $data['bc_title'] = "List";
        $data['records'] = classlevel::all();
        return view('admin.setup.classlevel.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('setup-classlevel-create');
        $data = [];
        $data['bc_title'] = "Add";
        return view('admin.setup.classlevel.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(classlevelFormRequest $request)
    {
        
        //echo '<pre>';print_r($_POST);exit();
        $this->restriction('setup-classlevel-create');
        $user = request()->user();
        $classlevel = new classlevel();
        $classlevel->name = $request->name;
        $classlevel->created_by = $user->id;
        try{
            if ($classlevel->save()) :
                $sucess = 1;
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
        }

        if ($sucess == 1) :
           return redirect('/admin/class-level')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/class-level')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/class-level')->with('sweet-error', 'Error!');;
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
        $this->restriction('setup-classlevel-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['record'] = classlevel::find($id);

        return view('admin.setup.classlevel.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(classlevelFormRequest $request, $id)
    {
        $this->restriction('setup-classlevel-edit');
        $user = request()->user();
        $classlevel = classlevel::find($id);
        $classlevel->name = $request->name;
        
        //echo '<pre>';print_r($_POST);exit;
        try{
            if ($classlevel->save()) :
               return redirect('/admin/class-level')->with('sweet-success', 'Successfully saved!');
            else :
                return redirect('/admin/class-level')->with('sweet-unsuccess', 'UnSuccessfully saved!');
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){

           return redirect('/admin/add-class-level')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-classlevel-delete');
        $classlevel = classlevel::find($id);
        try{
            if ($classlevel->delete()) :
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
        $this->restriction('setup-classlevel-status');
        $classlevel = classlevel::find($id);
        $classlevel->status = 2;

        try{
            if ($classlevel->save()) :
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
        $this->restriction('setup-classlevel-status');
        $classlevel = classlevel::find($id);
        $classlevel->status = 1;

        try{
            if ($classlevel->save()) :
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
