<?php
	require_once('messageClass.php');
	require_once('EventClass.php');
    $event = new Event();

    $eInfo = $event->getEvent($eid); 
    $jStatus = $event->checkJoin($eid, $uid);
    
    if (($jStatus > 0) || ($uid == $eInfo['uid'])) {
    
?>

<div>
	<div class="chatroomheader">
		<h2 align="center">ChatRoom For Event - <font color='#58ACFA'> <?php echo $eInfo['title']; ?> </font></h2>
	</div>
	<div class="chatmain">
			<!-- ##### need to limit the heigh of this div!!!!! -->
			
			<div id="messageViewer" class="message"></div>
			
			<div class="parti">
				<div>
				<h2 align="center">Owner</h2>
					<?php
						$owner = $event->getOwner($eid);
					?>
					<!-- owner -->
					<div class="chatmessage"  type="button" onclick="loadPersonalHomepage(<?php echo $uid.','.$owner['uid']; ?>)">
						<div class="chatheader">
							<img src="<?php echo $owner['uPhoto']; ?>" alt="file not found"><br>
						</div>
						<div class="chatname">
							<?php echo $owner['nickname']; ?>
						</div>
					</div>
					<!-- owner -->
				</div>
			<h2 align="center">Participants</h2>
				<?php 
					$users = $event->getParticipants($eid);
					$event->db->close();
					foreach($users as $user){ 
				?>
					<!--each participant-->
					<div class="chatmessage" type="button" onclick="loadPersonalHomepage(<?php echo $uid.','.$user['uid']; ?>)">
						<div class="chatheader">
							<img src="<?php echo $user['uPhoto']; ?>" alt="file not found"><br>
						</div>
						<div class="chatname">
							<?php echo $user['nickname']; ?>
						</div>
					</div>
					<!--end participant-->
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

