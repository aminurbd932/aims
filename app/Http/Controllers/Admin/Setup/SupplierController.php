<?php

namespace App\Http\Controllers\Admin\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Supplier;
use App\Models\Setup\Company;
use App\Http\Requests\Admin\Setup\SupplierFormRequest;
use Illuminate\Support\Facades\DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('setup-supplier-view');
        $data = [];

        $data['page_scripts'] = array('admin/custom/js/setup/supplier.js');
        $data['bc_title'] = "List";
        $data['records'] = Supplier::get();

        return view('admin.setup.supplier.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('setup-supplier-create');
        $data = [];
        $data['bc_title'] = "Add";
        $data['company_name'] = Company::all()
                                ->where('type', 2);

        return view('admin.setup.supplier.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierFormRequest $request)
    {
        $this->restriction('setup-supplier-create');
        $user = request()->user();
        $supplier = new Supplier();
        $supplier->name = $request->name;
       // $supplier->company_id = $request->company_id;
        $supplier->mobile = $request->mobile;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->balance = $request->balance;
        $supplier->address = $request->address;
        $supplier->created_by = $user->id;

        DB::beginTransaction();
        try{
            if ($supplier->save()) :
                if ($request->company_id) :
                    $supplier->companies()->attach($request->company_id);
                endif;
                $sucess = 1;
                DB::commit();
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
            DB::rollback();
            //print_r($ex);
        }
       // exit;

        if ($sucess == 1) :
            return redirect('/admin/supplier')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/supplier')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/add-supplier')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-supplier-view');
        $data = [];
        $data['record'] = Supplier::where('id', $id)->first();
        //echo '<pre>';print_r($data);exit;

        return view('admin.setup.supplier.view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->restriction('setup-supplier-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['customer_type'] = ['1' => 'Normal', '2' => 'Special'];
        $data['company_name'] = Company::all()
                                ->where('type', 2);
        $data['record'] = Supplier::find($id);
       // echo '<pre>';print_r($data['record']);exit;

        return view('admin.setup.supplier.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SupplierFormRequest $request, $id)
    {
         $this->restriction('setup-supplier-edit');
        $user = request()->user();
        $supplier = Supplier::find($id);
        $supplier->name = $request->name;
        $supplier->mobile = $request->mobile;
        $supplier->phone = $request->phone;
        $supplier->email = $request->email;
        $supplier->balance = $request->balance;
        $supplier->address = $request->address;
        $supplier->updated_by = $user->id;

        DB::beginTransaction();
        try{
            if ($supplier->save()) :
                if ($request->company_id) :
                    $supplier->companies()->sync($request->company_id);
                endif;
                $sucess = 1;
                DB::commit();
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
            DB::rollback();
            //print_r($ex);
        }
       // exit;

        if ($sucess == 1) :
            return redirect('/admin/supplier')->with('sweet-success', 'Successfully updated!');
        elseif ($sucess == 2) :
            return redirect('/admin/supplier')->with('sweet-unsuccess', 'UnSuccessfully updated!');
        else :
            return redirect('/admin/add-supplier')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-supplier-delete');
        $supplier = Supplier::find($id);
        try{
            if ($supplier->delete()) :
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
        $this->restriction('setup-supplier-status');
        $supplier = Supplier::find($id);
        $supplier->status = 2;

        try{
            if ($supplier->save()) :
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
        $this->restriction('setup-supplier-status');
        $supplier = Supplier::find($id);
        $supplier->status = 1;

        try{
            if ($supplier->save()) :
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
