
<?php
	require_once('NotiClass.php');

	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

   	$notification = new Notification();
 	$uid = $_SESSION['id'];

	$commentNoti = $notification->getCommentNoti($uid);
	$cno = mysqli_num_rows($commentNoti);

	$mentionNoti = $notification->getMentionNoti($uid);
	$mno = mysqli_num_rows($mentionNoti);

	$followNoti = $notification->getFollowNoti($uid);
	$fno = mysqli_num_rows($followNoti);

	$joinNoti = $notification->getJoinNoti($uid);
	$jno = mysqli_num_rows($joinNoti);

?>

<!--while loop to list all comment-->
<div>


<?php 
	if(($cno+$mno+$fno+$jno)==0){
?>
	<div class="notification-header">No new notification</div>

<?php	
	}
	else{

?>
	<div class="notification-header">Notification
	<div class="notification-header"></div>
<?php
		if($cno != 0) {
	?>
			<!-- <div class="notification-header">Comment</div> -->
	<?php
			foreach($commentNoti as $noti){ 
	?>

				<div class="notification" type="button" onclick="loadEvent(<?php echo $noti['eid'].','.$uid; ?>)">
					<div class="commentcontent">
						<?php echo $noti['nickname']." commented on your event ".$noti['title']; ?>
					</div>
					<div class="commentinfo">
					<?php echo $noti['time']; ?>
					</div>
				</div>
	<?php 
			}
	?>
			<!-- </div> -->
	<?php
		} 
	?>
	<?php 
		if($mno != 0) {
	?>
			<!-- <div class="notification-header">Mention</div> -->
	<?php
			foreach($mentionNoti as $noti){ 
	?>

				<div class="notification" type="button" onclick="loadEvent(<?php echo $noti['eid'].','.$uid; ?>)">
					<div class="commentcontent">
						<?php echo $noti['nickname']." mentioned you on event ".$noti['title']; ?>
					</div>
					<div class="commentinfo">
					<?php echo $noti['time']; ?>
					</div>
				</div>
	<?php 
			}
	?>
			<!-- </div> -->
	<?php
		} 
	?>

	<?php 

		if($fno != 0) {
	?>
			<!-- <div class="notification-header">Follow</div> -->
	<?php
			foreach($followNoti as $noti){ 
	?>
				<div class="notification">
					<div class="commentcontent" type="button" onclick="loadPersonalHomepage(<?php echo $uid.', '.$noti['uid']; ?>)">
						<?php echo $noti['nickname']." followed you"; ?>
					</div>
					<div class="commentinfo">
					<?php echo $noti['time']; ?>
					</div>
				</div>
	<?php 
			}
	?>
			<!-- </div> -->
	<?php
		} 
	?>

	<?php 

		if($jno != 0) {
	?>
			<!-- <div class="notification-header">Participate</div> -->
	<?php
			foreach($joinNoti as $noti){ 
	?>

			<div class="notification" type="button" onclick="loadEvent(<?php echo $noti['eid'].','.$uid; ?>)">
				<div class="commentcontent">
					<?php echo $noti['nickname']." participated in your event ".$noti['title']; ?>
				</div>
				<div class="commentinfo">
				<?php echo $noti['time']; ?>
				</div>
			</div>
	<?php 
			}
	?>
			<!-- </div> -->
	<?php
		} 
	}
?>
	</div>
</div>

