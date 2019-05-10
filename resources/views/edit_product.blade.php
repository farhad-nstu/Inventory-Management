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
                                    <div class="panel-heading"><span class="panel-title">Edit Product</span></div><br>
                                    <a href="{{ route('all.product') }}" class="btn btn-sm btn-info pull-right">All Product</a>
                                    <div class="panel-body">
                                        <form role="form" action="{{ url('/update-product/'.$editProduct->id) }}" method="post" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Product Name</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name="product_name" value="{{ $editProduct->product_name }}" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Code</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="product_code" value="{{ $editProduct->product_code }}" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Category</label>
                                                <select name="category_id" class="form-control">
                                                    @php
                                                    $allCategory = DB::table('categories')->get();
                                                    @endphp
                                                    @foreach($allCategory as $item)
                                                    <option value="{{ $item->id }}" @php if($editProduct->category_id == $item->id) {echo "selected";}@endphp>{{ $item->cat_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Supplier</label>
                                                <select name="supplier_id" class="form-control">
                                                    <option disabled="" selected=""></option>
                                                    @php
                                                    $allSupplier = DB::table('suppliers')->get();
                                                    @endphp
                                                    @foreach($allSupplier as $item)
                                                    <option value="{{ $item->id }}" @php if($editProduct->supplier_id == $item->id){echo "selected";}@endphp>{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Garage</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="product_garage" value="{{ $editProduct->product_garage }}" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Product Route</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="product_route" value="{{ $editProduct->product_route }}" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Buying Date</label>
                                                <input type="date" class="form-control" id="exampleInputPassword1" name="buying_date"  required="" value="{{ $editProduct->buying_date }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Expire Date</label>
                                                <input type="date" class="form-control" id="exampleInputPassword1" name="expire_date"  required="" value="{{ $editProduct->expire_date }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Buying Price</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="buying_price" value="{{ $editProduct->buying_price }}" required="">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Selling Price</label>
                                                <input type="text" class="form-control" id="exampleInputPassword1" name="selling_price" value="{{ $editProduct->selling_price }}" required="">
                                            </div>
                                            <div class="form-group">
                                            	<img id="image" src="#">
                                                <label for="exampleInputPassword1">Product Image</label>
                                                <input type="file" id="exampleInputPassword1" name="product_image" accept="image/*" class="upload" onchange="readURL(this)">
                                                <input type="hidden" name="old_product_image" value="{{ $editProduct->product_image }}">
                                            </div>
                                            <div class="form-group">
                                            	<img id="image" src="{{ URL::to($editProduct->product_image) }}" style="height: 100px;width: 100px;">
                                                <label for="exampleInputPassword1">Old Product Image</label>
                                                <input type="hidden" name="old_product_image" value="{{ $editProduct->product_image }}">
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