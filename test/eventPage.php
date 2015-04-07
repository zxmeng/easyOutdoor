<?php 
require_once('EventClass.php'); 
require_once('CommentClass.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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

<div class="eventinfo" style="margin:10px 0 0 0;">
	<div class="eventdetail" style="display:inline">
		<h2>Title: <?php echo $eInfo['title']; ?></h2>
		<h4>Date: <?php echo $eInfo['eDate']; ?></h4>
		<h4>Venue: <?php echo $eInfo['venue']; ?></h4>
		<h4>Description: </h4>
			<div style="margin-left:10%;overflow:hidden;">
 				<h4><?php echo $eInfo['eDescription']; ?></h4>
			</div>

	</div>
	<div class="eventmap" style="display:inline">
		map api;;;
	</div>
	
	
</div>
				<!--button-->
	<div style="margin:1em 0 1em 0;bottom:0px;">
		<div class="mode-button">
			<div class="btn-group" role="group" aria-label="...">
	<?php 
		if (isset($_SESSION["logged"])){
			if($isOwner) {?>
				<button class="btn btn-default" id="edit" type="submit" name="submit" value="Edit" onclick="clickEdit(<?php echo $eid.','.$uid; ?>)">Edit</button>
				<!--<input id="edit" type="submit" name="submit" value="Edit" onclick="clickEdit(<?php echo $eid.','.$uid; ?>)"> -->
		<?php 
			} else{
		?>
				<button class="btn btn-default" id="like" type="buttom" name="submit" 
				value="<?php 
							if($isLike == 0){
								echo "Like";
							}
							else {
								echo "Unlike";
							}
						?>" 
				onclick="clickLike(<?php echo $eid.', '.$uid; ?>)"><?php 
							if($isLike == 0){
								echo "Like";
							}
							else {
								echo "Unlike";
							}
						?></button>

				<!--<input id="like" type="submit" name="submit" 
				value="<?php 
							if($isLike == 0){
								echo "Like";
							}
							else {
								echo "Unlike";
							}
						?>" 
				onclick="clickLike(<?php echo $eid.', '.$uid; ?>)">-->
				<button class="btn btn-default" id="join" type="submit" name="submit" 
				value="<?php 
							if($isPar == 0){
								echo "Join";
							}
							else {
								echo "Unjoin";
							}
						?>"  
				onclick="clickJoin(<?php echo $eid.', '.$uid; ?>)"><?php 
							if($isPar == 0){
								echo "Join";
							}
							else {
								echo "Unjoin";
							}
						?></button>
				<!--
				<input id="join" type="submit" name="submit" 
				value="<?php 
							if($isPar == 0){
								echo "Join";
							}
							else {
								echo "Unjoin";
							}
						?>"  
				onclick="clickJoin(<?php echo $eid.', '.$uid; ?>)">-->
		<?php 				
			} 
		?>
		<?php
			if($isOwner || $isPar){
		?>	
			<button class="btn btn-default" id="chatroom" type="submit" name="submit" value="Chatroom" onclick="clickChatroom(<?php echo $eid.','.$uid; ?>)">Chatroom</button>
			<!--<input id="chatroom" type="submit" name="submit" value="Chatroom" onclick="clickChatroom(<?php echo $eid.','.$uid; ?>)">-->
		<?php
			}
		}
	?>
			</div>
		</div>
	</div>
	<!--end buttom-->

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
	<div class="participantcontainer"  type="button" onclick="loadPersonalHomepage(<?php echo $uid.','.$user['uid']; ?>)">
		<img src="<?php echo $user['uPhoto']; ?>" alt="file not found">
	</div>
	 <?php } ?>
</div>

<hr>
<div class="eventcomment">
	<h2>Comments   <button class="btn btn-default btn-circle btn"id="refreshComment" type="button" value="refresh" onclick="refreshComment(<?php echo $eid ?>)"><i class="glyphicon glyphicon-refresh"></i></button></h2>
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
					<div class="commentheader" type="button" onclick="loadPersonalHomepage(<?php echo $uid.','.$comment['suid']; ?>)">
						<img src="<?php echo $comment['uPhoto']; ?>"><br>
						<h5><?php echo $comment['nickname'] ?><h5>
					</div>
					<div class="commentcontent">
						<h3 style="line-height: 40px;"><?php echo $comment['content']; ?></H3>
					</div>
					<div class="commentinfo" style="margin-left:70px;">
						<h6>
						<?php echo $comment['time'] ?>   <?php if($comment['ruid'] != 0) { ?>mentioned: <?php echo $commentList->getUserName($comment['ruid']); } ?>
			   			<br></h6>
			   		</div>
				</div>
			<?php }} ?>
		<!--endwhile-->
	</div>
	
	<hr>
<?php
	if (isset($_SESSION["logged"])){
?>
	<div class="writecomment">
		<style type="text/css">
		.tg  {border-collapse:collapse;border-spacing:0;border-radius: 10px;vertical-align: middle;}
		.tg td{overflow:hidden;vertical-align: middle;}
		.tg th{vertical-align: middle;}
		</style>
	<table class="tg" style="width:98%;margin:10px auto 10px auto;">
	<tr>
		<th class="tg-031e" style="width:100%;">
			<h3>I'd like to say...</h3>
			<textarea id="commentBox" name="comment" rows="5" cols="50"></textarea>
			</br>
			<input type="button" value="submit"
			 onclick="sendComment(<?php echo $eid.', '.$uid; ?>)"> 
			<input type="button" value="@"
			 onclick="showFriendList(<?php echo $uid; ?>)"> 
			<div id="friendList" type="button"></div>
		</th>
	</tr>
	
	</table>		
<?php 
	} 
?>