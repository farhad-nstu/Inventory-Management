<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Attendence;


class AttendenceController extends Controller
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


    public function TakeAttendence()
    {
    	$allEmployee = DB::table('employees')->get();
    	return view('take_attendence')->with('allEmployee',$allEmployee);
    }
    public function InsertAttendence(Request $request)
    {
    	// return $request->all();
        $date = $request->attendence_date;
        $checkAttendence = DB::table('attendences')->where('attendence_date',$date)->first();
        if ($checkAttendence) {
             $notification=array(
             'messege'=>'Todays attendence already taken',
             'alert-type'=>'error'
              );
            return Redirect()->back()->with($notification);                      
        }
        else
        {
            $allEmployeeId = $request->employee_id;
            //return $allEmployeeId;
            foreach ($allEmployeeId as $id) {
                $data[] = [
                    'employee_id' => $id,
                    'attendence' => $request->attendence[$id],
                    'attendence_date' => $request->attendence_date,
                    'attendence_month' => $request->attendence_month,
                    'attendence_year' => $request->attendence_year,
                    'edit_date' => $request->edit_date,
                ];
            }
            $insertAttendence = DB::table('attendences')->insert($data);
            if ($insertAttendence) {
                 $notification=array(
                 'messege'=>'Successfully Attendence Inserted ',
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
    }
    public function AllAttendence()
    {
        $allAttendence = DB::table('attendences')->select('edit_date')->groupBy('edit_date')->get();
        // $attendence_month = DB::table('attendences')->select('attendence_month')->get();
        return view('all_attendence',compact('allAttendence'));
        //return view('all_attendence')->with(['allAttendence'=>$allAttendence,'attendence_month'=>$attendence_month]);
    }


    public function EditAttendence($edit_date)
    {
        $editAttendence = DB::table('attendences')
                        ->join('employees','attendences.employee_id','employees.id')
                        ->select('employees.name','employees.photo','attendences.*')
                        ->where('edit_date',$edit_date)->get();
        $singleAttendence = DB::table('attendences')->where('edit_date',$edit_date)->first();
        return view('edit_attendence')->with(['editAttendence'=>$editAttendence,'singleAttendence'=>$singleAttendence]);
    }
    public function UpdateAttendence(Request $request)
    {
        $allAttendenceId = $request->id;
        foreach ($allAttendenceId as $id) {
            $data = [
                'attendence' => $request->attendence[$id],
            ];
            $singleAttendence = Attendence::where([/*'attendence_date'=>$request->attendence_date,*/'id'=>$id])->first();
            $updateAttendence = $singleAttendence->update($data);
        }
        if ($updateAttendence) {
                 $notification=array(
                 'messege'=>'Successfully Attendence Updated',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('all.attendence')->with($notification);                      
             }
        else{
            $notification=array(
                    'messege'=>'error ',
                    'alert-type'=>'success'
                );
            return Redirect()->back()->with($notification);
        }   
    }
    public function ViewAttendence($view_date)
    {
        $viewAttendence = DB::table('attendences')
                          ->join('employees','attendences.employee_id','employees.id')
                          ->select('employees.name','employees.photo','attendences.*')
                          ->where('edit_date',$view_date)->get();
        $singleAttendence = DB::table('attendences')->where('edit_date',$view_date)->first();
        return view('view_attendence')->with(['viewAttendence'=>$viewAttendence,'singleAttendence'=>$singleAttendence]);
    }
    public function MonthlyAttendence()
    {
        $currentMonth = date("F");
        $currentYear = date("Y");
        $monthlyAttendence = DB::table('attendences')->where(['attendence_month'=>$currentMonth,'attendence_year'=>$currentYear])->select('edit_date')->groupBy('edit_date')->get();
        return view('monthly_attendence')->with(['monthlyAttendence'=>$monthlyAttendence,'mymonth'=>$currentMonth,'year'=>$currentYear]);
    }
    public function JanuaryAttendence($mymonth)
    {
        $month = "January";
        $currentYear = date("Y");
        $monthlyAttendence = DB::table('attendences')->where(['attendence_month'=>$month,'attendence_year'=>$currentYear])->select('edit_date')->groupBy('edit_date')->get();
        return view('monthly_attendence')->with(['monthlyAttendence'=>$monthlyAttendence,'mymonth'=>$mymonth,'year'=>$currentYear]);
    }
    public function FebruaryAttendence($mymonth)
    {
        $month = "February";
        $currentYear = date("Y");
        $monthlyAttendence = DB::table('attendences')->where(['attendence_month'=>$month,'attendence_year'=>$currentYear])->select('edit_date')->groupBy('edit_date')->get();
        return view('monthly_attendence')->with(['monthlyAttendence'=>$monthlyAttendence,'mymonth'=>$mymonth,'year'=>$currentYear]);
    }
    public function MarchAttendence($mymonth)
    {
        $month = "March";
        $currentYear = date("Y");
        $monthlyAttendence = DB::table('attendences')->where(['attendence_month'=>$month,'attendence_year'=>$currentYear])->select('edit_date')->groupBy('edit_date')->get();
        return view('monthly_attendence')->with(['monthlyAttendence'=>$monthlyAttendence,'mymonth'=>$mymonth,'year'=>$currentYear]);
    }
    public function AprilAttendence($mymonth)
    {
        $month = "April";
        $currentYear = date("Y");
        $monthlyAttendence = DB::table('attendences')->where(['attendence_month'=>$month,'attendence_year'=>$currentYear])->select('edit_date')->groupBy('edit_date')->get();
        return view('monthly_attendence')->with(['monthlyAttendence'=>$monthlyAttendence,'mymonth'=>$mymonth,'year'=>$currentYear]);
    }
    public function MayAttendence($mymonth)
    {
        $month = "May";
        $currentYear = date("Y");
        $monthlyAttendence = DB::table('attendences')->where(['attendence_month'=>$month,'attendence_year'=>$currentYear])->select('edit_date')->groupBy('edit_date')->get();
        return view('monthly_attendence')->with(['monthlyAttendence'=>$monthlyAttendence,'mymonth'=>$mymonth,'year'=>$currentYear]);
    }
    public function JuneAttendence($mymonth)
    {
        $month = "June";
        $currentYear = date("Y");
        $monthlyAttendence = DB::table('attendences')->where(['attendence_month'=>$month,'attendence_year'=>$currentYear])->select('edit_date')->groupBy('edit_date')->get();
        return view('monthly_attendence')->with(['monthlyAttendence'=>$monthlyAttendence,'mymonth'=>$mymonth,'year'=>$currentYear]);
    }
    public function JulyAttendence($mymonth)
    {
        $month = "July";
        $currentYear = date("Y");
        $monthlyAttendence = DB::table('attendences')->where(['attendence_month'=>$month,'attendence_year'=>$currentYear])->select('edit_date')->groupBy('edit_date')->get();
        return view('monthly_attendence')->with(['monthlyAttendence'=>$monthlyAttendence,'mymonth'=>$mymonth,'year'=>$currentYear]);
    }
    public function AugustAttendence($mymonth)
    {
        $month = "August";
        $currentYear = date("Y");
        $monthlyAttendence = DB::table('attendences')->where(['attendence_month'=>$month,'attendence_year'=>$currentYear])->select('edit_date')->groupBy('edit_date')->get();
        return view('monthly_attendence')->with(['monthlyAttendence'=>$monthlyAttendence,'mymonth'=>$mymonth,'year'=>$currentYear]);
    }
    public function SeptemberAttendence($mymonth)
    {
        $month = "September";
        $currentYear = date("Y");
        $monthlyAttendence = DB::table('attendences')->where(['attendence_month'=>$month,'attendence_year'=>$currentYear])->select('edit_date')->groupBy('edit_date')->get();
        return view('monthly_attendence')->with(['monthlyAttendence'=>$monthlyAttendence,'mymonth'=>$mymonth,'year'=>$currentYear]);
    }
    public function OctoberAttendence($mymonth)
    {
        $month = "October";
        $currentYear = date("Y");
        $monthlyAttendence = DB::table('attendences')->where(['attendence_month'=>$month,'attendence_year'=>$currentYear])->select('edit_date')->groupBy('edit_date')->get();
        return view('monthly_attendence')->with(['monthlyAttendence'=>$monthlyAttendence,'mymonth'=>$mymonth,'year'=>$currentYear]);
    }
    public function NovemberAttendence($mymonth)
    {
        $month = "November";
        $currentYear = date("Y");
        $monthlyAttendence = DB::table('attendences')->where(['attendence_month'=>$month,'attendence_year'=>$currentYear])->select('edit_date')->groupBy('edit_date')->get();
        return view('monthly_attendence')->with(['monthlyAttendence'=>$monthlyAttendence,'mymonth'=>$mymonth,'year'=>$currentYear]);
    }
    public function DecemberAttendence($mymonth)
    {
        $month = "December";
        $currentYear = date("Y");
        $monthlyAttendence = DB::table('attendences')->where(['attendence_month'=>$month,'attendence_year'=>$currentYear])->select('edit_date')->groupBy('edit_date')->get();
        return view('monthly_attendence')->with(['monthlyAttendence'=>$monthlyAttendence,'mymonth'=>$mymonth,'year'=>$currentYear]);
    }
    public function PreviousYearDecemberAttendence($mymonth)
    {
        $month = "December";
        $previousYear = date("Y",strtotime('-1 year'));
        $monthlyAttendence = DB::table('attendences')->where(['attendence_month'=>$month,'attendence_year'=>$previousYear])->select('edit_date')->groupBy('edit_date')->get();
        return view('monthly_attendence')->with(['monthlyAttendence'=>$monthlyAttendence,'mymonth'=>$mymonth,'year'=>$previousYear]);
    }

}
