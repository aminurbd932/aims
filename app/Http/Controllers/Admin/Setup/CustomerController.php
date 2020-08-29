<?php

namespace App\Http\Controllers\Admin\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Customer;
use App\Models\Setup\Company;
use App\Http\Requests\Admin\Setup\CustomerFormRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->restriction('setup-customer-view');
        $data = [];

        $data['page_scripts'] = array('admin/custom/js/setup/customer.js');
        $data['bc_title'] = "List";
       // $data['records'] = Customer::with('companies')->where('is_deleted',0)->get();
        $data['records'] = Customer::get();

        return view('admin.setup.customer.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->restriction('setup-customer-create');
        $data = [];
        $data['bc_title'] = "Add";
        $data['customer_type'] = ['1' => 'Normal', '2' => 'Special'];
        $data['company_name'] = Company::all()
                                ->where('type', 1)
                                ->where('is_deleted',0);

        return view('admin.setup.customer.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerFormRequest $request)
    {
       // echo '<pre>';print_r($_POST);exit;
        $this->restriction('setup-customer-create');
        $user = request()->user();
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->company_id = $request->company_id;
        $customer->mobile = $request->mobile;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->type = $request->type;
        $customer->address = $request->address;
        $customer->created_by = $user->id;
        try{
            if ($customer->save()) :
                $sucess = 1;
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
        }

        if ($sucess == 1) :
            return redirect('/admin/customer')->with('sweet-success', 'Successfully saved!');
        elseif ($sucess == 2) :
            return redirect('/admin/customer')->with('sweet-unsuccess', 'UnSuccessfully saved!');
        else :
            return redirect('/admin/add-customer')->with('sweet-error', 'Error!');
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
        $this->restriction('setup-customer-view');
        $data = [];
        $data['record'] = Customer::where('id', $id)->first();
        //echo '<pre>';print_r($data);exit;

        return view('admin.setup.customer.view')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->restriction('setup-customer-edit');
        $data = [];
        $data['bc_title'] = "Edit";
        $data['customer_type'] = ['1' => 'Normal', '2' => 'Special'];
        $data['company_name'] = Company::all()
                                ->where('type', 1);
        $data['record'] = Customer::find($id);
       // echo '<pre>';print_r($data['record']);exit;

        return view('admin.setup.customer.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerFormRequest $request, $id)
    {
        $this->restriction('setup-customer-edit');
        $user = request()->user();
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->company_id = $request->company_id;
        $customer->mobile = $request->mobile;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->type = $request->type;
        $customer->address = $request->address;
        $customer->updated_by = $user->id;
        try{
            if ($customer->save()) :
                $sucess = 1;
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
        }

        if ($sucess == 1) :
            return redirect('/admin/customer')->with('sweet-success', 'Successfully updated!');
        elseif ($sucess == 2) :
            return redirect('/admin/customer')->with('sweet-unsuccess', 'UnSuccessfully updated!');
        else :
        return redirect('/admin/edit-customer/'.$id)->with('sweet-error', 'Error!');
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
        $this->restriction('setup-customer-delete');
        $customer = Customer::find($id);
        try{
            if ($customer->delete()) :
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
        $this->restriction('setup-customer-status');
        $customer = Customer::find($id);
        $customer->status = 2;

        try{
            if ($customer->save()) :
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
        $this->restriction('setup-customer-status');
        $customer = Customer::find($id);
        $customer->status = 1;

        try{
            if ($customer->save()) :
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
