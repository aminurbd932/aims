<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Role;
use App\Http\Requests\Admin\User\UserFormRequest;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('user-user-view');
        $data = [];

        $data['page_scripts'] = array('admin/custom/js/user/user.js');
        $data['bc_title'] = "List";
        $data['records'] = User::selectRaw('
                users.id,
                users.email,
                users.status,
                users.name AS user_name,
                roles.display_name
                ')
            ->join('role_user', 'role_user.user_id', '=', 'users.id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id')
            ->whereIn('roles.id',[1,2,3,4,5])
            ->get();
        //echo '<pre>';print_r($data);exit;
        return view('admin.user.user.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('user-user-create');
        $data = [];
        $data['bc_title'] = "Add";
        $data['role_name'] = Role::all()
                                    ->whereIn('id',[4,5]);
       // echo '<pre>';print_r($data['role_name']);exit;
        return view('admin.user.user.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $this->restriction('user-user-create');
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->created_by = request()->user()->id;

        DB::beginTransaction();
        try{
            if ($user->save()) :
                if ($request->role_id) :
                    $user->roles()->attach($request->role_id);
                endif;
                $sucess = 1;
                DB::commit();
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
            DB::rollback();
        }

        if ($sucess == 1) :
            return redirect('/admin/user')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/user')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/add-user')->with('sweet-error', 'Error!');
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
        $this->restriction('user-user-edit');
        if (!$this->checkUrl($id)){
            return redirect('/admin/user/')->with('sweet-permission', 'This page not permission!');
        }
        $data = [];
        $data['bc_title'] = "Edit";

       // $data['record'] = User::find($id);
        $data['record'] = User::find($id)->roles()->first();
        $data['record']->pivot = $data['record']->pivot->parent;
        $data['role_name'] = Role::all()
                                    ->whereIn('id',[4,5]);
        return view('admin.user.user.edit')->with($data);
    }

    private function checkUrl($id = 0) {
       $record = User::find($id)->roles()->first();
       if ($record) {
            if (in_array($record->id, [3,4,5])){
                return true;
            }
       }
       return false;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, $id)
    {
       // echo '<pre>';print_r($_POST);exit;
        $this->restriction('user-user-edit');
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->updated_by = request()->user()->id;
        DB::beginTransaction();
        try{
            if ($user->save()) :
                if ($request->role_id) :
                    $user->roles()->sync($request->role_id);
                endif;
                $sucess = 1;
                DB::commit();
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
            DB::rollback();
        }

        if ($sucess == 1) :
            return redirect('/admin/user')->with('sweet-success', 'Successfully update!');
        elseif ($sucess == 2) :
            return redirect('/admin/user')->with('sweet-unsuccess', 'UnSuccessfully updated!');
        else :
         return redirect('/admin/edit-user/'.$id)->with('sweet-error', 'Error!');
        endif;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function inactiveStatus($id)
    {
        $this->restriction('user-user-status');
        $user = User::find($id);
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
        $this->restriction('user-user-status');
        $user = User::find($id);
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
