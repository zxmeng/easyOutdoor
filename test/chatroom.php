<?php
	require_once('messageClass.php');
	require_once('EventClass.php');

    $event = new Event(); // Create a event object

    // Get the event information and check whether the current user has been joint it
    $eInfo = $event->getEvent($eid); 
    $jStatus = $event->checkJoin($eid, $uid);
    
    // If the current user has joint the current event
    // Or the current user is the owner of the current event
    if (($jStatus > 0) || ($uid == $eInfo['uid'])) {
?>

<div>
	<div class="chatroomheader">
		<!-- Show the event name in the chatroom head -->
		<h2 align="center">ChatRoom For Event - <font color='#58ACFA'> <?php echo $eInfo['title']; ?> </font></h2>
	</div>
	<div class="chatmain">

			<div id="messageViewer" class="message">
				<!-- innerHtml here will be changed by the js function viewMessage() -->
			</div>
			
			<div class="parti">
				<!-- show the owner and participants of the event and chatroom on the right -->
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
					// Use a foreach loop to show every participant
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
		<!-- sendbox, to get the user input -->
			<textarea id="sendBox" onkeydown="javascript:buttonOnClick();" 
			name="comment" rows="5" cols="40" style="width:100%;height:100%;">
			</textarea>
		</th>
		<!-- send button -->
		<th class="tg-031e">
			<input type="submit" id="subbutton" name="submit" value="Send" 
			style="width:100%;height:100%;" onclick="sendMessage(<?php echo $uid.', '.$eid; ?>)"> 
		</th>
	</tr>
	</table>
</div>

<?php
	// If the current user has not joint the current event
	// And the current user is the owner of the current event
	// show error message
	}else{
?>
<div>
	<div class="chatmain">Error: you have not join this event.</div>
</div>
<?php } ?>

