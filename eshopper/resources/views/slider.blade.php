
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<?php	

					$all_slider = DB::table('slider')
                    ->where('publication_status',1)
                    ->get();
                    ?>

                    
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
							<li data-target="#slider-carousel" data-slide-to="3"></li>
							<li data-target="#slider-carousel" data-slide-to="4"></li>
							<li data-target="#slider-carousel" data-slide-to="5"></li>
						</ol>
						 <div class="carousel-inner" >

						 	<?php $i=0;?>
						
						 	 @foreach( $all_slider as $slider )
						 	  	@if($i==0) 
						 	<div class="item active">
						 	
						 		@else
						 			<div class="item">
						 		@endif
								<div class="col-sm-6">
									<h1><span>E</span>-SHOPPER</h1>
									<h2>Free E-Commerce Template</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
									<button type="button" class="btn btn-default get">Get it now</button>
								</div>

                   
                        <div class="col-sm-6">
                            <img src="{{ $slider->slider_image }}"  style="width: 100%; height: 200pz;" >
                        </div>
                  
                    
                </div>
                   
                     <?php $i++; ?>
                     @endforeach	
                     </div>
                 
					<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					 
				</div>
			</div>
		</div>
		</div>
	</section><!--/slider-->
	