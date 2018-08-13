<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;
use Illuminate\Http\UploadedFile;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function manage_order(){

$all_order_info= DB::table('tbl_order')
                    ->join('customer','tbl_order.customer_id','=','customer.customer_id')
                    ->select('tbl_order.*','customer.customer_name')
                    ->get();


        $content= view('checkout.all_order')->with('all_order_info',$all_order_info);

        return view ('admin.admin_master')->with('content',$content);

}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function unpublish_order($order_id)
    {

         DB::table('tbl_order')
            ->where('order_id', $order_id)
            ->update(['order_status' => 'pending']);
            Session::put('unpublish','Order Pending');
            return Redirect::to('/manage-order');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function publish_order($order_id)
    {

         DB::table('tbl_order')
            ->where('order_id', $order_id)
            ->update(['order_status' => '']);
            Session::put('publish','Payment Successful !');
            return Redirect::to('/manage-order');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function view_order($order_id)
    {

         $order_by_id= DB::table('tbl_order')
                    ->join('customer','tbl_order.customer_id','=','customer.customer_id')
                    ->join('order_details','tbl_order.order_id','=','order_details.order_id')
                    ->join('shipping','tbl_order.shipping_id','=','shipping.shipping_id')
                    ->select('tbl_order.*','customer.*','shipping.*','order_details.*')
                    ->get();


         $content= view('checkout.view_order')->with('order_by_id',$order_by_id);

        return view ('admin.admin_master')->with('content',$content);
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
