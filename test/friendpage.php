<?php

	require_once("UserClass.php");
	require_once("EventClass.php");

	$ur = new User();
	$et = new Event();
	$friends = $ur->getFriends($uid);
	$events = $et->getEventsCreatedByUser($uid);
	$userDetail = $ur->getUser($uid);

?>

<div class="friendmain">
	<div class="friendlist">
		<h2 align="center" style="padding:5px;">Friends</h2>
		<hr style="margin:2% 0 2% 0;">
	<!--each participant-->
	<?php
		foreach($friends as $friend){
	?>
		<div style="margin:2px 0 5px 0;">
			<div class="chatmessage" style="margin:5px 10px 5px 10px" type="button" align="left"
			onclick="showFriendDetail(<?php echo $uid.", ".$friend['uid']; ?>)">
				<div style="">
					<div class="friendheader"><img src="<?php echo $friend['uPhoto']; ?>"></div>
					<div style="line-height:50px;"><?php echo $friend['nickname']; ?></div>
				</div>
			</div>
		</div>
	<!--end message-->
	<?php
		}
	?>
	</div>

	<div id="frienddetail" class="frienddetail" >
		<div align="center">
			<p><div class="loginicon"><img src="<?php echo $userDetail['uPhoto']; ?>"></div></p>
			<div class="name"><?php echo $userDetail['nickname']; ?></div>
			<div><?php echo $userDetail['uProfile']; ?></div>

			<div class="notification-header"></div><br>
			<!-- There won't be follow button in the user's own homepage -->
			<!-- The mode-button will be user to choose the events' show mode -->
			<!-- default "Created Events" -->
	        <div class="mode-button">
	        	<div class="btn-group" role="group" aria-label="...">
				<button type="button" class="btn btn-default"
				onclick="showUserEvents(<?php echo $uid.','.$uid; ?>, 1)">Created Events</button>
				<button type="button" class="btn btn-default"
				onclick="showUserEvents(<?php echo $uid.','.$uid; ?>, 2)">Joined Events</button>
				<button type="button" class="btn btn-default"
				onclick="showUserEvents(<?php echo $uid.','.$uid; ?>, 3)">Reviews</button>
				</div>
			</div><br>
		</div>

		<div id="userEvent">
			<?php if(empty($events)) { ?>
			<div align="center"><p><h2>No event now</h2></p></div>
			<?php 
				}else{
				foreach ($events as $event) {
			?>
				 <!-- this is the tox for 1 event, write a while loop to show all the events with this item-->
			   <div class="item">
			   		<div class="item-name"><?php echo $event['title']; ?></div>
			   		<div class="item-picture"><img class="item-picture" src="<?php echo $event['ePhoto']; ?>"></div>
			   		<div class="item-infomation">
			   			<h2>Date:</h2><?php echo $event['eDate']; ?><br>
			   			<h2>Venue:</h2><?php echo $event['venue']; ?><br>
			   			<h2>Description:</h2><?php echo $event['eDescription']; ?><br>
			   		</div>
			   		<div align="right">
			   		<div class="button" onclick="loadEvent(<?php echo $event['eid'].','.$uid; ?>)">More Infomation</div></div>
			   </div>

			<?php
				}}
			?>
			   <!--end 1 event-->
		</div>
	</div>
	
</div>