<?php

namespace App\Http\Controllers\Admin\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Company;
use App\Http\Requests\Admin\Setup\CompanyFormRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('setup-company-view');
        $data = [];

        $data['page_scripts'] = array('admin/custom/js/setup/company.js');
        $data['bc_title'] = "List";
        $data['records'] = Company::all();
        return view('admin.setup.company.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('setup-company-create');
        $data = [];
        $data['bc_title'] = "Add";
        $data['company_type'] = ['1' => 'Customer', '2' => 'Supplier', '3' => 'Product'];

        return view('admin.setup.company.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyFormRequest $request)
    {
       // echo '<pre>';print_r($_POST);exit;
        $this->restriction('setup-company-create');
        $user = request()->user();
        $company = new Company();
        $company->name = $request->name;
        $company->mobile = $request->mobile;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->type = $request->type;
        $company->address = $request->address;
        $company->created_by = $user->id;
        try{
            if ($company->save()) :
                $sucess = 1;
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
        }

        if ($sucess == 1) :
            return redirect('/admin/company')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/company')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/add-company')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-company-view');
        $data = [];
        $data['record'] = Company::find($id);
        return view('admin.setup.company.view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->restriction('setup-company-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['company_type'] = ['1' => 'Customer', '2' => 'Supplier', '3' => 'Product'];
        $data['record'] = Company::find($id);
       // echo '<pre>';print_r($data['record']);exit;

        return view('admin.setup.company.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyFormRequest $request, $id)
    {
        //echo '<pre>';print_r($_POST);exit;
        $this->restriction('setup-company-edit');
        $user = request()->user();
        $company = Company::find($id);
        $company->name = $request->name;
        $company->mobile = $request->mobile;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->type = $request->type;
        $company->address = $request->address;
        $company->updated_by = $user->id;
        try{
            if ($company->save()) :
                $sucess = 1;
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
        }

        if ($sucess == 1) :
            return redirect('/admin/company')->with('sweet-success', 'Successfully updated!');
        elseif ($sucess == 2) :
            return redirect('/admin/company')->with('sweet-unsuccess', 'UnSuccessfully updated!');
        else :
        return redirect('/admin/edit-company/'.$id)->with('sweet-error', 'Error!');
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
        $this->restriction('setup-company-delete');
        $company = Company::find($id);
        try{
            if ($company->delete()) :
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
        $this->restriction('setup-company-status');
        $company = Company::find($id);
        $company->status = 2;

        try{
            if ($company->save()) :
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
        $this->restriction('setup-company-status');
        $company = Company::find($id);
        $company->status = 1;

        try{
            if ($company->save()) :
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
