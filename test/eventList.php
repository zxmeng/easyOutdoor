<?php require_once('EventClass.php'); ?>

<div align="center" style="margin:1em 0 1em 0;">
	<div class="mode-button">
		<div class="button" type="button" id="all" onclick="loadAllEvent()">
		ALL
		</div> 
		| 
		<div class="button" type="button" id="calendar" onclick="loadCalendar()">
		CALENDER
		</div>
		| 
		<div class="button" type="button" id="map" onclick="loadMap()">
		MAP
		</div>
		| 	
		<div class="button" type="button" id="recommendation" onclick="loadRecommendation()">
		RECOMMENDATION
		</div>
	</div>
</div>

<div class="masonry">				
	<?php
		$event = new Event();
		$events = $event->getAllEvents();
		$event->db->close();
		foreach($events as $event){ 
	?>
   <!--翔 this is the tox for 1 event, write a while loop to show all the events with this item-->
   <div class="item">
   		<div class="item-name">
   			<?php echo $event['title'] ?>
   		</div>

   		<div class="item-picture">
   			<img class="item-picture" src="<?php echo BASE_URL; ?><?php echo $event['ePhoto']; ?>" alt="file not found">
   		</div>

   		<div class="item-infomation">
   			<h2>Date:</h2> <?php echo $event['eDate']; ?><br/>
   			<!-- <h2>Time:</h2><?php echo $event['lastEditTime']; ?><br/> -->
   			<h2>Venue:</h2><?php echo $event['venue']; ?><br/>
   			<h2>Description:</h2><?php echo $event['eDescription']; ?><br/>
   		</div>

   		<div align="right">
   			<div class="button" type="button" onclick="loadEvent( <?php echo $event['eid'].', '.$event['uid']; ?> )">
   				More Infomation
   			</div>
   		</div>		   		
   </div>
   <!--end 1 event--> 
   <?php } ?>

</div>