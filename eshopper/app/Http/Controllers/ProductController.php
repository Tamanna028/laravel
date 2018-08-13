<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;
use Illuminate\Http\UploadedFile;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_product()
    {
       
        $content=view('product.add_product');
       return view ('admin.admin_master')->with('content',$content);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all_product()
    {
        $all_product= DB::table('products')
                    ->join('category','products.category_id','=','category.category_id')
                    ->join('manufacture','products.manufacture_id','=','manufacture.manufacture_id')
                    ->select('products.*','category.category_name','manufacture.manufacture_name')
                    ->get();


        $content= view('product.all_product')->with('all_product',$all_product);

        return view ('admin.admin_master')->with('content',$content);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function save_product(Request $request)
    {
        $data= array();
    $data['product_name']= $request->product_name;
    $data['category_id']= $request->category_id;
    $data['manufacture_id']= $request->manufacture_id;
    $data['product_short_description']= $request->product_short_description;
    $data['product_long_description']= $request->product_long_description;
    $data['product_price']= $request->product_price;
    $data['product_size']= $request->product_size;
    $data['product_color']= $request->product_color;
    $data['publication_status']= $request->publication_status;
echo '<pre>';
print_r($data);
echo '</pre>';

/*$image = $request->file('products_image');
if($image){

$image_name= str_random(20);
//$ext= strtolower($image->getClientOrginalExtension());
//$image_full_name=$image_name.'.'.$ext;
$upload_path='public/image/';
$image_url= $upload_path.$image_name;
$success=$image->move($upload_path);*/

 $file= $request->file('products_image');
    $filename=$file->getClientOriginalName();
   // $filename=$files->getClientOriginalName();
    $picture= date('His').$filename;
    $image_url='public/image/'.$picture;
    $destinationPath= base_path().'/public/image/';
    $success= $file->move($destinationPath,$picture);

if($success){

$data['products_image']=$image_url;

DB::table('products')->insert($data);
     Session::put('message','Product added Successfuly');
     return Redirect::to('/add-product');
}




$data['products_image']='';
     DB::table('products')->insert($data);
     Session::put('message','Product added Successfuly without image');
     return Redirect::to('/add-product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function unpublish_product($product_id)
    {
        //echo $product_id;

        DB::table('products')
             ->where('product_id', $product_id)
            ->update(['publication_status' => 0]);
            Session::put('unpublish','Product Unpublish Successfuly');
             return Redirect::to('/all-product');

    }
public function publish_product($product_id)
    {

         DB::table('products')
            ->where('product_id', $product_id)
            ->update(['publication_status' => 1]);
            Session::put('unpublish','Product Publish Successfuly');
            return Redirect::to('/all-product');

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function delete_product($product_id)
    {
         DB::table('products')
            ->where('product_id', $product_id)
            ->delete();
             Session::put('message','Product Delete Succesfully');
                return Redirect::to('/all-category');

    }


    public function edit_product($product_id)
    {
        


    $product_info = DB::table('products')
            ->where('product_id', $product_id)
            ->first();
  
  $edit_product=view('product.edit_product')->with('product_info',$product_info);
        // $home_content='Taanna';
   return view('admin.admin_master')
        ->with('content',$edit_product);

       
}


public function update_product(Request $request,$product_id)
    {


   $data= array();
    $data['product_name']= $request->product_name;
    $data['category_id']= $request->category_id;
    $data['manufacture_id']= $request->manufacture_id;
    $data['product_short_description']= $request->product_short_description;
    $data['product_long_description']= $request->product_long_description;
    $data['product_price']= $request->product_price;
    $data['product_size']= $request->product_size;
    $data['product_color']= $request->product_color;
$product_id = $request->product_id;

//$print_r($data);
if($_FILES['products_image']['name']==''){

  $data['products_image']= $request->products_image;
    DB::table('products')->where('product_id',$product_id)->update($data);
     Session::put('message','Product Update Succesfully');
     
     return Redirect::to('/all-product');



 



}
else{
    $file= $request->file('products_image');
    $filename=$file->getClientOriginalName();
   // $filename=$files->getClientOriginalName();
    $picture= date('His').$filename;
    $image_url='public/image/'.$picture;
    $destinationPath= base_path().'/public/image/';
    $success= $file->move($destinationPath,$picture);
     
if($success){

$data['products_image']= $image_url;

     $image=DB::table('products')->where('product_id',$product_id)->update($data);
     Session::put('message','Update Succesfully with image Upload');
     if(file_exists('public/image/'.$image->products_image))
{
     unlink('public/image/'.$image->products_image);
}

 

     return Redirect::to('/all-product');

    }
    
    }


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
