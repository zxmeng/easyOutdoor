<?php 
require_once('EventClass.php'); 

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

?>

<!-- this is the event list page, i.e. the home page -->
<div class="masonry">	
	<div class="item">
      <!-- the weather API -->
		<div align="center" class="item-name">
		Hong Kong<br>Weather Forecast
		</div>
		<div class="item-picture"><p>
		<p style="display: block !important; width: 250px; text-align: center; font-family: sans-serif; font-size: 12px;">
		<a title="Hong Kong, Hong Kong Weather Forecast" onclick="this.target='_blank'">

		    <div align="center">
            <img src="http://widget.addgadgets.com/weather/v1/?q=Hong+Kong,Hong+Kong&amp;s=1&amp;u=1" 
		    alt="Weather temperature in Hong Kong, Hong Kong" width="80%" style="border:0" align="center" /></div> 

		</a><br/></p></p></div>
		<div class="button" type="button" onclick="window.open('http://weathertemperature.com/')">
			More about weather in Hong Kong...
		</div>

	</div>			
	<?php
		$event = new Event();
		$events = $event->getAllEvents();
		$event->db->close();
		foreach($events as $event){ 
	?>

   <!-- use a while loop to show first 8 ongoing events-->
   <div class="item">
   		<div class="item-name" onclick="loadEvent( <?php echo $event['eid'].', '.$_SESSION['id']; ?> )">
   			<?php echo $event['title'] ?>
   		</div>

   		<div class="item-picture">
   			<img class="item-picture" onclick="loadEvent( <?php echo $event['eid'].', '.$_SESSION['id']; ?> )"src="<?php echo $event['ePhoto']; ?>" alt="file not found">
   		</div>

   		<div class="item-infomation">
   			<h2>Date:</h2> <?php echo $event['eDate']; ?><br/>
   			<h2>Venue:</h2><?php echo $event['venue']; ?><br/>
   			<h2>Description:</h2><?php echo $event['eDescription']; ?><br/>
            <div align="right">
            <br>
            <?php echo $event['likeNo']; if($event['likeNo'] < 2) { ?>  Like<?php }else{ ?>  Likes<?php } ?><br>
            <?php echo $event['parNo']; if($event['parNo'] < 2) { ?>  Participant<?php }else{ ?>  Participants<?php } ?>
            </div>
   		</div>

   		<div align="center">
         <br>
   			<div class="button" type="button" onclick="loadEvent( <?php echo $event['eid'].', '.$_SESSION['id']; ?> )">
   				More Infomation
   			</div>
            <!-- click tihs button will display the event detail -->
   		</div>		   		
   </div>
   <?php } ?>

</div>