@extends('layouts.app')
@section('content')


<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <h4 class="pull-left page-title">Invoice</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="#">Echovel</a></li>
                        <li><a href="#">Pages</a></li>
                        <li class="active">Invoice</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                         <div class="panel-heading">
                            <h4>Invoice</h4>
                        </div> 
                        <div class="panel-body">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <h4 class="text-right">Echovel</h4>
                                    
                                </div>
                                <div class="pull-right">
                                    <h4>Invoice # <br>
                                        <strong>{{ date('d/m/y') }}</strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    
                                <div class="pull-left m-t-30">
	                    				<address>
	                    					<strong>Name: {{ $singleCustomer->name }}</strong><br>
	                    					<strong>Shop Name: {{ $singleCustomer->shopname }}</strong><br>
	                    					Address: {{ $singleCustomer->address }}<br>
	                    					City: {{ $singleCustomer->city }}<br>
	                    					Phone: {{ $singleCustomer->phone }}
	                    				</address>
	                    			</div>
	                    			<div class="pull-right m-t-30">
	                    				<p><strong>Order Date: </strong> {{ date("l jS \of F Y")}}</p>
	                    				<p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
	                    				{{-- @php
	                    				$orderId = DB::table('orders')->select('id')->first();
	                    				@endphp --}}
	                    				<p class="m-t-10"><strong>Order ID: </strong> {{-- {{ $orderId }} --}}1</p>
	                    			</div>
                                </div>
                            </div>
                            <div class="m-h-50"></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table m-t-30">
                                            <thead>
                                                <tr><th>#</th>
                                                <th>Item</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost</th>
                                                <th>Total</th>
                                            </tr></thead>
                                            <tbody>
                                                @php 
                                                $sl=1;
                                                @endphp
                                                @foreach($contents as $item)
	                    							<tr>
	                    								<td>{{ $sl++ }}</td>
	                    								<td>{{ $item->name }}</td>
	                    								<td>{{ $item->qty }}</td>
	                    								<td>{{ $item->price }}</td>
	                    								<td>{{ $item->price*$item->qty }}</td>
	                    							</tr>
	                    							@endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="border-radius: 0px;">
                                <div class="col-md-3 col-md-offset-9">
                                    <p class="text-right"><b> Sub-total:</b>{{ Cart::getSubTotal() }}</p>
                                    <p class="text-right">VAT: {{ Cart::getConditions('10%') }}</p>
                                    <hr>
                                    <h3 class="text-right">Total: {{ Cart::getTotal() }}</h3>
                                </div>
                            </div>
                            <hr>
                            <div class="hidden-print">
                                <div class="pull-right">
                                    <a href="#" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                    <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Submit</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>



</div> <!-- container -->
</div> <!-- content -->

</div>

<form action="{{ url('/final-invoice') }}" method="POST" >
@csrf
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
	<div class="modal-dialog"> 
		<div class="modal-content"> 
			<div class="modal-header"> 
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
				<h4 class="modal-title">Invoice of {{ $singleCustomer->name }}
                    <span class="pull-right"> Total: {{ Cart::getTotal() }}</span>
                </h4> 
				@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
			</div>
            <div class="modal-body"> 
				<div class="row"> 
                <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"> 
						<div class="form-group"> 
							<label for="field-4" class="control-label">Select Payment</label> 
							<select class="form-control" name="payment_status">
								<option value="Handcash">Handcash</option>
								<option value="Cheque">Cheque</option>
								<option value="Due">Due</option>
							</select> 
						</div> 
					</div> 
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"> 
						<div class="form-group"> 
							<label for="field-5" class="control-label">Pay</label> 
							<input type="text" class="form-control" id="field-5" name="pay"> 
						</div> 
					</div> 
					<div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"> 
						<div class="form-group"> 
							<label for="field-6" class="control-label">Due</label> 
							<input type="text" class="form-control" id="field-6" name="due"> 
						</div> 
					</div>
				
                </div>
                
            <input type="hidden" name="customer_id" value="{{ $singleCustomer->id }}">
			<input type="hidden" name="order_date" value="{{ date('d/m/y') }}">
			<input type="hidden" name="order_status" value="Pending">
			<input type="hidden" name="total_products" value="{{ Cart::getContent() }}">
			<input type="hidden" name="subtotal" value="{{ Cart::getSubtotal() }}">
			<input type="hidden" name="vat" value="{{ Cart::getConditions('10%') }}">
			<input type="hidden" name="total" value="{{ Cart::getTotal() }}">

			<div class="modal-footer"> 
				<button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
				<button type="submit" class="btn btn-info waves-effect waves-light">Submit</button> 
			</div> 
				 
		</div> 
	</div>
</div><!-- /.modal -->
</form>

@endsection
