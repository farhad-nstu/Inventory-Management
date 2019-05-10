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
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">All Product</h3>
                                        <a href="{{ route('add.product') }}" class="btn btn-sm btn-info pull-right">Add New</a><br>
                                    </div>
                                    <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <table id="datatable" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>Product Name</th>
                                                            <th>Product Code</th>
                                                            <th>Selling Price</th>
                                                            <th>Product Garage</th>
                                                            <th>Product Route</th>
                                                            <th>Product Image</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>

                                             
                                                    <tbody>
                                                        @foreach($allProduct as $item)
                                                        <tr>
                                                            <td>{{ $item->product_name }}</td>
                                                            <td>{{ $item->product_code }}</td>
                                                            <td>{{ $item->selling_price }}</td>
                                                            <td>{{ $item->product_garage }}</td>
                                                            <td>{{ $item->product_route }}</td>
                                                            <td><img src="{{ $item->product_image }}" style="height: 60px;width: 60px;"></td>
                                                            <td>
                                                                <a href="{{ URL::to('/edit-product/'.$item->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                                <a href="{{ URL::to('/delete-product/'.$item->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                                                <a href="{{ URL::to('/view-product/'.$item->id) }}" class="btn btn-sm btn-primary">View</a>
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