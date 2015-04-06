<?php 
require_once('EventClass.php'); 
require_once('CommentClass.php');
session_start();

?>


<?php 
	$event = new Event();
	$eInfo = $event->getEvent($eid); 

	$commentList = new Comment();
	$comments = $commentList->getComments($eid);

	$isOwner = 0;
	$isPar = 0;
	$isLike = 0;


	if($uid == $eInfo['uid']){
		$isOwner = 1;
	}
	else {
		if($event->checkLike($eid, $uid) > 0){
			$isLike = 1;
		}
		if($event->checkJoin($eid, $uid) > 0){
			$isPar = 1;
		}
	}
	
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

	<?php 
		if (isset($_SESSION["logged"])){
			if($isOwner) {?>
				<input id="edit" type="submit" name="submit" value="Edit" onclick="clickEdit(<?php echo $eid.','.$uid; ?>)"> 
		<?php 
			} else{
		?>
				<input id="like" type="submit" name="submit" 
				value="<?php 
							if($isLike == 0){
								echo "Like";
							}
							else {
								echo "Unlike";
							}
						?>" 
				onclick="clickLike(<?php echo $eid.', '.$uid; ?>)">

				<input id="join" type="submit" name="submit" 
				value="<?php 
							if($isPar == 0){
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
		<?php
			if($isOwner || $isPar){
		?>
			<input id="chatroom" type="submit" name="submit" value="Chatroom" onclick="clickChatroom(<?php echo $eid.','.$uid; ?>)">
		<?php
			}
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
	<h2>Comments</h2>
	<div id="commentList">
		<!--while loop to list all comment-->
		<?php
			$cNums = mysqli_num_rows($comments);
			if($cNums == 0){ ?>
				<div><h2>No comment now</br></h2></div>
		<?php } else {
			foreach($comments as $comment){ 
		?>
				<div class="commentcontainer">
					<div class="commentheader">
						<img src="images/cuhk.jpg"><br>
						<?php echo $comment['nickname'] ?>
					</div>
					<div class="commentcontent">
						<?php echo $comment['content']; ?>
					</div>
					<div class="commentinfo">
						<?php echo $comment['time'] ?>
					</div>
					<?php if($comment['ruid'] != 0) { ?>
			   			<div class="commentinfo">
			   				mentioned: <?php echo $commentList->getUserName($comment['ruid']); ?><br/>
			   			</div>
			   		<?php } ?>
				</div>
			<?php }} ?>
		<!--endwhile-->
	</div>
	<input id="refreshComment" type="button" value="refresh" onclick="refreshComment(<?php echo $eid ?>)">
	<hr>
<?php
	if (isset($_SESSION["logged"])){
?>
	<div class="writecomment">
		<form method="" action=""> 
		   <h3>I'd like to say...</h3>
		   <textarea id="commentBox" name="comment" rows="5" cols="40"></textarea>
		   </br>
		   <input id="atButton" type="button" style="padding:right" name="submit" 
		   value="@" onclick="showFriendList(<?php echo $uid ?>)">
		   <input id="subbutton" type="button" style="padding:right" name="submit" 
		   value="Submit" onclick="sendComment(<?php echo $eid.', '.$uid; ?>)"> 
		   <div id="friendList"><div>
		</form>
	<div>
<?php 
	} 
?>
</div>