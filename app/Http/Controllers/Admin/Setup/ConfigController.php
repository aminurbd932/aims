<?php

namespace App\Http\Controllers\Admin\Setup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Setup\Config;
use App\Http\Requests\Admin\Setup\ConfigFormRequest;
use Illuminate\Support\Facades\Storage;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $this->restriction('setup-config-view');
        $data = [];

       // $data['page_scripts'] = array('admin/custom/js/setup/company.js');
        $data['bc_title'] = "List";
        $data['record'] = Config::all();
        return view('admin.setup.config.edit')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ConfigFormRequest $request)
    {

       $this->restriction('setup-config-edit');
         
         //$imageName = $logo->getClientOriginalName();
         //dd($imageName);exit;
        
       
        
      // dd($photoUrl);exit;
        $user = request()->user();
        $config = Config::find($request->id);
        //print_r($config->logo);exit;
         if ($request->logo) :
            $logoName = time().'.'.$request->logo->getClientOriginalExtension();
            $logoDir = 'public/'.$logoName;
            if ($config->logo) :
                Storage::move($config->logo, $logoDir);
            else :
                Storage::put($logoDir, 'logo');
            endif;
             $config->logo = $logoDir;
        endif;
        $config->name = $request->name;
        $config->mobile = $request->mobile;
        $config->phone = $request->phone;
        $config->email = $request->email;
        $config->address = $request->address;
        $config->updated_by = $user->id;
        try{
            if ($config->save()) :
                
                $sucess = 1;
            else :
                $sucess = 2;
            endif;
        }Catch(\Illuminate\Database\QueryException $ex){
            $sucess = 3;
        }

        if ($sucess == 1) :
            return redirect('/admin/config')->with('sweet-success', 'Successfully updated!');
        elseif ($sucess == 2) :
            return redirect('/admin/config')->with('sweet-unsuccess', 'UnSuccessfully updated!');
        else :
        return redirect('/admin/config')->with('sweet-error', 'Error!');
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
}
