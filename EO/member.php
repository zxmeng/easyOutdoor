<?php
require_once 'core/init.php';
$member = $user->listuser();
?>

<div class='container'>
	<h3>Members:</h3>
	<?php 
	foreach($member as $var)
		echo $var['id'];?>
</div>
