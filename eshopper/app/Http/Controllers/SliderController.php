<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;
session_start();

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
          $content=view('slider.add_slider');
       return view ('admin.admin_master')->with('content',$content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all_slider()
    {
        $all_slider= DB::table('slider')->get();

        $content=view('slider.all_slider')->with('all_slider',$all_slider);
       return view ('admin.admin_master')->with('content',$content);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function save_slider(Request $request)
    {
        
$file= $request->file('slider_image');
    $filename=$file->getClientOriginalName();
   // $filename=$files->getClientOriginalName();
    $picture= date('His').$filename;
    $image_url='public/slider_image/'.$picture;
    $destinationPath= base_path().'/public/slider_image/';
    $success= $file->move($destinationPath,$picture);

if($success){

$data['slider_image']=$image_url;

DB::table('slider')->insert($data);
     Session::put('message','Slider added Successfuly');
     return Redirect::to('/add-slider');
}


        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function unpublish_slider($slider_id)
    {
        //echo $product_id;

        DB::table('slider')
             ->where('slider_id', $slider_id)
            ->update(['publication_status' => 0]);
            Session::put('unpublish','Slider Unpublish Successfuly');
             return Redirect::to('/all-slider');

    }
public function publish_slider($slider_id)
    {
        //echo $product_id;

        DB::table('slider')
             ->where('slider_id', $slider_id)
            ->update(['publication_status' => 1]);
            Session::put('publish','Slider Unpublish Successfuly');
             return Redirect::to('/all-slider');

    }

    public function delete_slider($slider_id)
    {
         DB::table('slider')
            ->where('slider_id', $slider_id)
            ->delete();
             Session::put('message','Slider Delete Succesfully');
                return Redirect::to('/all-slider');

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
