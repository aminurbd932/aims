<?php

namespace App\Http\Controllers\Admin\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Category;
use App\Http\Requests\Admin\Setup\CategoryFormRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('setup-category-view');
        $data = [];

        $data['page_scripts'] = array('admin/custom/js/setup/category.js');
        $data['bc_title'] = "List";
        $data['records'] = Category::all();
        return view('admin.setup.category.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('setup-category-create');
        $data = [];
        $data['bc_title'] = "Add";

        return view('admin.setup.category.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryFormRequest $request)
    {
        $this->restriction('setup-category-create');
        $user = request()->user();
        $category = new Category();
        $category->name = $request->name;
        $category->created_by = $user->id;
        try{
            if ($category->save()) :
                $sucess = 1;
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
        }

        if ($sucess == 1) :
            return redirect('/admin/category')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/category')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/add-category')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-category-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['record'] = Category::find($id);

        return view('admin.setup.category.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryFormRequest $request, $id)
    {
        $this->restriction('setup-category-edit');
        $user = request()->user();
        $category = Category::find($id);
        $category->name = $request->name;
        $category->updated_by = $user->id;

        try{
            if ($category->save()) :
               return redirect('/admin/category')->with('sweet-success', 'Successfully saved!');
            else :
                return redirect('/admin/category')->with('sweet-unsuccess', 'UnSuccessfully saved!');
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){

           return redirect('/admin/edit-category/'.$id)->with('sweet-error', 'Error!');
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
        $this->restriction('setup-category-delete');
        $category = Category::find($id);
        try{
            if ($category->delete()) :
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
        $this->restriction('setup-category-status');
        $user = Category::find($id);
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
        $this->restriction('setup-category-status');
        $user = Category::find($id);
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
