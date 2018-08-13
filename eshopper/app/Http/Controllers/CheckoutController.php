<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Cart;
use Redirect;
session_start();

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login_check()
    {
        $content=view('checkout.login');
       return view ('layout')->with('content',$content); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customer_registration(Request $request)
    {
         $data= array();
    $data['customer_name']= $request->customer_name;
    $data['customer_phone']= $request->customer_phone;
    $data['customer_email']= $request->customer_email;
    $data['customer_password']= $request->customer_password;
        
     DB::table('customer')->insertGetId($data);
     Session::put('customer_id',$customer_id);
     Session::put('customer_name',$request->customer_name);
    // Session::put('message','Category added Successfuly');
     return Redirect::to('/checkout');
    }


   

    
    public function checkout(Request $request)
    {
        $content=view('checkout.checkout');
       return view ('layout')->with('content',$content); 
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function customer_login(Request $request)
    {
        $customer_email= $request->customer_email;
        $customer_password= md5($request->customer_password);
        $result=DB::table('customer')
                    ->where('customer_email',$customer_email)
                    ->where('customer_password', $customer_password)
                    ->first();

                    if($result){
                     // Session::put('customer_name',$result->customer_name);
                       Session::put('customer_id',$result->customer_id);
                      return Redirect::to('/checkout');
                    }
                    else{

                         Session::put('message','Email or Password Invalid');
                         return Redirect::to('/login-check');
                    }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function shipping_detail(Request $request)
    {
         $data= array();
    $data['shipping_first_name']= $request->shipping_first_name;
    $data['shipping_last_name']= $request->shipping_last_name;
    $data['shipping_email']= $request->shipping_email;
    $data['shipping_email']= $request->shipping_email;
    $data['shipping_address']= $request->shipping_address;
    $data['shipping_phone_number']= $request->shipping_phone_number;
    $data['shipping_city']= $request->shipping_city;
        
     $shipping_id=DB::table('shipping')->insertGetId($data);
     
     Session::put('shipping_id',$shipping_id);
    // Session::put('customer_name',$request->customer_name);
    // Session::put('message','Category added Successfuly');
     return Redirect::to('/payment');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function customer_logout()
    {
        Session::flush();
        Session::put('message','You are Successfully Logout');
       return Redirect::to('/');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function payment()
    {
        return view('checkout.payment');
    }

public function order_place(Request $request)
    {

        $payment_gateway=$request->payment_method;
         $pdata= array();
    $pdata['payment_method']= $payment_gateway;
    $pdata['payment_status']= 'pending';
    
     $payment_id=DB::table('payment')->insertGetId($pdata);


    $odata= array();
    $odata['customer_id']= Session::get('customer_id');
    $odata['shipping_id']= Session::get('shipping_id');
    $odata['payment_id']= $payment_id;
    $odata['order_status']= 'pending';
    $odata['order_total']= Cart::total();

    $order_id=DB::table('tbl_order')->insertGetId($odata);

    $contents=Cart::content();
   
    
    $oddata= array();

    foreach ($contents as $content) {

         $oddata['order_id']= $order_id;
         $oddata['product_id']= $content->id;
         $oddata['product_name']= $content->name;
         $oddata['product_price']= $content->price;
         $oddata['product_sales_quantity']= $content->qty;

         DB::table('order_details')->insert($oddata);
         
       
    }



if($payment_gateway=='handcash'){

  $content=view('checkout.handcash');
       return view ('layout')->with('content',$content); 
}
elseif($payment_gateway=='cart'){

    echo "Successfuly done by cart";
}
elseif($payment_gateway=='bkash'){

    echo "Successfuly done by bkash";
}
else{
echo "not selected";
}


     
    }


 


}
