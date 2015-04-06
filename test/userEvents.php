<?php

	require_once("EventClass.php");
	require_once("ReviewClass.php");
	$et = new Event();
	$rw = new Review();

	if ($flag == 1)
		$events = $et->getEventsCreatedByUser($uid);
	else if ($flag == 2)
		$events = $et->getEventsJoinedByUser($uid);
	else // if ($flag == 3)
		$events = $rw->getReviewsByUser($uid);

?>


<div>
	<?php 
		foreach ($events as $event) {
	?>
		 <!-- this is the tox for 1 event, write a while loop to show all the events with this item-->
	   <div class="item">
	   		<div class="item-name"><?php echo $event['title']; ?></div>
	   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
	   		<div class="item-infomation">
	   			<h2>Date:</h2><?php echo $event['eDate']; ?><br>
	   			<h2>Venue:</h2><?php echo $event['venue']; ?><br>
	   			<h2>Description:</h2><?php echo $event['eDescription']; ?><br>
	   		</div>
	   		<div align="right">
	   		<div class="button" onclick="loadEvent(<?php echo $event['eid'].','.$uid; ?>)">More Infomation</div></div>
	   </div>

	<?php
		}
	?>
	   <!--end 1 event-->
</div>