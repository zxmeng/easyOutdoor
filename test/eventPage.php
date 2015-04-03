<?php require_once('EventClass.php'); ?>


	<div class = "item">

	<?php 
	   $event = new event();
	   $eInfo = $event->getEvent($eid); 
	   $event->db->close();
	?>

	</div>
