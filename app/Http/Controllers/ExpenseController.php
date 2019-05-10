<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ExpenseController extends Controller
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


    public function AddExpense(){
        return view('add_expense');
    }

    public function InsertExpense(Request $request){
        $data = array();
    	$data['details']=$request->details;
    	$data['amount']=$request->amount;
    	$data['month']=$request->month;
    	$data['date']=$request->date;
    	$data['year']=$request->year;
    	$insertExpense = DB::table('expenses')->insert($data);
    	if ($insertExpense) {
                 $notification=array(
                 'messege'=>'Successfully Expense Inserted ',
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

    public function TodayExpense()
    {
    	$date = date("d/m/Y");
    	$todayExpense = DB::table('expenses')->where('date',$date)->get();
    	return view('todays_expense',compact('todayExpense'));
    }
    public function EditTodayExpense($id)
    {
    	$editTodayExpense = DB::table('expenses')->where('id',$id)->first();
    	return view('edit_today_expense')->with('editTodayExpense',$editTodayExpense);
    }

    public function UpdateTodayExpense(Request $request,$id)
    {
    	$data = array();
    	$data['details']=$request->details;
    	$data['amount']=$request->amount;
    	$data['month']=$request->month;
    	$data['date']=$request->date;
    	$data['year']=$request->year;
    	$updateTodayExpense = DB::table('expenses')->where('id',$id)->update($data);
    	if ($updateTodayExpense) {
                 $notification=array(
                 'messege'=>'Successfully Expense Updated ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('today.expense')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }   
    }

    public function DeleteTodayExpense($id)
    {
    	$deleteTodayExpense = DB::table('expenses')->where('id',$id)->delete();
    	if ($deleteTodayExpense) {
                 $notification=array(
                 'messege'=>'Successfully Expense Deleted ',
                 'alert-type'=>'success'
                  );
                return Redirect()->route('today.expense')->with($notification);                      
             }else{
              $notification=array(
                 'messege'=>'error ',
                 'alert-type'=>'success'
                  );
                 return Redirect()->back()->with($notification);
             }   
    }

    public function MonthlyExpense()
    {
    	$month = date("F");
    	$year = date("Y");
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$month]);
    }
    public function YearlyExpense()
    {
    	$year = date("Y");
    	$yearlyExpense = DB::table('expenses')->where('year',$year)->get();
    	return view('yearly_expense')->with('yearlyExpense',$yearlyExpense);
    }
    public function PreviousYearExpense()
    {
    	$year = date("Y",strtotime('-1 year'));
    	$previousyearExpense = DB::table('expenses')->where('year',$year)->get();
    	return view('previousYear_expense')->with('previousyearExpense',$previousyearExpense);
    }
    public function JanuaryExpense($mymonth)
    {
    	// echo $mymonth;
    	// exit();
    	$month = 'January';
    	$year = date("Y");
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function FebruaryExpense($mymonth)
    {
    	// echo $mymonth;
    	// exit();
    	$month = 'February';
    	$year = date("Y");
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function MarchExpense($mymonth)
    {
    	$month = 'March';
    	$year = date("Y");
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function AprilExpense($mymonth)
    {
    	$month = 'April';
    	$year = date("Y");
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function MayExpense($mymonth)
    {
    	$month = 'May';
    	$year = date("Y");
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function JuneExpense($mymonth)
    {
    	$month = 'June';
    	$year = date("Y");
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function JulyExpense($mymonth)
    {
    	$month = 'July';
    	$year = date("Y");
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function AugustExpense($mymonth)
    {
    	$month = 'August';
    	$year = date("Y");
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function SeptemberExpense($mymonth)
    {
    	$month = 'September';
    	$year = date("Y");
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function OctoberExpense($mymonth)
    {
    	$month = 'October';
    	$year = date("Y");
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function NovemberExpense($mymonth)
    {
    	$month = 'November';
    	$year = date("Y");
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function DecemberExpense($mymonth)
    {
    	$month = 'December';
    	$year = date("Y");
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function PreviousYearJanuaryExpense($mymonth)
    {
    	// echo $mymonth;
    	// exit();
    	$month = 'January';
    	$year = date("Y",strtotime('-1 year'));
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense_of_previous_year')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function PreviousYearFebruaryExpense($mymonth)
    {
    	// echo $mymonth;
    	// exit();
    	$month = 'February';
    	$year = date("Y",strtotime('-1 year'));
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense_of_previous_year')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function PreviousYearMarchExpense($mymonth)
    {
    	$month = 'March';
    	$year = date("Y",strtotime('-1 year'));
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense_of_previous_year')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function PreviousYearAprilExpense($mymonth)
    {
    	$month = 'April';
    	$year = date("Y",strtotime('-1 year'));
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense_of_previous_year')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function PreviousYearMayExpense($mymonth)
    {
    	$month = 'May';
    	$year = date("Y",strtotime('-1 year'));
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense_of_previous_year')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function PreviousYearJuneExpense($mymonth)
    {
    	$month = 'June';
    	$year = date("Y",strtotime('-1 year'));
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense_of_previous_year')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function PreviousYearJulyExpense($mymonth)
    {
    	$month = 'July';
    	$year = date("Y",strtotime('-1 year'));
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense_of_previous_year')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function PreviousYearAugustExpense($mymonth)
    {
    	$month = 'August';
    	$year = date("Y",strtotime('-1 year'));
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense_of_previous_year')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function PreviousYearSeptemberExpense($mymonth)
    {
    	$month = 'September';
    	$year = date("Y",strtotime('-1 year'));
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense_of_previous_year')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function PreviousYearOctoberExpense($mymonth)
    {
    	$month = 'October';
    	$year = date("Y",strtotime('-1 year'));
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense_of_previous_year')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function PreviousYearNovemberExpense($mymonth)
    {
    	$month = 'November';
    	$year = date("Y",strtotime('-1 year'));
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense_of_previous_year')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
    public function PreviousYearDecemberExpense($mymonth)
    {
    	$month = 'December';
    	$year = date("Y",strtotime('-1 year'));
    	$monthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->get();
    	return view('monthly_expense_of_previous_year')->with(['monthlyExpense'=>$monthlyExpense,'mymonth'=>$mymonth]);
    }
}

   


