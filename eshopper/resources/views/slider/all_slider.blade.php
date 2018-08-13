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
								  <th>Slider ID</th>
								 
								  <th>Slider Image</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead> 
						  @foreach($all_slider as $slider)  
						  <tbody>
							<tr>
								<td>{{$slider->slider_id}}</td>
								<td> <img src="{{$slider->slider_image}}" style="width: 200px; height: 80px;"></td>
				
								@if($slider->publication_status==1)
								<td class="center">
									<span class="label label-success">Publish</span>
								</td>
								
								@else

								<td class="center">
									<span class="label label-success">Unpublish</span>
								</td>

							
								@endif
					<td class="center">
								@if($slider->publication_status==1)
								
									<a class="btn btn-danger" href="{{URL::to('/unpublish-slider/'.$slider->slider_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
					<a class="btn btn-success" href="{{URL::to('/publish-slider/'.$slider->slider_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>

								@endif
									
									<a class="btn btn-danger" href="{{URL::to('/delete-slider/'.$slider->slider_id)}}" id="delete">
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