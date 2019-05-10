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
                                    <div class="panel-heading"><h3 class="panel-title">Add Supplier</h3></div>
                                    <a href="{{ URL::to('add.supplier') }}" class="btn btn-sm btn-info pull-right">Add New</a>
                                     

                                    <!-- error message is here -->
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                    <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                    </ul>
                                    </div>
                                    @endif




                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/insert-supplier') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Name</label>
                                                <input type="text" class="form-control" name="name" placeholder="Enter Full Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Email</label>
                                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Phone</label>
                                                <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Address</label>
                                                <input type="text" class="form-control" name="address" placeholder="Address" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Shop Name</label>
                                                <input type="text" class="form-control" name="shop" placeholder="shopname" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Suppliers Type</label>
                                                <select class="form-control" name="type">
                                                     <option value="1">Distributor</option>
                                                     <option value="2">Wholeseller</option>
                                                     <option value="3">Brooker</option>
                                                </select>
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Account Holder</label>
                                                <input type="text" class="form-control" name="accountholder" placeholder="Account Holder" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Account Number</label>
                                                <input type="text" class="form-control" name="accountnumber" placeholder="Account Number" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Bank Name</label>
                                                <input type="text" class="form-control" name="bankname" placeholder="Bank Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Branch Name</label>
                                                <input type="text" class="form-control" name="branchname" placeholder="Branch Name" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">City</label>
                                                <input type="text" class="form-control" name="city" placeholder="City" required>
                                            </div>

                                            <div class="form-group">
                                                <img id="image" src="#" />
                                                <label for="exampleInputPassword1">Photo</label>
                                                <input type="file" name="photo" accept="image/*" class="upload"
                                                required onchange="readURL(this);" >
                                            </div>
                                            
                                            
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                        </div>


            </div> <!-- container -->
                               
        </div> <!-- content -->
    </div>

    <script type="text/javascript">
    
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    
    </script>

@endsection
