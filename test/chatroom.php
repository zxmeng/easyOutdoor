<?php
	require_once('messageClass.php');
	require_once('EventClass.php');
    $event = new Event();

    $jStatus = $event->checkJoin($eid, $uid);

    if ($jStatus > 0){
    $eInfo = $event->getEvent($eid); 
?>

<div>
	<div class="chatroomheader">
		<h2 align="center">ChatRoom For Event - <font color='#58ACFA'> <?php echo $eInfo['title']; ?> </font></h2>
	</div>
	<div class="chatmain">
			<!-- ##### need to limit the heigh of this div!!!!! -->
			<div id="messageViewer" class="message"></div>
			<div class="parti">
			<h2 align="center">Participants:</h2>
				<?php 
					$users = $event->getParticipants($eid);
					$event->db->close();
					foreach($users as $user){ 
				?>
					<!--each participant-->
					<div class="chatmessage">
						<div class="chatheader">
							<img src="<?php echo $user['uPhoto']; ?>" alt="file not found"><br>
						</div>
						<div class="chatname">
							<p><?php echo $user['nickname']; ?></p>
						</div>
					</div>
					<!--end message-->
				<?php } ?>
			</div>
	</div>
	<style type="text/css">
		.tg  {border-collapse:collapse;border-spacing:0;border-radius: 10px;vertical-align: middle;}
		.tg td{overflow:hidden;vertical-align: middle;}
		.tg th{overflow:hidden;vertical-align: middle;}
	</style>
	<table class="tg" style="width:98%;margin:10px auto 10px auto;">
	<tr>
		<th class="tg-031e">
		<textarea id="sendBox" onkeydown="javascript:buttonOnClick();" 
		name="comment" rows="5" cols="40" style="width:100%;height:100%;"></textarea>
		</th>
		<th class="tg-031e"><input type="submit" id="subbutton" name="submit" 
		value="Send" style="width:100%;height:100%;" onclick="sendMessage(<?php echo $uid.', '.$eid; ?>)"> 
		</th>
	</tr>
	</table>
</div>

<?php }else{ ?>
<div>
	<div class="chatmain">Error: you have not join this event.</div>
</div>
<?php } ?>