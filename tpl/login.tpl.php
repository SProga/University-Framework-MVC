<main>
		   <div class="login-box">
			<div class="login-box-body">
			<p class="login-box-msg">Be Curious - Sign In</p>
				<form action="../login/login" method="post">
			  <div class="form-group has-feedback">
				<input type="text" class="form-control" name="email" placeholder="email"/>
			  </div>
			  <div class="form-group has-feedback">
				<input type="password" class="form-control" name="password" placeholder="password"/>
			  </div>
			  <div class="row">
				<div class="col-xs-8">
				  <div class="checkbox icheck">
					<label>
					  <input type="checkbox"> Remember Me
					</label>
				  </div>
				</div><!-- /.col -->
				<div class="col-xs-4">
				  <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
				</div><!-- /.col -->
			  </div>
			</form>
			<br>
			<a href="register.html" class="text-center">Sign Up</a>

  <div class="error">
		<?php foreach($errors as $error): echo($error."<br>");
		 endforeach ?>
	 </div>
       </div><!-- /.login-box-body -->

			 </div>
