<?php

	require_once("UserClass.php");
	require_once("EventClass.php");

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
		<?php if ($auid != $uid) { ?>
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
		<?php } ?>
		<div class="notification-header"></div><br>
		<!-- There won't be follow button in the user's own homepage -->
		<!-- The mode-button will be user to choose the events' show mode -->
		<!-- default "Created Events" -->
		<div class="mode-button">
	        	<div class="btn-group" role="group" aria-label="...">
				<button type="button" class="btn btn-default"
				onclick="showUserEvents(<?php echo $auid.','.$uid; ?>, 1)">Created Events</button>
				<button type="button" class="btn btn-default"
				onclick="showUserEvents(<?php echo $auid.','.$uid; ?>, 2)">Joined Events</button>
				<button type="button" class="btn btn-default"
				onclick="showUserEvents(<?php echo $auid.','.$uid; ?>, 3)">Reviews</button>
				</div>
		</div><br>

	</div>

		<?php if($flag == "full"){ ?>
		<div id="userEvent" class="masonry">
		<?php }else{ ?>
		<div id="userEvent">
		<?php 
			}
			if(empty($events)) {
		?>
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