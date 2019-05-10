@extends('layouts.app')
@section('content')

    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">

                <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="pull-left page-title">Welcome !</h4>
                                <ol class="breadcrumb pull-right">
                                <li><a href="#">Echobvel</a></li>
                                    <li class="active">IT</li>
                                </ol>
                            </div>
                        </div>

                        <!-- Start Widget -->
                        <div class="row">
                            <!-- Basic example -->
                            <div class="col-md-2"></div>
                            <div class="col-md-8 ">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">View Supplier</h3></div>
                                    <div class="panel-body">
                                        
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <p>{{ $single->name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <p>{{ $single->email }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Phone</label>
                                                <p>{{ $single->phone }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Address</label>
                                                <p>{{ $single->address }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Shop Name</label>
                                                <p>{{ $single->shop }}</p>
                                                @if($single->shop == NULL)
                                                NONE
                                                @else
                                                <p>{{ $single->shop }}</p>
                                                @endif

                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Type of Suppliers</label>
                                                <p>{{ $single->type }}</p>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Account Holder</label>
                                                <p>{{ $single->accountholder }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Account Number</label>
                                               <p>{{ $single->accountnumber }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Bank Name</label>
                                                <p>{{ $single->bankname }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Branch Name</label>
                                                <p>{{ $single->branchname }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">City</label>
                                                <p>{{ $single->city }}</p>
                                            </div>

                                            <div class="form-group">
                                                <img style="height:60px; width:60px;" src="{{ URL::to($single->photo) }}" />
                                                <label for="exampleInputPassword1">Photo</label>
                                                
                                            </div>
                                            
                                            
                                           
                                        
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                        </div>


            </div> <!-- container -->
                               
        </div> <!-- content -->
    </div>

    

@endsection
