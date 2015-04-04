<?php require_once('EventClass.php'); ?>


<?php 
   $event = new event();
   $eInfo = $event->getEvent($eid); 
?>

<div class="bannercontainer">
	<img src="images/background.png">
</div>

<div class="eventinfo">
	<div class="eventdetail" style="display:inline">
		<h2>Title: <?php echo $eInfo['title']; ?></h2>
		<h4>Date: <?php echo $eInfo['eDate']; ?></h4>
		<h4>Venue: <?php echo $eInfo['venue']; ?></h4>
		<h4>Description: <?php echo $eInfo['eDescription']; ?></h4>
	</div>
	<div class="eventmap" style="display:inline">
		map api;;;
	</div>
	<!--button-->
	<div class="eventbuttons" style="padding:right">
<p><?php echo "uid is: ".$uid; echo "eid is: ".$eid; ?></p>
	<?php if($uid == $eInfo['uid']) {?>
			<input id="edit" type="submit" name="submit" value="Edit" onclick="clickEdit(<?php echo $eid.','.$uid; ?>)"> 
	<?php 
		} else{
	?>
			<input id="like" type="submit" name="submit" 
			value="<?php 
						if($event->checkLike($eid, $uid) < 1){
							echo "Like";
						}
						else {
							echo "Unlike";
						}
					?>" 
			onclick="clickLike(<?php echo $eid.', '.$uid; ?>)">

			<input id="join" type="submit" name="submit" 
			value="<?php 
						if($event->checkJoin($eid, $uid) < 1){
							echo "Join";
						}
						else {
							echo "Unjoin";
						}
					?>"  
			onclick="clickJoin(<?php echo $eid.', '.$uid; ?>)">
	<?php 				
		} 
	?>
		</div>
</div><br>

<hr>
<div class="eventparticipant">
	<h4>Who Joint This Event?</br></h4>

	<?php 
		$users = $event->getParticipants($eid);
		$event->db->close();
		foreach($users as $user){ 
			//echo "<p> user is: ".$user['uid']."</p>";
	?>
<!--while loop to list every participant (limit to 9) -->
	<div class="participantcontainer">
		<img src="<?php echo $user['uPhoto']; ?>">
	</div>
	 <?php } ?>
</div>

<hr>
<div class="eventcomment">
	<!--while loop to list all comment-->
	<div class="commentcontainer">
		<div class="commentheader">
			<img src="images/cuhk.jpg"><br>
			USERNAME
		</div>
		<div class="commentcontent">
			Message!!!!!!!!!!!!
		</div>
		<div class="commentinfo">
			Date: 1/1/2015 Time: 11:11
		</div>
	</div>
	<!--endwhile-->
	<!-- <div class="writecomment">
		<form method="" action=""> 
		   
		   <h2>Comment:</h2><textarea name="comment" rows="5" cols="40"><?php //echo $comment;?></textarea>
		   </br>
		   <input type="submit" style="padding:right"name="submit" value="Submit"> 
		</form>
	<div> -->
</div>

