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
                        @if ($errors->any())
                        <div class="alert alert-danger">
                        	<ul>
                        		@foreach ($errors->all() as $error)
                        		<li>{{ $error }}</li>
                        		@endforeach
                        	</ul>
                        </div>
                        @endif
                        <!-- Start Widget -->
                        <div class="row">
                            <!-- Basic example -->
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-info">
                                    <div class="panel-heading"><h3 class="panel-title">Edit Today Expense
                                    <a href="{{ route('yearly.expense') }}" class="btn btn-sm btn-success pull-right">This years's</a>
                                    <a href="{{ route('monthly.expense') }}" class="btn btn-sm btn-warning pull-right">This month's</a>
                                    <a href="{{ route('today.expense') }}" class="btn btn-sm btn-danger pull-right">Today's</a></h3></div><br>
                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/update-today-expense/'.$editTodayExpense->id) }}" method="post" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Expense Details</label>
                                                <textarea class="form-control" rows="4" name="details">{{ $editTodayExpense->details }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Amount</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="amount" value="{{ $editTodayExpense->amount }}" required="">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" id="exampleInputPassword1" name="date" value="{{ date("d/m/Y") }}">
                                                <input type="hidden" class="form-control" id="exampleInputPassword1" name="month" value="{{ date("F") }}">
                                                <input type="hidden" class="form-control" id="exampleInputPassword1" name="year" value="{{ date("Y") }}">
                                            </div>
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                        </div> 
                        <!-- End row-->


                    </div> <!-- container -->
                               
                </div> <!-- content -->
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->
@endsection