<?php

namespace App\Http\Controllers\Admin\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Session;
use App\Http\Requests\Admin\Setup\SessionFormRequest;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('setup-session-view');
        $data = [];

        $data['bc_title'] = "List";
        $data['records'] = Session::all();
        return view('admin.setup.session.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('setup-session-create');
        $data = [];
        $data['bc_title'] = "Add";
        return view('admin.setup.session.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SessionFormRequest $request)
    {
        $this->restriction('setup-session-create');
        $user = request()->user();
        $session = new Session();
        $session->name = $request->name;
        $session->created_by = $user->id;
        try{
            if ($session->save()) :
                $sucess = 1;
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
        }

        if ($sucess == 1) :
            return redirect('/admin/session')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/session')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/add-session')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-session-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['record'] = Session::find($id);

        return view('admin.setup.session.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SessionFormRequest $request, $id)
    {
        $this->restriction('setup-session-edit');
        $user = request()->user();
        $session = Session::find($id);
        $session->name = $request->name;
        $session->updated_by = $user->id;

        try{
            if ($session->save()) :
               return redirect('/admin/session')->with('sweet-success', 'Successfully saved!');
            else :
                return redirect('/admin/session')->with('sweet-unsuccess', 'UnSuccessfully saved!');
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){

           return redirect('/admin/add-session')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-session-delete');
        $session = Session::find($id);
        try{
            if ($session->delete()) :
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
}
