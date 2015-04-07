<?php 
require_once('EventClass.php');

if (session_status() == PHP_SESSION_NONE) {
   session_start();
}

$et = new Event();

if($flag == "calendar"){
   $events = $et->getEventsByDate($data);
}
else if($flag == 'map'){
   $events = $et->getEventsByDistrict($data);
?>

   <div class="button" type="button" onclick="loadDistrictEvents('<?php echo $data; ?>')">Events</div>
   <div class="button" type="button" onclick="loadDistrictReviews('<?php echo $data; ?>')">Reviews</div>

<?php
}
$et->db->close();
// echo "here";
?>


<div class="masonry" id="searchResults">

   <?php if(empty($events)){ ?>
      <div align="center"><h2>No event in <?php echo $data; ?> now<br></h2></div>
   <?php
      } else {
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
   			<h2>Date:</h2> <?php echo $event['eDate']; ?><br>
   			<h2>Venue:</h2><?php echo $event['venue']; ?><br/>
   			<h2>Description:</h2><?php echo $event['eDescription']; ?><br>
   		</div>

   		<div align="right">
   			<div class="button" type="button" onclick="loadEvent( <?php echo $event['eid'].', '.$_SESSION['id']; ?> )">
   				More Infomation
   			</div>
   		</div>		   		
   </div>
   <!--end 1 event--> 
   <?php }} ?>
</div>
