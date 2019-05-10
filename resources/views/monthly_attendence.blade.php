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
                            <a href="{{ route('january.attendence',['mymonth' => 'January']) }}" class="btn btn-sm btn-info" onclick="filterSelection('january')">January</a>
                            <a href="{{ route('february.attendence',['mymonth' => 'February']) }}" class="btn btn-sm btn-danger" onclick="filterSelection('february')">February</a>
                            <a href="{{ route('march.attendence',['mymonth' => 'March']) }}" class="btn btn-sm btn-success" onclick="filterSelection('march')">March</a>
                            <a href="{{ route('april.attendence',['mymonth' => 'April']) }}" class="btn btn-sm btn-purple" onclick="filterSelection('april')">April</a>
                            <a href="{{ route('may.attendence',['mymonth' => 'May']) }}" class="btn btn-sm btn-primary" onclick="filterSelection('may')">May</a>
                            <a href="{{ route('june.attendence',['mymonth' => 'June']) }}" class="btn btn-sm btn-warning" onclick="filterSelection('june')">June</a>
                            <a href="{{ route('july.attendence',['mymonth' => 'July']) }}" class="btn btn-sm btn-info" onclick="filterSelection('july')">July</a>
                            <a href="{{ route('august.attendence',['mymonth' => 'August']) }}" class="btn btn-sm btn-danger" onclick="filterSelection('august')">August</a>
                            <a href="{{ route('september.attendence',['mymonth' => 'September']) }}" class="btn btn-sm btn-success" onclick="filterSelection('september')">September</a>
                            <a href="{{ route('october.attendence',['mymonth' => 'October']) }}" class="btn btn-sm btn-purple" onclick="filterSelection('october')">October</a>
                            <a href="{{ route('november.attendence',['mymonth' => 'November']) }}" class="btn btn-sm btn-primary" onclick="filterSelection('november')">November</a>
                            <a href="{{ route('december.attendence',['mymonth' => 'December']) }}" class="btn btn-sm btn-warning" onclick="filterSelection('december')">December</a>
                            <a href="{{ route('previousYear.december.attendence',['mymonth' => 'December']) }}" class="btn btn-sm btn-danger" onclick="filterSelection('december')">December {{ date("Y",strtotime('-1 year')) }}</a>
                        </div><br><br>
                        <!-- Start Widget -->
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="panel panel-secondary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Attendence of {{ $mymonth }},{{ $year }}</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>SI</th>
                                                            <th>Date</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                    $sl = 1;
                                                    @endphp
                                             
                                                    <tbody>
                                                        @foreach($monthlyAttendence as $item)
                                                        <tr>
                                                            <td>{{ $sl++ }}</td>
                                                            <td>{{ str_replace('_', '/',$item->edit_date) }}</td>
                                                            <td>
                                                                <a href="{{ URL::to('/edit-attendence/'.$item->edit_date) }}" class="btn btn-sm btn-info">Edit</a>
                                                                <a href="{{ URL::to('/delete-attendence/'.$item->edit_date) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                                                <a href="{{ URL::to('/view-attendence/'.$item->edit_date) }}" class="btn btn-sm btn-primary">View</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

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