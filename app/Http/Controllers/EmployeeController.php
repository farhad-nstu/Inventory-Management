<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\employee;


class EmployeeController extends Controller
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


    public function index()
    {
        return view('add_employee');
    }
    


    //employee insert here
    public function store(Request $request){
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|unique:employees|max:255',
            'nid_no' => 'required|unique:employees|max:255',
            'phone' => 'required|max:13',
            'address' => 'required',
            'photo' => 'required',
            'salary' => 'required',
            
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['nid_no']=$request->nid_no;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;

        //image is here
        $image = $request->file('photo');

        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $employee=DB::table('employees')
                         ->insert($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Employee Inserted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('home')->with($notification);                      
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

    //employee return here
    public function Employees(){
        $employees = employee::all();
        return view('all_employee', compact('employees'));
    }

    //view employee is here 
    public function viewEmployee($id){
        
        $single=DB::table('employees')
                  ->where('id',$id)
                  ->first();
        return view('view_employee', compact('single'));
    }


    //Delete a single employee is here 
    public function deleteEmployee($id){
        
        $delete=DB::table('employees')
                  ->where('id',$id)
                  ->first();
        $photo=$delete->photo;
        unlink($photo);
        $dltuser=DB::table('employees')
                ->where('id', $id)
                ->delete();
        
                
                if ($dltuser) {
                    $notification=array(
                    'messege'=>'Successfully Employee Deleted ',
                    'alert-type'=>'success'
                     );
                   return Redirect()->route('all.employee')->with($notification);                      
                }else{
                 $notification=array(
                    'messege'=>'error ',
                    'alert-type'=>'success'
                     );
                    return Redirect()->back()->with($notification);
                }         
    }



    //edit employee is here 
    public function editEmployee($id){
        $edit=DB::table('employees')
                  ->where('id',$id)
                  ->first();
        return view('edit_employee', compact('edit'));

    }


    //single employee is updated here
    public function updateEmployee(Request $request,$id){
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required||max:255',
            'nid_no' => 'required||max:255',
            'phone' => 'required|max:13',
            'address' => 'required',
            'salary' => 'required',
            
        ]);

        $data=array();
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['nid_no']=$request->nid_no;
        $data['phone']=$request->phone;
        $data['address']=$request->address;
        $data['experience']=$request->experience;
        $data['salary']=$request->salary;
        $data['vacation']=$request->vacation;
        $data['city']=$request->city;



        //image is here
        $image = $request->file('photo');

        if ($image) {
            $image_name= str_random(5);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $data['photo']=$image_url;
                $delete = DB::table('employees')
                          ->where('id',$id)
                          ->first();
                $photo = $delete->photo;
                unlink($photo);
                $employee=DB::table('employees')
                        ->where('id',$id)
                         ->update($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Employee Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.employee')->with($notification);                      
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
        }  /*else{
            $old_photo=$request->old_photo;
            if ($old_photo) {
                $data['photo']=$old_photo;
                $employee=DB::table('employees')
                        ->where('id',$id)
                        ->update($data);
              if ($employee) {
                 $notification=array(
                 'messege'=>'Successfully Employee Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.employee')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }      
                
            }
        } */




    }


}   


 
