<?php 
require_once('EventClass.php'); 
require_once('CommentClass.php');
?>


<?php 
   $event = new Event();
   $eInfo = $event->getEvent($eid); 
   $commentList = new Comment();
   $comments = $commentList->getComments($eid);
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
		<img src="<?php echo $user['uPhoto']; ?>" alt="file not found">
	</div>
	 <?php } ?>
</div>

<hr>
<div class="eventcomment">
	<!--while loop to list all comment-->
	<!-- ##### lack profile UI ##### -->
	<div class="commentcontainer">
		<h2>Comments</h2>
		<?php
			if(empty($comments)){ ?>
			<div class="commentheader">No comment now</div>
		<?php } else {
			foreach($comments as $comment){ 
		?>
		<div class="commentcontent">
			<?php echo $comment['content']; ?><br/>
		</div>
		<div class="commentinfo">
			<!-- <img src="images/cuhk-test.jpg"><br> -->
			<?php echo $comment['nickname'] ?> <?php echo $comment['time'] ?>
		</div>
		<?php if($comment['ruid'] != 0) { ?>
   			<div class="commentinfo">
   				mentioned: <?php echo $commentList->getUserName($comment['ruid']); ?><br/>
   			</div>
   		<?php } ?>
   		<hr>
		<?php }} ?>
	</div>
	<!--endwhile-->

	<div class="writecomment">
		<form method="" action="">
		   <textarea id="commentBox" name="comment" rows="5" cols="40"></textarea>
		   </br>
		   <input id="atButton" type="button" style="padding:right" name="submit" 
		   value="@" onclick="showFriendList(<?php echo $uid ?>)">
		   <input id="subbutton" type="button" style="padding:right" name="submit" 
		   value="Submit" onclick="sendComment(<?php echo $eid.', '.$uid; ?>)"> 
		   <div id="friendList"><div>
		</form>
	</div>
</div>
