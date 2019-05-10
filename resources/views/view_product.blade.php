    
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
                            <!-- Basic example -->
                            <div class="col-md-8 col-md-offset-2">
                                <div class="panel panel-purple">
                                    <div class="panel-heading"><span class="panel-title">View Product</span></div><br>
                                    <a href="{{ route('all.product') }}" class="btn btn-sm btn-info pull-right">All Product</a>
                                    <div class="panel-body">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Name</label>
                                                 <p>{{ $viewProduct->product_name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Code</label>
                                                <p>{{ $viewProduct->product_code }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Category</label>
                                                <p>{{ $viewProduct->cat_name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Supplier</label>
                                                <p>{{ $viewProduct->name }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Garage</label>
                                                <p>{{ $viewProduct->product_garage }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Route</label>
                                                <p>{{ $viewProduct->product_route }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Buying Date</label>
                                                <p>{{ $viewProduct->buying_date }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Expire Date</label>
                                                <p>{{ $viewProduct->expire_date }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Buying Price</label>
                                                <p>{{ $viewProduct->buying_price }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Selling Price</label>
                                                <p>{{ $viewProduct->selling_price }}</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Image</label>
                                                <img id="image" src="{{ URL::to($viewProduct->product_image) }}" style="height: 100px;width: 100px;">
                                            </div>
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