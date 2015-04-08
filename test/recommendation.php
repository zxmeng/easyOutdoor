<?php require_once('EventClass.php'); ?>

<div>
   <div class="item">
      <div align="center" class="item-name">Hong Kong Sai Kung Hebe Haven</div>
      <div align="center" >
      <video class="rv" controls> <source src="video/SaiKungHebeHaven.mp4" type="video/mp4"></video>
      </div>
   </div>

   <div class="item">
      <div align="center" class="item-name">Tai Po Swimming Surfing</div>
      <div align="center" >
      <video class="rv" controls> <source src="video/TaiPoSwimmingSurfing.mp4" type="video/mp4"></video>
      </div>
   </div>

	<?php
		$event = new Event();
		$events = $event->getRecommendation();
		$event->db->close();
		foreach($events as $event){ 
	?>
   <!--翔 this is the tox for 1 event, write a while loop to show all the events with this item-->
   <div class="item">
   		<div class="item-name">
   			<?php echo $event['title'] ?>
   		</div>

   		<div class="item-picture">
   			<img class="item-picture" src="<?php echo BASE_URL; ?><?php echo $event['ePhoto']; ?>">
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