<?php

	require_once("EventClass.php");
	require_once("ReviewClass.php");
	$et = new Event();
	$rw = new Review();

	// flag 1 is to show created event
	if ($flag == 1)
		$events = $et->getEventsCreatedByUser($auid);
	// flag 2 is to show joined event
	else if ($flag == 2)
		$events = $et->getEventsJoinedByUser($auid);
	// flag 3 is to show created review
	else // if ($flag == 3)
		$events = $rw->getReviewsByUser($auid);

?>


<div>
	<?php
	// if empty, show prompt message
	if(empty($events)) { 
		if($flag == 1 || $flag == 2) {
	?>
			<div align="center"><p><h2>No event now</h2></p></div>
	<?php } else { ?>
			<div align="center"><p><h2>No review now</h2></p></div>

	<?php 
			}
		}else{
			foreach ($events as $event) {
	?>
		 <!-- use a foreach loop to show all the events-->
	   <div class="item">
	   		<div class="item-name"><?php echo $event['title']; ?></div>
	   		<div class="item-picture"><img class="item-picture" src="<?php echo $event['ePhoto']; ?>"></div>
	   		<div class="item-infomation">
	   			<h2>Date:</h2><?php echo $event['eDate']; ?><br>
	   			<h2>Venue:</h2><?php echo $event['venue']; ?><br>
	   			<h2>Description:</h2><?php echo $event['eDescription']; ?><br>
	   		</div>
	   		<div align="right">
	   		<?php 
	   			if($flag < 3){
	   		?>
	   				<div class="button" onclick="loadEvent(<?php echo $event['eid'].','.$uid; ?>)">More Infomation</div></div>
	   		<?php
	   			}
	   			else{
	   		?>
	   				<div class="button" onclick="loadReview(<?php echo $event['pid'].','.$uid; ?>)">More Infomation</div></div>
	   		<?php
	   			}
			?>
	   </div>

	<?php
		}}
	?>
	   <!--end 1 event-->
</div>