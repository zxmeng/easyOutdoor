<?php 
   require_once('EventClass.php');
   require_once('ReviewClass.php');

   if (session_status() == PHP_SESSION_NONE) {
      session_start();
   }

         echo $district;

   if($flag == "event"){
      $et = new Event();
      $events = $et->getEventsByDistrict($district);
      $et->db->close();

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
<?php 
      } 

   }

   else if($flag == 'review'){
      echo $district;

      $re = new Review();
      $reviews = $re->getReviewsByDistrict($district);
      $re->db->close();

      foreach($reviews as $review){
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
            </div>               
      </div>
<?php         
      }

   }
?>

   	

