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
                                <h4 class="pull-left page-title">Welcome ! {{ date("Y",strtotime('-1 year')) }}</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                        <div>
                            <a href="{{ route('previous.year.january.expense',['mymonth' => 'January']) }}" class="btn btn-sm btn-info">January</a>
                            <a href="{{ route('previous.year.february.expense',['mymonth' => 'February']) }}" class="btn btn-sm btn-danger">February</a>
                            <a href="{{ route('previous.year.march.expense',['mymonth' => 'March']) }}" class="btn btn-sm btn-success">March</a>
                            <a href="{{ route('previous.year.april.expense',['mymonth' => 'April']) }}" class="btn btn-sm btn-purple">April</a>
                            <a href="{{ route('previous.year.may.expense',['mymonth' => 'May']) }}" class="btn btn-sm btn-primary">May</a>
                            <a href="{{ route('previous.year.june.expense',['mymonth' => 'June']) }}" class="btn btn-sm btn-warning">June</a>
                            <a href="{{ route('previous.year.july.expense',['mymonth' => 'July']) }}" class="btn btn-sm btn-info">July</a>
                            <a href="{{ route('previous.year.august.expense',['mymonth' => 'August']) }}" class="btn btn-sm btn-danger">August</a>
                            <a href="{{ route('previous.year.september.expense',['mymonth' => 'September']) }}" class="btn btn-sm btn-success">September</a>
                            <a href="{{ route('previous.year.october.expense',['mymonth' => 'October']) }}" class="btn btn-sm btn-purple">October</a>
                            <a href="{{ route('previous.year.november.expense',['mymonth' => 'November']) }}" class="btn btn-sm btn-primary">November</a>
                            <a href="{{ route('previous.year.december.expense',['mymonth' => 'December']) }}" class="btn btn-sm btn-warning">December</a>
                        </div><br>
                        <!-- Start Widget -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h3 class="panel-title text-white" >Expense of {{ $mymonth }},{{ date("Y",strtotime('-1 year')) }}
                                        </h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Details</th>
                                                            <th>Amount</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @foreach($monthlyExpense as $item)
                                                        <tr>
                                                            <td>{{ $item->details }}</td>
                                                            <td>{{ $item->amount }}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                @php
                                                $year = date('Y',strtotime('-1 year'));
                                                $totalMonthlyExpense = DB::table('expenses')->where('month',$mymonth)->where('year',$year)->sum('amount');
                                                @endphp
                                                 <h4 style="font-size: 35px;text-align: center;">Total : {{ $totalMonthlyExpense }} TK in {{ $mymonth }},{{ $year }}</h4>
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