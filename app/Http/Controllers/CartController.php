<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use DB;

class CartController extends Controller
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


    public function index(Request $request){
        $data = array();
    	$data['id'] = $request->id;
    	$data['name'] = $request->name;
    	$data['quantity'] = $request->quantity;
        $data['price'] = $request->price;
        //$data['total']=($request->quantity*$request->price);
        $add = Cart::add($data);

        if ($add) {
            $notification=array(
            'messege'=>'Product added to the cart',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);                      
        }else{
         $notification=array(
            'messege'=>'error ',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        }
    }

    public function UpdateCart(Request $request,$rowId){
        $data=array();
        $data['quantity']=$request->quantity;

        
        
        $update=Cart::update($rowId, $data);
        

        if ($update) {
            $notification=array(
            'messege'=>'update successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);                      
        }else{
         $notification=array(
            'messege'=>'error ',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        }


          
    }

    public function RemoveCart($rowId){
        $remove= Cart::remove($rowId);

        if ($remove) {
            $notification=array(
            'messege'=>'Remove successfully',
            'alert-type'=>'success'
             );
           return Redirect()->back()->with($notification);                      
        }else{
         $notification=array(
            'messege'=>'error ',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        } 
    } 


    public function CreateInvoice(Request $request){
        $validatedData = $request->validate([
	        'id' => 'required',
        ],
        [ 'id.required'=> 'Select a customer first! ',
        ]);

        $contents = Cart::getContent();
    	
    	$cus_id = $request->id;
    	
    	$singleCustomer = DB::table('customers')->where('id',$cus_id)->first();
    	return view('invoice',compact('singleCustomer','contents'));
          
    	
        
    }


    public function FinalInvoice(Request $request){
        

        $data = array();
        $data['customer_id'] = $request->customer_id;
        $data['order_date'] = $request->order_date;
        $data['order_status'] = $request->order_status;
        $data['total_products'] = $request->total_products;
        $data['subtotal'] = $request->subtotal;
        $data['vat'] = $request->vat;
        $data['total'] = $request->total;
        $data['payment_status'] = $request->payment_status;
        $data['pay'] = $request->pay;
        $data['due'] = $request->due;
        
        $order_id = DB::table('orders')->insertGetId($data);
        $contents = Cart::getContent();
        

        $oddata = array();
        foreach ($contents as $item) {
            $oddata['order_id'] = $order_id;
            $oddata['product_id'] = $item->id;
            $oddata['quantity'] = $item->quantity;
            $oddata['unitcost'] = $item->price;
            $oddata['total'] = $item->quantity* $item->price;
           /* echo"<pre>";
            print_r($data);
            exit(); */

           $insert = DB::table('orderdetails')->insert($oddata);

   
            
            
        }
        if($insert) {
            $notification=array(
            'messege'=>'Successfully invoice Created | Please Deliver The Products and accept status',
            'alert-type'=>'success'
             );
            Cart::clear();
           return Redirect()->route('pending.orders')->with($notification);                      
        }else{
         $notification=array(
            'messege'=>'error ',
            'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
        } 

        
    }
}
