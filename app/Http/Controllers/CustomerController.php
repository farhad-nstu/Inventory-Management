<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
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
        return view('add_customer');
    }

    public function Store(Request $request){
        

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:employees|max:255',
            'phone' => 'required|unique:employees|max:255',
            'address' => 'required|max:55',
            'photo' => 'required',
            'city' => 'required',
            
            
        ]);


        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shopname']=$request->shopname;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['city']=$request->city;

        $image = $request->file('photo');

        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/customer/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $customer=DB::table('customers')
                         ->insert($data);
              if ($customer) {
                 $notification=array(
                 'messege'=>'Successfully customer Inserted ',
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
                
            }else{
              return Redirect()->back();
            	
            }
        }else{
            return Redirect()->back(); 
        }
    }



    // ALL Customer
    public function customers(){
        $customers = DB::table('customers')->get(); 
        return view('all_customer')->with('customers',$customers);
    }


    // view customer
    public function viewCustomer($id){
        $single=DB::table('customers')
                  ->where('id',$id)
                  ->first();
        return view('view_customer', compact('single'));
    }

    // Delete Customer
    public function deleteCustomer($id){
        $delete=DB::table('customers')
                  ->where('id',$id)
                  ->first();
        $photo=$delete->photo;
        unlink($photo);
        $dltuser=DB::table('customers')
                ->where('id', $id)
                ->delete();
        
                
                if ($dltuser) {
                    $notification=array(
                    'messege'=>'Successfully Deleted Customer',
                    'alert-type'=>'success'
                     );
                   return Redirect()->route('all.customer')->with($notification);                      
                }else{
                 $notification=array(
                    'messege'=>'error ',
                    'alert-type'=>'success'
                     );
                    return Redirect()->back()->with($notification);
                } 
    }


    // Edit Customer is here
    public function editCustomer($id){
        $edit=DB::table('customers')
                  ->where('id',$id)
                  ->first();
        return view('edit_customer', compact('edit'));
    }


    // Update customer is here 
    public function updateCustomer(Request $request,$id){
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required||max:255',
            'address' => 'required||max:255',
            'phone' => 'required|max:13',
            
            
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['shopname']=$request->shopname;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['account_holder']=$request->account_holder;
        $data['account_number']=$request->account_number;
        $data['bank_name']=$request->bank_name;
        $data['bank_branch']=$request->bank_branch;
        $data['city']=$request->city;



        //image is here
        $image = $request->file('photo');

        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/customer/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $delete = DB::table('customers')
                          ->where('id',$id)
                          ->first();
                $photo = $delete->photo;
                unlink($photo);
                $customer=DB::table('customers')
                        ->where('id',$id)
                         ->update($data);
              if ($customer) {
                 $notification=array(
                 'messege'=>'Successfully Updated Customer ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.customer')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }else{
              return Redirect()->back();
              
            }
        } 
    }

}
