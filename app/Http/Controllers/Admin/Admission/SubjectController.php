<?php

namespace App\Http\Controllers\Admin\Admission;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admission\AdmissionSubject;
use App\Http\Requests\Admin\Admission\AdmissionSubjectFormRequest as ASFormRequest;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('admission-subject-view');
        $data = [];
        
        $data['bc_title'] = "List";
        $data['records'] = AdmissionSubject::all();
        return view('admin.admission.subject.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('admission-subject-create');
        $data = [];
        $data['bc_title'] = "Add";
        return view('admin.admission.subject.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ASFormRequest $request)
    {
        $this->restriction('admission-subject-create');
        $user = request()->user();
        $subject = new AdmissionSubject();
        $subject->name = $request->name;
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
            return redirect('/admin/admission-subject')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/admission-subject')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/add-admission-subject')->with('sweet-error', 'Error!');
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
        $this->restriction('admission-subject-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['record'] = AdmissionSubject::find($id);

        return view('admin.admission.subject.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ASFormRequest $request, $id)
    {
        $this->restriction('admission-subject-edit');
        $user = request()->user();
        $subject = AdmissionSubject::find($id);
        $subject->name = $request->name;
        $subject->updated_by = $user->id;

        try{
            if ($subject->save()) :
               return redirect('/admin/admission-subject')->with('sweet-success', 'Successfully updated!');
            else :
                return redirect('/admin/admission-subject')->with('sweet-unsuccess', 'UnSuccessfully updated!');
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){

           return redirect('/admin/add-admission-subject')->with('sweet-error', 'Error!');
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
        $this->restriction('admission-subject-delete');
        $subject = AdmissionSubject::find($id);
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
        $this->restriction('admission-subject-status');
        $subject = AdmissionSubject::find($id);
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
        $this->restriction('admission-subject-status');
        $subject = AdmissionSubject::find($id);
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
