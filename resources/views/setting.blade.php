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
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Update Company Information</h3></div>
                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/update-website/'.$setting->id) }}" method="post" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Company Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="company_name" value="{{ $setting->company_name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Company Address</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="company_address" value="{{ $setting->company_address }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Company Email</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="company_email" value="{{ $setting->company_email }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Company Phone/Mobile</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="company_phone" value="{{ $setting->company_phone }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Company Mobile</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="company_mobile" value="{{ $setting->company_mobile }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Company City</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="company_city" value="{{ $setting->company_city }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Company Country</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="company_country" value="{{ $setting->company_country }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Company zipcode</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="company_zipcode" value="{{ $setting->company_zipcode }}">
                                            </div>
                                            <div class="form-group">
                                            	<img src="{{ URL::to($setting->company_logo) }}" style="height: 80px;width: 80px;">
                                                <label for="exampleInputPassword1">Old Logo</label>
                                                <input type="hidden" name="old_photo" value="{{ $setting->company_logo }}">
                                            </div>
                                            <div class="form-group">
                                            	<img id="image" src="#">
                                                <label for="exampleInputPassword1">New Logo</label>
                                                <input type="file" id="exampleInputPassword1" name="company_logo" accept="image/*" class="upload" onchange="readURL(this)">
                                            </div>
                                            
                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
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