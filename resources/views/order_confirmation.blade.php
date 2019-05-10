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
                         
                        <div class="panel-body">
                            <div class="clearfix">
                                
                                <div class="pull-right">
                                    <h4> Order date <br>
                                        <strong>{{ $order->order_date }}</strong>
                                    </h4>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    
                                <div class="pull-left m-t-30">
	                    				<address>
	                    					<strong>Name: {{ $order->name }}</strong><br>
	                    					<strong>Shop Name: {{ $order->shopname }}</strong><br>
	                    					Address: {{ $order->address }}<br>
	                    					City: {{ $order->city }}<br>
	                    					Phone: {{ $order->phone }}
	                    				</address>
	                    			</div>
	                    			<div class="pull-right m-t-30">
	                    				<p><strong>Today: </strong> {{ $order->order_date }}</p>
	                    				<p class="m-t-10"><strong>Order Status: </strong> 
	                    					@if($order->order_status == 'Pending')
	                    					<span class="label label-pink">{{ $order->order_status }}</span>
	                    					@else
	                    					<span class="label label-success ">{{ $order->order_status }}</span>
	                    					@endif
	                    				</p>
	                    				<p class="m-t-10"><strong>Order ID: </strong> {{ $order->id }}</p>
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
	                    							<th>Product Name</th>
	                    							<th>Product Code</th>
	                    							<th>Quantity</th>
	                    							<th>Unit Cost</th>
	                    							<th>Total</th>
	                    						</tr></thead>
	                    						<tbody>
	                    							@php
	                    							$sl = 1;
	                    							@endphp
	                    							@foreach($order_details as $item)
	                    							<tr>
	                    								<td>{{ $sl++ }}</td>
	                    								<td>{{ $item->product_name }}</td>
	                    								<td>{{ $item->product_code }}</td>
	                    								<td>{{ $item->quantity }}</td>
	                    								<td>{{ $item->unitcost }}</td>
	                    								<td>{{ $item->total }}</td>
	                    							</tr>
	                    							@endforeach
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="border-radius: 0px;">
                            <div class="col-md-9">
                                <h3>Paid By: {{ $order->payment_status }}</h3>
                                <h4>Paid: {{ $order->pay }}</h3>
                                <h4>Due: {{ $order->due }}</h3>
                            </div>
                            <div class="col-md-3">
                                    <div>
	                    				<p class="text-right"><b>Sub-total:</b> {{ $order->subtotal }}</p>
	                    				<p class="text-right">VAT: {{ $order->vat }}</p>
	                    				<h3 class="text-right">Total: {{ $order->total }}</h3>
	                    			</div>
                            </div>
                            <hr>
                            @if($order->order_status == 'success');
                            @else
                            <div class="hidden-print">
                                <div class="pull-right">
                                    <a href="#" class="btn btn-inverse waves-effect waves-light" onclick="window.print()"><i class="fa fa-print"></i></a>
                                    <a href="{{ URL::to('/pos-done/'.$order->id) }}" class="btn btn-primary waves-effect waves-light">Done</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>

                </div>

            </div>



</div> <!-- container -->
</div> <!-- content -->

</div>



@endsection
