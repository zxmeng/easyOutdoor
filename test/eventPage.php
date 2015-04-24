<?php 
	require_once('EventClass.php'); 
	require_once('CommentClass.php');

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	// Create a new event object and get the detailed information
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
	<img src="images/cuhk.jpg">
</div>

<div class="eventinfo" style="margin:10px 0 0 0;">
	<div class="eventdetail" style="display:inline">
		<h2><?php echo $eInfo['title']; ?></h2>
		<h4><?php echo $eInfo['eDate']; ?> <?php echo $eInfo['venue']; ?></h4>
		<br>
		<div style="overflow:hidden;margin-left:10%;">
			<h3>Description:</h3>
		<h4><?php echo $eInfo['eDescription']; ?></h4>
		</div>

	</div>

	<?php
		$map_url = $eInfo['venue'];
		$map_url = str_replace(" ", "+", $map_url);
	?>
	<div class="eventmap">
	<iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"  src="http://maps.google.nl/maps?q=<?=$map_url?>&hl=nl&ie=UTF8&t=v&hnear=<?=$map_url?>&z=13&amp;output=embed"></iframe>
	</div>

</div>

<div class="eb">
	<div>
		<!--button-->
		<div style="margin:1em 0 0 0;bottom:0px;">
			<div class="mode-button" >
				<div class="btn-group" role="group" aria-label="...">
		<?php 
			if (isset($_SESSION["logged"])){
				if($isOwner) {?>
					<button class="btn btn-default" id="edit" type="button" name="submit" value="Edit" onclick="clickEdit(<?php echo $eid.','.$uid; ?>)">Edit</button>
			<?php 
				} else{
			?>
					<button class="btn btn-default" id="like" type="button" name="submit" 
					value="<?php 
								if($isLike == 0){
									echo "Like";
								}
								else {
									echo "Unlike";
								}
							?>" 
					onclick="clickLike(<?php echo $eid.', '.$uid; ?>)">
					<?php 
						if($isLike == 0){
							echo "Like";
						}
						else {
							echo "Unlike";
						}
					?>
					</button>

					<button class="btn btn-default" id="join" type="button" name="submit" 
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
						if($isPar == 0){
							echo "Join";
						}
						else {
							echo "Unjoin";
						}
					?>
					</button>
			<?php 				
				} 
			?>
			<?php
				if($isOwner || $isPar){
			?>	
				<button class="btn btn-default" id="chatroom" type="button" name="submit" value="Chatroom" onclick="clickChatroom(<?php echo $eid.','.$uid; ?>)">Chatroom</button>
			<?php
				}
			}
		?>
				</div>
			</div>
		</div>
	<!--end buttom-->
	</div>
</div>
<hr>
<div class="eventparticipant">
	<h4>Who Joined in This Event?</br></h4>

	<?php 
		$users = $event->getParticipants($eid);
		$event->db->close();
		foreach($users as $user){ 
	?>
<!--while loop to list every participant (limit to 9) -->
	<div class="participantcontainer"  type="button" onclick="loadPersonalHomepage(<?php echo $uid.','.$user['uid']; ?>)">
		<img src="<?php echo $user['uPhoto']; ?>" alt="file not found">
	</div>
	 <?php } ?>
</div>


<!-- Comment area -->
<hr>
<div class="eventcomment">
	<h2>Comments   <button class="btn btn-default btn-circle btn"id="refreshComment" type="button" value="refresh" onclick="refreshComment(<?php echo $uid.','.$eid; ?>)"><i class="glyphicon glyphicon-refresh"></i></button></h2>
	<div id="commentList">
		<!--foreach loop to list all comment-->
		<?php
			$cNums = mysqli_num_rows($comments); // Get the number of comments

			if($cNums == 0){ ?>
			<!-- If there is no comment now, show a prompt message -->
				<div><h2>No comment now</br></h2></div>
		<?php
			} else {
			// else, there are some comments, foreach loop to list all comment
			foreach($comments as $comment){ 
		?>
			<!-- every commentcontainer contains a comment -->
			<div class="commentcontainer">
				<!-- comment header contains user photo and nickname -->
				<div class="commentheader" type="button" onclick="loadPersonalHomepage(<?php echo $uid.','.$comment['suid']; ?>)">
					<img src="<?php echo $comment['uPhoto']; ?>"><br>
					<h5><?php echo $comment['nickname'] ?><h5>
				</div>
				<div class="commentcontent">
					<h3 style="line-height: 40px;"><?php echo $comment['content']; ?></H3>
				</div>
				<!-- comment time and mention information -->
				<div class="commentinfo" style="margin-left:70px;">
					<h6>
					<?php echo $comment['time'] ?>   <?php if($comment['ruid'] != 0) { ?>mentioned: <?php echo $commentList->getUserName($comment['ruid']); } ?>
		   			<br></h6>
		   		</div>
			</div>
		<?php }} ?>
		<!--end loop and else-->
	</div>
	
	<hr>
<?php
	// Only after login the user will be able to write a comment
	if (isset($_SESSION["logged"])){
?>
	<div class="writecomment">
		<style type="text/css">
		.tg  {border-collapse:collapse;border-spacing:0;border-radius: 10px;vertical-align: middle;}
		.tg td{overflow:hidden;vertical-align: middle;}
		.tg th{vertical-align: middle;}
		</style>
		<table class="tg" style="width:98%;margin:10px auto 10px auto;"><tr>
			<th class="tg-031e" style="width:100%;">
				<br>
				<textarea id="commentBox" name="comment" rows="5" cols="50" placeholder="I'd like to say..."></textarea>
				<br>
				<input type="button" value="@"
				 onclick="showFriendList(<?php echo $uid; ?>)"> 
				<input type="button" value="submit"
				 onclick="sendComment(<?php echo $eid.', '.$uid; ?>)"> 
				<div id="friendList" type="button"></div>
			</th>
		</tr></table>
	</div>	
<?php 
	} 
?>
</div>