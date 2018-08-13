<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Redirect;
//use Request;
use Illuminate\Http\UploadedFile;
use Session;
use file;

class EcommerceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $featured_products = DB::table('products')
                    ->join('category','products.category_id','=','category.category_id')
                    ->join('manufacture','products.manufacture_id','=','manufacture.manufacture_id')
                    ->select('products.*','category.category_name','manufacture.manufacture_name')
                     ->orderBy('manufacture.manufacture_id', 'ASC')
                    ->get();
                    

        $content=view('home_content')->with('featured_products',$featured_products);
       return view ('layout')->with('content',$content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category_by_product($category_id)
    {   
        //echo $category_id;

                     $category_by_product = DB::table('products')
                    ->join('category','products.category_id','=','category.category_id')
                     ->select('products.*','category.category_name')
                    ->where('category.category_id',$category_id)
                    ->limit(9)
                  ->get();

        $content=view('admin.category_by_product')->with('category_by_product',$category_by_product);
       return view ('layout')->with('content',$content);
       
    }



 public function manufacture_by_product($manufacture_id)
    {   
        //echo $category_id;

                     $manufacture_by_product = DB::table('products')
                    ->join('manufacture','products.manufacture_id','=','manufacture.manufacture_id')
                     ->select('products.*','manufacture.manufacture_name')
                    ->where('manufacture.manufacture_id',$manufacture_id)
                    ->limit(9)
                  ->get();

        $content=view('admin.manufacture_by_product')->with('manufacture_by_product',$manufacture_by_product);
       return view ('layout')->with('content',$content);
       
    }

public function product_detail($product_id)
    {   
        //echo $category_id;

                     $product_detail = DB::table('products')
                    ->join('manufacture','products.manufacture_id','=','manufacture.manufacture_id')
                    ->join('category','products.category_id','=','category.category_id')
                   ->select('products.*','category.category_name','manufacture.manufacture_name')
                    ->where('products.product_id',$product_id)
                    ->where('products.publication_status',1)
                  ->first();

        $content=view('product.product_detail')->with('product_detail',$product_detail);
       return view ('layout')->with('content',$content);
       
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
