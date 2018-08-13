
 @extends('admin.admin_master')
 @section('content')
<div class="row-fluid sortable">	
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Table</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-bordered">
							  <thead>
								  <tr>
									  <th>Customer Name</th>
									  <th>Mobile</th>                                       
								  </tr>
							  </thead>   
							  <tbody>
								<tr>
									@foreach($order_by_id as $order)
									@endforeach 
									<td>{{$order->customer_name}}</td>
									<td class="center">{{$order->customer_phone}}</td>
									 
									                                    
								</tr>
								  
							  </tbody>
						 </table>  
						 <div class="pagination pagination-centered">
						  <ul>
							<li><a href="#">Prev</a></li>
							<li class="active">
							  <a href="#">1</a>
							</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>
						  </ul>
						</div>     
					</div>
				</div><!--/span-->
				echo '<pre>';
				echo $order_by_id;
				echo '</pre>';
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Table</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-condensed">
							  <thead>
								  <tr>
								  	    
									  <th>Shipping Username</th>
									  <th>Shipping Address</th>
									  <th>Mobile</th>
									  <th>Email</th>  
									                                      
								  </tr>
							  </thead>   
							  <tbody>
							 <tr>
									@foreach($order_by_id as $order)
									 @endforeach 
									  <td>{{$order->shipping_first_name.$order->shipping_last_name}}</td>
									  <td>{{$order->shipping_address}}</td>
									  <td>{{$order->shipping_phone_number}}</td>
									  <td>{{$order->shipping_email}}</td>  
									                                     
								</tr> 
								              
							  </tbody>
						 </table>  
						 <div class="pagination pagination-centered">
						  <ul>
							<li><a href="#">Prev</a></li>
							<li class="active">
							  <a href="#">1</a>
							</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>
						  </ul>
						</div>     
					</div>
				</div><!--/span-->
			
			</div><!--/row-->
			
			<div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Table</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-bordered table-striped table-condensed">
							  <thead>
								  <tr>

									  <th>Order ID</th>
									  <th>Product Name</th>
									  <th>Product Price</th>
									  <th>Product Sales Quantity</th>   
									  <th>Product Sub Total</th>                                         
								  </tr>
							  </thead>   
							  <tbody>

				<tr>
						
									   
									<!-- <td>{{$order_by_id->order_id}}</td>
									<td class="center">{{$order_by_id->product_name}}</td>
									<td class="center">{{$order_by_id->product_price}}</td>
									<td class="center">{{$order_by_id->product_sales_quantity}}</td>
									<td class="center">{{$order_by_id->product_price*$order_by_id->product_sales_quantity}}</td>
									                                 -->
								</tr>
								
								 </tbody>
								   <tfoot>
								   	<tr>
								   	<!-- 	<td>Total with vat:</td>
								   		<td>{{$order_by_id->order_total}}</td> -->
								   </tr>
								   </tfoot>          
							
				
						 </table>  
						 <div class="pagination pagination-centered">
						  <ul>
							<li><a href="#">Prev</a></li>
							<li class="active">
							  <a href="#">1</a>
							</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li><a href="#">Next</a></li>
						  </ul>
						</div>     
					</div>
				</div><!--/span-->
			</div><!--/row-->
			 @endsection