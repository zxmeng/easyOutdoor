<?php 
require_once('EventClass.php'); 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<div class="masonry">	
	<div class="item">
		<div class="item-name">
		Hong Kong<br>Weather Forecast
		</div>
		<div class="item-picture">
		<p style="display: block !important; width: 250px; text-align: center; font-family: sans-serif; font-size: 12px;">
		<a title="Hong Kong, Hong Kong Weather Forecast" onclick="this.target='_blank'">
		<img src="http://widget.addgadgets.com/weather/v1/?q=Hong+Kong,Hong+Kong&amp;s=1&amp;u=1" 
		alt="Weather temperature in Hong Kong, Hong Kong" width="80%" height="100%" style="border:0" />
		</a><br /></p></div>
<!-- 		<a href="http://weathertemperature.com/" title="Get latest Weather Forecast updates"
		 style="font-family: sans-serif; font-size: 12px" onclick="this.target='_blank'">
		Weather Forecast</a></p> -->
		<div align="right">
   			<div class="button" type="button" onclick="window.open('http://weathertemperature.com/')">
   				More about weather in Hong Kong...
   			</div>
   		</div>
	</div>			
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
   			<img class="item-picture" src="<?php echo $event['ePhoto']; ?>" alt="file not found">
   		</div>

   		<div class="item-infomation">
   			<h2>Date:</h2> <?php echo $event['eDate']; ?><br/>
   			<!-- <h2>Time:</h2><?php echo $event['lastEditTime']; ?><br/> -->
   			<h2>Venue:</h2><?php echo $event['venue']; ?><br/>
   			<h2>Description:</h2><?php echo $event['eDescription']; ?><br/>
            <div align="right">
            <?php echo $event['likeNo']; ?> Like<br>
            <?php echo $event['parNo'];if($event['parNo'] < 2) { ?>  Participant<?php }else{ ?>  Participants<?php } ?>
            </div>
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