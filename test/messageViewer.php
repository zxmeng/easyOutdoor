<?php
	require_once('DBClass.php');
	require_once('messageClass.php');

	// we get $uid and $rid from the page
	$messageList = new Message();
	$messages = $messageList->getAllMessages($eid);

?>

<div>
	<?php
		foreach($messages as $message){ 
	?>
		<!--each message-->
		<div class="chatmessage">
			<div class="chatheader">
				<img src="<?php echo $message['uPhoto']; ?>"><br>
			</div>
			<div class="chatcontent">
				<p>
				<?php if ($message['uid'] != $uid) { ?>
					<font color='#58ACFA'><?php echo $message['nickname']; ?></font>
				<?php }else{ ?>
					<font color='#81F79F'><?php echo $message['nickname']; ?></font>
				<?php } ?>
				<?php echo $message['time']; ?> <br>
				<?php echo $message['content']; ?>
				</p>
			</div>
		</div>
		<!--end message-->
	<?php } ?>
</div>