<?php

namespace App\Http\Controllers\Admin\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Rake;
use App\Http\Requests\Admin\Setup\RakeFormRequest;

class RakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $this->restriction('setup-rake-view');
        $data = [];

        $data['page_scripts'] = array('admin/custom/js/setup/rake.js');
        $data['bc_title'] = "List";
        $data['records'] = Rake::all();
        return view('admin.setup.rake.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('setup-rake-create');
        $data = [];
        $data['bc_title'] = "Add";

        return view('admin.setup.rake.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RakeFormRequest $request)
    {
        $this->restriction('setup-rake-create');
        $user = request()->user();
        $rake = new Rake();
        $rake->name = $request->name;
        $rake->created_by = $user->id;
        try{
            if ($rake->save()) :
                $sucess = 1;
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
        }

        if ($sucess == 1) :
            return redirect('/admin/rake')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/rake')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/add-rake')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-rake-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['record'] = Rake::find($id);

        return view('admin.setup.rake.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RakeFormRequest $request, $id)
    {
        $this->restriction('setup-rake-edit');
        $user = request()->user();
        $rake = Rake::find($id);
        $rake->name = $request->name;
        $rake->updated_by = $user->id;

        try{
            if ($rake->save()) :
               return redirect('/admin/rake')->with('sweet-success', 'Successfully saved!');
            else :
                return redirect('/admin/rake')->with('sweet-unsuccess', 'UnSuccessfully saved!');
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){

           return redirect('/admin/add-rake')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-rake-delete');
        $rake = Rake::find($id);
        try{
            if ($rake->delete()) :
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
        $this->restriction('setup-rake-status');
        $user = Rake::find($id);
        $user->status = 2;

        try{
            if ($user->save()) :
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
        $this->restriction('setup-rake-status');
        $user = Rake::find($id);
        $user->status = 1;

        try{
            if ($user->save()) :
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
