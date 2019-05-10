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
                                <div class="panel panel-purple">
                                    <div class="panel-heading"><span class="panel-title">Add Product
                                    <a href="{{ route('all.product') }}" class="btn btn-sm btn-info" style="margin-left: 250px;">All Product</a>
                                    <a href="{{ route('import.product') }}" class="btn btn-sm btn-info pull-right">Import Product</a>
                                    </span>
                                </div><br>
                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/insert-product') }}" method="post" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="product_name" placeholder="Product Name" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Code</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="product_code" placeholder="Product Code" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Category</label>
                                                @php 
                                                    $cat=DB::table('categories')->get();
                                                @endphp 
                                                <select name="category_id" class="form-control">
                                                @foreach($cat as $row)
                                                    <option value="{{ $row->id }}">{{ $row->cat_name }}</option>
                                                    
                                                @endforeach    
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Supplier</label>
                                                @php 
                                                    $sup=DB::table('suppliers')->get();
                                                @endphp 
                                                <select name="supplier_id" class="form-control">
                                                @foreach($sup as $row)
                                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                    
                                                @endforeach    
                                                </select>
                                            </div>
                                            <div class="form-group" >
                                                <label for="exampleInputPassword1">Product Garage</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="product_garage" placeholder="Product Garage" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Route</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="product_route" placeholder="Product Route" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Buying Date</label>
                                                <input type="date" class="form-control" id="exampleInputPassword1" name="buying_date"  required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Expire Date</label>
                                                <input type="date" class="form-control" id="exampleInputPassword1" name="expire_date"  required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Buying Price</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="buying_price" placeholder="Buying Price" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Selling Price</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="selling_price" placeholder="Selling Price" required="">
                                            </div>
                                            <div class="form-group">
                                            	<img id="image" src="#">
                                                <label for="exampleInputPassword1">Product Image</label>
                                                <input type="file" id="exampleInputPassword1" name="product_image" accept="image/*" class="upload" required="" onchange="readURL(this)">
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