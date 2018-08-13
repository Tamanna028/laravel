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
								  <th>Category ID</th>
								  <th>Category Name</th>
								  <th>Category Description</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead> 
						  @foreach($all_category as $category)  
						  <tbody>
							<tr>
								<td>{{$category->category_id}}</td>
								<td class="center">{{$category->category_name}}</td>
								<td class="center">{{$category->category_description}}</td>
								@if($category->publication_status==1)
								<td class="center">
									<span class="label label-success">Publish</span>
								</td>
								
								@else

								<td class="center">
									<span class="label label-success">Unpublish</span>
								</td>

							
								@endif
					<td class="center">
								@if($category->publication_status==1)
								
									<a class="btn btn-danger" href="{{URL::to('/unpublish-category/'.$category->category_id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
					<a class="btn btn-success" href="{{URL::to('/publish-category/'.$category->category_id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>

								@endif
									<a class="btn btn-info" href="{{URL::to('/edit-category/'.$category->category_id)}}">
										<i class="halflings-icon white edit"></i>  
									</a>
									<a class="btn btn-danger" href="{{URL::to('/delete-category/'.$category->category_id)}}" id="delete">
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