<?php
	require_once 'core/init.php';
	if (Input::exists()) {
		if (Token::check(Input::get('token'))) {
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'username'	=> array(
					'fieldName'	=> 'Username',
					'required' 	=> true
				),
				'password'	=> array(
					'fieldName'	=> 'Password',
					'required' 	=> true
				)
			));

			if ($validation->passed()) {
				$user 		= new User();
				$remember 	= (Input::get('remember') === on) ? true : false;
				$login 		= $user->login(Input::get('username'),Input::get('password'), $remember);

				if ($login) {
					Redirect::to('index.php');
				} else {
					$message = 'Sorry we could not log you in';
				}
			} else {
				foreach ($validation->errors() as $error) {
					$message = $error;
				}
			}
		}
	}
?>

<?php
	$user = new User();
	if ($user->isLoggedIn()) {
?>

	<?php include 'header/header-loggedin.php';?>

<?php
	} else {
		?>

		<?php include 'header/header-login.php';?>
<?php	
	}
?>

