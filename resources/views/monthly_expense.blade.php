@extends('layouts.app')

@section('content')

<!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome ! {{ date("Y") }}</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                        <div id="myBtnContainer">
                            <a href="{{ route('january.expense',['mymonth' => 'January']) }}" class="btn btn-sm btn-info" onclick="filterSelection('january')">January</a>
                            <a href="{{ route('february.expense',['mymonth' => 'February']) }}" class="btn btn-sm btn-danger" onclick="filterSelection('february')">February</a>
                            <a href="{{ route('march.expense',['mymonth' => 'March']) }}" class="btn btn-sm btn-success" onclick="filterSelection('march')">March</a>
                            <a href="{{ route('april.expense',['mymonth' => 'April']) }}" class="btn btn-sm btn-purple" onclick="filterSelection('april')">April</a>
                            <a href="{{ route('may.expense',['mymonth' => 'May']) }}" class="btn btn-sm btn-primary" onclick="filterSelection('may')">May</a>
                            <a href="{{ route('june.expense',['mymonth' => 'June']) }}" class="btn btn-sm btn-warning" onclick="filterSelection('june')">June</a>
                            <a href="{{ route('july.expense',['mymonth' => 'July']) }}" class="btn btn-sm btn-info" onclick="filterSelection('july')">July</a>
                            <a href="{{ route('august.expense',['mymonth' => 'August']) }}" class="btn btn-sm btn-danger" onclick="filterSelection('august')">August</a>
                            <a href="{{ route('september.expense',['mymonth' => 'September']) }}" class="btn btn-sm btn-success" onclick="filterSelection('september')">September</a>
                            <a href="{{ route('october.expense',['mymonth' => 'October']) }}" class="btn btn-sm btn-purple" onclick="filterSelection('october')">October</a>
                            <a href="{{ route('november.expense',['mymonth' => 'November']) }}" class="btn btn-sm btn-primary" onclick="filterSelection('november')">November</a>
                            <a href="{{ route('december.expense',['mymonth' => 'December']) }}" class="btn btn-sm btn-warning" onclick="filterSelection('december')">December</a>
                        </div><br>
                        <!-- Start Widget -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h3 class="panel-title text-white" >Expense of {{ $mymonth }},{{ date("Y") }}
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Details</th>
                                                            <th>Date</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @foreach($monthlyExpense as $item)
                                                        <tr>
                                                            <td>{{ $item->details }}</td>
                                                            <td>{{ $item->date }}</td>
                                                            <td>{{ $item->amount }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                @php
                                                $month = date('F');
                                                $year = date('Y');
                                                if($month == $mymonth)
                                                    $totalMonthlyExpense = DB::table('expenses')->where('month',$month)->where('year',$year)->sum('amount');
                                                else
                                                    $totalMonthlyExpense = DB::table('expenses')->where('month',$mymonth)->where('year',$year)->sum('amount');
                                                @endphp
                                                 <h4 style="font-size: 35px;text-align: center;">Total : {{ $totalMonthlyExpense }} TK in {{ $mymonth }},{{ date("Y") }}</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <!-- End row-->


                    </div> <!-- container -->
                               
                </div> <!-- content -->
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

@endsection