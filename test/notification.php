
<?php
	require_once('NotiClass.php');

   	$notification = new Notification();

	$commentNoti = $notification->getCommentNoti($uid);
	$cno = mysqli_num_rows($commentNoti);

	$mentionNoti = $notification->getMentionNoti($uid);
	$mno = mysqli_num_rows($mentionNoti);

	$followNoti = $notification->getFollowNoti($uid);
	$fno = mysqli_num_rows($followNoti);

	$joinNoti = $notification->getJoinNoti($uid);
	$jno = mysqli_num_rows($joinNoti);

	// $chatNoti = $notification->getChatNoti($uid);
	// $rno = mysqli_num_rows($chatNoti);
?>

		<!--while loop to list all comment-->
<?php 

	if($cno != 0) {
?>
		<div><h2>Comment:</br></h2></div>
<?php
		foreach($commentNoti as $noti){ 
?>
		<div class="commentcontainer" type="button" onclick="loadEvent(<?php echo $noti['eid']; ?>)">
			<div class="commentcontent">
			<!-- 	<img src="images/cuhk.jpg"><br> -->
				<?php echo $noti['nickname']." commented on your event ".$noti['title']; ?>
			</div>
			<div class="commentinfo">
			<?php echo $noti['time']; ?>
			</div>
		</div>
<?php 
		}
	} 
?>

<?php 

	if($mno != 0) {
?>
		<div><h2>Mention:</br></h2></div>
<?php
		foreach($mentionNoti as $noti){ 
?>
		<div class="commentcontainer" type="button" onclick="loadEvent(<?php echo $noti['eid']; ?>)">
			<div class="commentcontent">
			<!-- 	<img src="images/cuhk.jpg"><br> -->
				<?php echo $noti['nickname']." mentioned you on event ".$noti['title']; ?>
			</div>
			<div class="commentinfo">
			<?php echo $noti['time']; ?>
			</div>
		</div>
<?php 
		}
	} 
?>

<?php 

	if($fno != 0) {
?>
		<div><h2>Follow:</br></h2></div>
<?php
		foreach($followNoti as $noti){ 
?>
		<div class="commentcontainer">
			<div class="commentcontent">
			<!-- 	<img src="images/cuhk.jpg"><br> -->
				<?php echo $noti['nickname']." followed you"; ?>
			</div>
			<div class="commentinfo">
			<?php echo $noti['time']; ?>
			</div>
		</div>
<?php 
		}
	} 
?>

<?php 

	if($jno != 0) {
?>
		<div><h2>Participate:</br></h2></div>
<?php
		foreach($joinNoti as $noti){ 
?>
		<div class="commentcontainer" type="button" onclick="loadEvent(<?php echo $noti['eid']; ?>)">
			<div class="commentcontent">
			<!-- 	<img src="images/cuhk.jpg"><br> -->
				<?php echo $noti['nickname']." participated in your event ".$noti['title']; ?>
			</div>
			<div class="commentinfo">
			<?php echo $noti['time']; ?>
			</div>
		</div>
<?php 
		}
	} 
?>