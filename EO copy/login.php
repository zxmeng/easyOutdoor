
<form action="" method="post">
		<div class="field">
			<input type="text" name="username" id="username" value="<?php echo escape(Input::get('username')); ?>" autocomplete="off" placeholder="Username"/><br/>
		</div>
		<div class="field">
			<input type="password" name="password" id="password" placeholder="Password"/><br/>
		</div>
		<div class="field">
				<input type="checkbox" name="remember" id="remember"/> <label for="remember">Remember Me
			</label>
		</div>
	<input type="submit" value="Login"/><br/>
	<input type="hidden" name="token" value="<?php echo Token::generate(); ?>"/><br/>
	<!--<a href="register.php">register</a></p>-->
	<a href="#register" data-toggle="modal">register</a><br/>
	<h5><?php print("$message");?></h5>
</form>