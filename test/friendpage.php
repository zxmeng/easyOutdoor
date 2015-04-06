<?php

	require_once("UserClass.php");
	require_once("EventClass.php");


	$ur = new User();
	$et = new Event();
	$friends = $ur->getFriends($uid);
	$events = $et->getEventsCreatedByUser($uid);
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
					<div class="chatcontent">
						<p><?php echo $friend['nickname']; ?></p>
					</div>
				</div>
			<!--end message-->
			<?php
				}
			?>
</div>

			<div class="frienddetail" >
				<div align="center">
				<img class="icon" src="images/logo.png">
				<!-- <div class="name"><a href="profile.php?user=<?php //echo escape($user->data()->username);?>"><?php //echo escape($user->data()->username); ?>
				</div> -->
				<div style="margin:10px 0 10px 0">
				        <a href="">Follow</a>
				</div>
			        <div class="mode-button">
						<button>PAST</button>|<button>NOW</button><br>
					</div>
				</div>

				<?php 
					foreach ($events as $event) {
				?>
					 <!--翔 this is the tox for 1 event, write a while loop to show all the events with this item-->
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
<!--end button-->
	
</div>