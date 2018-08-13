<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_category()
    {
        $content=view('admin.add_category');
       return view ('admin.admin_master')->with('content',$content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all_category()
    {
        $all_category= DB::table('category')->orderBy('category_id','desc')->get();

        $content=view('admin.all_category')->with('all_category',$all_category);
       return view ('admin.admin_master')->with('content',$content);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_category(Request $request)
    {
        $data= array();
    $data['category_name']= $request->category_name;
    $data['category_description']= $request->category_description;
    $data['publication_status']= $request->publication_status;
        
     DB::table('category')->insert($data);
     Session::put('message','Category added Successfuly');
     return Redirect::to('/add-category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function unpublish_category($category_id)
    {

         DB::table('category')
            ->where('category_id', $category_id)
            ->update(['publication_status' => 0]);
            Session::put('unpublish','Category Unpublish Successfuly');
            return Redirect::to('/all-category');

    }
 public function publish_category($category_id)
    {

            DB::table('category')
            ->where('category_id', $category_id)
            ->update(['publication_status' => 1]);
            Session::put('publish','Category publish Successfuly');
            return Redirect::to('/all-category');

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function edit_category($category_id)
    {
        


    $category_info = DB::table('category')
            ->where('category_id', $category_id)
            ->first();
  
  $edit_category=view('admin.edit_category')->with('category_info',$category_info);
        // $home_content='Taanna';
   return view('admin.admin_master')
        ->with('content',$edit_category);

       
}


public function update_category(Request $request,$category_id)
    {


      $data= array();
     $data['category_name']= $request->category_name;
    $data['category_description']= $request->category_description;
 $category_id = $request->category_id;
      DB::table('category')
             ->where('category_id', $category_id)
             ->update($data);
  Session::put('message','Category Update Succesfully');
     
return Redirect::to('/all-category');

}

public function delete_category($category_id)
    {
         DB::table('category')
            ->where('category_id', $category_id)
            ->delete();
             Session::put('message','Category Delete Succesfully');
                return Redirect::to('/all-category');

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
