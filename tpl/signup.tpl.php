<main>
			   <div class="register-box">
			<div class="register-box-body">
			<p class="login-box-msg">Sign Up - Feed Your Curiosity</p>
        <form action="../signup/signup" method="post">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="name" placeholder="Full name"/>
          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="email" placeholder="Email"/>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password"/>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="retypedPwd" placeholder="Retype password"/>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> I agree to the <a href="#">terms</a>
                </label>
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div><!-- /.col -->
          </div>
        </form>
       <br>
				  <div class="error"><ul class="listerrors"><li><?php foreach($errors as $error): echo($error.".<br>"); endforeach ?></li></ul></div>

       </div><!-- /.login-box-body -->
	  </div>
