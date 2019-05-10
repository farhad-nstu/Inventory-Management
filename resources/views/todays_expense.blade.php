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
                            <div class="col-md-12">
                                <div class="panel panel-danger">
                                    <div class="panel-heading">
                                        <h3 class="panel-title text-white" >Today's Expense
                                            <a href="{{ route('add.expense') }}" class="btn btn-sm btn-info pull-right">Add New</a><br>
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
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @foreach($todayExpense as $item)
                                                        <tr>
                                                            <td>{{ $item->details }}</td>
                                                            <td>{{ $item->amount }}</td>
                                                            <td>
                                                                <a href="{{ URL::to('/edit-today-expense/'.$item->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                                <a href="{{ URL::to('/delete-today-expense/'.$item->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                @php
                                                $date = date('d/m/Y');
                                                $totalExpenseToday = DB::table('expenses')->where('date',$date)->sum('amount');
                                                @endphp
                                                <h4 style="color: purple;font-size: 35px;text-align: center;">Total : {{ $totalExpenseToday }} TK</h4>
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