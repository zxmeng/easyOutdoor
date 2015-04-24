<?php 
   require_once('EventClass.php');
   require_once('ReviewClass.php');

   if (session_status() == PHP_SESSION_NONE) {
      session_start();
   }

   if($flag == "event"){
      // display the related event records

      $et = new Event();
      $events = $et->getEventsByDistrict($district);
      $et->db->close();
      
      if(empty($events)) {
         // no related event records
?>
      <div align="center"><h2>No event in <?php echo $district; ?> now<br></h2></div>
<?php
      }
      else {
         foreach($events as $event){
            // use for loop to display every record
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
                  <h2>Venue:</h2><?php echo $event['venue']; ?><br/>
                  <h2>Description:</h2><?php echo $event['eDescription']; ?><br/>
               </div>

               <div align="right">
                  <div class="button" type="button" onclick="loadEvent( <?php echo $event['eid'].', '.$_SESSION['id']; ?> )">
                     More Infomation
                  </div>
                  <!-- click tihs button will display the event detail -->
               </div>               
         </div>
<?php 
         } 
      }

   }

   else if($flag == 'review'){
      // display the related review records

      $re = new Review();
      $reviews = $re->getReviewsByDistrict($district);
      $re->db->close();
      if(empty($reviews)) {
         // no related review records
?>
      <div align="center"><h2>No review in <?php echo $district; ?> now<br></h2></div>
<?php
      }
      else {
         foreach($reviews as $review){
            // use for loop to display every record
?>
         <div class="item">
               <div class="item-name">
                  <?php echo $review['title'] ?>
               </div>

               <div class="item-picture">
                  <img class="item-picture" src="<?php echo $review['ePhoto']; ?>" alt="file not found">
               </div>

               <div class="item-infomation">
                  <h2>Date:</h2> <?php echo $review['eDate']; ?><br/>
                  <!-- <h2>Time:</h2><?php echo $event['lastEditTime']; ?><br/> -->
                  <h2>Venue:</h2><?php echo $review['venue']; ?><br/>
                  <h2>Description:</h2><?php echo $review['eDescription']; ?><br/>
               </div>

               <div align="right">
                  <div class="button" type="button" onclick="loadReview( <?php echo $review['pid'].', '.$_SESSION['id']; ?> )">
                     More Infomation
                  </div>
                  <!-- click tihs button will display the review detail -->
               </div>               
         </div>
<?php         
         }
      }

   }
?>

   	

