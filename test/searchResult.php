<?php 
require_once('EventClass.php');
$event = new Event();
$events = $event->getEventsByDate($data);
// $event->db->close();
echo "here";
?>

<div>
   <?php
   	foreach($events as $event){
   ?>
   <div class="item">
   		<div class="item-name">
   			<?php echo $event['title'] ?>
   		</div>

   		<div class="item-picture">
   			<img class="item-picture" src="<?php echo $event['ePhoto']; ?>" alt="file not found">
   		</div>

   		<div class="item-infomation">
   			<h2>Date:</h2> <?php echo $event['eDate']; ?><br/>
   			<!-- <h2>Time:</h2><?php echo $event['lastEditTime']; ?><br/> -->
   			<h2>Venue:</h2><?php echo $event['venue']; ?><br/>
   			<h2>Description:</h2><?php echo $event['eDescription']; ?><br/>
   		</div>

   		<div align="right">
   			<div class="button" type="button" onclick="loadEvent( <?php echo $event['eid'].', '.$_SESSION['id']; ?> )">
   				More Infomation
   			</div>
   		</div>		   		
   </div>
   <!--end 1 event--> 
   <?php } ?>
</div>
