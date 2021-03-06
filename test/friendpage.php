<?php

	require_once("UserClass.php");
	require_once("EventClass.php");

	// Create new user and event objects and get some information
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
	<!--each friend-->
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
	<!--end friend-->
	<?php
		}
	?>
	</div>

	<div id="frienddetail" class="frienddetail" >
	<!-- the friend list is default to show the information of the user himself -->
		<div align="center">
			<p><div class="loginicon" onclick="loadPersonalHomepage(<?php echo $uid.','.$uid; ?>)">
			<img src="<?php echo $userDetail['uPhoto']; ?>">
			</div></p>
			<div class="name" onclick="loadPersonalHomepage(<?php echo $uid.','.$uid; ?>)"><?php echo $userDetail['nickname']; ?></div>
			<div><?php echo $userDetail['uProfile']; ?></div>

			<div class="notification-header"></div><br>
			<!-- There won't be follow button in the user's own homepage -->
			<!-- The mode-button will be user to choose the events' show mode -->
			<!-- default "Created Events" -->
	        <div class="mode-button">
	        	<div class="btn-group btn-group-justified" role="group" aria-label="...">
		        	<div class="btn-group" role="group">
						<button type="button" class="btn btn-default"
						onclick="showUserEvents(<?php echo $uid.','.$uid; ?>, 1)">Created Events</button>
					</div>
					<div class="btn-group" role="group">
						<button type="button" class="btn btn-default"
						onclick="showUserEvents(<?php echo $uid.','.$uid; ?>, 2)">Joined Events</button>
						</div>
					<div class="btn-group" role="group">
						<button type="button" class="btn btn-default"
						onclick="showUserEvents(<?php echo $uid.','.$uid; ?>, 3)">Reviews</button>
					</div>
				</div>
			</div><br>
		</div>

		<div id="userEvent">
			<?php if(empty($events)) { ?>
				<!-- if no default created event, show prompt message -->
				<div align="center"><p><h2>No event now</h2></p></div>
			<?php 
				}else{
				foreach ($events as $event) {
			?>
				<!-- this is the tox for 1 event, use a foreach loop to show all the events -->
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
			   <!--end event and else-->
		</div>
	</div>
	
</div>