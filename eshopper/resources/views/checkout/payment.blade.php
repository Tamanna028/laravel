@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li class="active">Shopping Cart</li>
				</ol>
			</div>
			<div class="col-lg-12">
			<div class="table-responsive cart_info">
				<?php $contents= Cart::content();
				?>
				<table class="table table-condensed">
					<thead>

						<tr class="cart_menu">
							<td>Action</td>
							<td class="image">Image</td>
							<td class="description">Name</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							
						</tr>
					</thead>
					<tbody>
						@foreach ($contents as $add_to_cart)
						<tr>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$add_to_cart->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
							<td class="cart_product">
								<a href=""><img src="{{URL::to($add_to_cart->options->image)}}"  height="80px" width="80px" alt=""></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$add_to_cart->name}}</a></h4>
								<p>Web ID: 1089772</p>
							</td>
							<td class="cart_price">
								<p>{{$add_to_cart->price}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
									<form action="{{URL::to('/update-cart')}}" method="post">
										{{csrf_field()}}
									<input class="cart_quantity_input" type="text" name="qty" value="{{$add_to_cart->qty}}" autocomplete="off" size="2">
									<input type="hidden" name="rowId" value="{{$add_to_cart->rowId}}" autocomplete="off" size="2">
									<input type="submit" name="submit" value="update" class="btn btn-sm btn-default">
									</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">{{$add_to_cart->total}}</p>
							</td>
							
						</tr>

						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		</div>
	</section> <!--/#cart_items-->
<section id="do_action">
	<div class="container">
		<div class="heading">
			<h3>What would you like to do next?</h3>
			<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
		</div>
		<div class="breadcrumbs">
			<ol class="breadcrumb">
			  <li><a href="#">Home</a></li>
			  <li class="active">Payment method</li>
			</ol>
		</div>
		<div class="paymentCont col-sm-8">
					<div class="headingWrap">
							<h3 class="headingTop text-center">Select Your Payment Method</h3>	
							<p class="text-center">Created with bootsrap button and using radio button</p>
					</div>
					<form action="{{URL::to('/order-place')}}" method="post">
						{{csrf_field()}}
					<div class="paymentWrap">
						<div class="btn-group paymentBtnGroup btn-group-justified" data-toggle="buttons">
				            <label class="btn paymentMethod ">
				            	<div class="method visa"></div>
				                <input type="radio" name="payment_method" value="handcash"> 
				            </label>
				            <label class="btn paymentMethod">
				            	<div class="method master-card"></div>
				                <input type="radio" name="payment_method" value="cart"> 
				            </label>
				            <label class="btn paymentMethod">
			            		<div class="method amex"></div>
				                <input type="radio" name="payment_method" value="bkash">
				            </label>
				      <!--  <label class="btn paymentMethod">
			             		<div class="method vishwa"></div>
				                <input type="radio" name="payment_gateway"> 
				            </label>
				            <label class="btn paymentMethod">
			            		<div class="method ez-cash"></div>
				                <input type="radio" name="payment_gateway"> 
				            </label>  -->
				         
				        </div>        
					</div>
				
					<div class="footerNavWrap clearfix">
						<input class="btn btn-success pull-left btn-fyi" type="submit" value="Done">
					</div>
					</form>
				</div>
	</div>
</section><!--/#do_action-->

@endsection