
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
			<div class="row">
				
				<div class="col-sm-8">
					<div class="total_area">
						<ul>
							<li>Cart Sub Total <span>{{Cart::subtotal()}}</span></li>
							<li>Eco Tax <span>{{Cart::tax()}}</span></li>
							<li>Shipping Cost <span>Free</span></li>
							<li>Total <span>{{Cart::total()}}</span></li>
						</ul>
							<a class="btn btn-default update" href="">Update</a>
							<?php $customer_id=Session::get('customer_id'); ?>
								<?php $shipping_id=Session::get('shipping_id'); ?>
										@if($customer_id != NULL && $shipping_id==NULL)
										<li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
												
												@elseif($customer_id != NULL && $shipping_id!=NULL)
									<li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
									@else
									<li><a href="{{URL::to('/login-check')}}"><i class="fa fa-crosshairs"></i> Checkout</a></li>
										@endif
							
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
	@endsection