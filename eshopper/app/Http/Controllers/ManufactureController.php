<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Redirect;
use Session;
use DB;


class ManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function add_manufacture()
    {
        $content=view('manufacture.add_manufacture');
       return view ('admin.admin_master')->with('content',$content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function all_manufacture()
    {
        $all_manufacture= DB::table('manufacture')->orderBy('manufacture_id','desc')->get();

        $content=view('manufacture.all_manufacture')->with('all_manufacture',$all_manufacture);
       return view ('admin.admin_master')->with('content',$content);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_manufacture(Request $request)
    {
        $data= array();
    $data['manufacture_name']= $request->manufacture_name;
    $data['manufacture_description']= $request->manufacture_description;
    $data['publication_status']= $request->publication_status;
        
     DB::table('manufacture')->insert($data);
     Session::put('message','Manufacture added Successfuly');
     return Redirect::to('/add-manufacture');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function unpublish_manufacture($manufacture_id)
    {

         DB::table('manufacture')
            ->where('manufacture_id', $manufacture_id)
            ->update(['publication_status' => 0]);
            Session::put('unpublish','Manufacture Unpublish Successfuly');
            return Redirect::to('/all-manufacture');

    }
 public function publish_manufacture($manufacture_id)
    {

         DB::table('manufacture')
            ->where('manufacture_id', $manufacture_id)
            ->update(['publication_status' => 1]);
            Session::put('unpublish','Manufacture Publish Successfuly');
            return Redirect::to('/all-manufacture');

    }
 public function edit_manufacture($manufacture_id)
    {
        
 

    $manufacture_info = DB::table('manufacture')
            ->where('manufacture_id', $manufacture_id)
            ->first();
  
  $edit_manufacture=view('manufacture.edit_manufacture')->with('manufacture_info',$manufacture_info);
        // $home_content='Taanna';
   return view('admin.admin_master')
        ->with('content',$edit_manufacture);

       
}

public function update_manufacture(Request $request,$manufacture_id)
    {


      $data= array();
     $data['manufacture_name']= $request->manufacture_name;
    $data['manufacture_description']= $request->manufacture_description;
 $manufacture_id = $request->manufacture_id;
      DB::table('manufacture')
             ->where('manufacture_id', $manufacture_id)
             ->update($data);
  Session::put('message','Manufacture Update Succesfully');
     
return Redirect::to('/all-manufacture');

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
