<?php

	require_once("UserClass.php");
	require_once("EventClass.php");

	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

	// Create new user and event objects and get some information
	$ur = new User();
	$et = new Event();
	$events = $et->getEventsCreatedByUser($auid);
	$userDetail = $ur->getUser($auid);
	$followed = $ur->checkFollow($uid, $auid);

?>

<div>
	<div align="center">
		<p><div class="loginicon" onclick="loadPersonalHomepage(<?php echo $uid.','.$auid; ?>)">
			<img src="<?php echo $userDetail['uPhoto']; ?>">
		</div></p>
		<div class="name" onclick="loadPersonalHomepage(<?php echo $uid.','.$auid; ?>)"><?php echo $userDetail['nickname']; ?></div>
		<div><?php echo $userDetail['uProfile']; ?></div>

		<?php 
			if (isset($_SESSION["logged"])){
				if ($auid != $uid) { 
		?>
			<!-- Each time the button be clicked, check the follow status and change the value -->
				<br><button class="btn btn-default" id="follow" type="button" name="submit" 
						value="<?php 
									if($followed > 0){
										echo "Unfollow";
									}
									else {
										echo "Follow";
									}
								?>" 
						onclick="clickFollow(<?php echo $uid.', '.$auid; ?>)">
						<?php 
							if($followed > 0){
								echo "Unfollow";
							}
							else {
								echo "Follow";
							}
						?>
				</button>
		<?php 	
				}				
			} 
		?>

		<div class="notification-header"></div><br> <!-- this is just a line -->
		<!-- There won't be follow button in the user's own homepage -->
		<!-- The mode-button will be user to choose the events' show mode -->
		<!-- default "Created Events" -->
		<div class="mode-button">
        	<div class="btn-group btn-group-justified" role="group" aria-label="...">
	        	<div class="btn-group" role="group">
					<button type="button" class="btn btn-default"
					onclick="showUserEvents(<?php echo $auid.','.$uid; ?>, 1)">Created Events</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default"
					onclick="showUserEvents(<?php echo $auid.','.$uid; ?>, 2)">Joined Events</button>
				</div>
				<div class="btn-group" role="group">
					<button type="button" class="btn btn-default"
					onclick="showUserEvents(<?php echo $auid.','.$uid; ?>, 3)">Reviews</button>
				</div>
			</div>
		</div><br>

	</div>
		<!-- use a flag to decide show 3 events per row or 1-->
		<!-- If the user is in the friend page, the flag will be small -->
		<!-- in the full screen personal home page the flag will be full -->
		<?php if($flag == "full"){ ?>
		<div id="userEvent" class="masonry">
		<?php }else{ ?>
		<div id="userEvent">
		<?php 
			}
			if(empty($events)) {
		?>
			<!-- if the user has no created event(default) yet, show prompt message -->
			<div align="center"><p><h2>No event now</h2></p></div>
		<?php 
			}else{
			foreach ($events as $event) {
		?>
		<!-- this is the tox for 1 event, use foreach loop to show all the events-->
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
   		<!--end event loop and else-->
   </div>
</div>