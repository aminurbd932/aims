<?php

namespace App\Http\Controllers\Admin\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\GenericProduct;
use App\Http\Requests\Admin\Setup\GenericProductFormRequest as CustomRequest;

class GenericProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $this->restriction('setup-generic-view');
        $data = [];

        $data['page_scripts'] = array('admin/custom/js/setup/generic_product.js');
        $data['bc_title'] = "List";
        $data['records'] = GenericProduct::all();
        return view('admin.setup.generic_product.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('setup-generic-create');
        $data = [];
        $data['bc_title'] = "Add";

        return view('admin.setup.generic_product.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomRequest $request)
    {
        $this->restriction('setup-generic-create');
        $user = request()->user();
        $generic = new GenericProduct();
        $generic->name = $request->name;
        $generic->created_by = $user->id;
        try{
            if ($generic->save()) :
                $sucess = 1;
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
        }

        if ($sucess == 1) :
            return redirect('/admin/generic-product')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/generic-product')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/add-generic-product')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-generic-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['record'] = GenericProduct::find($id);

        return view('admin.setup.generic_product.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomRequest $request, $id)
    {
        $this->restriction('setup-generic-edit');
        $user = request()->user();
        $generic = GenericProduct::find($id);
        $generic->name = $request->name;
        $generic->updated_by = $user->id;

        try{
            if ($generic->save()) :
               return redirect('/admin/generic-product')->with('sweet-success', 'Successfully saved!');
            else :
                return redirect('/admin/generic-product')->with('sweet-unsuccess', 'UnSuccessfully saved!');
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){

           return redirect('/admin/add-generic-product')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-generic-delete');
        $generic = GenericProduct::find($id);
        try{
            if ($generic->delete()) :
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
        $this->restriction('setup-generic-status');
        $user = GenericProduct::find($id);
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
        $this->restriction('setup-generic-status');
        $user = GenericProduct::find($id);
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
