<?php

require_once 'core/init.php';

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home'). '</p>';
}

$user = new User(); //Current

if($user->isLoggedIn()) {
?>
    <?php include'personal.php';?>
    
<?php

    if($user->hasPermission('admin')) {
        echo '<p>You are a Administrator!</p>';
    }

} else {
    echo '<p>You need to <a href="login.php">login</a> or <a href="register.php">register</a>.</p>';/*else {
    echo '<p>You need to <a href="#login" data-toggle="modal">login</a> or <a href="#register" data-toggle="modal">register</a>.</p>';
}*/
}