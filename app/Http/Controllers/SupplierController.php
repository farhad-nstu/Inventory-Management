<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
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


    // Add supplier
    public function index(){
        return view('add_supplier');
    }

    // store 
    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required||max:255',
            'phone' => 'required||max:255',
            'address' => 'required|max:55',
            'photo' => 'required',
            'city' => 'required',
            'type' => 'required',

            
            
        ]);


        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['shop']=$request->shop;
        $data['type']=$request->shop;
        $data['accountholder']=$request->accountholder;
        $data['accountnumber']=$request->accountnumber;
        $data['bankname']=$request->bankname;
        $data['branchname']=$request->branchname;
        $data['city']=$request->city;

        $image = $request->file('photo');

        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $supplier=DB::table('suppliers')
                         ->insert($data);
              if ($supplier) {
                 $notification=array(
                 'messege'=>'Successfully supplier Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.supplier')->with($notification);                      
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


    //all supplier
    public function allSupplier(){
        $suppliers = DB::table('suppliers')->get(); 
        return view('all_supplier')->with('suppliers',$suppliers);
    }


    //View Supplier
    public function viewSupplier($id){
        $single=DB::table('suppliers')
                  ->where('id',$id)
                  ->first();
        return view('view_supplier', compact('single'));
    }


    //delete a single supplier
    public function deleteSupplier($id){
        $delete=DB::table('suppliers')
                  ->where('id',$id)
                  ->first();
        $photo=$delete->photo;
        unlink($photo);
        $dltuser=DB::table('suppliers')
                ->where('id', $id)
                ->delete();
        
                
                if ($dltuser) {
                    $notification=array(
                    'messege'=>'Successfully Deleted Supplier',
                    'alert-type'=>'success'
                     );
                   return Redirect()->route('all.supplier')->with($notification);                      
                }else{
                 $notification=array(
                    'messege'=>'error ',
                    'alert-type'=>'success'
                     );
                    return Redirect()->back()->with($notification);
                } 
    }


    // edit is here 
    public function editSupplier($id){
        $edit=DB::table('suppliers')
                  ->where('id',$id)
                  ->first();
        return view('edit_supplier', compact('edit'));
    }


    //Update supplier is here
    public function updateSupplier(Request $request,$id){
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required||max:255',
            'address' => 'required||max:255',
            'phone' => 'required|max:13',
            'type' => 'required|max:255',
            
            
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['shop']=$request->shop;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['type']=$request->type;
        $data['accountholder']=$request->accountholder;
        $data['accountnumber']=$request->accountnumber;
        $data['bankname']=$request->bankname;
        $data['branchname']=$request->branchname;
        $data['city']=$request->city;



        //image is here
        $image = $request->file('photo');

        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $delete = DB::table('suppliers')
                          ->where('id',$id)
                          ->first();
                $photo = $delete->photo;
                unlink($photo);
                $supplier=DB::table('suppliers')
                        ->where('id',$id)
                         ->update($data);
              if ($supplier) {
                 $notification=array(
                 'messege'=>'Successfully Updated Supplier ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.supplier')->with($notification);                      
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
