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
		<img class="icon" src="<?php echo $userDetail['uPhoto']; ?>">
		<!-- <div class="name"><a href="profile.php?user=<?php //echo escape($user->data()->username);?>"><?php //echo escape($user->data()->username); ?>
		</div> -->
		<div class="name"><?php echo $userDetail['nickname']; ?></div>
		<input id="follow" type="submit" name="submit" 
		value="<?php 
					if($followed > 0){
						echo "Unfollow";
					}
					else {
						echo "Follow";
					}
				?>" 
		onclick="clickFollow(<?php echo $uid.', '.$auid; ?>)">

		<!-- There won't be follow button in the user's own homepage -->
		<!-- The mode-button will be user to choose the events' show mode -->
		<!-- default "Created Events" -->
		<div class="mode-button">
			<input type="button" value="Created Events" 
			onclick="showUserEvents(<?php echo $auid; ?>, 1)" /> | 
			<input type="button" value="Joint Events" 
			onclick="showUserEvents(<?php echo $auid; ?>, 2)" /> | 
			<input type="button" value="Created Reviews" 
			onclick="showUserEvents(<?php echo $auid; ?>, 3)" />
		</div>

	</div>

	<div id="userEvent">
		<?php 
			foreach ($events as $event) {
		?>
			 <!-- this is the tox for 1 event, write a while loop to show all the events with this item-->
		   <div class="item">
		   		<div class="item-name"><?php echo $event['title']; ?></div>
		   		<div class="item-picture"><img class="item-picture" src="images/cuhk-test.jpg"></div>
		   		<div class="item-infomation">
		   			<h2>Date:</h2><?php echo $event['eDate']; ?>br/>
		   			<h2>Venue:</h2><?php echo $event['venue']; ?><br/>
		   			<h2>Description:</h2><?php echo $event['eDescription']; ?><br/>
		   		</div>
		   		<div align="right">
		   		<div class="button" onclick="loadEvent(<?php echo $event['eid'].','.$uid; ?>)">More Infomation</div></div>
		   </div>

		<?php
			}
		?>
   <!--end 1 event-->
   </div>
</div>