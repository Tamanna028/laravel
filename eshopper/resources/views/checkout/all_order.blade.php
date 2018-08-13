 @extends('admin.admin_master')
 @section('content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>
<p>
                
    <?php

    $unpublish = Session::get('unpublish');
if($unpublish){
 echo $unpublish;
 Session::put('unpublish',null);

}
    
    ?>
</p>

<p>
                
    <?php

    $publish = Session::get('publish');
if($publish){
 echo $publish;
 Session::put('publish',null);

}
    
    ?>
</p>

  <p>
        
  <?php

  $message = Session::get('message');
if($message){
 echo $message;
 Session::put('message',null);

}
  
  ?>
</p>


			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
						<div class="box-icon">
							<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
							<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
							<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Order ID</th>
								  <th>Customer Name</th>
								  <th>Order Total</th>
								  <th>Status</th>
								  <th>Action</th>
								 
							  </tr>
						  </thead> 
						  @foreach($all_order_info as $all_order)  
						  <tbody>
							<tr>
								<td>{{$all_order->order_id}}</td>
								<td class="center">{{$all_order->customer_name}}</td>
								<td class="center">{{$all_order->order_total}}</td>
								<td class="center">{{$all_order->order_status}}</td>
								@if($all_order->order_status=='pending')
								<td class="center">
									<span class="label label-success">Peding</span>
								</td>
								
								@else

								<td class="center">
									<span class="label label-success">Payment Successful!</span>
								</td>

							
								@endif
					<td class="center">
								@if($all_order->order_status=='pending')
								<a class="btn btn-success" href="{{URL::to('/publish-order/'.$all_order->order_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									
									@else
					
<a class="btn btn-danger" href="{{URL::to('/unpublish-order/'.$all_order->order_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
								@endif
									<a class="btn btn-info" href="{{URL::to('/view-order/'.$all_order->order_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-product/'.$all_order->order_id)}}" id="delete">
										<i class="halflings-icon white trash"></i> 
									</a>
								</td>
							</tr>
							
							
							
							
						  </tbody>
						  @endforeach
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

						
					</div>
				</div><!--/span-->
			</div><!--/row-->

			     @endsection