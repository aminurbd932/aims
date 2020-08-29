<?php

namespace App\Http\Controllers\Admin\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use App\Http\Requests\Admin\User\PermissionFormRequest;
use Illuminate\Support\Facades\DB;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('user-permission-view');

        $data = [];

        $data['page_scripts'] = array('admin/custom/js/user/permission.js');
        $data['bc_title'] = "List";
        $data['records'] = Permission::all();
        return view('admin.user.permission.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('user-permission-create');
        $data = [];
        $data['bc_title'] = "Add";
        $data['role_name'] = Role::all();
        return view('admin.user.permission.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PermissionFormRequest $request)
    {
        $this->restriction('user-permission-create');
        $user = request()->user();
        $permission = new Permission();
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->created_by = $user->id;
        DB::beginTransaction();
        try{
            if ($permission->save()) :
                if ($request->role_id) :
                    foreach ($request->role_id as $key => $role) :
                        $roles = Role::find($role);
                        $roles->attachPermission($permission);
                    endforeach;
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
            return redirect('/admin/permission')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/permission')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/add-permission')->with('sweet-error', 'Error!');
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
        $this->restriction('user-permission-view');
        $data = [];
        $data['record'] = Permission::find($id);
        $data['role_name'] = Permission::find($id)->roles()->get();
       // echo '<pre>';print_r($data['role_name']);exit;
        return view('admin.user.permission.view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->restriction('user-permission-edit');
        $data = [];
        $data['bc_title'] = "Edit";

        $data['record'] = Permission::find($id);
        $data['assign_role'] = $this->getAssignRole($id);
        $data['role_name'] = Role::all();
        return view('admin.user.permission.edit')->with($data);
    }

    private function getAssignRole($id = 0)
    {
        $arr = [];
        $records = Permission::find($id)->roles()->get();
        if ($records) {
            foreach($records as $key => $val) :
                $arr[$val->id] = 1;
            endforeach;
        }
        return $arr;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PermissionFormRequest $request, $id)
    {
        $this->restriction('user-permission-edit');
      //  echo '<pre>';print_r($_POST);exit;
        $user = request()->user();
        $permission = Permission::find($id);
        $permission->name = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->updated_by = $user->id;
        DB::beginTransaction();
        try{
            if ($permission->save()) :
                if ($request->role_id) :
                    foreach ($request->role_id as $key => $role) :
                        $ids[] = $role;
                    endforeach;
                    $permission->roles()->sync($ids);
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
            return redirect('/admin/permission')->with('sweet-success', 'Successfully updated!');
        elseif ($sucess == 2) :
            return redirect('/admin/permission')->with('sweet-unsuccess', 'UnSuccessfully updated!');
        else :
            return redirect('/admin/edit-permission/'.$id)->with('sweet-error', 'Error!');
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
        $this->restriction('user-permission-delete');
        $permission = Permission::find($id);
        try{
            if ($permission->delete()) :
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
