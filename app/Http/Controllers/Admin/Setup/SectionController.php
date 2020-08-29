<?php

namespace App\Http\Controllers\Admin\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Section;
use App\Http\Requests\Admin\Setup\SectionFormRequest;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('setup-section-view');
        $data = [];
        $data['bc_title'] = "List";
        $data['records'] = Section::all();
        return view('admin.setup.section.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('setup-section-create');
        $data = [];
        $data['bc_title'] = "Add";
        return view('admin.setup.section.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SectionFormRequest $request)
    {
        $this->restriction('setup-section-create');
        $user = request()->user();
        $section = new Section();
        $section->name = $request->name;
        $section->created_by = $user->id;
        try{
            if ($section->save()) :
                $sucess = 1;
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
        }

        if ($sucess == 1) :
            return redirect('/admin/section')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/section')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/add-section')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-section-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['record'] = Section::find($id);

        return view('admin.setup.section.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SectionFormRequest $request, $id)
    {
        $this->restriction('setup-section-edit');
        $user = request()->user();
        $section = Section::find($id);
        $section->name = $request->name;
        $section->updated_by = $user->id;

        try{
            if ($section->save()) :
               return redirect('/admin/section')->with('sweet-success', 'Successfully saved!');
            else :
                return redirect('/admin/section')->with('sweet-unsuccess', 'UnSuccessfully saved!');
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){

           return redirect('/admin/add-section')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-section-delete');
        $section = Section::find($id);
        try{
            if ($section->delete()) :
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
        $this->restriction('setup-section-status');
        $section = Section::find($id);
        $section->status = 2;

        try{
            if ($section->save()) :
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
        $this->restriction('setup-section-status');
        $section = Section::find($id);
        $section->status = 1;

        try{
            if ($section->save()) :
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
