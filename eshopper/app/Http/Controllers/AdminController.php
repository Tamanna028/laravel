<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
       return view ('admin.admin_login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function admin_dashboard(Request $request)
    {
        $admin_email= $request->admin_email;
        $admin_password= md5($request->admin_password);
        $result=DB::table('admin')
                    ->where('admin_email',$admin_email)
                    ->where('admin_passwod', $admin_password)
                    ->first();

                    if($result){
                     Session::put('admin_name',$result->admin_name);
                      Session::put('admin_id',$result->admin_id);
                      return Redirect::to('/show-dashboard')->send();
                    }
                    else{

                         Session::put('message','Email or Password Invalid');
                         return Redirect::to('/admin');
                    }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

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
    public function update(Request $request, $id)
    {
        //
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
