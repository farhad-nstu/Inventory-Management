<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class PosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $product= DB::table('products')
            ->join('categories', 'products.category_id','categories.id')
            ->select('categories.cat_name','products.*')    
            ->get();
        $customer= DB::table('customers')->get();
        $category= DB::table('categories')->get();
        return view('pos', compact('product', 'customer', 'category'));
    }


    public function PendingOrders(){
        $pendingOrders = DB::table('orders')
                         ->where('order_status','pending')
                         ->join('customers','orders.customer_id','customers.id')
                         ->select('orders.*','customers.name')
                         ->get();
        return view('pending_orders')->with('pendingOrders',$pendingOrders);      
    }


    public function ViewOrder($id){

    
        $order = DB::table('orders')
                 ->where('orders.id',$id)
                 ->join('customers','orders.customer_id','customers.id')
                 ->select('customers.*', 'orders.*', 'orders.id as order_id')
                 ->select('orders.*','customers.name','customers.address','customers.city','customers.shopname','customers.phone')
                 ->first();

                 /*echo"<pre>";
                 print_r($order);
                 exit();*/
                
       $order_details = DB::table('orderdetails')
                        ->join('products','orderdetails.product_id','products.id')
                        ->select('orderdetails.*','products.product_name','products.product_code')
                        ->where('order_id',$id)
                        ->get();
       return view('order_confirmation')->with('order', $order)->with('order_details', $order_details); 

    }


    public function PosDone($id){
        $approve = DB::table('orders')->where('orders.id', $id)->update(['order_status'=>'success']);

        if($approve) {
            $notification=array(
            'messege'=>'Successfully order approved and all product is confirmed',
            'alert-type' =>'success'
             );
            
           return Redirect()->route('pending.orders')->with($notification);                      
        }else{
         $notification=array(
            'messege'=>'error ',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        } 
    }


    public function SucceedOrders()
    {
        $succeedOrders = DB::table('orders')
                         ->where('order_status','success')
                         ->join('customers','orders.customer_id','customers.id')
                         ->select('orders.*','customers.name')
                         ->get();
        return view('succeed_orders')->with('succeedOrders',$succeedOrders);
    }
}




















