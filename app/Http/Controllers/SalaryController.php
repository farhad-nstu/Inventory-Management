<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SalaryController extends Controller
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


    //ADD salary
    public function AddSalary(){
        return view('advanced_salary');
    }

    //All salary
    public function AllSalary(){
        $salary=DB::table('advance_salaries')
               ->join('employees','advance_salaries.emp_id','employees.id')
               ->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
               ->orderby('id','DESC')
               ->get();
               
        return view('all_advanced_salary',compact('salary'));
    }


    //Insert advanced salary
    public function InsertAdvanced(Request $request){
        
        $month=$request->month;
        $emp_id=$request->emp_id;

        $advanced=DB::table('advance_salaries')
                ->where('month',$month)
                ->where('emp_id',$emp_id)
                ->first();

        if($advanced === NULL){                
            $data=array();
            $data['emp_id']=$request->emp_id;
            $data['month']=$request->month;
            $data['advanced_salary']=$request->advanced_salary;
            $data['year']=$request->year;

            $advanced=DB::table('advance_salaries')->insert($data);
        if ($advanced) {
            $notification=array(
            'messege'=>'Successfully Advance Salary Inserted ',
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
            $notification=array(
                'messege'=>'Oops!! Advance Salary alredy paid in this month! ',
                'alert-type'=>'error'
                 );
                return Redirect()->back()->with($notification);
        }        

         
    }




    

    //Pay salry is here 
    public function PaySalary(){
        /*$month=date("F", strtotime('-1 month'));
        $salary=DB::table('advance_salaries')
               ->join('employees','advance_salaries.emp_id','employees.id')
               ->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
               ->orderby('id','DESC')
               ->where('month',$month)
               ->get();
          
        echo "<pre>";
        print_r($salary);
        exit(); */
        $employee=DB::table('employees')->get();      
        return view('pay_salary',compact('employee'));

    }
}
