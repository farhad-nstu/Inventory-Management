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
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                    <li><a href="#">Moltran</a></li>
                                    <li class="active">Dashboard</li>
                                </ol>
                            </div>
                        </div>
                        <!-- Start Widget -->
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="panel panel-secondary">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Attendence
                                        <a href="{{ route('take.attendence') }}" class="btn btn-sm btn-info pull-right">Take Attendence</a><br>
                                        </h3>
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
                                                        @foreach($allAttendence as $item)
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