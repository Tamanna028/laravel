 @extends('layout')
 @section('content')
<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-3 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<p>
				
	<?php

	$message = Session::get('message');
if($message){
 echo $message;
 Session::put('message',null);

}
	
	?>
</p>
						<form action="{{URL::to('/customer-login')}}" method="post">
							{{csrf_field()}}
							<input required="" name="customer_email"  type="text" placeholder="Email"/>
								<input   required="" name="customer_name"  type="hidden" placeholder="type email"/>
								<input   required="" name="customer_id"  type="hidden" placeholder="type email"/>
								<input  required=""  name="customer_password" type="password" placeholder="Password"/>
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>

							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-6">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form action="{{URL::to('/customer-registration')}}" method="post">
							{{csrf_field()}}
							<input type="text" placeholder="Name" name="customer_name" required=""/>
							<input type="text" placeholder="Phone" name="customer_phone" required=""/>
							<input type="email" placeholder="Email Address" name="customer_email" required=""/>
							<input type="password" placeholder="Password" name="customer_password" required=""/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
	@endsection