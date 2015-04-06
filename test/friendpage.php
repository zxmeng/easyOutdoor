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
		<h2 style="padding:5px;">Friends</h2>
		<hr style="margin:3px 0 3px 0;">
	<!--each participant-->
	<?php
		foreach($friends as $friend){
	?>
		<div class="chatmessage">
			<div class="chatheader">
				<img src="<?php echo $friend['uPhoto']; ?>"><br>
			</div>
			<div class="button" type="button" 
			onclick="showFriendDetail(<?php echo $uid.", ".$friend['uid']; ?>)">
			<?php echo $friend['nickname']; ?></div>
		</div>
	<!--end message-->
	<?php
		}
	?>
	</div>

	<div id="frienddetail" class="frienddetail" >
		<div align="center">
			<img class="icon" src="<?php echo $userDetail['uPhoto']; ?>">
			<div class="name"><?php echo $userDetail['nickname']; ?></div>
			<!-- There won't be follow button in the user's own homepage -->
			<!-- The mode-button will be user to choose the events' show mode -->
			<!-- default "Created Events" -->
	        <div class="mode-button">
				<input type="button" value="Created Events" 
				onclick="showUserEvents(<?php echo $uid; ?>, 1)" > | 
				<input type="button" value="Joint Events" 
				onclick="showUserEvents(<?php echo $uid; ?>, 2)" > | 
				<input type="button" value="Created Reviews" 
				onclick="showUserEvents(<?php echo $uid; ?>, 3)" >
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
			   			<h2>Date:</h2><?php echo $event['eDate']; ?><br>
			   			<h2>Venue:</h2><?php echo $event['venue']; ?><br>
			   			<h2>Description:</h2><?php echo $event['eDescription']; ?><br>
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
	
</div>